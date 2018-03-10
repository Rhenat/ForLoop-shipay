<?php
global $mysqli;
/* Displays user information and some useful messages */
require('database.php');
session_start();



// Check if user is logged in using the session variable

if ( $_SESSION['logged_in'] != 1 ) {

  $_SESSION['message'] = "You must log in before viewing your profile page!";

  header("location: error.php");    

}

else {
	
	
	$email = $_SESSION['email'];
	$first_name = $_SESSION['fname'];
	$last_name = $_SESSION['lname'];
	$phone = $_SESSION['phone'];
	$city = $_SESSION['city'];
	
	/*$col = $mysqli->query("SELECT * FROM customer WHERE email='$email'");
    // Makes it easier to read
	$rw = mysqli_fetch_array($col);
	$user = $col->fetch_assoc();
var_dump( $user );
    $first_name = $user['fname'];
	$last_name = $user['lname'];
	$city = $user['city'];
	$phone = $user['phoneNo'];
    $active = $user['active'];
*/
}



/*

// Be sure to include the file you've just downloaded

require_once('AfricasTalkingGateway.php');

// Specify your authentication credentials

$username   = "ShiPay";

$apikey     = "5df6e92d16fb2a4ed976545e6692509e79494cca5df991026fdf171d358e2cb9";

// Specify the numbers that you want to send to in a comma-separated list

// Please ensure you include the country code (+254 for Kenya in this case)

$recipients = "+254".$phone;

// And of course we want our recipients to know what we really do

$message    = "I'm a lumberjack and its ok, I sleep all night and I work all day";

// Create a new instance of our awesome gateway class

$gateway    = new AfricasTalkingGateway($username, $apikey);

/*************************************************************************************

  NOTE: If connecting to the sandbox:

  1. Use "sandbox" as the username

  2. Use the apiKey generated from your sandbox application

     https://account.africastalking.com/apps/sandbox/settings/key

  3. Add the "sandbox" flag to the constructor

  $gateway  = new AfricasTalkingGateway($username, $apiKey, "sandbox");

**************************************************************************************/

// Any gateway error will be captured by our custom Exception class below, 

// so wrap the call in a try-catch block

/*

try 

{ 

  // Thats it, hit send and we'll take care of the rest. 

  $results = $gateway->sendMessage($recipients, $message);

            

  foreach($results as $result) {

    // status is either "Success" or "error message"

    echo " Number: " .$result->number;

    echo " Status: " .$result->status;

    echo " MessageId: " .$result->messageId;

    echo " Cost: "   .$result->cost."\n";

  }

}

catch ( AfricasTalkingGatewayException $e )

{

  echo "Encountered an error while sending: ".$e->getMessage();

}

// DONE!!! */

?>

<!doctype html>

<html>

<head>

	<meta charset="utf-8">

	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<meta name = "viewport" content="width=device-width, initial-scale=1">

	<title>Welcome <?= $first_name.' '.$last_name ?></title>

	

	<!-- Adding css styling -->

	<link rel="stylesheet" href ="css/profile.css">

	<link rel = "stylesheet" href="css/bootstrap.css">

	<link rel="stylesheet" href="css/bttn.min.css">

	

	<!-- google Fonts -->

	<link href="https://fonts.googleapis.com/css?family=Montserrat|Open+Sans|Roboto" rel="stylesheet">

	<link href="https://fonts.googleapis.com/css?family=Berkshire+Swash" rel="stylesheet">

	

</head>

	 



<body>
    
	 <div id="box1" class = "dash"> 

          <div id="particles-js"></div>

         

		 

		  <nav class="navbar navbar-default" role = "navigation">

        <div class="container">

         	<div class="navbar-header">

                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">

                    <span class="sr-only">Toggle navigation</span>

                    <span class="icon-bar"></span>

                    <span class="icon-bar"></span>

                    <span class="icon-bar"></span>

                </button>

				<a class = "hidden navbar-brand" href = "#logo"> <img src="images/sp_1x.png" alt = ""> </a>

            </div>

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                <ul class="nav navbar-nav navbar-right">

                    <li class = "active"><a  href="#addtransact" type="button" data-toggle="modal" class="bttn-slant bttn-md bttn-primary">+Add Transactions </a></li>

                    <li><a  href = "logout.php" class="bttn-slant bttn-md bttn-primary">Logout</a></li>

                                

                </ul>

            </div>

        </div>

    </nav>

		 <!--</div><button class="bttn-slant bttn-md bttn-primary">medium</button>-->

	<!-- Dashboad Details -->

	<div class="dashboard">

		<div class="container">

            

		<div class="row">

			<div class="profile_pic">

				<ul>

				<li class = "item"><div class="bg"></div></li>

				</ul>

				

			</div>

		</div>

		<div class="row">

		<div class="profile-info">

		<h1><?php echo $first_name.' '.$last_name; ?></h1>

			<p ><?php echo $email ?></p>

			<p><?php echo $city ?></p>

			<p> <?php echo $phone ?></p>

			<button class="bttn-material-flat bttn-sm bttn-primary" type="button" data-toggle="modal" data-target="#transactions">View Transactions</button>

		</div>

		</div>

		

	</div>

		 </div>

	</div>

	<!-- View Transactions - Both present and past -->

	<div class="modal fade" id="transactions" tabindex="-1" role="dialog" aria-labelledby="login" aria-hidden="true">

  <div class="modal-dialog" role="document">

    <div class="modal-content">

      <div class="modal-header">

        <h3 class="modal-title" id="exampleModalLabel">Transactions</h3>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">

          <span aria-hidden="true">&times;</span>

        </button>

      </div>
	<table>
      <div class="modal-body">
 			<tbody>
                    <?php

                     $query = "SELECT * FROM orders where email='$email'";
                    $run = $mysqli->query($query);

                    while ($row = mysqli_fetch_array($run)) {
                        # code...
                        $transDate = $row["transactionDate"];
                        $rcdDate  = $row["receivedDate"];
                        $trkNo = $row["trackingNo"];
                        $ordID = $row["orderID"];
                        $tranStatus = $row["transactionStatus"];
                        $email=$row["email"];


                    
                    ?>

                <tr>
                    
                    <td><label><?php echo $transDate;?></label></td> 
                    <td><label><?php echo $rcdDate;?></label></td>
                    <td><label><?php echo $trkNo;?></label></td>
                    <td><label><?php echo $ordID;?></label></td>
                    <td><label><?php echo $email;?></label></td>
                    <td><inp<a id="<?php echo $ordID; ?>" class="btn btn-link btn-lg edit-link "  name="<?php echo $trkNo; ?>" href="#"  title="Edit">Edit</td>
                      <td><a class='btn btn-link btn-lg delete-link' href="home.php?delete=<?php echo $ordID;?> ">Delete</td>
                </tr>
                <?php } ?>
            </tbody>
		</table>

			<!-- <ul class = "nav nav-tabs" role = "tablist">

					<li role = "presentation"><a role="tab" class="active" data-toggle="tab" href = "#current">Ongoing Transactions</a></li>

					<li role = "presentation"><a role="tab" data-toggle="tab" href = "#past">Past Transactions</a></li>

				

			</ul>

			<div class="tab-content">

				<div role="tab-panel" class="tab-pane active" id = "current">

					<h3> Ongoing Transactions</h3>

					 Table containing current ongoing transactions goes here -->

				<!--</div>

				<div role="tab-panel" class="tab-pane" id = "past">

					<h3> Past Transactions</h3>

					 table of past transactions and their status whether succesful or unsuccesful goes here -->

				</div>

				

				



			</div>

		

      </div>

      </div>

      <div class="modal-footer">

        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

        <!--<button type="button" class="btn btn-primary">Save changes</button>-->

      </div>

    </div>

  </div>



	

	<!-- Add transactions via Rave -->

	<div class="modal fade" id="addtransact" tabindex="-1" role="dialog" aria-labelledby="login" aria-hidden="true">

  <div class="modal-dialog" role="document">

    <div class="modal-content">

      <div class="modal-header">

        <h3 class="modal-title">Welcome!</h3>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">

          <span aria-hidden="true">&times;</span>

        </button>

      </div>

      <div class="modal-body">

		<!-- Add Rave API -->

		  <form method = "post">
			  
                                <!-- Input Email -->
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Tracking No</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputEmail" placeholder="" name="transactionid" required />
                                    </div>
                                </div>
                                <!-- Input Password -->
                                <div class="form-group row">
                                    <label for="transactdate" class="col-sm-2 col-form-label">Expected date of arrival</label>
                                    <div class="col-sm-10">
                                        <input type="date" class="form-control" id="transactdte" placeholder="Password" name="transactdate" required/>
                                    </div>
                                </div>

                        </div>

                                            

				          <a class="flwpug_getpaid" data-PBFPubKey="FLWPUBK-9af9929f98bb8c55f54b12362226b8ae-X" data-txref="rave-123456" data-amount="" data-customer_email="isaacbotwe7@gmail.com" data-integrity_hash="" data-currency="GHS" data-pay_button_text="Pay Now" data-country="GH" data-custom_title="Shipay" data-custom_description="" data-redirect_url="" data-custom_logo="" data-payment_method="both"></a>
			  

      </div>

      <div class="modal-footer">

        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

        <button type="Submit" name = "addtransaction" class="btn btn-primary">Add Transactions</button>
		  
		  <?php 
		  if(isset($_POST['addtransaction'])){
		  	$transactid = $_POST['transactionid'];
		  	$receivedte = $_POST['transactdate'];
			  
			  $mysqli->query("INSERT INTO orders(receivedDate,trackingNo) VALUES('$receivedte',$transactid)");
		  }
		  ?>

      </div>
</form>
    </div>

  </div>

</div>

	

	<script src="js/jquery.min.js"></script>

	<script src="js/bootstrap.js"></script>

	<script src="js/script.js"></script>

    <script src="js/particles.js"></script> <!-- stats.js lib --> 

	<!-- Rave API javascript 

	<script type="text/javascript" src="https://api.ravepay.co/flwv3-pug/getpaidx/api/flwpbf-inline.js"></script>-->
<script type="text/javascript" src="https://api.ravepay.co/flwv3-pug/getpaidx/api/flwpbf-inline.js"></script>
        
<script type="text/javascript">

  document.addEventListener("DOMContentLoaded", function(event) {

    document.getElementById('pay').addEventListener('click', function () {



<?php



use Unirest\Request\Body;



$data = array('flw_ref' => 'FLW-MOCK-baa79d6a6ab92070fab73da392126fe3',

  'SECKEY' => 'FLWSECK-e6db11d1f8a6208de8cb2f94e293450e-X', //secret key from pay button generated on rave dashboard

  'normalize' => '1'

);







  // make request to endpoint using unirest.

  $headers = array('Content-Type' => 'application/json');

  $body = Unirest\Request\Body::json($data);

  $url = "http://flw-pms-dev.eu-west-1.elasticbeanstalk.com/flwv3-pug/getpaidx/api/verify"; //url to staging server. please make sure to change when in production.



// Make `POST` request and handle response with unirest

  $response = Unirest\Request::post($url, $headers, $body);

  

  //check the status is success

  if ($response->body->data->status === "successful") {

      //confirm that the amount is the amount you wanted to charge

      if ($response->body->data->amount === $amount_to_charge) {

        

		  /* Begining of Africa's talk */

		// Be sure to include the file you've just downloaded

		require_once('AfricasTalkingGateway.php');

		// Specify your authentication credentials

		$username   = "sandbox";

		$apikey     = "5df6e92d16fb2a4ed976545e6692509e79494cca5df991026fdf171d358e2cb9";

		// Specify the numbers that you want to send to in a comma-separated list

		// Please ensure you include the country code (+254 for Kenya in this case)

		$recipients = "+233574644149";

		// And of course we want our recipients to know what we really do

		$message    = "Welcome to Shipay We have received your payment 

		BILLING INFORMATION



		Address: House No. 11 East Legon, P.O. Box LG 25, Legon - Accra, ShiPay Ltd.



		City: East Legon



		State/Province/Region: Greater Accra



		Zipcode: 00233";

		// Create a new instance of our awesome gateway class

		$gateway    = new AfricasTalkingGateway($username, $apikey, "sandbox");

		/*************************************************************************************

		  NOTE: If connecting to the sandbox:

		  1. Use "sandbox" as the username

		  2. Use the apiKey generated from your sandbox application

			 https://account.africastalking.com/apps/sandbox/settings/key

		  3. Add the "sandbox" flag to the constructor

		  $gateway  = new AfricasTalkingGateway($username, $apiKey, "sandbox");

		**************************************************************************************/

		// Any gateway error will be captured by our custom Exception class below, 

		// so wrap the call in a try-catch block

		try 

		{ 

		  // Thats it, hit send and we'll take care of the rest. 

		  $results = $gateway->sendMessage($recipients, $message);



		  foreach($results as $result) {

			// status is either "Success" or "error message"

			echo " Number: " .$result->number;

			echo " Status: " .$result->status;

			echo " MessageId: " .$result->messageId;

			echo " Cost: "   .$result->cost."\n";

		  }

		}

		catch ( AfricasTalkingGatewayException $e )

		{

		  echo "Encountered an error while sending: ".$e->getMessage();

		}

		// DONE!!!

		/* End of Africa's Talk */

        if($response->body->data->flwMeta->chargeResponse === "00") {

          echo("Give value");

        }

      }

  }



?>

    });

  });

</script>-->

	



</body>

</html>



