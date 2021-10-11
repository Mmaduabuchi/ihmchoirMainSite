<?php

	//connect to the server
	// $connection = mysqli_connect("localhost","id16551946_choir","9ft-{w2ADg+>0xBh","id16551946_choirdb");
	$connection = mysqli_connect("localhost","root","","choirdb");

	//check server connection
	if (!$connection) {
		echo "failed to connect to the server";
	}

	//create an empty varliable
	$firstnameErr = $surnameErr = $emailErr = $stateErr = $numberErr = $countryErr = "";
	$firstname = $surname = $email = $state = $number = $country = "";

	//check if the form have been submited
	if ($_SERVER['REQUEST_METHOD'] == "POST") {

	//get user email
	$email = $_POST['email'];

	//check table email
	$select = "SELECT * FROM users WHERE email = '$email'";

	//run mysql query
	$queryrun = mysqli_query($connection, $select);

	//count if the email entered by the user exists
	$count = mysqli_num_rows($queryrun);

	//check if it exists
	if ($count > 0) {
		//display if exists
		$emailErr = "Email Already exists";
	}else {
		// check all input fields


	//validate the firstname
		if (empty($_POST['firstname'])) {
			$firstnameErr = "your FirstName is empty";
		}else{

			if (!preg_match("/^[A-Z\d]+$/i", $_POST['firstname'])) {
				$firstnameErr = "only letters and white space allowed";
			}else {
			$firstname = $_POST['firstname'];


			//validate the surname
				if (empty($_POST['surname'])) {
					$surnameErr = "your SurName is empty";
				}else{

					if (!preg_match("/^[A-Z\d]+$/i", $_POST['surname'])) {
						$surnameErr = "only letters and white space allowed";
					}
					else {
						$surname = $_POST['surname'];


						//validate the email
							if (empty($_POST['email'])) {
								$emailErr = "your FirstName is empty";
							}else{

								if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
									$emailErr = "Invalid email format";
								}else {
									$email = $_POST['email'];


									//validate the state
										if (empty($_POST['state'])) {
											$stateErr = "your State is empty";
										}else{

											if (!preg_match("/^[A-Z\d]+$/i", $_POST['state'])) {
												$stateErr = "only letters and white space allowed";
											}
											else {
												$state = $_POST['state'];


												//validate the number
													if (empty($_POST['number'])) {
														$numberErr = "your number is empty";
													}else{
														$number = $_POST['number'];


														//validate the country
															if (empty($_POST['country'])) {
																$countryErr = "your Country is empty";
															}else{

																if (!preg_match("/^[A-Z\d]+$/i", $_POST['country'])) {

																	$countryErr = "only letters and white space allowed";
																}else {
																	$country = $_POST['country'];


																	$insertdata = "INSERT INTO users (firstname,surname,email,state,number,country) VALUES ('$firstname','$surname','$email','$state','$number','$country')";

																	$query = mysqli_query($connection,$insertdata);

																	if (!$query) {
																		echo "<script> alert('not inserted!'); </script>";
																	}else {
																		echo "<script> alert('You have successfully registered, and an email was just send to you now, go and check it out for more equries, Thank you!!'); </script>";
																	}

																}
															}

													}

											}
										}

								}
							}

					}
				}

			}

			}
		}



	}


?>

<!DOCTYPE html>
<html lang="en-us">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<meta name="keyword" content="HTML,CSS,PHP,javascript">
		<title>join @ ihmchoir.com</title>
		<style type="text/css">
			.form{
				margin-top: 5%;
				padding: 1rem;
				border-right: 4px solid rgba(0, 0, 0, 0.6);
			}
			.input{
				border: none;
				border-left: 6px solid green;
				padding: 1rem;
				border-radius: 0.2rem;
				margin-bottom: 2%;
				color: black;
				background: rgba(0,0,0,0.1);
				width: 50%;
				cursor: pointer;
				margin-top: 5%;
			}
			#submit{
				border: none;
				border-radius: 0.2rem;
				background: green;
				color: black;
				font-weight: bold;
				text-align: center;
				padding: 0.5rem;
				cursor: pointer;
				width: 30%;
				margin-top: 5%;
			}
			#link{
				color: green;
				margin-left: 1%;
				border: none;
				cursor: pointer;
				font-weight: bold;
				text-decoration: none;
			}
			#pp{
				font-weight: bold;
			}
			.side_bar_div_1{
				border: none;
				border-top: 6px solid green;
				width: 40%;
				display: inline-block;
				background: rgba(0,0,0,0.1);
				box-shadow: 1px 1px 15px 2px grey;
				margin-left: 10%;
				margin-top: 10%;
				padding: 3rem;
			}
			.side-text{
				margin-top: 10%;
				background: rgba(0, 0, 0, 0.1);
				border-right: 4px solid rgba(0, 0, 0, 0.5);
				width: 40%;
				margin-left: 40%;
				padding: 1.5rem;
				overflow: auto;
			}
			.side-text2{
				margin-top: 10%;
				background: rgba(0, 0, 0, 0.1);
				border-left: 4px solid rgba(0, 0, 0, 0.5);
				width: 40%;
				margin-right: 40%;
				padding: 1.5rem;
				overflow: auto;
			}
			sub{
				color: red;
			}
			.reg-text{
				border-bottom: 4px solid rgba(0, 0, 0, 0.6);
				width: 30%;
				cursor: pointer;
				font-weight: bold;
			}
			.errorMessage{
				color: red;
				font-weight: bold;
				font-family: lato;
			}
		</style>
	</head>
	<body>

		<?php include "header.php"; ?>

		<div class="side_bar_div_1">
			<p class="reg-text">Fill in the form below</p>
			<form class="form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">

				<input type="text" name="firstname" id="firstname" class="input" placeholder="FirstName" required><br>
				<span class="errorMessage"><?php echo $firstnameErr; ?></span>
				<br>
				<input type="text" name="surname" id="surname" class="input" placeholder="SurName" required><br>
				<span class="errorMessage"><?php echo $surnameErr; ?></span>
				<br>
				<input type="email" name="email" id="email" class="input" placeholder="UserName@domail.com" required><br>
				<span class="errorMessage"><?php echo $emailErr; ?></span>
				<br>
				<input type="text" name="state" id="state" class="input" placeholder="State" required><br>
				<span class="errorMessage"><?php echo $stateErr; ?></span>
				<br>
				<input type="number" name="number" id="number" class="input" placeholder="PhoneNo" required><br>
				<span class="errorMessage"><?php echo $numberErr; ?></span>
				<br>
				<input type="text" name="country" id="country" class="input" placeholder="Country" required><br>
				<span class="errorMessage"><?php echo $countryErr; ?></span>
				<br>
				<input type="submit" name="submit" id="submit" value="Register">
			</form>
			<p id="pp">Already have an account <a href="log.php" id="link"> click here! </a></p>
		</div>

		<div class="side-text">
		<p>dnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnndnnnnnnnnnnnnnnnnnnnnnnnnnnnn
			nnnnnnnnnnnndnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnndnnnnnnnnnnnnnnnnnn
			nnnnnnnnnnnnnnnnnnnnnndnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnndnnnnnnnnnn
			nnnnnnnnnnnnnnnnnnnnnnnnnnnnnndnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnndnnnn
			nnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnn</p>
		</div>

		<div class="side-text2">
		<p>dnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnndnnnnnnnnnnnnnnnnnnnnnnnnnnnn
			nnnnnnnnnnnndnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnndnnnnnnnnnnnnnnnnnn
			nnnnnnnnnnnnnnnnnnnnnndnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnndnnnnnnnnnn
			nnnnnnnnnnnnnnnnnnnnnnnnnnnnnndnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnndnnnn
			nnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnndnnnnnn </p>
		</div>

		<div class="side-text">
		<p>dnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnndnnnnnnnnnnnnnnnnnnnnnnnnnnnn
			nnnnnnnnnnnndnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnndnnnnnnnnnnnnnnnnnn
			nnnnnnnnnnnnnnnnnnnnnndnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnndnnnnnnnnnn
			nnnnnnnnnnnnnnnnnnnnnnnnnnnnnndnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnndnnnn
			nnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnndnnn </p>
		</div>

		<?php include "footer.php"; ?>
	</body>
</html>
