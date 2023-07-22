<?php
require ROOT.DS.'modele'.DS.'persistance'.DS.'article.php';
    class ControleurPrincipal {
        public $request;
        public $msg;
        public $categories = array();
        public $articles = array();
        var $articlesConnex;
        var $categoriesConnex;
        public $params = array();
        public $allArticles = array();

        function __construct($request){
            $this->request = $request;
            $this->articlesConnex = new ArticleCrud();
            $this->categoriesConnex = new CategoryCrud();
        }
       public function render($view){
            if($view === 'home')
            {
                $view = WEBROOT.DS.$view.'.php';
            }
            else {
                $view = PAGES.$this->request->controller.$view.'.php';
            }
            $vide = false;
            $this->categories = $this->categoriesConnex->getAllCategories();
            $allCategories = $this->categories;
            $allArticles = array();
            $message = $this->msg;
            require($view);
       }

       public function error(){
        
        include ERROR.'error404.php';
   }

       public function setMsg($msg){
        $this->msg = $msg;
       }

       public function showCategory($id) {
        $vide = false;
        $this->categories = $this->categoriesConnex->getAllCategories();
        $allCategories = $this->categories;
        $category = $this->categoriesConnex->readCategory($id);
        $message = 'Pas d\'informations '.$category['libelle'].' disponibles';
        $allArticles = $this->articlesConnex->getAllArticlesByCategory($id);
        if(empty($allArticles)){
            $vide = true;
        }
        $view = WEBROOT.DS.'home.php';
        include $view;
        }
    }
?>