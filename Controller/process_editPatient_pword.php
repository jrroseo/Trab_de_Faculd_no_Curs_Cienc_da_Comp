<<!doctype html>
<html lang="pt-br">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
	<meta name="generator" content="Hugo 0.104.2">
	<title>Features · Bootstrap v5.2</title>
	<link rel="stylesheet" type="text/css" href="Model/CSS/calender_css.css">
	<link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/features/">
	<link href="assets/dist/Model/css/bootstrap.min.css" rel="stylesheet">
	<link href="features.css" rel="stylesheet">
</head>

<body>
	<main>
		
			<div class="p-5 mb-4 bg-light rounded-3">
				
						<br>
<?php
	session_start();
	
	$username=$_SESSION["username"];
	$password=$_SESSION["password"];
	$old=md5($_POST["oldpassword"]);
	$new=md5($_POST["newpassword"]);
	
	//$conn = _connect('host=localhost dbname=healthcare user=postgres password=user');
	
	$conn=mysqli_connect("localhost","root","")or die("can not connect");
	mysqli_select_db($conn,"healthcare") or die("can not select database");
	
	if ($old!=$password){
		echo "<h3>VOCÊ DIGITOU UMA SENHA INCORRETA.</h3>" ;
	}
	else{
		$query = "update patient set patient_password='$new' where patient_username='$username'"; 
		$result = mysqli_query($conn,$query); 
				if (!$result) { 
					echo "Problema com a consulta " . $query . "<br/>"; 
				//	echo pg_last_error(); 
					exit(); 
				} 
				else{
					$_SESSION["password"]=$new;
					echo "<h3>class='display-7 fw-bold'>SENHA ATUALIZADA COM SUCESSO</h3>";
				}
	}

	mysqli_close($conn);
	
?>
<a href="patient_profile.php"><button type="button" class="btn btn-lg btn-primary mt-5 w-100" data-bs-dismiss="modal">SAIR</button></a>

	</div>
	
			</main>
			<script src="assets/dist/Model/js/bootstrap.bundle.min.js"></script>
		
		</body>
		
		</html>