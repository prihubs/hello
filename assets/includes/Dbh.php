<?php

class Dbh{

    //PROPERTIES
    private $conn;
    private $dbuser;
    private $dbpass;

    //CONSTRUCT
    public function __construct($conn, $dbuser, $dbpass){
        $this->conn = $conn;
        $this->dbuser = $dbuser;
        $this->dbpass = $dbpass;
    }
    
    //CONNECTION
    protected function Connect(){
        $this->conn = "mysql:host=localhost;dbname=filesystem;";
        $this->dbuser = "root";
        $this->dbpass = "";

        try {
            $pdo = new PDO($this->conn, $this->dbuser, $this->dbpass);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return $pdo;
            
        } catch (PDOException $e) {
            echo "Not Connected: ".$e->getMessage();
        }
}

}