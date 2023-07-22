<?php
require ROOT.DS.'modele'.DS.'persistance'.DS.'article.php';
    class ControleurPrincipal {
        public $request;
        public $msg;
        public $categories = array();
        public $articles = array();
        public $allArticles = array();
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
        $url = trim($url, '/');
        $this->params = explode('/', $url);
        $pars = $this->params;
        $action = $this->params[1];
        $controler = $this->params[0];
        $param = $this->params[2];
        if ($controler === 'articles' && $action === 'category' && $_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->articles = $this->articlesConnex->getAllArticlesByCategory($param);
            $this->allArticles = $this->articles;
            require_once($this->params);
            $view = WEBROOT.DS.'home.php';
        }
        else {
            include ERROR.'error404.php';
        }
    }
    }
?>