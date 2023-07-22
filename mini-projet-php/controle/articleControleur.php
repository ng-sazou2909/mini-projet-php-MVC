<?php
require ROOT.DS.'controle'.DS.'controleurPrincipal.php';
    class ArticleControleur extends ControleurPrincipal {
        function view($pageName){
            $msg = "Bienvenue au coeur de l'information";
            $this->setMsg($msg);
            $this->render('home');
           }
    }
?>