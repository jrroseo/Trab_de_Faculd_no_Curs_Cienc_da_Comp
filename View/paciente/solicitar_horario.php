<?php
require "C:/xampp/htdocs/App/Dao/dbconnect.php";
// session_start();
if ($_SESSION['login'] == 0) header('Location: ../../Controller/login_page.php');
//$conn = pg_connect('host=localhost dbname=healthcare user=postgres password=user');
// $conn=mysqli_connect("localhost","root","root")or die("can not connect");
// mysqli_select_db("healthcare",$conn) or die("can not select database");

/*Display doctor's name and specialization*/
$doctor_user = $_GET['doctor_user'];
//echo $doctor_user;				
$doctor_query = mysqli_query($conn, "SELECT doctor_lname, doctor_fname, doctor_mname, doctor_specialization FROM doctor WHERE doctor_username='$doctor_user'");
$doctor_result = mysqli_fetch_array($doctor_query);

$app_date = $_GET['app_date'];

$app_dweek = date('l', strtotime($app_date));
//		echo '<p>' . $app_date . ' (' . $app_dweek . ')</p>';					

$sched_query = mysqli_query($conn, "SELECT * FROM availability_weekday WHERE doctor_username='$doctor_user'");
$doctor_result = mysqli_fetch_array($sched_query);
//$sched_str = mysqli_result($sched_query, 0);
$i = 0;
while ($rws = mysqli_fetch_array($sched_query)) {
	$sched_array[$i] = $rws['time'];
	$i++;
}
print_r($sched_array);

$a = array();
$i = 0;
/* Query to select Appointment Details */
$app_query = mysqli_query($conn, "SELECT app_doctorusername,app_date,app_time FROM appointment WHERE app_doctorusername='$doctor_user' and app_date='$app_date' ");
while ($app_result = mysqli_fetch_array($app_query)) {
	//echo $app_result['app_time'];
	$a[$i] = $app_result['app_time'];
	//	echo $a[$i]."\r\n";
	$i++;
}
for ($i = 0; $i < count($sched_array); $i++) {
	for ($j = 0; $j < count($a); $j++) {
		if ($sched_array[$i] == $a[$j]) {
			//echo $b[$j];
			array_splice($sched_array, $i, 1);
			//var_dump($b);
		}
	}
}
//		for($j=0;$j<count($sched_array);$j++)
//      {echo $sched_array[$j]."\r\n";}		
/*-------------------------------------------------------------------*/

?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../../Model/css/1-Pagina-Interna.css">
	<link rel="stylesheet" type="text/css" href="../../Model/css/dboardCSS.css">
	<link href="../../Model/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
	<main>
		<div class="px-4 pt-5 my-5 text-center border-bottom">
			<div class="col-lg-6 mx-auto">
				<div class="p-5 mb-4 bg-light rounded-3">


					<div>
						<h2> Agendar Horario</h2>
					</div>
					<?php
					$doctor_query = mysqli_query($conn, "SELECT doctor_lname, doctor_fname, s.Name as sname,h.name as hname
				FROM doctor d,specializationinfo s, hospitalinfo h WHERE s.SpecializationID=doctor_specialization and doctor_hospital=h.HospitalID and doctor_username='$doctor_user'");
					$doctor_result = mysqli_fetch_array($doctor_query);
					echo '<div class="alert alert-primary" role="alert">DEDALHES DO MEDICO SELECIONADO.<br>
Nome: ' . $doctor_result['doctor_lname'] . ' ' . $doctor_result['doctor_fname'] . '<br>
Especialisação: ' . $doctor_result['sname'] . '<br>
Hospital:' . $doctor_result['hname'] . '</div><br>';
					/*----------------------------------------------------------------------*/
					/*If the doctor doesn't have a work schedule for the specified date, disable appointment scheduling*/
					if (count($sched_array) == 1) {
						echo '<p>O agendamento de um horário para este dia não está disponível no momento. Escolha outra data.</p>';
					}
					/*Else, display time picker*/

					mysqli_close($conn);
					?>


					<form action="../../Controller/send_apprequest.php" method="post">

						<!--text-padrao-agendar-consulta-->

						<div class="content-horarios">
							<div class="horario-manha">
								<div class="text-manha">
									<botton> Manhã </botton>
								</div>
								<!--text-manha-->

								<div class="horarios-geral">
									<div class="coluna-horarios-manha">
										<div class="text-horarios">
											<?php
											$set = 0;
											$time1 = "8am";
											for ($i = 0; $i < count($sched_array); $i++) {
												if ($time1 == $sched_array[$i]) {
													echo '  <label style="color:green;  for="hora2"> <input type="checkbox" name="app_time" id="app_time" value="8am"> 8.00am </label>';
													$set = $set + 1;
												}
											}
											if ($set == 0) {
												echo '<label style="color:red;  for="hora2"> <input type="checkbox" name="app_time" id="app_time" disabled ><strike> 8.00am </label>';
											}
											?>
										</div>
										<!--text-horarios-->
										<div class="text-horarios">
											<?php
											$set = 0;
											$time1 = "8:30am";
											for ($i = 0; $i < count($sched_array); $i++) {
												if ($time1 == $sched_array[$i]) {
													echo '  <label style="color:green;  for="hora2"> <input type="checkbox" name="app_time" id="app_time" value="8:30am"> 8:30am </label>';
													$set = $set + 1;
												}
											}
											if ($set == 0) {
												echo '<label style="color:red;  for="hora2"> <input type="checkbox" name="app_time" id="app_time" disabled ><strike> 8:30am </label>';
											}
											?>
										</div>
										<!--text-horarios-->
										<div class="text-horarios">
											<?php
											$set = 0;
											$time1 = "9am";
											for ($i = 0; $i < count($sched_array); $i++) {
												if ($time1 == $sched_array[$i]) {
													echo '  <label style="color:green;  for="hora2"> <input type="checkbox" name="app_time" id="app_time" value="9am"> 9.00am </label>';
													$set = $set + 1;
												}
											}
											if ($set == 0) {
												echo '<label style="color:red;  for="hora2"> <input type="checkbox" name="app_time" id="app_time" disabled ><strike> 9.00am </label>';
											}
											?>
										</div>
										<!--text-horarios-->
										<div class="text-horarios">
											<?php
											$set = 0;
											$time1 = "9:30am";
											for ($i = 0; $i < count($sched_array); $i++) {
												if ($time1 == $sched_array[$i]) {
													echo '  <label style="color:green;  for="hora2"> <input type="checkbox" name="app_time" id="app_time" value="9:30am"> 9.30am </label>';
													$set = $set + 1;
												}
											}
											if ($set == 0) {
												echo '<label style="color:red;  for="hora2"> <input type="checkbox" name="app_time" id="app_time" disabled ><strike> 9.30am </label>';
											}
											?>
										</div>
										<!--text-horarios-->


										<div class="text-horarios">
											<?php
											$set = 0;
											$time1 = "10am";
											for ($i = 0; $i < count($sched_array); $i++) {
												if ($time1 == $sched_array[$i]) {
													echo '  <label style="color:green;  for="hora2"> <input type="checkbox" name="app_time" id="app_time" value="10am"> 10.00am </label>';
													$set = $set + 1;
												}
											}
											if ($set == 0) {
												echo '<label style="color:red;  for="hora2"> <input type="checkbox" name="app_time" id="app_time" disabled ><strike> 10.00am </label>';
											}
											?>
										</div>
										<!--text-horarios-->
										<div class="text-horarios">
											<?php
											$set = 0;
											$time1 = "10:30am";
											for ($i = 0; $i < count($sched_array); $i++) {
												if ($time1 == $sched_array[$i]) {
													echo '  <label style="color:green;  for="hora2"> <input type="checkbox" name="app_time" id="app_time" value="10:30am"> 10.30am </label>';
													$set = $set + 1;
												}
											}
											if ($set == 0) {
												echo '<label style="color:red;  for="hora2"> <input type="checkbox" name="app_time" id="app_time" disabled ><strike> 10.30am </label>';
											}
											?>
										</div>
										<!--text-horarios-->



										<div class="text-horarios">
											<?php
											$set = 0;
											$time1 = "11am";
											for ($i = 0; $i < count($sched_array); $i++) {
												if ($time1 == $sched_array[$i]) {
													echo '  <label style="color:green;  for="hora2"> <input type="checkbox" name="app_time" id="app_time" value="11am"> 11.00am </label>';
													$set = $set + 1;
												}
											}
											if ($set == 0) {
												echo '<label style="color:red;  for="hora2"> <input type="checkbox" name="app_time" id="app_time" disabled ><strike> 11.00am </label>';
											}
											?>
										</div>
										<!--text-horarios-->

										<div class="text-horarios">
											<?php
											$set = 0;
											$time1 = "11:30am";
											for ($i = 0; $i < count($sched_array); $i++) {
												if ($time1 == $sched_array[$i]) {
													echo '  <label style="color:green;  for="hora2"> <input type="checkbox" name="app_time" id="app_time" value="11:30am"> 11.30am </label>';
													$set = $set + 1;
												}
											}
											if ($set == 0) {
												echo '<label style="color:red;  for="hora2"> <input type="checkbox" name="app_time" id="app_time" disabled ><strike> 11.30am </label>';
											}
											?>
										</div>
										<!--text-horarios-->
										<!--text-horarios-->
									</div>
									<!--coluna-horarios-manha-->

								</div>
								<!--horarios-geral-->

							</div>
							<!--horario-manha-->

							<div class="horario-tarde">
								<div class="text-tarde">
									<botton> Tarde </botton>
								</div>
								<!--text-tarde-->

								<div class="horarios-geral">
									<div class="coluna-horarios-tarde-esquerda">
										<div class="text-horarios">
											<?php
											$set = 0;
											$time1 = "12pm";
											for ($i = 0; $i < count($sched_array); $i++) {
												if ($time1 == $sched_array[$i]) {
													echo '  <label style="color:green;  for="hora2"> <input type="checkbox" name="app_time" id="app_time" value="12pm"> 12.00pm </label>';
													$set = $set + 1;
												}
											}
											if ($set == 0) {
												echo '<label style="color:red;  for="hora2"> <input type="checkbox" name="app_time" id="app_time" disabled ><strike> 12.00pm </label>';
											}
											?>
										</div>
										<!--text-horarios-->


										<div class="text-horarios">
											<?php
											$set = 0;
											$time1 = "12:30pm";
											for ($i = 0; $i < count($sched_array); $i++) {
												if ($time1 == $sched_array[$i]) {
													echo '  <label style="color:green;  for="hora2"> <input type="checkbox" name="app_time" id="app_time" value="12:30pm"> 12.30pm </label>';
													$set = $set + 1;
												}
											}
											if ($set == 0) {
												echo '<label style="color:red;  for="hora2"> <input type="checkbox" name="app_time" id="app_time" disabled ><strike> 12.30pm </label>';
											}
											?>
										</div>
										<!--text-horarios-->



										<div class="text-horarios">
											<?php
											$set = 0;
											$time1 = "1pm";
											for ($i = 0; $i < count($sched_array); $i++) {
												if ($time1 == $sched_array[$i]) {
													echo '  <label style="color:green;  for="hora2"> <input type="checkbox" name="app_time" id="app_time" value="1pm"> 1.00pm </label>';
													$set = $set + 1;
												}
											}
											if ($set == 0) {
												echo '<label style="color:red;  for="hora2"> <input type="checkbox" name="app_time" id="app_time" disabled ><strike> 1.00pm </label>';
											}
											?>
										</div>
										<!--text-horarios-->

										<div class="text-horarios">
											<?php
											$set = 0;
											$time1 = "1:30pm";
											for ($i = 0; $i < count($sched_array); $i++) {
												if ($time1 == $sched_array[$i]) {
													echo '  <label style="color:green;  for="hora2"> <input type="checkbox" name="app_time" id="app_time" value="1:30pm"> 1.30pm </label>';
													$set = $set + 1;
												}
											}
											if ($set == 0) {
												echo '<label style="color:red;  for="hora2"> <input type="checkbox" name="app_time" id="app_time" disabled ><strike> 1.30pm </label>';
											}
											?>
										</div>
										<!--text-horarios-->



										<div class="text-horarios">
											<?php
											$set = 0;
											$time1 = "2pm";
											for ($i = 0; $i < count($sched_array); $i++) {
												if ($time1 == $sched_array[$i]) {
													echo '  <label style="color:green;  for="hora2"> <input type="checkbox" name="app_time" id="app_time" value="2pm"> 2.00pm </label>';
													$set = $set + 1;
												}
											}
											if ($set == 0) {
												echo '<label style="color:red;  for="hora2"> <input type="checkbox" name="app_time" id="app_time" disabled ><strike> 2.00pm </label>';
											}
											?>
										</div>
										<!--text-horarios-->

										<div class="text-horarios">
											<?php
											$set = 0;
											$time1 = "2:30pm";
											for ($i = 0; $i < count($sched_array); $i++) {
												if ($time1 == $sched_array[$i]) {
													echo '  <label style="color:green;  for="hora2"> <input type="checkbox" name="app_time" id="app_time" value="2:30pm"> 2.30pm </label>';
													$set = $set + 1;
												}
											}
											if ($set == 0) {
												echo '<label style="color:red;  for="hora2"> <input type="checkbox" name="app_time" id="app_time" disabled ><strike> 2.30pm </label>';
											}
											?>
										</div>
										<!--text-horarios-->



										<div class="text-horarios">
											<?php
											$set = 0;
											$time1 = "3pm";
											for ($i = 0; $i < count($sched_array); $i++) {
												if ($time1 == $sched_array[$i]) {
													echo '  <label style="color:green;  for="hora2"> <input type="checkbox" name="app_time" id="app_time" value="3pm"> 3.00pm </label>';
													$set = $set + 1;
												}
											}
											if ($set == 0) {
												echo '<label style="color:red;  for="hora2"> <input type="checkbox" name="app_time" id="app_time" disabled ><strike> 3.00pm </label>';
											}
											?>
										</div>
										<!--text-horarios-->

										<div class="text-horarios">
											<?php
											$set = 0;
											$time1 = "3:30pm";
											for ($i = 0; $i < count($sched_array); $i++) {
												if ($time1 == $sched_array[$i]) {
													echo '  <label style="color:green;  for="hora2"> <input type="checkbox" name="app_time" id="app_time" value="3:30pm"> 3.30pm </label>';
													$set = $set + 1;
												}
											}
											if ($set == 0) {
												echo '<label style="color:red;  for="hora2"> <input type="checkbox" name="app_time" id="app_time" disabled ><strike> 3.30pm </label>';
											}
											?>
										</div>
										<div class="text-horarios">
											<?php
											$set = 0;
											$time1 = "4pm";
											for ($i = 0; $i < count($sched_array); $i++) {
												if ($time1 == $sched_array[$i]) {
													echo '  <label style="color:green;  for="hora2"> <input type="checkbox" name="app_time" id="app_time" value="4pm"> 4.00pm </label>';
													$set = $set + 1;
												}
											}
											if ($set == 0) {
												echo '<label style="color:red;  for="hora2"> <input type="checkbox" name="app_time" id="app_time" disabled ><strike> 4.00pm </label>';
											}
											?>
										</div>
										<!--text-horarios-->

										<div class="text-horarios">
											<?php
											$set = 0;
											$time1 = "4:30pm";
											for ($i = 0; $i < count($sched_array); $i++) {
												if ($time1 == $sched_array[$i]) {
													echo '  <label style="color:green;  for="hora2"> <input type="checkbox" name="app_time" id="app_time" value="4:30pm"> 4.30pm </label>';
													$set = $set + 1;
												}
											}
											if ($set == 0) {
												echo '<label style="color:red;  for="hora2"> <input type="checkbox" name="app_time" id="app_time" disabled ><strike> 4.30pm </label>';
											}
											?>
										</div>
										<!--text-horarios-->





										<div class="text-horarios">
											<?php
											$set = 0;
											$time1 = "5pm";
											for ($i = 0; $i < count($sched_array); $i++) {
												if ($time1 == $sched_array[$i]) {
													echo '  <label style="color:green;  for="hora2"> <input type="checkbox" name="app_time" id="app_time" value="5pm"> 5.00pm </label>';
													$set = $set + 1;
												}
											}
											if ($set == 0) {
												echo '<label style="color:red;  for="hora2"> <input type="checkbox" name="app_time" id="app_time" disabled ><strike> 5.00pm </label>';
											}
											?>
										</div>
										<!--text-horarios-->

									</div>
									<!--coluna-horarios-tarde-direita-->

								</div>
								<!--horarios-->

							</div>
							<!--horario-tarde-->

						</div>
						<!--content-horarios-->


						<!--container-button-cadastro-consulta-->

						<?php
						echo '

<div class="container-button-agendar-consulta">

</div>
<input type="hidden" name="app_date" value="' . $app_date . '"/>
<input type="hidden" name="doctor_user" value="' . $doctor_user . '"/>
<input type="submit" value="CONFIMAR"  type="button" class="btn btn-success" onclick="return confirm(\'Enviar consulta ao médico?\');"/>
</form>';
						?>
				</div>
				<!--fomulario-agendar-consulta-content-interno-->

				</fieldset>
				<a href="paginaUsuario.php"><button type="button" class="btn btn-secondary btn-lg btn-danger">SAIR</button></a>
			</div>
			<!--formulario2-content-agendar-consulta-->

		</div>
		<!--content-agendar-consulta-->

		</div>
		<!--content-geral-->
	</main>


	<script src="../../Model/js/bootstrap.bundle.min.js"></script>
</body>

</html>