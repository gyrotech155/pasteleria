<?php
//Retrieve form data. 
//GET - user submitted data using AJAX
//POST - in case user does not support javascript, we'll use POST instead
$name = ($_GET['name']) ? $_GET['name'] : $_POST['name'];
$email = ($_GET['email']) ?$_GET['email'] : $_POST['email'];
$comment = ($_GET['comment']) ?$_GET['comment'] : $_POST['comment'];
//flag to indicate which method it uses. If POST set it to 1

if ($_POST) $post=1;

//Simple server side validation for POST data, of course, you should validate the email
if (!$name) $errors[count($errors)] = 'Por favor ingrese su nombre.';
if (!$email) $errors[count($errors)] = 'Por favor ingrese su email.'; 
if (!$comment) $errors[count($errors)] = 'Por favor ingrese su mensaje.'; 

//if the errors array is empty, send the mail
if (!$errors) {

	//recipient - replace your email here
	$to = 'cintialupemartinez@pastelerialipe.com';	
	//sender - from the form
	$from = $name . ' <' . $email . '>';
	
	//subject and the html message
	$subject = 'Mensaje de ' . $name;	
	$message = 'De: ' . $name . '<br/><br/>
		       Correo: ' . $email . '<br/><br/>		
		       Mensaje: ' . nl2br($comment) . '<br/>';

	//send the mail
	$result = sendmail($to, $subject, $message, $from);
	
	//if POST was used, display the message straight away
	if ($_POST) {
		if ($result) echo '<div style="width:70%; background:#eee; position:relative; font-family:sans-serif; padding-bottom:40px; margin-left:15%; margin-right:11%;">
						
						<center>
							
							<img style="padding:20px; width:25%" src="https://pastelerialupe.com/vistas/img/logo2.png">

						</center>

						<div style="position:relative; margin:auto; width:90%; background:white; padding:20px">
						
							<center>
							
							<img style="padding:20px; width:25%" src="https://pastelerialupe.com/vistas/img/icon-email.png">

							<h3 style="font-weight:100; color:#999;">Gracias! Hemos recibido tu mensaje.</h3>

							<br>

							<hr style="border:1px solid #ccc; width:80%">

							</center>

						</div>

					</div>';
		else echo '<div style="width:100%; background:#eee; position:relative; font-family:sans-serif; padding-bottom:40px">
						
						<center>
							
							<img style="padding:20px; width:10%" src="https://pastelerialupe.com/vistas/img/logo2.png">

						</center>

						<div style="position:relative; margin:auto; width:600px; background:white; padding:20px">
						
							<center>
							
							<img style="padding:20px; width:15%" src="https://pastelerialupe.com/vistas/img/icon-email.png">

							<h3 style="font-weight:100; color:#999">Perdon, error inesperado. Por favor, intentelo mas tarde</h3>

							<hr style="border:1px solid #ccc; width:80%">

							<br>

							<hr style="border:1px solid #ccc; width:80%">

							</center>

						</div>

					</div>';
		
	//else if GET was used, return the boolean value so that 
	//ajax script can react accordingly
	//1 means success, 0 means failed
	} else {
		echo $result;	
	}

//if the errors array has values
} else {
	//display the errors message
	for ($i=0; $i<count($errors); $i++) echo $errors[$i] . '<br/>';
	echo '<a href="index.html">Back</a>';
	exit;
}


//Simple mail function with HTML header
function sendmail($to, $subject, $message, $from) {
	$headers = "MIME-Version: 1.0" . "\r\n";
	$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
	$headers .= 'From: ' . $from . "\r\n";
	
	$result = mail($to,$subject,$message,$headers);
	
	if ($result) return 1;
	else return 0;
}

?>