<!DOCTYPE html>
<html lang="en-us">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<meta name="keyword" content="HTML,CSS,PHP,javascript">
	<link rel="stylesheet" href="mediaquery.css">
	<title>timeline us</title>
	<style type="text/css">
		#form{
			width: 80%;
			margin-left: 5%;
			font-weight: bold;
			font-size: 150%;
		}
		#text{
			width: 80%;
			height: 250px;
			border: none;
			border-left: 4px solid green;
			margin-top: 5%;
			margin-bottom: 5%;
			background: rgba(0,0,0,0.1);
			border-radius: 0.5rem;
		}
		#btu-submit{
			width: 80%;
			border: none;
			padding: 1rem;
			color: white;
			font-weight: bold;
			background-color: green;
			border-radius: 0.2rem;
		}
		#btu-submit:hover{
			cursor: pointer;
		}
		#p{
			text-align: center;
			font-weight: bold;
			font-size: 150%;
		}
		#form-holder{
			border: 2px solid black;
			border: none;
			box-shadow: 2px 2px 10px rgba(0,0,0,0.5);
		}
		#uploadfile{
			font-weight: bold;
		}
		#note{
			font-weight: bold;
			font-family: lato;
			font-size: 20px;
		}
		#WelcomeText{
			text-align: center;
			font-weight: bold;
			font-family: lato;
			font-size: 25px;
		}
		#dbImage{
			width: 40%;
			height: 300px;
		}
		#div-post-holder{
			border: none;
			border-radius: 0rem 0rem 1rem 1rem;
			background: rgba(0, 0, 0, 0.1);
			margin-bottom: 5%;
		}
		#div-date-holder{
			text-align: center;
			font-weight: bold;
			font-family: lato;
			background: rgba(0,0,0,0.5);
			border: none;
			padding: 1rem;
			color: white;
		}
	</style>
</head>
<body>
<?php include "header.php";?>
<br>
<p id="WelcomeText">Welcome to Immaculate Heart of Mary Choir Timeline!</p>
<div class="post-holder">

	<?php

	//connect to server and traget database name
	$conDB = mysqli_connect("localhost","root","","choirdb");

	//select all data from database table
	$selectdata = "SELECT * FROM approve";

//run the mysql query
	$runQuery = mysqli_query($conDB, $selectdata);

	if (!$runQuery) {
		// if fale alert
		echo "<script> alert('not selected'); </script>";
	}else {
		// if ture alert

//check if the data in the table is greaterthan zero
while ($getData = mysqli_fetch_array($runQuery)) {

//display the data inside the array
echo "<div id='div-post-holder'>";
  echo "<div id='div-date-holder'>posted on: ".$getData['date']."</div>";
	echo "<img src= imageTable/". $getData['image'] ." id='dbImage'>";
	echo "<h2 id = 'noteDB'>". $getData['note'] ."</h2>";
echo "</div>";
}
}

	?>

</div>

<?php include "footer.php";?>
</body>
</html>
