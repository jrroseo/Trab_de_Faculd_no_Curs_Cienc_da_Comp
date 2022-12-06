 <html>

 <head>
 	<title>Healthcare System</title>
 	<link rel="stylesheet" type="text/css" href="Model/CSS/dboardCSS.css">

 </head>

 <body>
 	<div id="menu_container">
 		<div id="menu_wrapper">
 			<ul class="main_menu_left">
 				<li> <a class="top_menu" href="dboardDoctor.php"> Dashboard </a> </li>
 				<li> <a class="top_menu" href="doctor_profile.php"> &nbsp;&nbsp;&nbsp;&nbsp;Profile&nbsp;&nbsp;&nbsp;&nbsp; </a> </li>
 				<li> <a class="top_menu" href="appointments_doctor.php"> Appointment </a> </li>

 			</ul>

 			<ul class="main_menu_right">


 				<li> <a id="logout" class="top_menu_right" href="logout.php"> Log Out </a> </li>
 			</ul>
 		</div>
 	</div>
 	<div class="clearance"></div>
 	<div id="main_wrapper">
 		<div class="content_wrapper">
 			<div class="content_main">
 				<?php
					session_start();

					$username = $_SESSION["username"];
					$password = $_SESSION["password"];
					$old = md5($_POST["oldpassword"]);
					$new = md5($_POST["newpassword"]);

					//$conn = _connect('host=localhost dbname=healthcare user=postgres password=user');

					$conn = mysqli_connect("localhost", "root", "") or die("can not connect");
					mysqli_select_db($conn, "healthcare") or die("can not select database");

					if ($old != $password) {
						echo "You have entered an incorrect password.";
					} else {
						$query = "update doctor set doctor_password='$new' where doctor_username='$username'";
						$result = mysqli_query($conn, $query);
						if (!$result) {
							echo "Problem with query " . $query . "<br/>";
							//	echo pg_last_error(); 
							exit();
						} else {
							$_SESSION["password"] = $new;
							echo "Password successfully edited.";
						}
					}

					mysqli_close($conn);

					?>
 			</div>
 		</div>
 	</div>
 </body>

 </html>