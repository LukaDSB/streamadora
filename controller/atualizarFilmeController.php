<?php 
include_once ('../model/filmesModel.php');

if (isset($_POST['filmes_id'])) {
    $filmesModel = new FilmesModel();
    
    $id = $_POST['filmes_id'];
    $titulo = $_POST['titulo'];
    $descricao = $_POST['descricao'];
    $anoLancamento = $_POST['anoLancamento'];
    $duracaoLocacao = $_POST['duracaoLocacao'];
    $duracaoFilme = $_POST['duracaoFilme'];
    $idioma = $_POST['idioma'];
    $precoLocacao = $_POST['precoLocacao'];
    $classificacao = $_POST['classificacao'];

    $result = $filmesModel->atualizarFilmes($id, $titulo, $descricao, $anoLancamento, $duracaoLocacao, $duracaoFilme, $idioma, $precoLocacao, $classificacao);

    if ($result) {
        header('Location: ../index.php');
    } else {
        echo "Erro ao atualizar o filme.";
    }

    $filmesModel->closeConnection();
} else {
    echo "Método de requisição inválido.";
}
?>