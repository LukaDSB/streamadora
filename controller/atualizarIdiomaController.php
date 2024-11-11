<?php 
include_once '../model/idiomaModel.php';


    $idiomaModel = new IdiomaModel();
    
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    
    
    $result = $idiomaModel->atualizarIdioma($id, $nome);

    if ($result) {
        header('Location: ../idioma.php');
    } else {
        echo "Erro ao atualizar o idioma.";
    }

    $idiomaModel->closeConnection();

?>