<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <title>Edição de cadastro</title>
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="column">
          <?php
            include "conexao.php";
            $id = $_POST['id'];
            $nome = $_POST['nome'];
            $email = $_POST['email'];
            $endereco = $_POST['endereco'];
            $telefone = $_POST['telefone'];
            $dt_nascimento = $_POST['dt_nascimento'];

            if ($nome != "" or $email != "" or $dt_nascimento != "" or $endereco != "" or $telefone != "") {

              $sql = "UPDATE clientes 
              SET nome = '$nome', email = '$email', endereco = '$endereco', telefone = '$telefone', dt_nascimento = '$dt_nascimento'
              WHERE id = $id";

              if (mysqli_query($conn, $sql)){
                success("$nome Alterado com sucesso!");
              } else {
                failed();
              }

            };
          ?>
          <a href='consulta.php' class='btn btn-primary'>Voltar</a>
        </div>
      </div>
    </div>

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
