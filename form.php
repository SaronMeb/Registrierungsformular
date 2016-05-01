<?php
	include_once 'assets/db/db_info.php';
	$c = mysqli_connect($host, $user, $password, $db);
	
	//Tabelle erzeugen wenn nicht vorhanden
	$tablequery = "CREATE TABLE IF NOT EXISTS formulardaten (ID INTEGER PRIMARY KEY AUTO_INCREMENT, 
						Vorname VARCHAR(200), Nachname VARCHAR(200), Email VARCHAR(200), Passwort VARCHAR (200))";	
	mysqli_query($c, $tablequery);
					
	if(isset($_POST['submitPW'])){
		$vorname = $_POST['form-first-name'];
		$nachname = $_POST['form-last-name'];
		$email = $_POST['form-email'];
		$passwort = $_POST['form-new-password'];
	
		//Daten in die Datenbank hinzufuegen
		$query = "INSERT INTO formulardaten(Vorname, Nachname, Email, Passwort) VALUES ('$vorname', '$nachname', '$email', '$passwort')";
		mysqli_query($c,  $query);
	}
	mysqli_close($c);

?>

 <iframe src="https://docs.google.com/forms/d/1OAHTxHLoHF-uzsQ3POGOCRe7g2fU8ue6EDBrOk4F6o4/closedform" width="100%" height="100%">Alternativtext</iframe>  
 
