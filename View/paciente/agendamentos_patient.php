<?php

session_start();
error_reporting(0);

$validar = $_SESSION['login'];

if( $validar == null || $validar = ''){

  header("Location: ../../Controller/login_page.php");
  die();
  
}
?>

<?php
 require "C:/xampp/htdocs/App/Dao/dbconnect.php";
include('../../Model/time_checker.php');

//session_start();
if ($_SESSION['login'] == 0) header('Location: ../../Controller/login_page.php');
?>
<html lang="pt-br">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
	<meta name="generator" content="Hugo 0.104.2">
	<title>ConsultaHosp</title>
	<link href="../../Model/css/pricing.css" rel="stylesheet">
	<link href="../../Model/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>
	<main>
		<div class="container py-4">
			<div class="p-5 mb-4 bg-light rounded-3">
				<h2 class="display-6 text-center mb-4">ACONSULTA AGENDADAS</h2>
				<table class="table text-center table-sm">
					<div class="table-responsive">
					<a href="solicitar_agenda.php"><button type="button" class="btn btn-primary btn-lg">NOVO AGENDAMENTO</button></a>
						<a href="paginaUsuario.php"><button type="button" class="btn btn-secondary btn-danger btn-lg">SAIR</button></a>
						<p class="lead mb-4">
						<div class="alert alert-danger" role="alert">
						O cancelamento da consulta só poderá ser realizado 24 horas antes do horário do agendamento, após esse período entre em contato com o Serviço de Atendimento ao Cliente (SAC).
</div>
						<?php

$username = $_SESSION['username'];
$query = "SELECT app_patientname, app_number, app_date, app_time, app_doctorname, h.name as hname, app_status FROM appointment a,hospitalinfo h WHERE h.hospitalID=app_hospital and  app_patientusername='$username' ORDER BY app_date";

$result = mysqli_query($conn,$query);

if($dato -> num_rows <0){				
echo ' <thead>
<th class="text-center" colspan="16">No existen registros</th>
</tr>';


}
else{
	echo '
	<tr>			
	<th scope="col">CÓDIGO</th>
	<th scope="col">DATA</th>
	<th scope="col">HORA</th>
	<th scope="col">DOUDOR</th> 
	<th scope="col">HOSPITAL</th>
	<th scope="col">ESTATOS</th>
	<th scope="col">CANCELAR</th>
	</thead>';
}
 
						$x = 1;
						while ($row = mysqli_fetch_row($result)) {
							
							echo '
							<tbody><tr>';
							$count = count($row);
					for ($datacounter=0; $datacounter<$count; $datacounter++) {
						$c_row = current($row);
						if($datacounter > 0) {
									echo '<td style="width:190px;">' . $c_row . '</td>';
								}

								if ($datacounter == 1) {
									$tableID = $c_row;
								}


								next($row);
							}
							
							/*Get time difference in minutes*/
							$timestamp_query = mysqli_query($conn,"SELECT app_date, app_time FROM appointment WHERE app_number='$tableID'");
							$timestamp_array = mysqli_fetch_array($timestamp_query);
							$time_difference = check_time($timestamp_array[0], $timestamp_array[1]);
							
							echo '<td><form action="../../Controller/cancel_apprequest.php" method="post">';
							/*If the time_difference is more than 24 hours*/
							if ($time_difference <= 1440) {
								echo '<button class="btn btn-secondary btn-danger btn-lg" type="button" onclick="alert(\'Não consigo cancelar agendamento!\');">Cancelar</button>';
							} else {
								echo '<input type="hidden" name="cancelid" value="' . $tableID . '">
								<button class="btn btn-secondary btn-danger btn-lg" type="submit" onclick="return confirm(\'Você tem certeza que quer cancelar este agendamento?\');">Cancelar</button>';
							}

						}

						echo '</form></td> </tr>
						</tbody>
						</table>';
						mysqli_close($conn);
						?>
						<br>


				
						
					</div>
			</div>
	</main>
	<script src="../../Model/js/bootstrap.bundle.min.js"></script>

</body>

</html>