<?php
require "database.php";
session_start();

 if(isset($_POST['save'])){
     
     require "register.php";
     
 }

if(isset($_POST['login'])){
     
     require "login.php";
 }

?>
        <!doctype html>
        <html>

        <head>
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <title>ShiPay</title>

            <!-- Adding css styling -->
            <link rel="stylesheet" href="css/styles.css">
            <link rel="stylesheet" href="css/bootstrap.css">
            <link rel="stylesheet" href="css/bttn.min.css">

            <!-- google Fonts -->
            <link href="https://fonts.googleapis.com/css?family=Montserrat|Open+Sans|Roboto" rel="stylesheet">
            <link href="https://fonts.googleapis.com/css?family=Berkshire+Swash" rel="stylesheet">

        </head>


        <body>


            <div id="box1">
                <!-- particles.js container -->
                <div id="particles-js"></div>
                <!-- stats - count particles -->
                <!--<div class="count-particles"> 
			 <span class="js-count-particles">--</span> 
		 </div>  particles.js lib - https://github.com/VincentGarreau/particles.js -->
                <div class="container animation-element">
                    <nav class="navbar navbar-default" role="navigation">
                        <div class="container">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                                <a class="hidden navbar-brand" href="#logo"> <img src="images/grey2.png" alt = ""> </a>
                            </div>
                            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                                <ul class="nav navbar-nav navbar-right">
                                    <li class="active"><a href="#">Home </a></li>
                                    <li><a href="#" class="bio">About</a></li>
                                    <!--<li><a  href = "#" class = "serv">Link</a></li>-->
                                    <li><a href=".contact" class="contact">Contact</a></li>

                                </ul>
                            </div>
                        </div>
                    </nav>
                    <div class="row">
                        <div class="intro">
                            <h1>Shipay</h1>
                            <button class="bttn-unite bttn-md bttn-primary" type="button" data-toggle="modal" data-target="#login">Login</button>
                            <button class="bttn-unite bttn-md bttn-primary" type="button" data-toggle="modal" data-target="#signup">Sign Up</button>
                            <!-- Add Rave API -->
                            <!--<a class="flwpug_getpaid" data-PBFPubKey="FLWPUBK-adbe8e21cca6983ea92d340093783d76-X" data-txref="rave-checkout-1520594072" data-amount="" data-customer_email="user@example.com" data-currency = "GHS" data-pay_button_text = "" data-country="GH" data-custom_title = "Shiipay" data-custom_description = "" data-redirect_url = "" data-custom_logo = "" data-payment_method = "both" data-exclude_banks=""></a> -->
                        </div>
                    </div>
                </div>
            </div>
            <div id="box2">
                <div class="content">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-6 text-center animation-element">
                                <h2><strong>Safe Delivery</strong></h2>
                                <p>We offer safe and secure delivery of your shipments </p>
								<a type="button" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="bottom" title="We take care of the shipment of your goods as well as clearing of the goods when
					  they arrive. In addition to this, we offer door-to-door delivery or a pickup from our office">Learn More</a>

                                <!--<button type="button" class="btn btn-info btn-sm">Info Button</button>
					  <button type="button" class="btn btn-success btn-sm">Success Button</button>-->
                            </div>
                            <div class="text-center col-sm-6 animation-element">
                                <h2><strong>Card &amp; Mobile Money Payments</strong></h2>
                                <p>We employ Rave by flutterwave to allow mobile money deposits.</p>
                                <a type="button" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="bottom" title="We employ the sophisticated API of rave by flutterwave which accepts both card and mobile money payments accross MTN, Tigo and Vodafone for a smooth and easy payment">Learn More</a>
								<!--<span class="label label-warning">Info Label</span><span class="label label-danger">Danger Label</span> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="box3">
                <div class="container animation-element">
                    <div class="row">
                        <h3>Contact Us</h3>
                        <div class="col-sm-6  ">
                            <p>For More information, please contact us via:</p><br>
                            <img src="https://png.icons8.com/ios/50/000000/marker-filled.png">
                            <p>2 Otele Avenue,</p>
                            <p>Ambassadorial Enclave,</p>
                            <p>East Legon,</p>
                            <p>Accra-Ghana</p>
                            <img src="images/call.svg">
                            <p>0302 251 2033</p>
                            <img src="images/mail.svg">
                            <p>info@excellaws.com</p>
                        </div>
                        <div class="col-sm-6 ">
                            <form method="post" action="contact.php">
                                <!--Add Name -->
                                <div class="form-group ">
                                    <label for="fname" class="col-sm-3 col-form-label">First Name</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="messname" id="" placeholder="Enter your full name" required/>
                                    </div>
                                </div>

                                <!--Add Email -->
                                <div class="form-group">
                                    <label for="phone" class="col-sm-3 col-form-label">Email</label>
                                    <div class="col-sm-8">
                                        <input type="email" class="form-control" name="messemail" id="" placeholder="Enter your email address" required/>
                                    </div>
                                </div>

                                <!-- Input Message -->
                                <div class="form-group ">
                                    <label for="message" class="col-sm-3 col-form-label">Message</label>
                                    <div class="col-sm-8">
                                        <textarea class="form-control" name="message" rows="8" id="message" placeholder="Message"></textarea>
                                    </div>
                                </div>
								<input type="submit" value="send message" name="send"/>


                            </form>
                        </div>



                    </div>
                </div>

            </div>

			<!-- Login forms -->
            <div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="login" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="modal-title" id="exampleModalLabel">Welcome back!</h3>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
                        </div>
                        <div class="modal-body">
                            <form method="post" >
                                <!-- Input Email -->
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" id="inputEmail" placeholder="email@example.com" name="email" required />
                                    </div>
                                </div>
                                <!-- Input Password -->
                                <div class="form-group row">
                                    <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                                    <div class="col-sm-10">
                                        <input type="password" class="form-control" id="loginPassword" placeholder="Password" name="password" required/>
                                    </div>
                                </div>

                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" name="login" class="btn btn-primary">Log in</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>

			
			
			<!-- Signup Forms -->
            <div class="modal fade" id="signup" tabindex="-1" role="dialog" aria-labelledby="signup" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="modal-title">Welcome</h3>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
                        </div>


                        <div class="modal-body">
                            <form method="post" name="sign" id="signid" >
                                <!--Add First Name -->
                                <div class="form-group row">
                                    <label for="fname" class="col-sm-2 col-form-label">First Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="fname" id="" placeholder="Enter your first name" required pattern="[A-Z][a-zA-Z -]{1,15}" title="First name must be from letters, dashes, spaces and must not start with dash" />
                                    </div>
                                </div>

                                <!--Add Last Name -->
                                <div class="form-group row">
                                    <label for="" class="col-sm-2 col-form-label">Last Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="lname" id="" placeholder="Enter your last name" required required pattern="[A-Z][a-zA-Z -]{1,15}" title="Last name must be from letters, dashes, spaces and must not start with dash" />
                                    </div>
                                </div>

                                <!--Add Phone Number -->
                                <div class="form-group row">
                                    <label for="phone" class="col-sm-2 col-form-label">Phone Number</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="phone" id="" placeholder="Enter your phone number" required pattern="['+'][1-9]{3} [0-9]{9}" title="Phone number must comply with this mask: +233 123456789"/>
                                    </div>
                                </div>

                                <!--Add Email -->
                                <div class="form-group row">
                                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-10">
                                        <input type="email" name="email" class="form-control" id="addEmail" placeholder="email@example.com" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,5}$" title="Email must comply with this  following order: characters@characters.domain" />
                                    </div>
                                </div>

                                <!-- Add city -->
                                <div class="form-group row">
                                    <label for="city" class="col-sm-2 col-form-label">City</label>
                                    <div class="col-sm-10">
                                        <input name="city" type="text" class="form-control" id="" placeholder="Enter the name of your city" required pattern="[A-Z][a-zA-Z -]{1,50}" title="City must be from letters, dashes, spaces and must not start with dash"/>
                                    </div>
                                </div>


                                <!-- Add password -->
                                <div class="form-group row">
                                    <label for="addPassword" class="col-sm-2 col-form-label">Password</label>
                                    <div class="col-sm-10">
                                        <input type="password" class="form-control" name="addPassword" id="addPassword" placeholder="Password" required pattern ="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" />
                                        <br>

                                    </div>
                                </div>
                                <!--Confirm Password -->
                                <div class="form-group row">
                                    <label for="confirmPassword" class="col-sm-2 col-form-label">Confirm Password</label>
                                    <div class="col-sm-10">
                                        <input type="password" name="confirmPassword" class="form-control" id="confirmPassword" placeholder="Confirm Password" required oninput="check(this)"/>
                                    </div>
                                </div>

							<script language='javascript' type='text/javascript'>
								function check(input) {
									if (input.value != document.getElementById('addPassword').value) {
										input.setCustomValidity('Password Must be Matching.');
									} else {
										// input is valid -- reset the error message
										input.setCustomValidity('');
									}
								}
							</script>


                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" name="save" class="btn btn-primary">Sign Up</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <script src="js/jquery.min.js"></script>
                <script src="js/bootstrap.js"></script>
                <script src="js/particles.js"></script>
                <!-- stats.js lib -->
                <script src="js/stats.js"></script>
                <script src="js/script.js"></script>
                <!-- Rave API javascript -->
                <script type="text/javascript" src="https://api.ravepay.co/flwv3-pug/getpaidx/api/flwpbf-inline.js"></script>

        </body>

        </html>
