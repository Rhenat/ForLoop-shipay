<?php
require "database.php";
/* User login process, checks if user exists and password is correct */

// Escape email to protect against SQL injections
$email = $mysqli->escape_string($_POST['email']);
$password = $mysqli->escape_string($_POST['password']);


    $result = $mysqli->query("SELECT * FROM customer WHERE email='$email'");

    if ( $result->num_rows == 0 ){ // User doesn't exist
        $_SESSION['message'] = "User with that email doesn't exist!";
        header("location: error.php");
    }
    else { // User exists
        $row = mysqli_fetch_array($result);
        //$user = $result->fetch_assoc();
//password_verify($_POST['password'], $user['password'])
        if ( $row['email'] == $email && $row['password'] == $password ) {

            $_SESSION['email'] = $user['email'];
            $_SESSION['fname'] = $user['fname'];
            $_SESSION['lname'] = $user['lname'];
            $_SESSION['active'] = $user['active'];

            // This is how we'll know the user is logged in
            $_SESSION['logged_in'] = true;

            header("location: profile.php");
        }
        else {
            $_SESSION['message'] = "You have entered wrong password, try again!";
            header("location: error.php");
        }
    }

?>