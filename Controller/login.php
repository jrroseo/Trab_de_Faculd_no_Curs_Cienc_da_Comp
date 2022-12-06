<!doctype html>
<html lang="pt-br">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
	<meta name="generator" content="Hugo 0.104.2">
	<title>ConsultaHosp</title>
	<link rel="stylesheet" type="text/css" href="../Model/css/dboardCSS.css">
	<link href="../Model/css/bootstrap.min.css" rel="stylesheet">
	<link href="../Model/css/heroes.css" rel="stylesheet">
</head>

<body>
	<main>
		<div class="px-4 pt-5 my-5 text-center border-bottom">
			<div class="col-lg-6 mx-auto">
				<div class="p-5 mb-4 bg-light rounded-3">

					<?php
					 require "C:/xampp/htdocs/App/Dao/dbconnect.php";
					// session_start();
					//if ($_SESSION['login']==0){

						$username = $_POST['input_uname'];
		$password = md5($_POST['input_pword']);
		$a=0;
		$b=0;
		$c=0;
		$d=0;
		
		//$conn = pg_connect('host=localhost dbname=healthcare user=postgres password=user');
		
		// $conn=mysqli_connect("localhost","root","root","healthcare")or die("can not connect");
	    // mysqli_select_db("healthcare",$conn) or die("can not select database");
		
		
		$resultCheck1=mysqli_query($conn,"select patient_username from patient where patient_username='{$username}' and patient_password!='{$password}'");
		$resultCheck2=mysqli_query($conn,"select patient_username from patient where patient_username='{$username}' and patient_password='{$password}'");
		$resultCheck3=mysqli_query($conn,"select doctor_username from doctor where doctor_username='{$username}' and doctor_password!='{$password}'");
		$resultCheck4=mysqli_query($conn,"select doctor_username from doctor where doctor_username='{$username}' and doctor_password='{$password}'");
		
		while($myrow = mysqli_fetch_assoc($resultCheck1)) {	//patient username
			$a=$a+1;
		}
		while($myrow = mysqli_fetch_assoc($resultCheck2)) {	//patient username and password
			$b=$b+1;
		}
		while($myrow = mysqli_fetch_assoc($resultCheck3)) {	//doctor username
			$c=$c+1;
		}
		while($myrow = mysqli_fetch_assoc($resultCheck4)) {	//doctor username and password
			$d=$d+1;
		}
					if (($a == 0 && $b == 0) && ($c == 0 && $d == 0)) {
						echo "<h3 class='display-7 fw-bold'><div class='alert alert-danger' role='alert'>USUARIO NÃO EXISTE</h3><p class='lead mb-4'><p class='lead mb-4'>Informe um usuário valido, caso não seja cadastrado, realize para de o acesso.</p></div>";
					} else if ($a != 0 || $c != 0) {
						echo "<h3 class='display-7 fw-bold'><div class='alert alert-danger' role='alert'>SENHA NÃO CONFERE</h3><p class='lead mb-4'><p class='lead mb-4'>Informe a senha valida, caso não seja cadastrado, realize para de o acesso.</p></div>";
					} else if ($b != 0) {			
					
						$result = mysqli_query($conn,"select patient_deleted from patient where patient_username='{$username}'");
						$status = mysqli_fetch_row($result);
										
						if($status[0] == "n"){
							$_SESSION["login"] = 1;
							$result = mysqli_query($conn,"select patient_username, patient_lname from patient where patient_username='{$username}'");
							$name = mysqli_fetch_row($result);
							$_SESSION["name"] = $name[0];
							$_SESSION["username"] = $username;
							$_SESSION["password"] = $password;
							header("Location: ../View/paciente/paginaUsuario.php");
							exit;
						}
						else{
							echo "Account Deleted, Please Contact administrator";
						}
					}else if($d!=0){
						$result = mysqli_query($conn,"select doctor_deleted from doctor where doctor_username='{$username}'");
						$status = mysqli_fetch_row($result);
						if($status[0] == "n"){
							$_SESSION["login"] = 2;
							$result = mysqli_query($conn,"select doctor_fname from doctor where doctor_username='{$username}'");
							$name = mysqli_fetch_row($result);
							$_SESSION["name"] = $name[0];
							$_SESSION["username"] = $username;
							$_SESSION["password"] = $password;
							header("Location: ../View/doutor/dboardDoctor.php");
							exit;
						}
						else{
							echo "Account Deleted, please contact the administrator";
						}
					}
					mysqli_close($conn);
				/*}
				else{
					header('Location: dBoardDoctor.php');
				}*/
			
			?>
					<a href="../index.php"><button type="button" class="btn btn-lg btn-primary mt-5 w-50" data-bs-dismiss="modal">FECHAR</button></a>

				</div>
			</div>
		</div>
		
	</main>


	<script src="../Model/js/bootstrap.bundle.min.js"></script>
</body>

</html>