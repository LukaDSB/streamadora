<?php
include_once '../model/idiomaModel.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $idiomaModel = new IdiomaModel();
    $result = $idiomaModel->excluirIdioma($id);

    if ($result) {
        header("Location: /idioma.php");
        exit();
    } else {
        echo "Erro ao excluir registro.";
    }
}
?>