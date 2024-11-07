<?php
include_once("../model/atoresModel.php");


if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $atoresModel = new AtoresModel();
    $result = $atoresModel->excluirAtores($id);

    if ($result) {
        header("Location: /ator.php");
        exit();
    } else {
        echo "Erro ao excluir registro.";
    }
}






?>