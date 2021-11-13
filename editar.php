<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <title>Cadastro</title>
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="column">
          <h1>Editar dados</h1>
          <?php
            include"conexao.php";
            $id = $_GET['id'] ?? '';

            $sql = "SELECT * FROM clientes WHERE id = $id";

            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
          ?>

          <form action="edit_script.php" method="post">
          <div class="mb-3">
            <label for="nome" class="form-label">Nome completo</label>
            <input name="nome" type="text" class="form-control" required autofocus value='<?php echo $row['nome'];?>'>
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input name="email" type="email" class="form-control" required value='<?php echo $row['email'];?>'>
          </div>
          <div class="mb-3">
            <label for="endereco" class="form-label">Endereço</label>
            <input name="endereco" type="text" class="form-control" value='<?php echo $row['endereco'];?>'>
          </div>
          <div class="mb-3">
            <label for="telefone" class="form-label">Telefone</label>
            <input name="telefone" type="text" class="form-control" value='<?php echo $row['telefone'];?>'>
          </div>
          <div class="mb-3">
            <label for="dt_nascimento" class="form-label">Data de nascimento</label>
            <input name="dt_nascimento" type="date" class="form-control" required value='<?php echo $row['dt_nascimento'];?>'>
          </div>
          <div class="mb-3">
            <input type="submit" class="btn btn-success">
          </div>
          <input type="hidden" name="id" value="<?php echo $row['id']?>">
        </form>
        <a class='btn btn-primary' href="consulta.php">Voltar</a>
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
