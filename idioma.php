<?php
include_once 'model/idiomaModel.php';



$di = new idiomaModel();
$idioma = $di->getIdioma();
$di->closeConnection();
?>




<!DOCTYPE html>
<html>
  <head>
  <link rel = "stylesheet" type="text/css" href="src/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

  </head>


  
<style>
table, th, td {
  border:1px solid black;
}
</style>
<body>

<header class="teste">
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <a class="navbar-brand poetsen-one-regular" href="#">Streamadora</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="index.php">Início</a>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link " href="#" role="button"
                                aria-expanded="false">
                                Categorias
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Ator</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="idioma.php">Idioma</a>
                        </li>
                    </ul>

                    <button type="button" class="btn btn-primary me-3" data-bs-toggle="modal"
                        data-bs-target="#modalCadastro">
                        Cadastrar novo idioma
                    </button>

                    <div class="modal fade" id="modalCadastro" tabindex="-1" aria-labelledby="modalCadastroLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="modalCadastroLabel">Cadastrar novo idioma</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="controller/cadastroIdiomaController.php" method="post" enctype="multipart/form-data">
                                        <div class="mb-3">
                                            <label for="nome" class="col-form-label" style="color: black">Idioma:</label>
                                            <input type="text" class="form-control" id="nome" name="nome">
                                        </div>
                                        
                                        <input type="submit" value="Cadastrar Idioma">
                                    </form>
                                    <div class="modal-body">
                                                                                                                                                   
                                                               
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
        <?php
            if ($idioma->num_rows > 0) {
                while ($row = $idioma->fetch_assoc()) {
                    echo "<div class='card'>
                     <div class='card-body'>
                        <p class='card-text'>" . $row["nome"] . "</p>
                                              
                        <button type='button' class='btn btn-primary me-3' 
                            data-bs-toggle='modal' 
                            data-bs-target='#modalAtualizacao'
                            data-id='" . $row['idioma_id'] . "'
                            data-nome='" . $row['nome'] . "'>
                            Editar
                        </button>

                    

                       
                  <a href='controller/excluirIdiomaController.php?id=" . $row["idioma_id"] . "' class='btn btn-danger' onclick='return confirm(\"Tem certeza que deseja excluir este item?\");'>Excluir</a>
                    </div>
                </div>";
                }
            } else {
                echo "<p>Nenhum Filme encontrado</p>";
            }
            ?>

<div class="modal fade" id="modalAtualizacao" tabindex="-1" aria-labelledby="modalAtualizacaoLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="modalCadastroLabel">Editar idioma</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="controller/atualizarIdiomaController.php" method="post" enctype="multipart/form-data">
                                <input type="hidden" id="id" name="id">

                                <div class="mb-3">
                                    <label for="nome" class="col-form-label" style="color: black">Nome:</label>
                                    <input type="text" class="form-control" id="nome" name="nome" placeholder="">
                                </div>

                                <!-- <div class="mb-3">
                                    <label for="idioma_id" class="col-form-label" style="color: black">Idioma_id:</label>
                                    <input type="text" class="form-control" id="idioma_id" name="idioma_id" placeholder="">
                                </div> -->
                               
                                
                                <input type="submit" value="Atualizar Filme">
                            </form>
                        </div>
                    </div>
                </div>
            </div>



    </header>





<?php
 if ($idioma->num_rows > 0){
    while ($row = $idioma->fetch_assoc()) {
echo '
    <tr>
           <td>"' . $row ["nome"] . '"  </td>
         </tr>
    
';

    }

 } else {
    echo "<p>Nenhum idioma encontrado</p>";
}

?>
 </tbody>
</table>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script>
        const modalAtualizacao = document.getElementById('modalAtualizacao');
        modalAtualizacao.addEventListener('show.bs.modal', event => {
            const button = event.relatedTarget;

            const idiomaId = button.getAttribute('data-id');
            const nome = button.getAttribute('data-nome');
            

            modalAtualizacao.querySelector('#id').value = idiomaId;
            modalAtualizacao.querySelector('#nome').value = nome;
            
        });
    </script>
</body>
</html>
