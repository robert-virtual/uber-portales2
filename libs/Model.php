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
        public function query($tabla){
            $sql = "SELECT * FROM $tabla";
            $this->conn = $this->db->connect();
            $result = $this->conn->query($sql);
            $datos = [];
            if ($result->num_rows == 0) {
                // output data of each row
                $this->view->error = "Consulta vacia";
            }
            while($row = $result->fetch_assoc()) {
                $datos[] = $row;
            }
            $this->conn->close();
            return $datos;
        }
    }
?>