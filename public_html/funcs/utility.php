<?php
    class Utility{
        public function __construct(){
            session_start();
        }

        public function isLogged(){
            return (isset($_SESSION['logged']) && $_SESSION['logged'] == 1);
        }

        public function isAdmin(){
            if(!$this->isLogged()) return false;
            else return (isset($_SESSION['admin']) && $_SESSION['admin'] == 1);
        }

    }
?>