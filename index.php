
<?php
 require "C:/xampp/htdocs/App/Dao/dbconnect.php";
?>

<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.104.2">
    <title>ConsultaHosp</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/sign-in/">

<link href="Model/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="Model/css/styles.css" />
<link href="Model/css/signin.css" rel="stylesheet">
  </head>
  <body class="text-center">
  
<main class="form-signin w-100 m-auto">
<h4>ACESSAR CONTA</h4>
  <form action="Controller/login.php" method="post" class="form" >
    <div class="form-control">
      <label for="input_uname">NOME DE USUÁRIO</label>
      <input type="text"  name="input_uname"  required=" required" id="input_uname" placeholder="Digite seu nome de usuário..." />
      <!--label for="signin-input_uname" class="placeholder">input_uname"/label-->
      <i class="fas fa-exclamation-circle"></i>
      <i class="fas fa-check-circle"></i>
      <small>Mensagem de erro</small>
    </div>

    <div class="form-control">
      <label for="input_pword">SENHA</label>
      <input type="input_pword" name="input_pword"   required=" required" id="input_pword" placeholder="Digite sua senha...">
      <!--label for="signin-input_pword" class="placeholder">input_pword</label-->
      <i class="fas fa-exclamation-circle"></i>
      <i class="fas fa-check-circle"></i>
      <small>Mensagem de erro</small>
    </div>



    <button type="submit">ENTRAR</button>
    <br>
    <div class="m-2">
    <h4>Não é cadastrado?</h4><a class="btn btn-info" href="View/paciente/cadastrar.php" role="button">CADASTAR</a>
  </form>
</main>

<script src="Model/js/scripts.js"></script>

    
  </body>
</html>
