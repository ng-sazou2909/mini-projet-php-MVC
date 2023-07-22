<?php
require ROOT.DS.'controle'.DS.'controleurPrincipal.php';
    class ArticleControleur extends ControleurPrincipal {
        function view($pageName){
            $msg = "Bienvenue au coeur de l'information";
            $this->setMsg($msg);
            $url = $_SERVER['REQUEST_URI'];
            $url = trim($url, '/');
            $params = explode('/', $url);
            $controler = !empty($params[1]) ? $params[1] : '';
            $action = !empty($params[2]) ? $params[2] : '';
            if ($action === 'category' && $controler === 'articles' && $_SERVER['REQUEST_METHOD'] === 'GET') {
                $categoryId = !empty($params[3]) ? $params[3] : '';
                $categoryId = trim($categoryId, '?');
                $this->showCategory($categoryId);
            } else if ($controler !== 'articles' && $controler !== '') {
                $this->error();
            }  else if ($action === 'category' && $controler === 'articles' && $_SERVER['REQUEST_METHOD'] !== 'GET') {
                $this->error();
            } 
            else if ($controler === ''){
                $this->render('home');
            }
           }
    }
?>