<?php

  $server = "localhost";
  $user = "root";
  $password = "";
  $dbname = "crud";

  if ($conn = mysqli_connect($server, $user, $password, $dbname) ) {

  } else {
    echo "Error";
  }

  function success($nome) {
    echo "<div class='alert alert-success' role='alert'>
            $nome
          </div>";
  }

  function failed() {
    echo "<div class='alert alert-danger' role='alert'>
            Houve um erro, tente novamente!
          </div>";
  }

  function invert_data($nascimento) {
    $nascimento = explode('-', $nascimento);
    $writeData = $nascimento[2] ."/" . $nascimento[1] . "/" . $nascimento[0];
    return $writeData;
  }
?>
