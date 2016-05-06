<?php
	include_once 'assets/db/db_info.php';
	$c = mysqli_connect($host, $user, $password, $db);
	
	//Tabelle erzeugen wenn nicht vorhanden
	$tablequery = "CREATE TABLE IF NOT EXISTS formulardaten (ID INTEGER PRIMARY KEY AUTO_INCREMENT, Code INTEGER, Passwort VARCHAR (200))";	
	mysqli_query($c, $tablequery);
					
	if(isset($_POST['submitPW'])){
		$code = $_POST['form-code'];
		$passwort = $_POST['form-new-password'];
	
	$passwort= mysqli_real_escape_string($c, $passwort);
	
		//Daten in die Datenbank hinzufuegen
		$query = "INSERT INTO formulardaten(Code, Passwort) VALUES ('$code', '$passwort')";
		mysqli_query($c,  $query);
	}
	mysqli_close($c);
	
	echo "<h1>Code: $code </h1>";

?>

<iframe src="http://goo.gl/forms/37nJcMClgz" width="100%" height="100%"></iframe>  
