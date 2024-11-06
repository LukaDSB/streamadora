<?php
include_once '../model/idiomaModel.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    
                  
        if (!empty($nome)) {
           
            $idiomaModel = new IdiomaModel();
    
           
            $result = $idiomaModel->cadastrarIdioma($nome);
    
           
            if ($result) {
                header('Location: ../index.php');
                exit;
            } else {
                echo "Erro ao cadastrar idioma.";
            }
    
          
            $idiomaModel->closeConnection();
        } else {
            echo "Nome do idioma não foi informado.";
        }
    } else {
        echo "Método de requisição inválido.";
    }
