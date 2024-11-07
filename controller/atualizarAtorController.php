<?php
include_once ("../model/atoresModel.php");

if (isset($_POST['ator_id'])) {
    $atoresModel = new AtoresModel();
    
    $id = $_POST['ator_id'];
    $nome = $_POST['nome'];

    $result = $atoresModel->atualizarAtores($id, $nome);

    if ($result) {
        header('Location: ../ator.php');
    } else {
        echo "Erro ao atualizar o filme.";
    }
    

    $atoresModel->closeConnection();
} else {
    echo "Método de requisição inválido.";
}



?>