<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
define('WEBROOT', dirname(dirname(__FILE__)));
define('ROOT', dirname(WEBROOT));
define('DS', DIRECTORY_SEPARATOR);
define('REQUEST', WEBROOT.DS.'request'.DS);
define('CORE', WEBROOT.DS.'core'.DS);
define('CORPS', WEBROOT.DS.'corps'.DS);
define('ERROR', WEBROOT.DS.'error'.DS);
define('PAGES', WEBROOT.DS.'page'.DS);
require REQUEST.'request.php';
require CORE.'routeur.php';
    class Dispatcher {
        var $req;
        function __construct(){
            $this->req = new Request();
            Routeur::parse($this->req->url, $this->req);
            $controller = $this->loadControleur();
            $this->callControllerMethod($controller);
        }
        
        function callControllerMethod($controller){
            $method = 'view';
            $arguments = array($this->req->action);
            if (method_exists($controller, $method)) {
                call_user_func_array(array($controller, $method), $arguments);
            } else {
                $this->error();
            }
        }

        function error(){
            $controller = new ControleurPrincipal($this->req);
            $controller->error('404');
        }

        function loadControleur(){
            $name = ucfirst($this->req->controller).'ArticleControleur';
            $file = !empty($name) ? ROOT.DS.'controle'.DS.$name.'.php' : WEBROOT.DS.'index.php';

            if (file_exists($file)) {
                require_once $file;
                if (class_exists($name)) {
                    return new $name($this->req);
                }else{
                    $this->error();
                }
            }else{
                $this->error();
            }
        }
    }
?>