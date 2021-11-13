<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <title>Consulta</title>
  </head>
  <body>
    <?php 
        include "conexao.php";
        $pesquisa = $_GET['pesquisa'] ?? '';
        
        $sql = "SELECT * FROM clientes WHERE nome LIKE '%$pesquisa%'";

        $result = mysqli_query($conn, $sql);
    ?>
    
    <div class="container">
      <div class="row">
        <div class="column">
            <nav class="navbar navbar-light bg-dark">
                <div class="container-fluid">
                    <form class="d-flex" action="consulta.php" method="get">
                        <input name="pesquisa" class="form-control me-2" type="search" placeholder="Nome" aria-label="Search" autofocus>
                        <button class="btn btn-outline-success" type="submit">Pesquisar</button>
                    </form>
                </div>
            </nav>
            
            <table class="table table-dark table-hover" id='table'>
                <thead>
                    <tr>
                        <th scope="col">Nome</th>
                        <th scope="col">E-mail</th>
                        <th scope="col">Endereço</th>
                        <th scope="col">Telefone</th>
                        <th scope="col">Data de nascimento</th>
                        <th scope="col">Opções</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                        while ($row = mysqli_fetch_assoc($result)) {
                            $id = $row['id'];
                            $nome = $row['nome'];
                            $email = $row['email'];
                            $endereco = $row['endereco'];
                            $telefone = $row['telefone'];
                            $dt_nascimento = $row['dt_nascimento'];
                            $dt_nascimento = invert_data($dt_nascimento);
                        
                            
                            echo    "   <tr>
                                            <th scope='row'>$nome</th>
                                            <td>$email</td>
                                            <td>$endereco</td>
                                            <td>$telefone</td>
                                            <td>$dt_nascimento</td>
                                            <td><a class='btn btn-success btn-sm' href='editar.php?id=$id'>Editar </a>
                                                <a class='btn btn-danger btn-sm' data-bs-toggle='modal' data-bs-target='#confirm' onclick=".'"'."getNome($id, '$nome')".'"'.">
                                                        Excluir
                                                </a>
                                            </td>
                                        </tr>
                                        ";
                        }
                        
                        /*
                        NESSE BLOCO DE COMANDOS EU TENTEI, CRIAR A PARTE DE EDITAR OS DADOS NESSA MESMA TELA USANDO UM MODAL, MAS EU NÃO CONSEGUI FAZER
                        COM Q CADA MODAL FICASSE COM OS DADOS DOS RESPECTIVOS USUÁRIOS, O MODAL SEMPRE ARMAZENA OS DADOS DE UM UNICO USUARIO, NESSE CASO O ULTIMO.
                        ATÉ DAVA PRA FAZER, COM CSS OU JS, MAS IA DAR MAIS TRABALHO QUE O NECESSARIO.
                        PRA TESTAR COMO FICOU É SÓ ADICIONAR ESSA TAG <a class='btn btn-success btn-sm' data-bs-toggle='modal' data-bs-target='#exampleModal'>Editar </a>
                        NO ECHO DE CIMA ABAIXO DA VARIAVEL $DT_NASCIMENTO ENTRE AS TAGS <TD>...</TD>
                        E DESCOMENTAR ESTE ECHO QUE ESTA ABAIXO DESSA LINHA.

                        echo "<div class='modal fade' id='exampleModal' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                        <div class='modal-dialog'>
                            <div class='modal-content'>
                                <div class='modal-header'>
                                    <h5 class='modal-title' id='exampleModalLabel'>Editar dados</h5>
                                    <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                </div>
                                <div class='modal-body'>
                                    <form action='consulta.php' method='POST'>
                                    <div class='mb-3'>
                                        <label for='nome' class='col-form-label'>Nome</label>
                                        <input id='dt_nascimentoModal' type='text' class='form-control' name='nome' value='$nome'>
                                    </div>
                                    <div class='mb-3'>
                                        <label for='email' class='col-form-label'>Email</label>
                                        <input id='dt_nascimentoModal' type='text' class='form-control' name='email' value='$email'>
                                    </div>
                                    <div class='mb-3'>
                                        <label for='endereco' class='col-form-label'>Endereço</label>
                                        <input id='dt_nascimentoModal' type='text' class='form-control' name='endereco' value='$endereco'>
                                    </div>
                                    <div class='mb-3'>
                                        <label for='telefone' class='col-form-label'>Telefone</label>
                                        <input id='dt_nascimentoModal' type='text' class='form-control' name='telefone' value='$telefone'>
                                    </div>
                                    <div class='mb-3'>
                                        <label for='dt_nascimento' class='col-form-label'>Data de nascimento</label>
                                        <input id='dt_nascimentoModal' type='text' class='form-control' name='dt_nascimento' value='$dt_nascimento'>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>";*/
                    ?>
                </tbody>
            </table>
            
            

            <a class='btn btn-primary' href="index.php">Inicio</a>
        </div>
      </div>
    </div>

    <div class="modal fade" id="confirm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Confirmar Exclusão do cliente</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <form action="delete_script.php" method="post">
                    <p>Deseja realmente excluir <b id='nomeModal'>Nome aqui</b>?</p>
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Não</button>
                    <button type="submit" class="btn btn-primary">Sim</button>
                    <input type="hidden" name="id" id="id" value="">
                    <input type="hidden" name="nomeModal" id="nome" value="">
                </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        function getNome(id, nome) {
            document.getElementById('nomeModal').innerHTML = nome
            document.getElementById('nome').value = nome
            document.getElementById('id').value = id
        }
    </script>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>
