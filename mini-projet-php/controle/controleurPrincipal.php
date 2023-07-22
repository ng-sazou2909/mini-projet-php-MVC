<?php
require ROOT.DS.'modele'.DS.'persistance'.DS.'article.php';
    class ControleurPrincipal {
        public $request;
        public $msg;
        public $categories = array();
        public $articles = array();
        var $articlesConnex;
        var $categoriesConnex;

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
        
        require ERROR.'error404.php';
   }

       public function setMsg($msg){
        $this->msg = $msg;
       }

       public function getAllByCategory($id){
        $this->articles = $this->articlesConnex->getAllArticlesByCategory($id);
        $allArticles = $this->articles;
       }
    }
?>