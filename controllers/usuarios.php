<?php

class Usuarios extends Controller{

        public function __construct() {
            parent::__construct();
            $this->obtenerTodos();
            // render debe ir siempre al final para poder pasarleinformacion
            $this->view->render("usuarios");
        }      
        
        
        public function crear(){
            # code...
            if (!isset($_POST["nombre"])) {
                # code...
                echo "Falta datos necesarios";
                
                die();
            }
            $user = new Usuario($_POST["nombre"],$_POST["correo"],$_POST["clave"]);
            
            print_r($user);
            $stmt = $this->conn->prepare("INSERT INTO usuarios (nombre, correo, clave) VALUES (?, ?, ?)");
            echo "prepare";
            
            
            $stmt->bind_param("sss", $user->nombre, $user->correo, password_hash($user->clave, PASSWORD_DEFAULT));
            echo "bind_param";
            $stmt->execute();
            echo "execute";
            $stmt->close();
            echo "stmt->close";
            $this->conn->close();
            echo "conn->close";
            // header("Location: /usuarios/crear");
            
        }
        
        public function obtenerTodos(){
            # code...
            $sql = "SELECT Id,Nombre,Correo,Estado FROM usuarios";
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
            $this->view->usuarios = $usuarios;
            
        }

        public function obtenerUno($id){
            # code...
            $sql = "SELECT Id,Nombre,Correo,Estado FROM usuarios where id = ? ";
            $stmt = $this->conn->prepare($sql);
         
            $stmt->bind_param("sss", $user->nombre, $user->correo, password_hash($user->clave, PASSWORD_DEFAULT));
            
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
        

        public function eliminar(){
            # code...
            echo "obtenerTodos";
            
        }
}

?>