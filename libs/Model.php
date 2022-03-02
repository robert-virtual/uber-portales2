<?php
    class Model{
        public function __construct() {
            $this->db = new Conexion();
            $this->conn = $this->db->connect();
        }

        public function get($id,$sql){
            
            $stmt = $this->conn->prepare($sql);
            
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $result = $stmt->get_result(); // get the mysqli result
            $user = $result->fetch_assoc(); // fetch data  
            
            $this->conn->close();
            return $user;
        }
    }
?>