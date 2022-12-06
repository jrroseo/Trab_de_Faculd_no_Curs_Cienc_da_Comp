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

  <link href="../../Model/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../../Model/css/styles.css" />
  <link href="../../Model/css/signin.css" rel="stylesheet">
</head>

<body class="text-center">

  <main class="form-signin w-100 m-auto">
    <h4>CRIAR CONTA</h4>
    <form action="../../Controller/process_cadastrar_patient.php" method="post" class="form">
    <div class="form-control">
        <label for="id">REGISTRO HOSPITALAR</label>
        <input type='text' name='id' required='required' id="id" placeholder="Digite seu R.H..." />
        <i class="fas fa-exclamation-circle"></i>
        <i class="fas fa-check-circle"></i>
        <small>Mensagem de erro</small>
      </div>

      <div class="form-control">
          <label for="username">NOME</label>
          <input
          type='text' name='username' required='required' id="username" placeholder="Digite seu nome de usuário..." />
          <i class="fas fa-exclamation-circle"></i>
          <i class="fas fa-check-circle"></i>
          <small>Mensagem de erro</small>
        </div>


      <div class="form-control">
          <label for="lName">SOPRENOME</label>
          <input
          class='mname' type='text' name='lName' required='required' id="lname" placeholder="Digite seu nome de usuário..." />
          <i class="fas fa-exclamation-circle"></i>
          <i class="fas fa-check-circle"></i>
          <small>Mensagem de erro</small>
        </div>

      <div class="form-control">
        <label for="fieldname">E-MAIL</label>
        <input type='text' name='eadd' required='required' id="eadd" placeholder="Digite seu E-mail.." />
        <i class="fas fa-exclamation-circle"></i>
        <i class="fas fa-check-circle"></i>
        <small>Mensagem de erro</small>
      </div>
     
      <div class="form-control">
        <label for="password">SENHA</label>
        <input type='password' name='password' required='required' id="password" placeholder="Digite sua senha..." />
        <i class="fas fa-exclamation-circle"></i>
        <i class="fas fa-check-circle"></i>
        <small>Mensagem de erro</small>
      </div>

      <button id='submit_btn' type='submit' name='submit' class="mt-3 btn btn-primary col-12">CADASTRAR</button>

      <h4>JÁ TEM UMA CONTA?</h4>
      <a class="btn btn-info" href="../../index.php" role="button">ACESSAR</a>
      <div class="m-2">

    </form>
  </main>



</body>

</html>