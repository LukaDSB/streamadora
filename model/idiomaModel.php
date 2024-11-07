<!-- configurar mysql, importar o banco, ajustar model, criar controler -->


<?php
class idiomaModel {
    private $servername = "localhost";
    private $username = "root";
    private $password = "root";
    private $dbname = "streamadora";
    public $conn;


    public function __construct() {
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);

        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    public function getIdioma() {
        $sql = "SELECT * FROM idioma";
        $result = $this->conn->query($sql);
        return $result;
    }

    public function excluirIdioma($id) {
        $sql = "DELETE FROM idioma WHERE idioma_id = ?";
        $stmt = $this->conn->prepare($sql);
    
        if ($stmt) {
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $stmt->close();
            return true;
        } else {
            return false;
        }
    }

    public function cadastrarIdioma($nome) {
        $sql = "INSERT INTO idioma (nome) VALUES (?)";
    
        if ($stmt = $this->conn->prepare($sql)) {
            $stmt->bind_param("s", $nome);
            $executou = $stmt->execute();
            $stmt->close();
    
            return $executou;
        } else {
            return false;
        }
    }

    public function atualizarIdioma($id, $nome) {
        $sql = "UPDATE idioma SET nome = ? WHERE idioma_id = ?";
        $stmt = $this->conn->prepare($sql);
    
        if ($stmt) {
            $stmt->bind_param("si", $nome, $id);
            $executou = $stmt->execute();
            $stmt->close();
    
            return $executou;
        } else {
            return false;
        }
    }    

    public function closeConnection() {
        $this->conn->close();
    }
}
