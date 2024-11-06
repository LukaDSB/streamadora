<?php 
include_once '../model/idiomaModel.php';

if (isset($_POST['idioma_id'])) {
    $idiomaModel = new IdiomaModel();
    
    $id = $_POST['idioma_id'];
    $nome = $_POST['nome'];
    
    $result = $idiomaModel->atualizarIdioma($id, $nome);

    if ($result) {
        header('Location: ../index.php');
    } else {
        echo "Erro ao atualizar o idioma.";
    }

    $idiomaModel->closeConnection();
} else {
    echo "Método de requisição inválido.";
}
?>