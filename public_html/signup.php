<?php
require "database.php";
?>

<?php
	
    //Name to be displayed on profile page
	$_SESSION['fname'] = $_POST['fname'];
	$_SESSION['lname'] = $_POST['lname'];
	$_SESSION['email'] = $_POST['email'];


    // User signs up
	$firstname = $mysqli->escape_string($_POST['fname']);
	$lastname = $mysqli->escape_string($_POST['lname']);
    $phoneNo = $mysqli->escape_string($_POST['phone']);
	$email = $mysqli->escape_string($_POST['email']);
    $city = $mysqli->escape_string($_POST['city']);
	$password = $mysqli->escape_string($_POST['addPassword']);
	$password2 = $mysqli->escape_string($_POST['confirmPassword']);
	$hash = $mysqli->escape_string( md5( rand(0,1000) ) );
    echo '$hash';

    
   
    
    $result = $mysqli->query("SELECT * FROM customer WHERE email = '$email'") or die($mysqli->error);
	//Check if User has already registered
	if($result->num_rows > 0) {
		
        $_SESSION['logged_in'] = true; // So we know the user has logged in

    if(!filter_var($user_email, FILTER_VALIDATE_EMAIL))
    { //email validation
        $output = 'Please enter a valid email!';
        die($output);
    }              
        echo "Confirmation link has been sent to $email, please verify
         your account by clicking on the link in the message!";
		//Add details to database
       // if ($password == $password2){
            $mysqli->query("INSERT INTO customer(fname, lname, email, phoneNo, city, password, password2) VALUES ('$firstname', '$lastname', '$phoneNo', '$email', '$city', '$password', '$password2')");
        /*}else{
                //failed
                $_SESSION['message'] = "The two passwords do not match";
            }*/
   
        // Send registration confirmation link (verify.php)
        $to      = $email;
        $subject = 'Account Verification ( Shipay: Enjoy hassle-free shipments to Ghana from around the globe)';
        $message_body = '
        Hello '.$firstname.',

        Thank you for signing up!

        Please click this link to activate your account:

        email='.$email.'&hash='.$hash;  

        mail( $to, $subject, $message_body );

        header("location: profile.php");

    }

    else {
        $_SESSION['message'] = 'Registration failed!';
        header("location: error.php");
    }


	

?>