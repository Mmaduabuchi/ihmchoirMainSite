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
			font-size: 150%;
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
</style>
</head>
<body>
<?php include "header.php"; ?>

<div id="body-div-holder">
<div id="cover-other">
	<p id="des">Discovering the world <br/> Latest Catholic Church Choir Platform!!!</p>
	<p id="des2">Experience Immaculate Heart Of Mary Chior for yourself Today, We are happy to see you (stay with us..)!!</p>
</div>
</div>

<div id="body-div-holder-other">
<div id="body-div-holder-other-cover">
<p id="des">Why Join Immaculate <br/> Heart Of Mary Chior?</p>
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
<a href="contact.php" id="find-us-link"><p id="join">Find us here!</p></a>
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
