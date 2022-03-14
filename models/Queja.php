
<?php
    class Queja extends Model {
        public $id = "";
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
            $stmt = $this->conn->prepare("INSERT INTO quejas (usuarioid, viajeid, queja) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $this->usuarioid, $this->viajeid, $this->queja);
            $stmt->execute();
            $stmt->close();
            $this->conn->close();
        }

        public function getAll(){
            $this->conn = $this->db->connect();
            $sql = "SELECT * FROM quejas";
            
            $result = $this->conn->query($sql);
            $quejas = [];
            if ($result->num_rows == 0) {
                $this->view->error = "Consulta vacia";
            }
            while($row = $result->fetch_assoc()) {
                $quejas[] = $row;
            }
            $this->conn->close();
            return $quejas;
        }

        public function update(){
            $sql = "UPDATE quejas SET usuarioid = IF(? != '',?, usuarioid), viajeid = IF(? != '', ?, viajeid), queja = IF(? != '', ?,queja) WHERE id = ?";
            
            $stmt = $this->conn->prepare($sql);
            $stmt->bind_param("ssssssi",$this->usuarioid,$this->usuarioid,$this->viajeid,$this->viajeid, $this->queja,$this->queja,$this->id);
            $stmt->execute();
            $stmt->close();
            $this->conn->close();
        }
    }
?>