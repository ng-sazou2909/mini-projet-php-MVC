<?php
require ROOT.DS.'controle'.DS.'controleurPrincipal.php';
    class ArticleControleur extends ControleurPrincipal {
        function view($pageName){
            $msg = "Bienvenue au coeur de l'information";
            $this->setMsg($msg);
            $url = $_SERVER['REQUEST_URI'];
            $url = trim($url, '/');
            $this->params = explode('/', $url);
            $controler = !empty($this->params[1]) ? $this->params[1] : '';
            $action = !empty($this->params[2]) ? $this->params[2] : '';
            if ($action === 'category' && $controler === 'articles' && $_SERVER['REQUEST_METHOD'] === 'GET') {
                //$this->showCategory();
            }else{
                $this->render('home');
            }
           }
    }
?>