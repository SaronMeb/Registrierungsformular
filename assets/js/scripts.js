jQuery(document).ready(function() {
	
	//4 stelliger Code 
	var num = Math.floor(Math.random() * 9000) + 1000;
	$('#form-code').val(num);
	
	var firstClick = true;
	
    /*
        Fullscreen background
    */
    $.backstretch("assets/img/backgrounds/2.jpg");

    $('#top-navbar-1').on('shown.bs.collapse', function(){
    	$.backstretch("resize");
    });
    $('#top-navbar-1').on('hidden.bs.collapse', function(){
    	$.backstretch("resize");
    });
	
    /*
        Form validation
    */
    $('.registration-form input[type="text"], .registration-form textarea').on('focus', function() {
    	$(this).removeClass('input-error');
    });

    $('.registration-form input[type="password"], .registration-form textarea').on('focus', function() {
    	$(this).removeClass('input-error');
    });
 	var once = false;
	var pswd = "";
	$('#form-new-password').keyup(function() {
		//set password variable
		pswd = $(this).val();
		var result = zxcvbn(pswd);
		var str ="";
		var tmp ="";
		
		//Add new lines
		if(result.feedback.suggestions != "" && result.feedback.warning != ""){
			tmp = String('<li>' + result.feedback.suggestions +'</li><li>'+ result.feedback.warning + '</li>');
			str = tmp.replace(/.,/g, '.</li><li>');
		}else if(result.feedback.suggestions != "" && result.feedback.warning == ""){ 
			tmp = '<li>' + String(result.feedback.suggestions) + '</li>';
			str = tmp.replace(/.,/g, '.</li><li>');
		}else if(result.feedback.suggestions == "" && result.feedback.warning != ""){
			tmp = '<li>' + String(result.feedback.warnings) + '</li>';
			str = tmp.replace(/.,/g, '.</li><li>');
		}else{ 
			str = "\n";
			}
					
		//validate
		if ( result.score == 0 && pswd.length == 0) {
			$('#pwInfo').text("Probieren Sie es aus!");
			$('#pwInfoHilfe').text(" ");	
			once = true;	
			document.getElementById('passwdRatingPic').src = "assets/img/peopleblack.png";
		} else if ( result.score == 0 && pswd.length > 0) {
			$('#pwInfo').text("Passwort Hilfe:");
			$('#pwInfoHilfe').html(str);
			once = true;			
			document.getElementById('passwdRatingPic').src = "assets/img/peopleblack.png";
		} else if ( result.score == 1) {
			$('#pwInfo').text("Passwort Hilfe:");
			$('#pwInfoHilfe').html(str);
			once = true;			
			document.getElementById('passwdRatingPic').src = "assets/img/peopleblack1.png";
		} else if ( result.score == 2) {
			$('#pwInfo').text("Passwort Hilfe:");
			$('#pwInfoHilfe').html(str);
			once = true;			
			document.getElementById('passwdRatingPic').src = "assets/img/peopleblack2.png";
		} else if ( result.score == 3) {
			$('#pwInfo').text("Passwort Hilfe:");
			$('#pwInfoHilfe').html(str);			
			document.getElementById('passwdRatingPic').src = "assets/img/peopleblack3.png";
			once = true;
		} else if ( result.score == 4) {
			$('#pwInfo').text("Glückwunsch Sie haben es geschafft!");
			$('#pwInfoHilfe').text(" ");
			if(once){
				document.getElementById('passwdRatingPic').src = "assets/img/peopleblackGeschafft1.png";		
				setTimeout(function (){
					document.getElementById('passwdRatingPic').src = "assets/img/peopleblackGeschafft2.png";
				}, 1000); 
				once = false;
			} else {
				document.getElementById('passwdRatingPic').src = "assets/img/peopleblackGeschafft2.png";
			}	
		}
		});
	//show PW Info Box on click on input field new PW and dont show when click somewhere else (but still show on click on PW Info Box)
	$(document).on('focus', 'input', function (e) {
		if(!firstClick){
			if(e.target.id == "pswd_info" ){
				$('#pswd_info').show();
			}else if (e.target.id == "passwdRatingPic"){
				$('#pswd_info').show();
			}else if (e.target.id == "pwInfo"){
				$('#pswd_info').show();
			}else if (e.target.id == "pwInfoHilfe"){
				$('#pswd_info').show();
			}else if (e.target.id == "PI"){
				$('#pswd_info').show();
			}else if (e.target.id == "InfoPI"){
				$('#pswd_info').show();
			}else if (e.target.id == "PITable"){
				$('#pswd_info').show();
			}else if (e.target.id == "td1"){
				$('#pswd_info').show();
			}else if (e.target.id == "td2"){
				$('#pswd_info').show();
			}else if (e.target.id == "form-new-password"){
				$('#pswd_info').show();
			}else $('#pswd_info').hide();
		}	
	});
	
    $('.registration-form').on('submit', function(e) {
    	$(this).find('input[type="password"], textarea').each(function(){
    		if( $(this).val() == "" || pswd.length < 8) {
    			e.preventDefault();
    			$(this).addClass('input-error');
    		}else if ( $('#form-new-password').val() != $('#form-confirm-password').val()){
			    e.preventDefault();
    			$('#form-confirm-password').addClass('input-error');
			}else {
    			$(this).removeClass('input-error');
				//hier gehts weiter ;
				//alert("Bitte geben Sie in den folgende Fragebogen diesen vierstelligen Code ein: " + num);
				//return false;
    		}
    	});      	
    });
	
 	//Close Button
	$('#closeBtn').click(function() {
		$('#first_info').hide();
		$('#layer').hide();
		$('#form-new-password').focus();
	});	

	//Click Form -> Info Box opens (Just one time)
	$('#form-new-password').one('focus', function() {
		firstClick = false;
 		$('#first_info').show();
		$('#layer').show();
		$('#closeBtn').focus();
    });
});

