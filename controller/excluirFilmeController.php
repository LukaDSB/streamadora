<?php
include_once '../modal/filmesModal.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $filmesModal = new FilmesModal();
    $result = $filmesModal->excluirFilme($id);

    if ($result) {
        header("Location: /index.php");
        exit();
    } else {
        echo "Erro ao excluir registro.";
    }
}
?>
