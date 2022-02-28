
<?php

    class Usuario extends Model {
        public $id = "";
        public $nombre = "";
        public $correo = "";
        public $clave = "";
        public $estado = true;
        

        public function __construct($nombre = "",$correo = "",$clave = "",$estado = true) {
            parent::__construct();
            $this->conn = $this->db->connect();
            $this->nombre = $nombre;
            $this->correo = $correo;
            $this->clave = $clave;
            $this->estado = $estado;
        }
        public function create(){
            # code...
            $stmt = $this->conn->prepare("INSERT INTO usuarios (nombre, correo, clave) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $this->nombre, $this->correo, password_hash($this->clave, PASSWORD_DEFAULT));
            $stmt->execute();
            $stmt->close();
            $this->conn->close();
        }
        public function getAll(){
            
            $sql = "SELECT Id,Nombre,Correo FROM usuarios where estado = 1";
            // print_r($this->conn);
            
            $result = $this->conn->query($sql);
            $usuarios = [];
            if ($result->num_rows == 0) {
                // output data of each row
                $this->view->error = "Consulta vacia";
            }
            while($row = $result->fetch_assoc()) {
                $usuarios[] = $row;
            }
            $this->conn->close();
            return $usuarios;
        }
        public function get($id){
            $sql = "SELECT Id,Nombre,Correo,Estado FROM usuarios where Id = ?";
            $stmt = $this->conn->prepare($sql);
            
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $result = $stmt->get_result(); // get the mysqli result
            $user = $result->fetch_assoc(); // fetch data  
            
            $this->conn->close();
            return $user;
        }

        public function login(){
            $sql = "SELECT Id,Nombre,Correo,Estado FROM usuarios where correo = ?";
            $stmt = $this->conn->prepare($sql);
            
            $stmt->bind_param("s", $this->correo);
            $stmt->execute();
            $result = $stmt->get_result(); // get the mysqli result
            $user = $result->fetch_assoc(); // fetch data  
            
            $this->conn->close();
            
            return $user;
        }

        public function disable($id){
            $stmt = $this->conn->prepare("UPDATE usuarios SET estado = !estado WHERE id = ?");
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $stmt->close();
            $this->conn->close();
        }
        
        public function update(){
            $sql = "UPDATE usuarios SET nombre = IF(? != '',?, nombre),
            correo = IF(? != '', ?,correo) WHERE id = ?";
            $stmt = $this->conn->prepare($sql);
            $stmt->bind_param("ssssi",$this->nombre,$this->nombre,$this->correo,$this->correo, $this->id);
            $stmt->execute();
            $stmt->close();
            $this->conn->close();
        }
        
    }
    ?>