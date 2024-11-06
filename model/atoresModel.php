<?php
class AtoresModel {
    public $servername = "localhost";
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

    public function getAtores() {
        $sql = "SELECT * FROM ator";
        $result = $this->conn->query($sql);
        return $result;
    }

    public function excluirAtores($id) {
        $sql = "DELETE FROM ator WHERE filmes_id = ?";
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

    public function cadastrarAtores($nome) {
        $sql = "INSERT INTO ator (nome) VALUES (?)";
    
        if ($stmt = $this->conn->prepare($sql)) {
            $stmt->bind_param("s", $nome);
            $executou = $stmt->execute();
            $stmt->close();
    
            return $executou;
        } else {
            return false;
        }
    }

    public function atualizarFilmes($id, $titulo, $descricao, $anoLancamento, $duracaoLocacao, $duracaoFilme, $idioma, $precoLocacao, $classificacao) {
        $sql = "UPDATE filmes SET titulo = ?, descricao = ?, anoLancamento = ?, duracaoLocacao = ?, duracaoFilme = ?, idioma = ?, precoLocacao = ?, classificacao = ? WHERE filmes_id = ?";
        $stmt = $this->conn->prepare($sql);
    
        if ($stmt) {
            $stmt->bind_param("ssiiisdsi", $titulo, $descricao, $anoLancamento, $duracaoLocacao, $duracaoFilme, $idioma, $precoLocacao, $classificacao, $id);
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
