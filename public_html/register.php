<?php
/* Registration process, inserts user info into the database 
   and sends account confirmation email message
 */
$email = $mysqli->escape_string($_POST['email']);

// Check if user with that email already exists
$result = $mysqli->query("SELECT * FROM customer WHERE email='$email'") or die($mysqli->error());
// Full Name must contain letters, dashes and spaces only and must start with upper case letter.
if ( $result->num_rows > 0 ) {
    
    $_SESSION['message'] = 'User with this email already exists!';
    header("location: error.php");
    
}
// We know user email exists if the rows returned are more than 0

else { // Email doesn't already exist in a database, proceed...
    
               // Escape all $_POST variables to protect against SQL injections

            $firstname = $mysqli->escape_string($_POST['fname']);
            $lastname = $mysqli->escape_string($_POST['lname']);
            $phoneNo = $mysqli->escape_string($_POST['phone']);
            $city = $mysqli->escape_string($_POST['city']);
            $password = $mysqli->escape_string($_POST['addPassword']);
            $password2 = $mysqli->escape_string($_POST['confirmPassword']);
            $hash = $mysqli->escape_string( md5( rand(0,1000) ) );
            $active = 0;
            $paid_status = 'Not paid';
            //Name to be displayed on profile page
            $_SESSION['fname'] = $_POST['fname'];
            $_SESSION['lname'] = $_POST['lname'];
            $_SESSION['email'] = $_POST['email'];
            $_SESSION['phone'] = $_POST['phone'];
            $_SESSION['city'] = $_POST['city'];
            // active is 0 by DEFAULT (no need to include it here)
            $sql = "INSERT INTO customer(fname, lname, email, phoneNo, city, password, password2, active, paidstatus,hash) VALUES ('$firstname', '$lastname','$email','$phoneNo', '$city','$password','$password2','$active','$paid_status','$hash')";

    // Add user to the database
    if ( $mysqli->query($sql) ){

        $_SESSION['active'] = 0; //0 until user activates their account with verify.php
        $_SESSION['logged_in'] = true; // So we know the user has logged in
        $_SESSION['message'] =
                
                 "Confirmation link has been sent to $email, please verify
                 your account by clicking on the link in the message!";

        // Send registration confirmation link (verify.php)
        $to      = $email;
        $subject = 'Account Verification ( Shipay: Enjoy hassle-free shipments to Ghana from around the globe )';
        $message_body = '
        Hello '.$firstname.',

        Thank you for signing up!

        Please click this link to activate your account:

        http://localhost/for loop shiipay/for loop shiipay/verify.php?email='.$email.'&hash='.$hash;  

        mail( $to, $subject, $message_body );

        header("location: profile.php"); 
    

    }

   /* else {
        $_SESSION['message'] = 'Registration failed!';
        header("location: error.php");
    }*/

}
?>
