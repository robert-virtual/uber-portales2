
<?php
    class Queja extends Model {
        public $usuarioid = "";
        public $viajeid = "";
        public $queja = "";
        

        public function __construct($usuarioid = "",$viajeid = "",$queja = "") {
            parent::__construct();
            $this->conn = $this->db->connect();
            $this->usuarioid = $usuarioid;
            $this->viajeid = $viajeid;
            $this->queja = $queja;
        }
        public function create(){
            # code...
            $stmt = $this->conn->prepare("INSERT INTO quejas (usuarioid, viajeid, queja) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $this->usuarioid, $this->viajeid, $this->queja);
            $stmt->execute();
            $stmt->close();
            $this->conn->close();
        }

        public function getAll(){
    $sql = "SELECT * FROM quejas";
            // print_r($this->conn);
            
            $this->conn = $this->db->connect();
            $result = $this->conn->query($sql);
            $quejas = [];
            if ($result->num_rows == 0) {
                // output data of each row
                $this->view->error = "Consulta vacia";
            }
            while($row = $result->fetch_assoc()) {
                $quejas[] = $row;
            }
            $this->conn->close();
            return $quejas;
        }
    }
?>