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
 <!-- Custom styles for this template -->
  <link href="../../Model/css/signin.css" rel="stylesheet">
	<script language="javascript">
		function ConfirmCP() {
			if (confirm("TEM CERTEZA DA ALTERAÇÃO?")) {
				return true;
			} else {
				return false;
			}
		}
	</script>
</head>

<body class="text-center">
  
  <main class="form-signin w-100 m-auto">
					<?php
					$username=$_SESSION["username"];
			
					$query="select patient_lname from patient where patient_username='{$username}';";
					$result = mysqli_query($conn,$query); 
					
					$rows = mysqli_num_rows($result);
					
					for ($i=0; $i<$rows; $i++){
						$tuple = mysqli_fetch_array($result);
						$lname=$tuple['patient_lname'];
										
					}
					echo
					"		  
			<h2>EDITAR SEU PERFIL</h2><br>
			<form action='../../Controller/process_editPatientProfile.php' method='post' >
			
			<div class='form-control'>
			<label for='lName'>DIGITE SEU NOVO SOPRENOME</label>
			<input
			class='mname' type='text' name='lName'  required=' required'
			  id='lname' value='$lname' 
			  placeholder='Digite seu soprenome de usuário...'/>
			  <i class='fas fa-exclamation-circle'></i>
			  <i class='fas fa-check-circle'></i>
			  </div>
			  
			<input type='submit' name='submit' class='mt-3 btn btn-primary col-12'/>
				<div class='m-2'>
		  </div></form>	";
		
					echo "
			<h2>EDITAR SUA SENHA</h2>

				<form action='../../Controller/process_editPatient_pword.php' method='post' onsubmit='return ConfirmCP();'>
				<table>
				<tr>
					<td> Senha atual: </td>
					<td> <input type='password' name='oldpassword' value=''  required=' required' > </td>
				</tr>
				<tr>
					<td> Nova Senha: </td>
					<td> <input type='password' name='newpassword' value=''  required=' required'> </td>
				</tr>
				</table>
				<input type='submit' name='submit' class='mt-3 btn btn-primary col-12'/>
				<div class='m-2'>
				</form>
			";
			mysqli_close($conn);
					?>
					<a href="paginaUsuario.php"><button type="button" class="btn btn-secondary btn-danger btn-lg">SAIR</button></a>
					</main>

 

</body>

</html>