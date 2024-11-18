<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestão de Categorias</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f8f3e7;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        a{
          text-decoration: none;
        }

        hr{
          color: white;
        }

        .container {
            display: flex;
            width: 80%;
            max-width: 1200px;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            border-radius: 8px;
        }

        .cards-section {
            flex: 2;
            padding: 2em;
            background-color: #fdf7ed;
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 1.5em;
        }

        .card {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            background-color: #fff;
            border-radius: 8px;
            padding: 1em;
            font-size: 1.2em;
            font-weight: bold;
            color: #fff;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .card:nth-child(odd) {
            background-color: #d5b4e2;
        }

        .card:nth-child(even) {
            background-color: #f06723;
        }

        .form-section {
            flex: 1;
            padding: 2em;
            background-color: #0d3b37;
            color: #fff;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .form-section form {
            display: flex;
            flex-direction: column;
            gap: 1em;
        }

        .form-section label {
            font-size: 1em;
        }

        .form-section input[type="text"] {
            padding: 0.5em;
            border: none;
            border-radius: 4px;
            color:#fdf3dd;
            padding: 1em 5em;
            margin-left: 1em;
            background-color:#223d3c;
        }

        .form-section input[type="submit"] {
            padding: 0.5em;
            background-color: #f3dba5;
            color: #0d3b37;
            border: none;
            border-radius: 4px;
            font-size: 1em;
            cursor: pointer;
        }

        .form-section input[type="submit"]:hover {
            background-color: #e0c189;
        }
        .modal {
            display: none;
            flex-direction: column;
            background-color: #ef601e;
            color: #fdf3dd;
            position: absolute;
            top: 20%;
            left: 50%;
            transform: translateX(-50%);
            padding: 20px;
            border-radius: 10px;
        }
        .modal a {
            text-decoration: none;
            color: #ef601e;
            background-color: #fdf3dd;
            padding: 1em;
            border-radius: 10px;
            margin-top: 20px;
        }
        .modal.active {
            display: flex;
        }
        h2{
          text-align:center;
        }
        .input-categoria{
          display: flex;
          flex-direction: row;
          justify-content: space-between;
          align-items: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <section class="cards-section">
        <?php
                $servername = "localhost";
                $username = "root";
                $password = "root";
                $dbname = "streamadora";

                // Cria a conexão
                $conn = new mysqli($servername, $username, $password, $dbname);

                // Verifica a conexão
                if ($conn->connect_error) {
                    die("Falha na conexão: " . $conn->connect_error);
                }

                // Busca as categorias no banco de dados
                $sql = "SELECT * FROM categoria";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // Exibe os dados de cada linha
                    while ($row = $result->fetch_assoc()) {
                      echo "<div class='card'>" 
                      . htmlspecialchars($row['nome']) . "
                      <div class='card-btns'>
                          <hr>
                          <!-- Botão para deletar categoria -->
                          <a href='#' onclick='showModal(event, " . $row['categoria_id'] . ")'>
                              <svg xmlns='http://www.w3.org/2000/svg' height='24px' viewBox='0 -960 960 960' width='24px' fill='#e8eaed'>
                                  <path d='M280-120q-33 0-56.5-23.5T200-200v-520h-40v-80h200v-40h240v40h200v80h-40v520q0 33-23.5 56.5T680-120H280Zm400-600H280v520h400v-520ZM360-280h80v-360h-80v360Zm160 0h80v-360h-80v360ZM280-720v520-520Z'/>
                              </svg>
                          </a>
                          
                          <!-- Botão para editar categoria -->
                          <a href='alterarCategoria.php?id=" . $row['categoria_id'] . "'>
                              <svg xmlns='http://www.w3.org/2000/svg' height='24px' viewBox='0 -960 960 960' width='24px' fill='#e8eaed'>
                                  <path d='M200-120q-33 0-56.5-23.5T120-200v-560q0-33 23.5-56.5T200-840h357l-80 80H200v560h560v-278l80-80v358q0 33-23.5 56.5T760-120H200Zm280-360ZM360-360v-170l367-367q12-12 27-18t30-6q16 0 30.5 6t26.5 18l56 57q11 12 17 26.5t6 29.5q0 15-5.5 29.5T897-728L530-360H360Zm481-424-56-56 56 56ZM440-440h56l232-232-28-28-29-28-231 231v57Zm260-260-29-28 29 28 28 28-28-28Z'/>
                              </svg>
                          </a>
                      </div>
                  </div>";
                    }
                } else {
                    echo "<div class='card'>Sem categorias</div>";
                }

                $conn->close();
            ?>
        </section>
        <section class="form-section">
            <h2>Cadastrar Categoria</h2>
            <form action="cadastrarCategoria.php" method="POST">
                <div class="input-categoria">
                <label for="categoria_nome">Nome:</label>
                <input type="text" name="categoria_nome" id="categoria_nome" required placeholder="Nome da categoria...">
                </div>
                <input type="submit" value="CADASTRAR">
            </form>
        </section>
        
        <!-- Modal de confirmação -->
        <div id="modal" class="modal">
            <h3>Tem certeza que deseja excluir?</h3>
            <a href="#" id="confirmDelete">Sim, excluir</a>
            <a href="javascript:void(0);" onclick="closeModal()">Cancelar</a>
        </div>

        <script>
            let categoriaIdToDelete = null;

            function showModal(event, categoriaId) {
                event.preventDefault();
                categoriaIdToDelete = categoriaId;
                document.getElementById('modal').classList.add('active');
            }

            function closeModal() {
                document.getElementById('modal').classList.remove('active');
                categoriaIdToDelete = null;
            }

            document.getElementById('confirmDelete').addEventListener('click', function(event) {
                event.preventDefault();
                if (categoriaIdToDelete) {
                    // Envia requisição AJAX para deletar a categoria
                    fetch(`deletarCategoria.php?categoria_id=${categoriaIdToDelete}`)
                        .then(response => response.text())
                        .then(responseText => {
                            alert(responseText); // Mostra a resposta do servidor
                            closeModal();
                            location.reload(); // Recarrega a página para atualizar a lista
                        })
                        .catch(error => {
                            console.error('Erro ao deletar categoria:', error);
                        });
                }
            });
        </script>
    </div>
</body>
</html>
