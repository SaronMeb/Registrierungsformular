<!DOCTYPE html>
<?php
	error_reporting(0);
	include_once 'assets/db/db_info.php';
	$c = mysqli_connect($host, $user, $password, $db);

	if(isset($_POST['submitPW'])){
		$vorname = $_POST['form-first-name'];
		$nachname = $_POST['form-last-name'];
		$email = $_POST['form-email'];
		$passwort = $_POST['form-new-password'];
	
		//Daten in die Datenbank hinzufuegen
		$query = "INSERT INTO formulardaten(Vorname, Nachname, Email, Passwort) VALUES ('$vorname', '$nachname', '$email', '$passwort')";
		mysqli_query($c, $query);
	}
	mysqli_close($c);
?>

<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Registrierungsformular</title>

        <!-- CSS -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="assets/css/form-elements.css">
        <link rel="stylesheet" href="assets/css/style.css">

    </head>
    <body> 
	 <div class="layerBox" id ="layer"></div>
        <!-- Top content -->
        <div class="top-content">	
            <div class="inner-bg">
                <div class="container">
                    <div class="row">						
                        <div class="col-sm-7 text">
                            <h1><!-- Registration Form --></h1>
                            <div class="description">
                            	<span>
	                            <!--	Description -->
                            	</span>
                            </div>
							<div class="firstinfobox" id="first_info">
								<span style="font-weight: 400;"> Passwort Information:</span>
								<hr noshade size="1" style= "margin-top:0.1em; margin-bottom:2em;">
								<span id="firstinfoboxText"><b>82%</b> unserer Anwender haben ein sicherers Passwort gewählen.</span>
								<p></p>
								<span>Werden Sie auch ein sicheres Passwort wählen?</span>
								<p></p>
								<button id="closeBtn" class="btn pull-right" style= "margin-top:0.1em;">Schließen</button>
							</div> 	
							<div class="infobox" id="pswd_info">
								<span style="font-weight: 400;" id="PI" > Passwort Information:</span>
								<hr noshade size="1" style= "margin-top:0.1em; margin-bottom:0.5em;">
								<span id="InfoPI">Haben Sie ein sicheres Passwort und gehören Sie zu den 82%?</span>
								<table> 
									<colgroup> 
										<col width="300"> 
									</colgroup>
									<tr> 
										<td id="td1"><img id="passwdRatingPic" src="assets/img/peopleblack.png" alt="smiley" style="float: right;" width="256" height="64"></td> 									
									</tr>
									<tr> 
										<td id="td2"><span style="font-weight: 400;" id="pwInfo">Probieren Sie es aus!</span><br><ul type="disc" id="PITable"><span id="pwInfoHilfe"> </span></ul></td> 
									</tr> 
								</table>							
							</div>
                        </div>
                        <div class="col-sm-5 form-box">
                        	<div class="form-top">
                        		<div class="form-top-left">
                        			<h3>Account</h3>
									<table> 
										<colgroup> 
											<col width="270"> 
										</colgroup>
										<tr> 
											<td><p>Das folgende Formular bitte ausfüllen</p></td> 									
											<td><a href="#" onclick="document.getElementById('first_info').style.display = 'block'; document.getElementById('layer').style.display = 'block';" >
											<img src="assets/img/info.png" alt="Info" width="15" height="15" style= "margin-top:-0.7em;"></a></td> 
										</tr> 
									</table>
                        		</div>
                            </div>
                            <div class="form-bottom" id="formular">
			                    <form action="index.php" method="post" class="registration-form">
			                    	<div class ="row">
										<div class="form-group col-xs-6">
											<label class="sr-only" for="form-first-name">First name</label>
											<input type="text" name="form-first-name" placeholder="Vorname" class="form-first-name form-control" id="form-first-name">
										</div>
										<div class="form-group col-xs-6">
											<label class="sr-only" for="form-last-name">Last name</label>
											<input type="text" name="form-last-name" placeholder="Nachname" class="form-last-name form-control" id="form-last-name">
										</div>
									</div>
			                        <div class="form-group">
			                        	<label class="sr-only" for="form-email">Email</label>
			                        	<input type="text" name="form-email" placeholder="Email" class="form-email form-control" id="form-email">
			                        </div>								
			                        <div class="form-group">
			                        	<label class="sr-only" for="form-new-password">New password</label>
			                        	<input type=password name="form-new-password" placeholder="Neues Passwort" class="form-new-password form-control input-lg" id="form-new-password">
			                        </div>														
			                        <div class="form-group">
			                        	<label class="sr-only" for="form-confirm-password">Confirm password</label>
			                        	<input type=password name="form-confirm-password" placeholder="Passwort wiederholen" class="form-confirm-password form-control input-lg" id="form-confirm-password">
			                        </div>	
										<button type="submit" name="submitPW" class="btn pull-right">Weiter</button>
			                    </form>
							</div>     
                        </div>
                    </div>
                </div>
            </div>          
        </div>

        <!-- Javascript -->
        <script src="assets/js/jquery-1.11.1.min.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/js/jquery.backstretch.min.js"></script>
        <script src="assets/js/retina-1.1.0.min.js"></script>
        <script src="assets/js/scripts.js"></script>
        <script type="text/javascript" src="assets/js/zxcvbn.js"></script>

    </body>
</html>

