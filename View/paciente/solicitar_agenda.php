<?php
	 require "C:/xampp/htdocs/App/Dao/dbconnect.php";
	//session_start();

	if ($_SESSION['login']==0) header('Location: ../../Controller/login_page.php');
	


$sqlspecial="select * from specializationinfo";



$resultspecial=mysqli_query($conn,$sqlspecial);

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

<form action="solicitar_data.php" method="post">
<div class="container py-4">
			<div class="p-5 mb-4 bg-light rounded-3">
	<h2 class="display-6 text-center mb-4">AGENTE SEU CONSULTA</h2>
	<table class="table text-center table-sm">
		<div class="table-responsive">
			
<div class="alert alert-primary" role="alert"><p class="lead mb-4">Agendamento de consultas. Confira abaixo as especialidades disponíveisnos no hospital e nos Ambulatórios Descentralizados:.
Consultas de retorno e exames são agendados no guichê de atendimento da própria hospital, de acordo com a solicitação médica.</p></div>
				<thead>
				<tr>
				<th scope="col">NOME DO DOUDOR</th>
				<th scope="col">ESPECIALIDADE</th>
				<th scope="col">SOLICITAR</th>
				</tr>
				</thead>
				
<?php
$query = 'SELECT doctor_username, doctor_lname, doctor_fname, doctor_mname, s.name as sname FROM doctor d,specializationinfo s where s.specializationid=d.doctor_specialization and doctor_deleted="n" ORDER BY doctor_lname';

$result = mysqli_query($conn,$query);

while ($row = mysqli_fetch_array($result)) {


				/* Testing*/

				$doctor_names = $row['doctor_lname'] . ' ' . $row['doctor_fname'];


			
				$doctor_user = $row['doctor_username'];

				

				$doctor_special = $row['sname'];
				/*       */

				echo '<input type="hidden" name="doctor_user" value="' . $doctor_user . '">';


				echo '<tbody>
					<tr>
							<td>' . $doctor_names . '</td>
							<td>' . $doctor_special . '</td>
							<td><button class="btn btn-success" type="submit" style="width: 100px" value="solicitar"/>SOLICITAR</button></td>

						</tr>';
						}
			echo '</form></td> </tr>
				</tbody>
				</table>
				';			   
			mysqli_close($conn);		
            ?>
</div>


			
			<a href="agendamentos_patient.php"><button type="button" class="btn btn-primary btn-lg">CONSULATA AGENDATA</button></a>
			<a href="paginaUsuario.php"><button type="button" class="btn btn-secondary btn-danger btn-lg">SAIR</button></a>

		</div>
		</div>
		</main>
	<script src="../../Model/js/bootstrap.bundle.min.js"></script>
	
</body>

</html>