<?php
include_once '../modal/filmesModel.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $titulo = $_POST['titulo'];
    $descricao = $_POST['descricao'];
    $anoLancamento = $_POST['anoLancamento'];
    $duracaoLocacao = $_POST['duracaoLocacao'];
    $duracaoFilme = $_POST['duracaoFilme'];
    $idioma = $_POST['idioma'];
    $precoLocacao = $_POST['precoLocacao'];
    $classificacao = $_POST['classificacao'];
    $idiomaId = 1;

    if($idioma == 'ingles'){
        $idiomaId = 2;
    }



    if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] == 0) {
        $diretorio = '../src/imagens/';
        
        $nomeImagem = uniqid() . '.jpg';

        $caminhoImagem = $diretorio . $nomeImagem;

        if (move_uploaded_file($_FILES['imagem']['tmp_name'], $caminhoImagem)) {
            $filmesModel = new FilmesModel();

            $result = $filmesModel->cadastrarFilmes($titulo, $descricao, $anoLancamento, $duracaoLocacao, $duracaoFilme, $idioma, $precoLocacao, $classificacao, $idiomaId, $nomeImagem);

            if ($result) {
                header('Location: ../index.php');
            } else {
                echo "Erro ao cadastrar filme.";
            }

            $filmesModel->closeConnection();
        } else {
            echo "Erro ao mover o arquivo da imagem.";
        }
    } else {
        echo "Nenhuma imagem foi enviada.";
    }
} else {
    echo "Método de requisição inválido.";
}
