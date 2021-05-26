<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>footer</title>
	<link rel="stylesheet" href="media.css">
	<style type="text/css">
		footer{
			border: 2px solid black;
			background: url("images/all2.jpg");
			background-size: cover;
			border: none;
			margin: -1%;
			margin-top: 5%;
			margin-bottom: 0%;
		}
		li{
			color: lightblue;
			font-weight: bold;
			margin-top: 5%;
		}

		li:hover{
			color: rgb(6,117,145);
			cursor: pointer;
		}
		#ul{
			width: 35%;
		}
		#last-topic{
			text-align: center;
			color: white;
			font-weight: bold;
		}
		#foot-cover{
			background-color: rgba(0,0,0,0.9);
			padding: 0.5rem;
		}
		#footer-link{
			text-decoration: none;
			color: lightblue;
		}
		#footer-link:hover{
			color: rgb(6,117,145);
		}
	</style>
</head>
<body>
<?php

echo '<footer>';
echo "
<div id='foot-cover'>

<ul id='ul'>
<li><a href='contact.php' id='footer-link'>CONTACT US</a></li>
<li><a href='leader.php' id='footer-link'>LEADERS</a></li>
<li><a href='dev.php' id='footer-link'>DEVELOPER</a></li>
</ul>
<br><br><br>
<ul id='ul'>
<li><a href='memberview.php' id='footer-link'>MEMBER REVIEWS</a></li>
<li><a href='cons.php' id='footer-link'>CONSTITUTION</a></li>
<li><a href='register.php' id='footer-link'>JOIN IHC</a></li>
<li><a href='log.php' id='footer-link'>Am a Member</a></li>
</ul>";

echo "

<p id='last-topic'>@Copyright Immaculate Heart of Mary Chior... " . date("y") . "</p>";

echo "</div>";

echo '</footer>';

?>
</body>
</html>
