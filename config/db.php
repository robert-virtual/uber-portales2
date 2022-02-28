<?php


class Conexion {
    private $servername = "ec2-3-141-200-64.us-east-2.compute.amazonaws.com";
    private $username = "ubuntu";
    private $password = "P@ssw0rd";
    private $dbname = "uberdb";
    public $conn;

    public function connect(){
     
      // $this->conn = new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password);
      // $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      //echo "Connection failed: " . $e->getMessage();
      

      // return $this->conn;
      // Create connection
       $this->conn = new mysqli($this->servername, $this->username, $this->password,$this->dbname);
      // Check connection
      if ($this->conn->connect_error) {
        die("Connection failed: " . $this->conn->connect_error);
      }
      return $this->conn;        
    }


}

?>