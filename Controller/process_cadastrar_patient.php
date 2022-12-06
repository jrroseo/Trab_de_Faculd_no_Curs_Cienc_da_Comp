<?php
 require "C:/xampp/htdocs/App/Dao/dbconnect.php"
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
	<link rel="stylesheet" type="text/css" href="../Model/css/dboardCSS.css">
	<link href="../Model/css/bootstrap.min.css" rel="stylesheet">
	
</head>

<body>
	<main>
		<div class="px-4 pt-5 my-5 text-center border-bottom">
			<div class="col-lg-6 mx-auto">
				<div class="p-5 mb-4 bg-light rounded-3">
				
				<?php

$characters = '0123456789';
$string = '';
for ($i = 0; $i < 6; $i++) {
	$string .= $characters[rand(0, strlen($characters) - 1)];
}
$patient_id = ($_POST['id']);
$patient_username = $_POST['username'];
$patient_lname = $_POST['lName'];
$patient_eadd = $_POST['eadd'];
$patient_password = md5($_POST['password']);
$patient_rstatus = 'Aprovado';
$a = 0;
$ctr = 0;
$patient_eadd = $patient_eadd;

$queryCheck1 = "select patient_id from patient where patient_id='{$patient_id}';";
$resultCheck1 = mysqli_query($conn, $queryCheck1) or die("pergunta errada");

$queryCheck2 = "select doctor_username from doctor where doctor_username='{$patient_username}';";
$resultCheck2 = mysqli_query($conn, $queryCheck2) or die("pergunta errada");

while ($myrow1 = mysqli_fetch_assoc($resultCheck1)) {
	$a = $a + 1;
}
while ($myrow2 = mysqli_fetch_assoc($resultCheck2)) {
	$a = $a + 1;
}
// echo $a;
if ($a == 0) {
	$query = "insert into patient (patient_id, patient_username, patient_lname, patient_eadd, patient_password, patient_deleted) values
('{$patient_id}','{$patient_username}','{$patient_lname}','{$patient_eadd}','{$patient_password}','n');";	

	$result = mysqli_query($conn, $query);
	if (!$result) {
		echo "Problema com consulta " . $query . "<br/>";

		echo mysqli_error($conn);
		exit();
	} else {
		echo "<h3 class='display-7 fw-bold'><div class='alert alert-success' role='alert'>
		CADASTRO REALIZOU COM SUCESSO.<p class='lead mb-4'>Acora você já pode ter o acesso oa sistema, informe um usuário e senha na tela ( ACESSAR CONTA ), após FECHAR esta tela.</p>
	  </div></h3>";
	}
} else {

	echo "<h3 class='display-7 fw-bold'><div class='alert alert-danger' role='alert'>
	O NOME DO USUÁRIO JÁ EXISTE!</h3><p class='lead mb-4'>Entre em contato com o Serviço de Atendimento ao Cliente (SAC)..</p></div>";
}
mysqli_close($conn);

?>
					<a href="../index.php"><button type="button" class="btn btn-lg btn-primary mt-5 w-50" data-bs-dismiss="modal">FECHAR</button></a>

				</div>
			</div>
		</div>

	</main>

	<script src="../Model/js/bootstrap.bundle.min.js"></script>
</body>

</html>