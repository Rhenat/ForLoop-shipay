<?php
/* Displays user information and some useful messages */
session_start();

// Check if user is logged in using the session variable
if ( $_SESSION['logged_in'] != 1 ) {
  $_SESSION['message'] = "You must log in before viewing your profile page!";
  header("location: error.php");    
}
else {
    // Makes it easier to read
    $first_name = $_SESSION['first_name'];
    $last_name = $_SESSION['last_name'];
    $email = $_SESSION['email'];
    $active = $_SESSION['active'];
}
?>
<!DOCTYPE html>
<html >
<head>
  <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name = "viewport" content="width=device-width, initial-scale=1">
	<title>Welcome <?= $first_name.' '.$last_name ?></title>
	<!-- Adding css styling -->
	<link rel="stylesheet" href ="css/styles.css">
	<link rel = "stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/bttn.min.css">
	
	<!-- google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat|Open+Sans|Roboto" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Berkshire+Swash" rel="stylesheet">
  

</head>

<body>
	<?php 
     
          // Display message about account verification link only once
          if ( isset($_SESSION['message']) )
          {
              echo $_SESSION['message'];
              
              // Don't annoy the user with more messages upon page refresh
              unset( $_SESSION['message'] );
          }
          
          ?>
	
	<?php
          
          // Keep reminding the user this account is not active, until they activate
          if ( !$active ){
              echo
              '<div class="info">
              Account is unverified, please confirm your email by clicking
              on the email link!
              </div>';
          }
          
          ?>
          
          <h2><?php echo $first_name.' '.$last_name; ?></h2>
          <p><?= $email ?></p>
  <!--<div class="form">

          <h1>Welcome</h1>
          
          <p>
               </p>
          
                
          <a href=".logout.php"><button class="button button-block" name="logout"/>Log Out</button></a>

    </div>-->
		
	
	 <div id="box1" class = "dash">  
		 
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
                    <li><a  href = "logout" class="bttn-slant bttn-md bttn-primary" name = "logout">Log Out</a></li>
                                
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
		<h1>Profile Username</h1>
			<p>Profile Email</p>
			<p>Profile Location</p>
			<p> Profile Phone Number</p>
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
      <div class="modal-body">
		<section class = "col-sm-12">
			 <ul class = "nav nav-tabs" role = "tablist">
					<li role = "presentation"><a role="tab" class="active" data-toggle="tab" href = "#current">Ongoing Transactions</a></li>
					<li role = "presentation"><a role="tab" data-toggle="tab" href = "#past">Past Transactions</a></li>
				
			</ul>
			<div class="tab-content">
				<div role="tab-panel" class="tab-pane active" id = "current">
					<h3> Ongoing Transactions</h3>
					<!-- Table containing current ongoing transactions goes here -->
				</div>
				<div role="tab-panel" class="tab-pane" id = "past">
					<h3> Past Transactions</h3>
					<!-- table of past transactions and their status whether succesful or unsuccesful goes here -->
				</div>
				
				

			</div>
		</section>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <!--<button type="button" class="btn btn-primary">Save changes</button>-->
      </div>
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
				<a class="flwpug_getpaid" data-PBFPubKey="FLWPUBK-adbe8e21cca6983ea92d340093783d76-X" data-txref="rave-checkout-1520594072" data-amount="" data-customer_email="user@example.com" data-currency = "GHS" data-pay_button_text = "Pay" data-country="GH" data-custom_title = "Shiipay" data-custom_description = "" data-redirect_url = "" data-custom_logo = "" data-payment_method = "both" data-exclude_banks=""></a>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
    
<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.js"></script>
	<script src="js/script.js"></script>
	<!-- Rave API javascript -->
	<script type="text/javascript" src="https://api.ravepay.co/flwv3-pug/getpaidx/api/flwpbf-inline.js"></script>
	

</body>
</html>
