<?php
    class Connection extends PDO {
        const HOST = "localhost";
        const DB = "mglsi_news";
        const USER = "mglsi_user";
        const PSW = "passer";

        public function __construct(){
            try {
                parent::__construct("mysql:dbname=".self::DB.";host=".self::HOST,self::USER,self::PSW);
            } catch (PDOException $e) {
                echo "ERREUR";
                echo $e->getMessage()." ".$e->getFile()." ".$e->getLine();
            }
        }
    }
?>