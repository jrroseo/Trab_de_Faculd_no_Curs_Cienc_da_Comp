<?php
	 require "C:/xampp/htdocs/App/Dao/dbconnect.php";
	// include('notification.php');
	// session_start();
	if ($_SESSION['login']==0)
		header('Location: ../../../index.php');
	else if($_SESSION['login']==2)
		header('Location: dBoardDoctor.php');
?>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.104.2">
    <title>ConsultaHosp</title>
	<link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/features/">
	<link href="../../Model/css/bootstrap.min.css" rel="stylesheet">
	<link href="features.css" rel="stylesheet">
</head>

<body>
	<main>
		<div class="container py-4">
			<div class="p-5 mb-4 bg-light rounded-3">
				
					<h3 class="fs-2">PERFIL</h3>
					<?php
	$username=$_SESSION["username"];
	$resultCheck = mysqli_query($conn,"select * from patient where patient_username = '".$username."';");

	$rows = mysqli_num_rows($resultCheck);
	
	for($j=0; $j<$rows; $j++){
		$tuple = mysqli_fetch_array($resultCheck);		 
		echo 'RH: ', $tuple['patient_id'], '<br />'; 	
		echo 'NOME: ', $tuple['patient_username'],' ', $tuple['patient_lname'],'<br />';	
		echo 'E-MAEL: ', $tuple['patient_eadd'], '<br />';
	}
	?>
	</div>
			
			<a href="edit_patientProfile.php"><button type="button"class="btn btn-primary btn-lg">EDITAR PERFIL</button></a>
    		  <a href="paginaUsuario.php"><button type="button" class="btn btn-secondary btn-danger btn-lg">SAIR</button></a>
	</main>
	<script src="../../Model/js/bootstrap.bundle.min.js"></script>
	
</body>

</html>
