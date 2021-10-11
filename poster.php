<?php
//connect to the server and target the database name
$conDB = mysqli_connect("localhost","root","","choirdb");

//check if the connection is sucessfull
if ($conDB) {
	//echo "connected";
}else {
	//echo " not connected to database";
}
//create empty variable
$texterr = "";
$text = "";

//check if the submit button have been clicked or submited
if (isset($_POST["submit"])) {

//get the image file name
	$image = pathinfo($_FILES['picture']['name'], PATHINFO_FILENAME);

//create the destination of the image to be uploaded
	$target = "imageTable/".basename($image);

//get all the user inputs
	$text = $_POST["text"];
	$date = date("d-m-y");

//check if the text area is empty
if (empty($text) || strlen($text) < 10) {
	//if ture
	echo "<script> alert('empty post or your character is less than ten character!'); </script>";
}else {
	// if false

	if (!preg_match("/^[A-Z\d ]+$/i", $_POST['text'])) {

		$texterr = "only letters and white space allowed";
	}else {
	$text = $_POST['text'];
		// code...

//create array for the image file extension
$extensionArr = array('jpg','jpeg','png','gif');

//get image extension
$getImageExtension = pathinfo($_FILES['picture']['name'], PATHINFO_EXTENSION);

//check if the image extension is the image extension array
if (in_array($getImageExtension,$extensionArr)) {

	//insert the user input data into the table in the database
		$insertdata = "INSERT INTO choirpost (image, note, date) VALUES ('$image', '$text', '$date')";

	//run the mysql query
		$query = mysqli_query($conDB, $insertdata);

	//check if the query is sucessfull
		if (!$query) {
			//alert is ture
			echo "<script> alert('There was an error!'); </script>";
		}else {
			//alert if false
			//echo "<script> alert('sucessfully inserted!'); </script>";
		}

	//move the image file the destination
		if (move_uploaded_file($_FILES['picture']['tmp_name'], $target)) {

		  //echo "<script> alert('sucessfully added into the image folder!'); </script>";
		}else {
			//if false alert the user
			echo "<script> alert('an error occur while trying to add image to the folder!'); </script>";
		}

}else {
	// if false alert the user
	echo "<script> alert('your image is empty or file extension is invaild!'); </script>";
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
	<link rel="stylesheet" href="mediaquery.css">
	<title>poster/page/Blog</title>
	<style type="text/css">
		#form{
			width: 80%;
			margin-left: 5%;
			font-weight: bold;
			font-size: 150%;
		}
		#text-space-container{
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
		#spanerror{
			color: red;
			font-size: 20px;
		}
	</style>
</head>
<body>
<?php include "header.php";?>
<br>

<p id="WelcomeText">Welcome to Immaculate Heart of Mary Choir poster page!</p>

<hr>
<div id="form-holder">
	<p id = 'p'>Publish Your Blog Post Here!!</p>
<form method="post" action="poster.php" enctype="multipart/form-data" id="form">
Choose Image:<br>
	<input type="file" name="picture" id="uploadfile"><br>
	<textarea name="text" id="text-space-container"></textarea><br>
	<span id="spanerror"><?php echo $texterr; ?></span><br>
	<p id="note">NOTE: All post will be apporved by the [admin of the site] before it will display in the timeline page, Thank you!</p>
	<input type="submit" name="submit" value="Upload" id="btu-submit">
</form>
<br>
</div>

<?php include "footer.php";?>
</body>
</html>
