<?php


class Connect {

    
        public $servername = "localhost";
        public $username = "";
        public $password = "";
        public $dbname = "sakila";

        public function dbconn($servername, $username, $password, $dbname){
            try{
                $conn = new mysqli($servername, $username, $password, $dbname);
                $conn->set_charset("utf8");
                return $conn;
            } catch (Throwable $e) {
                
                header("Location: ExerciseSakilaMain.php");
                exit();
            }
        }
    }

    
    $connect = new Connect();

    
    $conn = $connect->dbconn($connect->servername, $connect->username, $connect->password, $connect->dbname);
    

class Preparer extends Connect {

    public $conn;
    public $stmt;

    public function __construct($stmt, $conn) {

        $this->stmt = $stmt;
        $this->conn = $conn;
        
        
    }
    public function getObject() {

        return $this->stmt; 

    }
    

}


    
   
function query_mysql($conn, $query) {
    $result = $conn->query($query);
    if ($result) {
        return $result;
    } else {
        return false;
    }
}


?>