<?php
//connet to the server
$conn = mysqli_connect("localhost", "root", "", "choirdb");

//empty error variables
$nameErr = $emailErr = $commentErr = $connErr = "";

//empty success variables
$success = "";

if (!$conn) {
	echo "Connection_aborted";
}else {
	if (isset($_POST['submit'])) {

		//get the users details
		$name = $_POST['name'];
		$email = $_POST['email'];
		$comment = $_POST['comment'];

		//create a time and date
		$time = date("h:i:sa");
		$date = date("M/d/y");

		//validate the users details
		if (empty($name)) {
			$nameErr = "Enter Your Name";
		}else {
			if (empty($email)) {
				$emailErr = "Enter Your Email";
			}else {
				if (empty($comment)) {
					$commentErr = "We need your comment as we use it for your feedback to us thanks and God bless your";
				}else {
					if (is_numeric($name)) {
						$nameErr = "Your name can only contain strings characters";
					}else {
						$inset = "INSERT INTO comments (name, email, comment, time, date) VALUES ('$name', '$email', '$comment', '$time', '$date')";
						if (!mysqli_query($conn, $inset)) {
							$connErr = "an error occured";
						}else {
							$success = "Successfully added";
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
		<meta name="description" content="you are welcome to Immaculate Heart Choir, a home for all">
		<link rel="stylesheet" href="media.css">
		<title>ihmchoir.com</title>
		<style type="text/css">
			#body-div-holder{
				background: url('images/wed.jpg');
				background-size: cover;
				margin-bottom: 5%;
				margin-top: 5%;
			}
			#cover-other{
				background-color: rgba(0,0,0,0.8);
				padding: 1rem;
			}
			#body-div-holder-other{
				background: url("images/all.jpg");
				background-size: cover;
				margin: 0%;
			}
			#body-div-holder-other-cover{
				background-color: rgba(0,0,0,0.8);
				color: white;
				padding: 1rem;
			}
			body{
				background-color: white;
			}
			#des{
				text-align: center;
				font-size: 200%;
				font-weight: bold;
				color: white;
			}
			#des2{
				font-size: 150%;
				color: white;
			}
			#li{
				color: white;
				font-weight: bold;
				font-size: 250%;
			}
			#ul-li-div{
				display: inline-block;
				border: 2px solid;
				font-size: 60%;
				border: none;
			}
			#tell-us{
				font-size: 200%;
				font-weight: bold;
				text-align: center;
				color: white;
			}
			#join{
				border: 3px solid white;
				padding: 0.5rem;
				color: lightblue;
				font-weight: bold;
				text-align: center;
				width: 30%;
				border-radius: 0.5rem;
				margin-left: 33%;
			}
			#join:hover{
				background-color: white;
				transition-duration: 1s;
			}
			#big-image{
				width: 100%
			}
			#cover{
				background-color: rgba(0,0,0,0.8);
				padding: 0%;
				padding: 1rem;
			}
			#body-div-holder2{
				background: url('images/all3.jpg');
				background-size: cover;
				margin-top: 5%;
			}
			.comment-container{
				background: rgba(0,0,0,0.1);
			}
		</style>
	</head>
	<body class="container-fluid">
		<?php include "header.php"; ?>

		<div id="body-div-holder">
			<div id="cover-other">
				<p id="des">Discovering the world Latest Catholic Church Choir Platform!!!</p>
				<p id="des2">Experience Immaculate Heart Of Mary Chior for yourself Today, We are happy to see you (stay with us..)!!</p>
			</div>
		</div>

		<div id="body-div-holder-other">
			<div id="body-div-holder-other-cover">
				<p id="des">Why Join Immaculate Heart Of Mary Chior?</p>
				<p id="des2">Immaculate Heart Chior is impacting lives positively and in credibly up and down the country with its unique formula that change lives!</p>

				<div id="ul-li-div">
					<li id="li">An award-winning contemporary chior experience!.</li>
					<li id="li">Exciting and emotional.</li>
					<li id="li">Life affirming events.</li>
					<li id="li">Engage with your commnuity.</li>
					<li id="li">Support charities.</li>
				</div>
				<div id="ul-li-div">
					<li id="li">Build new friendships.</li>
					<li id="li">Enjoy a fresh understanding of music.</li>
					<li id="li">Gain new vocal skills.</li>
					<li id="li">Increase your personal confidence.</li>
					<li id="li">Enjoy a healthy and active hobby.</li>
					<li id="li">Attend local weekly rehearsals, events and performances.</li>
				</div>
			</div>
		</div>

		<div id="body-div-holder2">
			<div id="cover">
				<p id="tell-us">Do you simply love to sing?</p>
				<p id="tell-us">We can't wait to see you!</p>
				<button class='btn btn-primary w-100 p-3'>
					<a href="contact.php" class='text-light text-center'>Find us here!</a>
				</button>
				
			</div>
		</div>

		<div class="row mt-5 p-3 comment-container">
			<div class="col-12">
				<p class="text-center comment-text">What did you say about us add your comment below.</p>
			</div>
			<div class="col-12 text-center text-success">
				<?php echo $success; ?>
			</div>
			<div class="col-12 text-center text-danger">
				<?php echo $connErr; ?>
			</div>
			<div class="col">
				<form action="index.php" method="post">
					<span class="text-warning">
						<?php echo $nameErr; ?>
					</span>
					<br>
					<input type="text" name="name" class="form-control p-3" placeholder="Name:">
					<span class="text-warning">
						<?php echo $emailErr; ?>
					</span>
					<br>
					<input type="email" name="email" class="form-control p-3 mt-2" placeholder="Email:">
					<span class="text-warning">
						<?php echo $commentErr; ?>
					</span>
					<br>
					<textarea name="comment" id="" cols="30" rows="10" class="mt-2 form-control"></textarea>
					<input type="submit" value="Comment" name="submit" class="btn btn-primary mt-3 w-100 p-3">
				</form>
			</div>
		</div>

		<div class="row mt-5 mb-2 p-2 comment-container">
			<div class="col-12 bg-light">
				<?php
					//fetch users comments from the database
					$fetchDate = "SELECT * FROM comments";
					//execute query
					$exe = mysqli_query($conn, $fetchDate);
					//display data fetched
					while ($dataComments = mysqli_fetch_array($exe)) {
						echo "
							<div class='row'>
								<div class='col-12 col-lg-6'>
									<div class='row'>
										<div class='col-12'><b>Name: </b>". $dataComments['name'] ."</div>
										<div class='col-12'><b>Comment: </b>". $dataComments['comment'] ."</div>								
										<div class='col'><b>Time: </b>". $dataComments['time'] ."</div>
										<div class='col'><b>Date: </b>". $dataComments['date'] ."</div>
										<hr>									
									</div>
								</div>
								<div class='col-3 d-none d-lg-block'></div>
								<div class='col-3 d-none d-lg-block'></div>
							</div>
							<br>
						";
					}
				?>
			</div>
		</div>

		<script>
			window.onload = ()=>{
				alert("Sing praises To De LORD!");
			}
		</script>

		<?php include "footer.php"; ?>

	</body>
</html>
