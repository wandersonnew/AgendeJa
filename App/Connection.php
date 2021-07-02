<?php
    namespace App;
    class Connection {
        public static function getDB() {
            try{
                $conn = new \PDO('mysql:host='.host.';dbname='.dbname.'', user, pass);
                /*$sqlite = "sqlite:".SQLITE."";
                $conn = new \PDO($sqlite);*/
                return $conn;
				/*$conn = new \PDO(
					"mysql:host=localhost;dbname=agendeja;charset=utf8",
					"root",
					"" 
				);*/
            } catch (\PDOException $e) {
                echo $e;
            }
        }
    }
?>