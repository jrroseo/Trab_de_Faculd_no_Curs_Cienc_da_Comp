<?php
require "C:/xampp/htdocs/App/Dao/dbconnect.php"
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
					<?php
					// session_start();

					$username = $_SESSION["username"];
					$lname = $_POST["lName"];

					$query = "update patient set patient_lname='$lname' where patient_username='$username'";

					$result = mysqli_query($conn, $query);
					if (!$result) {
						echo "Problema com a consulta " . $query . "<br/>";
						//	echo pg_last_error(); 
						exit();
					} else {
						echo "<h3 class='display-7 fw-bold'>SOPRENOME EDITADO COM SUCESSO</h3>.";
					}

					mysqli_close($conn);
					?>
					<a href="../View/paciente/patient_profile.php"><button type="button" class="btn btn-lg btn-primary mt-5 w-50" data-bs-dismiss="modal">FECHAR</button></a>

					</main>
	<script src="../../Model/js/bootstrap.bundle.min.js"></script>
	
</body>

</html>
