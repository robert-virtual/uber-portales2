
<?php

    class Usuario extends Model {
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
            
            $sql = "SELECT Id,Nombre,Correo,Estado FROM usuarios";
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
            $sql = "SELECT Id,Nombre,Correo,Estado FROM usuarios where id = ? ";
            $stmt = $this->conn->prepare($sql);
         
            $stmt->bind_param("s", $id);
            
            $result = $this->conn->query($sql);
            $usuarios = [];
            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    $usuarios[] = $row;
                }
            }
            $this->conn->close();
            return $usuarios;
        }

    }
?>