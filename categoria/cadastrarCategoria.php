<?php
// Configurações do banco de dados
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "streamadora";

// Cria conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica conexão
if ($conn->connect_error) {
    die("Falhou " . $conn->connect_error);
}

// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtém o nome da categoria enviado pelo formulário
    $categoria_nome = $_POST['categoria_nome'];

    // Verifica se o campo de nome está vazio
    if (!empty($categoria_nome)) {
        // Escapa caracteres especiais para evitar erros de sintaxe e SQL Injection
        $categoria_nome = $conn->real_escape_string($categoria_nome);

        // Monta a consulta SQL
        $sql = "INSERT INTO categoria (nome) VALUES ('$categoria_nome')";

        // Executa a consulta e verifica se foi bem-sucedida
        if ($conn->query($sql) === TRUE) {
            echo "Nova categoria cadastrada!";
            header("Location: administrarCategoria.php");
        } else {
            echo "Erro ao cadastrar categoria: " . $conn->error;
        }
    } else {
        echo "O campo de nome da categoria está vazio.";
    }
} else {
    echo "Método de requisição inválido.";
}

// Fecha a conexão
$conn->close();
?>
