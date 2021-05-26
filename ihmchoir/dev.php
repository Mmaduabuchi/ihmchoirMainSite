<!DOCTYPE html>
<html lang="en-us">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<meta name="keyword" content="HTML,CSS,PHP,javascript">
	<title>dev.emma.hack</title>
	<style type="text/css">
	#my-image{
		width: 30%;
		height: 400px;
		clip-path: circle(45%);
	}
	#my-div{
		border: none;
		background-color: rgba(0,0,0,0.2);
		font-weight: bold;
		color: rgba(0,0,0,0.7);
		margin-top: 5%;
	}
.span{
	color: purple;
	cursor: pointer;
}
.h2-dev{
	text-align: center;
	font-weight: bold;
	font-family: lato;
	margin-top: 3%;
}
.mode{
	border: none;
	background: rgba(0,0,0,0.6);
	padding: 0.5rem;
	color: white;
	font-weight: bold;
}
.div-text{
	font-size: 1.5rem;
	border-left: 4px solid rgba(0,0,0,0.5);
	padding-left: 1.5rem;
	margin-left: 5%;
}
</style>
</head>
<body>
<?php include "header.php";?>
<h2 class="h2-dev">Welcome to Mr.Pinnacle Developer's page!</h2>
<div id="my-div">
	<div class="mode">
		<p>Developer mode...</p>
	</div>
	<img src="images/pinnacle.jpg" id="my-image"><br>
	<div class="div-text">
My Name is <span class="span">Ukwe Mmaduabuchi Emmanuel Pinnacle.</span><br>
I am a Member of Immaculate Heart of Mary Choir.<br>
Am a WEB-DEVELOPER/GRAPHICS-DESIGNER..<br>
Tel: +234-81-3282-4987 or +234-90-7276-0907.<br>
Email: Emmanuelukwe1@gmail.com.<br>
WhatsApp-Info: 08132824987.
</div><br>
</div>

<?php include "footer.php";?>
</body>
</html>
