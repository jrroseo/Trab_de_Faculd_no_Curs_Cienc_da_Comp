<?php
 require "C:/xampp/htdocs/App/Dao/dbconnect.php";
//session_start();
if ($_SESSION['login']==0) header('Location: ../../Controller/login_page.php');
include('calender_function2.php');
$month=date("n")+1;
if($month=="13")
{$month=1;
$year=date("Y")+1;}
else
{$year=date("Y");}		
?>
<!doctype html>
<html lang="pt-br">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
	<meta name="generator" content="Hugo 0.104.2">
	<title>Features · Bootstrap v5.2</title>
	<link rel="stylesheet" type="text/css" href="../../Model/css/calender_css.css">
	<link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/features/">
	<link href="../../Model/css/bootstrap.min.css" rel="stylesheet">
	<link href="../../Model/css/features.css" rel="stylesheet">
</head>

<body>
	<main>
			<div class="p-5 mb-4 bg-light rounded-3">
		<?php
			
			//	$conn = pg_connect('host=localhost dbname=healthcare user=postgres password=user');
			// $conn=mysqli_connect("localhost","root","root")or die("can not connect");
			// mysqli_select_db("healthcare",$conn) or die("can not select database");
			 
			 /*Display doctor's name and specialization*/
			 $doctor_user = $_SESSION['docuser'];
					 
			 $doctor_query = mysqli_query($conn,"SELECT doctor_lname, doctor_fname, s.Name as sname,h.name as hname
											  FROM doctor d,specializationinfo s, hospitalinfo h WHERE s.SpecializationID=doctor_specialization and doctor_hospital=h.HospitalID and doctor_username='$doctor_user'") ;
			 $doctor_result = mysqli_fetch_array($doctor_query);
							
			 echo '<div class="alert alert-primary" role="alert">DEDALHES DO MEDICO SELECIONADO.<br>
			 Nome: ' . $doctor_result['doctor_lname'] . ' ' . $doctor_result['doctor_fname'] . '<br>
			 Especialisação: ' . $doctor_result['sname'] . '<br>
			 Hospital:' . $doctor_result['hname'] . '</div><br>';
						 echo '<div class="alert alert-danger" role="alert">Por favor, selecione a data para o agendamento <br>
			 *Dias indicados em vermelho não são possíveis<br>
			 *Dias indicados em verde são possíveis </div><br>';	
			 mysqli_error($conn);	
 
 echo '	<form action="solicitar_data.php" method="post">
		 <input type="hidden" name="doctor_user" id="doctor_user" value="'. $doctor_user .'"/>
		 <button type="submit" class="btn btn-primary btn-lg">VOLTAR</button>
		
		 </form> 
	  ';	
 
 	 
			 echo draw_calendar($month,$year);	
			 
			 mysqli_close($conn);
			 
	 
		 ?><br>
		 <a href="paginaUsuario.php"><button type="button" class="btn btn-danger btn-primary btn-lg">SAIR</button></a>
		
		</div>
			
			</main>
			<script src="../../Model/js/bootstrap.bundle.min.js"></script>
		
		</body>
		
		</html>