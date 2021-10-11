<?php
//connect to server an target database
$connection = mysqli_connect("localhost","root","","choirdb");

//check if there is an id
if (isset($_GET['id'])) {

	$getid = $_GET['id'];
	$getidentifer = $_GET['identifer'];

if ($getidentifer == "delete") {
	// code...
	$sel = "DELETE FROM choirpost WHERE id = '$getid'";
	$selqurey = mysqli_query($connection, $sel);

	if (!$selqurey) {
		echo "<script> alert('an error occur!')</script>";
	}else {
		echo "<script> alert('successfully Deleted!')</script>";
	}

}elseif ($getidentifer == "approve") {
	// code...

	 $sel = "SELECT * FROM choirpost WHERE id = '$getid'";

	$selqurey = mysqli_query($connection, $sel);

	if (!$selqurey) {
	//if an error occur alert
		echo "<script> alert('an error occur!')</script>";

	}else {
		//get data as array

		$arr = mysqli_fetch_assoc($selqurey);

		//holder array data
		$image = $arr['image'];
		$note = $arr['note'];
		$date = $arr['date'];

		//insert into table
		$insert = "INSERT INTO approve (image,note,date) VALUES ('$image','$note','$date')";

		//run query
		$insertQurey = mysqli_query($connection, $insert);

		//check qurey
		if (!$insertQurey) {
			// if not ture
			echo "<script> alert('an error occur while inserting data!')</script>";
		}else {
			// if ture
			echo "<script> alert('Post have been sucessfully approved!')</script>";
		}
 //}
	}
}

}
 ?>
<!DOCTYPE html>
<html lang="en-us">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<meta name="keyword" content="HTML,CSS,PHP,javascript,Mysql">
	<link rel="stylesheet" href="media.css">
	<title>Admin's page</title>
	<style type="text/css">

  .first-text{
    text-align: center;
    font-weight: bold;
    font-family: lato;
    color: white;
  }
  .text-holder{
    background: rgba(0, 0, 0, 0.6);
    margin-left: -1%;
    margin-right: -0.5%;
    margin-top: 3%;
    padding: 1rem;
  }
  .post-container{
    padding: 3rem;
    box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.5);
    border-left: 6px solid rgba(0, 0, 0, 1);
    background: rgba(0, 0, 0, 0.1);
  }
  #div-post{
    background: rgba(0,0,0,0.7);
    color: white;
    padding: 1rem;
    font-weight: bold;
    font-family: lato;
    cursor: pointer;
  }
  #div-post-details{
    border-left: 3px solid rgba(0,0,0,0.5);
    font-weight: bold;
    background: rgba(0, 0, 0, 0.2);
    margin-left: 5%;
    padding: 1rem;
    margin-bottom: 3%;
    cursor: pointer;
  }
	#dbimages{
		width: 50%;
	}
	#divdata{
		width: 40%;
		float: left;
	}
	#divdata2{
		width: 40%;
		float: right;
		color: black;
		font-weight: bolder;
	}
	#main-div-container{
		border: none;
		height: 200px;
		background: rgba(0, 0, 0, 0.1);
		border-left: 6px solid rgba(0, 0, 0, 0.5);
		margin-bottom: 2%;
	}
	#button{
		border-radius: 0.2rem;
		padding: 0.5rem;
		background-color: green;
		color: white;
		text-align: center;
		font-weight: bold;
		cursor: pointer;
	}
	#addpostlink{
		text-decoration: none;
		margin-top: 2%;
		float: right;
		color: white;
	}
	#plink{
		font-weight: bold;
		background: rgba(0, 0, 0, 0.5);
		padding: 0.5rem;
		border-radius: 0.2rem;
		cursor: pointer;
	}
	#plink:hover{
		background: rgba(0, 0, 0, 0.3);
		color: rgba(0, 0, 0, 0.5);
	}

  </style>
</head>
<body>
<?php include "header.php";?>
<a href="poster.php" id = "addpostlink"><p id = "plink">Add Post<p></a>
	<br><br>
<div class="text-holder">
  <h1 class="first-text">Immaculate Heart of Mary Choir, DataBase for members post!</h1>
</div>

<div class="post-container">
<?php
//select a database table
$selectTable2  = "SELECT * FROM choirpost";
//run qurey
$runqurey = mysqli_query($connection,$selectTable2);
//check qurey
if (!$runqurey) {
	echo "an error occur!";
}else {
	while ($arrdata = mysqli_fetch_array($runqurey)) {
	echo "<div id = main-div-container>";
		echo '<div id = divdata>

		<img src = imageTable/'.$arrdata['image'].' id = dbimages> <br>

		</div>
		<div id = divdata2>

		<span>'.$arrdata['note'].'<span>

		</div>
		<a href = admin.php?id='.$arrdata['id'].'&identifer=approve><button id = button>Approve</button></a>
		<a href = admin.php?id='.$arrdata['id'].'&identifer=delete><button id = button>Delect</button></a>';

	echo "</div>";
	}
}

 ?>
</div>

<div class="text-holder">
  <h1 class="first-text">Immaculate Heart of Mary Choir, DataBase for Registered user's!</h1>
</div>

<div class="post-container">
<?php

//select a table
$selectTable = "SELECT * FROM users";

//run mysql $query
$solve = mysqli_query($connection,$selectTable);

//check it
if (!$solve) {
  //if false alert.
  echo "<script> alert('an error occur!'); </script>";
}else {
  //if ture alert.
  while ($getDataArr = mysqli_fetch_array($solve)){

    echo "<div id='div-post'>";
    echo "Email: ".$getDataArr["email"];
    echo "</div>";
    echo "<div id='div-post-details'>";
    echo "<p class='ptext'> FirstName: ".$getDataArr["firstname"]."</p>";
    echo "<p class='ptext'> SurName: ".$getDataArr["surname"]."</p>";
    echo "<p class='ptext'> State: ".$getDataArr["state"]."</p>";
    echo "<p class='ptext'> Number: ".$getDataArr["number"]."</p>";
    echo "<p class='ptext'> Country: ".$getDataArr["country"]."</p>";
    echo "</div>";

  }
}

 ?>
</div>
<?php include "footer.php";?>
</body>
</html>
