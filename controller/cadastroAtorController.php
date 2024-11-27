<?php
include_once '../model/atoresModel.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];

    
    $atoresModel = new AtoresModel();
    $result = $atoresModel->cadastrarAtores($nome);
    if ($result) {
        header('Location: ../ator.php');
    } else {
        echo "Erro ao cadastrar ator.";
    }
            
} else {
    echo "Método de requisição inválido.";
}