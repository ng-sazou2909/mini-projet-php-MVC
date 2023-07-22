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
        public $pars = array();

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

       public function getAllByCategory($id){
        $this->articles = $this->articlesConnex->getAllArticlesByCategory($id);
        $this->allArticles = $this->articles;
       }

       public function showCategory() {
        $url = $_SERVER['REQUEST_URI'];
        $url = trim($url, '/');
        $this->params = explode('/', $url);
        $controler = $this->params[1];
        $action = $this->params[2];
        if ($action === 'category' && $controler === 'articles' && $_SERVER['REQUEST_METHOD'] === 'GET') {
            $categoryId = $_GET['categoryId'];
            $this->articles = $this->articlesConnex->getAllArticlesByCategory($categoryId);
            $allArticles = $this->articlesConnex->getAllArticlesByCategory($categoryId);
            $view = WEBROOT.DS.'home.php';
        }
        else {
            include ERROR.'error404.php';
        }
    }
    }
?>