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
    die("Falha na conexão: " . $conn->connect_error);
}

// Obtém o ID da categoria enviado via GET
$categoria_id = $_GET['id'] ?? null;

// Valida se o ID foi recebido
if (!$categoria_id) {
    die("ID da categoria não fornecido.");
}

// Inicializa a variável para o nome da categoria
$categoria_nome = "";

// Obtém o nome da categoria atual do banco de dados
$sql = "SELECT nome FROM categoria WHERE categoria_id = $categoria_id";
$resultado = $conn->query($sql);

if ($resultado->num_rows > 0) {
    $row = $resultado->fetch_assoc();
    $categoria_nome = $row['nome'];
} else {
    die("Categoria não encontrada.");
}

// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtém o novo nome da categoria do formulário, removendo espaços em branco
    $novo_nome = trim($_POST['categoria_nome'] ?? "");

    // Valida se o nome foi preenchido e não é apenas espaços
    if (!empty($novo_nome)) {
        // Atualiza o nome da categoria no banco de dados
        $sql = "UPDATE categoria SET nome = '$novo_nome' WHERE categoria_id = ($categoria_id)";

        if ($conn->query($sql) === TRUE) {
            echo "
            <div class='modal'>
            <h3>Alteração feita com sucesso!</h3>
            <a href='administrarCategoria.php'>Ok!</a>
             </div>";
        } else {
            echo "<div class='modal'>
            <h3>Algo deu errado</h3>
            <a href='alterarCategoria.php?id=" . ($categoria_id) . "'>Tentar Novamente</a>
            </div>";
        }
    } else {
        echo "<div class='modal'>
        <h3>O campo de nome da categoria não pode estar vazio ou ser apenas espaços!</h3>
        <a href='alterarCategoria.php?id=" . ($categoria_id) . "'>Tentar Novamente</a>
        </div>";
    }
}

// Fecha a conexão com o banco de dados
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar Categoria</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f1de;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        div {
            background-color: #243c34;
            border-radius: 10px;
            padding: 5em 5em;
            text-align: center;
            width: 300px;
            color: #f8f1de;
        }
        h2 {
            font-size: 1.5em;
            padding-bottom: 20px;
            border-bottom: 2px solid #f8f1de;
        }
        form {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            gap: 15px;
        }
        label {
            font-size: 1.5em;
            text-align: left;
        }
           
        input[type="text"] {
            padding: 1em;
            border-radius: 5px;
            border: none;
            outline: none;
            font-size: 14px;
            color:#f8f1de;
            background-color: #243c34;
            
        }
        input[type="submit"] {
            background-color: #f8f1de;
            color: #243c34;
            padding: 1.5em 8em;
            margin-top: 1.5em;
            border: none;
            border-radius: 20px;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s ease;
            font-size: 1em;
        }
        input[type="submit"]:hover {
            background-color: #d3c4a6;
        }

        .input-nome{
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            align-items: center;
            border-bottom: 2px solid #f8f1de;
            padding: 2em;
        }

        .modal{
            display: flex;
            flex-direction: column;
            background-color: #ef601e;
            color: #fdf3dd;
            position: absolute;
        }

        .modal a{
        text-decoration: none;
        color: #ef601e;
        background-color: #fdf3dd;
        padding: 1em;
        border-radius: 10px;
        }
    </style>
</head>
<body>
    <div>
        <!-- Exibe o nome da categoria no título -->
        <h2>Alterando Categoria: <?php echo htmlspecialchars($categoria_nome); ?></h2>
        <form method="POST" action="">
            <!-- Exibe o nome atual da categoria para edição -->
            <div class="input-nome">
                <label for="categoria_nome">Nome:</label>
                <input type="text" id="categoria_nome" name="categoria_nome" value="<?php echo htmlspecialchars($categoria_nome); ?>" required>
            </div>
            <!-- Botão para atualizar -->
            <input type="submit" value="ALTERAR">
        </form>
    </div>

    
</body>
</html>
