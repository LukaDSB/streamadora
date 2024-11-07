<?php
include_once '../model/idiomaModel.php';


    $nome = $_POST['nome'];
    
                  
        if (!empty($nome)) {
           
            $idiomaModel = new IdiomaModel();
    
           
            $result = $idiomaModel->cadastrarIdioma($nome);
    
           
            if ($result) {
                header('Location: ../idioma.php');
                exit;
            } else {
                echo "Erro ao cadastrar idioma.";
            }
    
          
            $idiomaModel->closeConnection();
        } else {
            echo "Nome do idioma não foi informado.";
        }
    