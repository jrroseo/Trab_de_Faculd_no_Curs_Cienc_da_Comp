<?php
//	include('notification.php');
 require "C:/xampp/htdocs/App/Dao/dbconnect.php";
// session_start();
if ($_SESSION['login'] == 0)
    header('Location: ../../index.php');
else if ($_SESSION['login'] == 2)
    header('Location: dBoardDoctor.php');
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

    
  </head>
  <body>
  <main class="container">
   
      <div class="bg-light p-5 rounded mt-3">
                        <h2 class="fw-bold mb-0">
                            <?php
                            echo "Seja bem-vindo(a) " . $_SESSION["name"];
                            '<br />';
                            ?></h2><br>
    <p class="lead"><h3>clique no botão verde para agendar sua consulta.</h3></p>
    <a class="btn btn-lg btn-primary btn-success" href="solicitar_agenda.php" role="button">AGENDAR COMSULTA</a>
    <p class="lead"><h3>clique no botão laranja para visualizar seu perfil.</h3></p><br>
    <a class="btn btn-lg btn-primary btn-warning" href="patient_profile.php" role="button">VISUALIZAR PERFIL</a>
    <p class="lead"><h3>clique no botão azul para visualizar o seu agendamento.</h3></p><br>
    <a class="btn btn-lg btn-primary" href="agendamentos_patient.php" role="button">VER AGENDAMENTO</a>
                       
                    
</div>
<a class="btn btn-lg btn-primary btn-danger" href="../../index.php" role="button">FECHAR</a>
    </main>
    <script src="../../Model/js/bootstrap.bundle.min.js"></script>
</body>
</html>

