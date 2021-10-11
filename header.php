<!DOCTYPE html>
<html>
<head>
	<title>header</title>
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<link rel="stylesheet" href="./bootstrap/css/bootstrap.css">
	<link rel="stylesheet" href="./bootstrap/js/bootstrap.js">
	<link rel="stylesheet" href="media.css">
	<style type="text/css">
		#h2{
			color: white;
			text-align: center;
			font-weight: bold;
			font-family: lato;
			margin-top: 15%;
			margin-bottom: 15%;
			font-size: 250%;
			text-shadow: 2px 2px 10px rgb(6,117,145);
		}
		#h2:hover{
			cursor: pointer;
		}
		header{
			border: 1px solid rgba(0,0,0,0.8);
			margin: -1%;
			background: url(images/rose.jpeg);
			background-size: cover;
		}
		#head-div{
			border: 1px solid rgba(0,0,0,0.8);
			background-color: rgba(0,0,0,0.8);
		}
		.a{
			color: lightblue;
			font-weight: bold;
			text-decoration: none;
			font-size: 20px;
			margin-left: 10%;

		}
		a:hover{
			cursor: pointer;
			color: rgb(6,117,145);
		}
		#nav-link{
			text-align: center;
			margin: 0%;
			margin-top: 2%;
		}

	</style>
</head>
<body>
	<?php

		echo"
			<header>
				<div  id='head-div'>
					<nav id='nav-link'>
						<a href='index.php' class='a' id='header-link'>Home</a>
						<a href='contact.php' class='a' id='header-link'>Contact</a>
						<a href='about.php' class='a' id='header-link'>About</a>
						<a href='timeline.php' class='a' id='header-link'>Timeline</a>
					</nav>
					<h2 id='h2'>Welcome To <br> Immaculate Heart Of Mary Choir,<br> Emene Enugu  State.</h2>
				</div>
			</header>
		";

	?>
</body>
</html>
