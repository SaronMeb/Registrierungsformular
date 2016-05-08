<?php
	include_once 'db_info.php';
	$c = mysqli_connect($host, $user, $password, $db);
	
	//Tabelle erzeugen wenn nicht vorhanden
	$tablequery = "CREATE TABLE IF NOT EXISTS formulardaten (ID INTEGER PRIMARY KEY AUTO_INCREMENT, Code INTEGER, Gruppe VARCHAR (200), Passwort VARCHAR (200))";	
	mysqli_query($c, $tablequery);
					
	if(isset($_POST['submitPW'])){
		$code = $_POST['form-code'];
		$gruppe = $_POST['form-gruppe'];
		$passwort = $_POST['form-new-password'];
		
	if($gruppe == "testgruppe"){
		$variableSrc = "http://goo.gl/forms/37nJcMClgz"; 
	}else $variableSrc = "http://goo.gl/forms/T1pJkgFv3G";

	$passwort= mysqli_real_escape_string($c, $passwort);
	
		//Daten in die Datenbank hinzufuegen
		$query = "INSERT INTO formulardaten(Code, Gruppe, Passwort) VALUES ('$code', '$gruppe','$passwort')";
		mysqli_query($c,  $query);
	}
	mysqli_close($c);
	
	echo "<h1>Code: $code</h1>";
	
?>
<iframe src=<?php echo $variableSrc; ?> width="100%" height="100%"></iframe> 
