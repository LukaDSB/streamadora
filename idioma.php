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
                        Cadastrar novo filme
                    </button>

                    <div class="modal fade" id="modalCadastro" tabindex="-1" aria-labelledby="modalCadastroLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="modalCadastroLabel">Cadastrar novo filme</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="controller/cadastroFilmeController.php" method="post" enctype="multipart/form-data">
                                        <div class="mb-3">
                                            <label for="titulo" class="col-form-label" style="color: black">Titulo:</label>
                                            <input type="text" class="form-control" id="titulo" name="titulo">
                                        </div>
                                        <div class="mb-3">
                                            <label for="descricao" class="col-form-label"
                                                style="color: black">Descricao:</label>
                                            <textarea class="form-control" id="descricao" name="descricao"></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label for="anoLancamento" class="col-form-label" style="color: black">Ano de lançamento:</label>
                                            <input type="text" class="form-control" id="anoLancamento" name="anoLancamento">
                                        </div>
                                        <div class="mb-3">
                                            <label for="duracaoLocacao" class="col-form-label" style="color: black">Duração de locação:</label>
                                            <input type="text" class="form-control" id="duracaoLocacao" name="duracaoLocacao">
                                        </div>
                                        <div class="mb-3">
                                            <label for="duracaoFilme" class="col-form-label" style="color: black">Duração de filmes:</label>
                                            <input type="text" class="form-control" id="duracaoFilme" name="duracaoFilme">
                                        </div>
                                        <div class="mb-3">
                                            <label for="idioma" class="col-form-label" style="color: black">Idioma:</label>
                                            <input type="text" class="form-control" id="idioma" name="idioma">
                                        </div>
                                        <div class="mb-3">
                                            <label for="precoLocacao" class="col-form-label" style="color: black">Preço de locação:</label>
                                            <input type="text" class="form-control" id="precoLocacao" name="precoLocacao">
                                        </div>
                                        <div class="mb-3">
                                            <label for="classificacao" class="col-form-label" style="color: black">Classificação:</label>
                                            <input type="text" class="form-control" id="classificacao" name="classificacao">
                                        </div>
                                        <div class="mb-3">
                                            <label for="imagem">Imagem do Filme:</label>
                                            <input type="file" id="imagem" name="imagem" accept="image/*" required>
                                        </div>
                                        <input type="submit" value="Cadastrar Filme">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </header>





<h2>Tabela de Idiomas</h2>
<table class="table">
  <thead>
    <tr>
      <th scope="col">Idioma</th>
    </tr>
  </thead>
  <tbody>
 
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
 
</body>
</html>
