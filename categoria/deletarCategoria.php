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
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['categoria_id'])) {
    // Obtém o ID da categoria enviado pela URL
    $categoria_id = intval($_GET['categoria_id']);

    // Monta a consulta SQL para excluir a categoria
    $sql = "DELETE FROM categoria WHERE categoria_id = $categoria_id";

    // Executa a consulta e verifica se foi bem-sucedida
    if ($conn->query($sql) === TRUE) {
        echo "Categoria excluída com sucesso!";
    } else {
        echo "Algo deu errado ao excluir a categoria.";
    }
} else {
    echo "ID da categoria não fornecido ou método de requisição inválido.";
}

// Fecha a conexão
$conn->close();
?>
