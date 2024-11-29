<?php
include_once 'model/atoresModel.php';

$db = new AtoresModel();
$atores = $db->getAtores();
$db->closeConnection();
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ator</title>
    <link rel="stylesheet" type="text/css" href="src/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

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
                            <a class="nav-link"  aria-current="page" href="./index.php">Início</a>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link " href="./categoria/administrarCategoria.php" role="button"
                                aria-expanded="false">
                                Categorias
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link atual_page" href="./ator.php">Ator</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="#">Idioma</a>
                        </li>
                    </ul>

                    <button type="button" class="btn btn-primary me-3" data-bs-toggle="modal"
                        data-bs-target="#modalCadastro">
                        Cadastrar novo ator
                    </button>

                    <div class="modal fade" id="modalCadastro" tabindex="-1" aria-labelledby="modalCadastroLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="modalCadastroLabel">Cadastrar novo ator</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="controller/cadastroAtorController.php" method="post" enctype="multipart/form-data">
                                        <div class="mb-3">
                                            <label for="nome" class="col-form-label" style="color: black">Nome:</label>
                                            <input type="text" class="form-control" id="nome" name="nome">
                                        </div>
                                        <input type="submit" value="Cadastrar Ator">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <main>
        <section id="main-carousel">
            <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                        aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                        aria-label="Slide 2"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="src/imagens/carr1.jpg" class="d-block w-100 carousel-item-img"
                            alt="Aprenda mais sobre os tipos de filme!">
                        <div class="carousel-caption d-none d-md-block">
                            <h2 class="poetsen-one-regular"><span>Streamadora</span><br>agora com iMax</h2>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="src/imagens/carr2.jpg" class="d-block w-100 carousel-item-img">
                        <div class="carousel-caption d-none d-md-block fill-white">
                            <h2 class="poetsen-one-regular">As sessões mais modernas do Brasil!</h2>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </section>
        <section>
            <h2 class="poetsen-one-regular">O melhor do streaming no Brasil!</h2>
            <h4>Confira nossas novas séries e filmes!
            </h4>
        </section>
        <section id="exibir-atores">
            <?php
            if ($atores->num_rows > 0) {
                while ($row = $atores->fetch_assoc()) {
                    echo "<div class='card_ator>
                    <div class='atores'>
                        <h5 class='nome-ator'>" . $row["nome"] . "</h5>
                        <button type='button' class='btn btn-primary btn-edit' 
                            data-bs-toggle='modal' 
                            data-bs-target='#modalAtualizacao' 
                            data-ator_id='" . $row['ator_id'] . "; ?>' 
                            data-nome='" . $row['nome'] . "' >
                            Editar
                        </button>
                        

                        <a href='controller/excluirAtorController.php?id=" . $row["ator_id"] . "' class='btn btn-danger' onclick='return confirm(\"Tem certeza que deseja excluir este item?\");'>Excluir</a>
                    </div>
                </div>";
                echo "<br   >";
                }
            } else {
                echo "<p>Nenhum ator encontrado</p>";
            }
            ?>
            <div class="modal fade" id="modalAtualizacao" tabindex="-1" aria-labelledby="modalAtualizacaoLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="modalCadastroLabel">Cadastrar novo ator</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="./controller/atualizarAtorController.php" method="post" enctype="multipart/form-data">
                                <input type="hidden" id="ator_id" name="ator_id">

                                <div class="mb-3">
                                    <label for="nome" class="col-form-label" style="color: black">Nome:</label>
                                    <input type="text" class="form-control" id="nome" name="nome" placeholder="">
                                </div>
                                <input type="submit" value="Atualizar Ator">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script>
        const modalAtualizacao = document.getElementById('modalAtualizacao');
        modalAtualizacao.addEventListener('show.bs.modal', event => {
            const button = event.relatedTarget;

            const id = button.getAttribute('data-ator_id');
            const nome = button.getAttribute('data-nome');

            modalAtualizacao.querySelector('#ator_id').value = id;
            modalAtualizacao.querySelector('#nome').value = nome;
        });
    </script>

</body>
</html>