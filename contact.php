<?php
						header('Content-type: application/json');

						if(isset ($_POST['send']))
						{
							$to_email       = "ibotwe@st.ug.edu.gh"; //Recipient email, Replace with own email here
							//Sanitize input data using PHP filter_var().
							$user_name      = filter_var($_POST["messname"],    FILTER_SANITIZE_STRING);
							$user_email     = filter_var($_POST["messemail"],   FILTER_SANITIZE_EMAIL);
							$message       = filter_var($_POST["message"], FILTER_SANITIZE_STRING);
							/*$tel       = preg_replace('/[^0-9]/', '', $_POST["number"]);
							$tel = filter_var($tel, FILTER_SANITIZE_NUMBER_INT);*/

							//additional php validation
							if(strlen($user_name)<3){ // If length is less than 4 it will output JSON error.
								$output = 'Name is too short or empty!';
								die($output);
							}

							if(!filter_var($user_email, FILTER_VALIDATE_EMAIL)){ //email validation
								$output = 'Please enter a valid email!';
								die($output);
							}


							if(strlen($message)<3){ //check emtpy message
								$output = 'Too short message! Please enter something.';
								die($output);
							}

								/*if(strlen($tel)<3){ //check emtpy message
								$output = 'Too short number! Please should be 10 digits.';
								die($output);
							}*/

							//email subject
							$subject ='Message from Shipay';

							//email body
							$message_body =$user_name."\r\n\r\nEmail : ".$user_email."\r\n\r\n-".$message;

							//proceed with PHP email.
							$headers = 'From: '.$user_name.'<'.$user_email.'>'."\r\n" .
							'Reply-To: '.$user_name.'<'.$user_email.'>' . "\r\n" .
							'X-Mailer: PHP/' . phpversion();
							
							mail($to_email, $subject, $message_body, $headers);
							$output = 'Thanks for sending. Your message is been processed';
							die($output);
							header("location: index.php");
							} 
						 ?>
