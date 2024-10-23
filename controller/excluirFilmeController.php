<?php
include_once '../modal/filmesModel.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $filmesModel = new FilmesModel();
    $result = $filmesModel->excluirFilme($id);

    if ($result) {
        header("Location: /index.php");
        exit();
    } else {
        echo "Erro ao excluir registro.";
    }
}
?>
