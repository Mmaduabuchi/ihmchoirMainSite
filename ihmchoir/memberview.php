<?php
//connect to server
$connectToServer = mysqli_connect("localhost","root","","choirdb");

$imageErr = $nameErr = $textErr = "";

if (isset($_POST['submit'])) {

	$image = pathinfo($_FILES['picture']['name'], PATHINFO_FILENAME);
	$name = $_POST['username'];
	$text = $_POST['textarea'];
	$date = date('d-m-y');
	$target = "imageTable/".basename($image);

	if (empty($image)) {

	  $imageErr = "your image file is empty";
	}else{

		if (empty($name) || strlen($name) < 3) {
			$nameErr = "your name is empty or is lessthan three characters";
		}else {

			if (!preg_match("/^[A-Z\d ]+$/i", $name)){
				$nameErr = "only letters and white space allowed";
			}else {

				if (empty($text) || strlen($text) < 10) {
					$textErr = "your post is empty or is lessthan ten characters";
				}else {

					if (!preg_match("/^[A-Z\d ]+$/i", $text)){
						$textErr = "only letters and white space allowed";
					}else {

						$arrExtension = array("jpg", "jpeg", "png", "gif");
						$imageExtension = pathinfo($_FILES['picture']['name'], PATHINFO_EXTENSION);

						if (in_array($imageExtension, $arrExtension)) {

							$set = "INSERT INTO reviews (image, name, note, date) VALUES ('$image', '$name', '$text', '$date')";

							if (!mysqli_query($connectToServer, $set)) {

								echo "<script> alert('an error occur!');</script>";
							}else{

								if (move_uploaded_file($_FILES['picture']['tmp_name'], $target)) {
								 // echo "<script> alert('sucessfully added into the image folder!'); </script>";
								}else {

									echo "<script> alert('an error occur while trying to add image to the folder!'); </script>";
								}
						}
					}else {

							$imageErr = "your file extension is invalid try to upload a file with (jpg, jpeg, png, gif) extension";
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
	<title>member reviwes</title>
	<style type="text/css">
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
	.whatwedo{
		text-align: center;
		font-weight: bold;
		font-family: lato;
		font-size: 30px;
	}
	.side-show{
		background: rgba(0, 0, 0, 0.5);
		color: white;
		padding: 0.5rem;
		margin-top: 5%;
		margin-left: -1%;
		margin-right: -0.5%;
	}
	#textUp{
		text-align: center;
		font-weight: bold;
		font-family: cursive;
	}
	.inputImageFile{
		font-size: 1rem;
	}
	.submitBtu{
		padding: 1rem;
		text-align: center;
		background: green;
		color: white;
		width: 97%;
		cursor: pointer;
		border: none;
		font-weight: bold;
		border-radius: 0.3rem;
	}
	.form-holder-post{
		font-weight: bold;
		font-size: 1rem;
	}
	.usernameinput{
		padding: 1.5rem;
		border: none;
		background: rgba(0, 0, 0, 0.1);
		border-left: 4px solid green;
		color: black;
		font-weight: bold;
		width: 88%;
	}
	.form-container{
		border-right: 6px solid green;
		width: 40%;
		display: inline-block;
	}
	.side-bar-img-div{
		display: inline-block;
		width: 40%;
		margin-left: 10%;
	}
	#side-bar-img{
		width: 100%;
	}
	.textarea{
		margin-top: 2%;
		border: none;
		background: rgba(0, 0, 0, 0.1);
		border-left: 6px solid green;
	}
	#errMessage{
		color: red;
		font-size: 1rem;
		font-weight: bold;
	}
	#membersImage{
		width: 20%;
		item-align: center;
	}
	.member-img-div{
		margin-top: 3%;
		background: rgba(0, 0, 0, 0.1);
	}
	.post-div-holder{
		background: rgba(0, 0, 0, 0.2);
		padding: 1rem;
	}
	.time-holder{
		background: rgba(0, 0, 0, 0.3);
		padding: 1rem;
	}


</style>
</head>
<body>
<?php include "header.php";?>

<div class="side-show">
<p class="whatwedo">Members Reviews Page</p>
</div>
<div class="member-reviews-container">

<?php

//select the user review post and display it.
$selectToDiaplay = "SELECT * FROM reviews";

//run the mysql query
$runMysqlquery = mysqli_query($connectToServer, $selectToDiaplay);

//check the query result
if (!$runMysqlquery) {
	// if false
	echo "table not selected";
}else {

	while ($fetchAsArray = mysqli_fetch_array($runMysqlquery)) {
		echo "<div class = 'member-img-div'>";
		echo "<div class = 'time-holder'>
		<b> Posted no: ".$fetchAsArray['date']." By: ".$fetchAsArray['name']."</b>";
		echo "</div>";
		echo "<img src = imageTable/" . $fetchAsArray['image'] . " id = 'membersImage'> <br>";
		echo "<div class = 'post-div-holder'>";
		echo "<b>".$fetchAsArray['note']."</b>";
		echo "</div>";
		echo "</div>";
	}
}

 ?>

</div>
<hr>
<div class="form-container">

<form class="from-holder-post" method="post" action="memberview.php" enctype="multipart/form-data">
<p id='textUp'>write your review here and add your image</p>
choose your image:<br>
<input type="file" name="picture" class="inputImageFile" required><br>
<span id="errMessage"><?php echo $imageErr; ?></span>
<br>
<input type="text" name="username" class="usernameinput" placeholder="Enter your name" required><br>
<span id="errMessage"><?php echo $nameErr; ?></span>
<br>
<textarea name="textarea" rows="12" class="textarea" cols="70"></textarea><br>
<span id="errMessage"><?php echo $textErr; ?></span>
<br>
<input type="submit" name="submit" class="submitBtu" value="Post">
</form>

</div>
<div class="side-bar-img-div">
	<img src="images/all3.jpg" id="side-bar-img">
</div>
<div class="side-show">
<p class="whatwedo">what we do matters</p>
</div>

<div class="side-text">
<p>dnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnndnnnnnnnnnnnnnnnnnnnnnnnnnnnn
	nnnnnnnnnnnndnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnndnnnnnnnnnnnnnnnnnn
	nnnnnnnnnnnnnnnnnnnnnndnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnndnnnnnnnnnn
	nnnnnnnnnnnnnnnnnnnnnnnnnnnnnndnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnndnnnn
	nnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnndnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnn
	ndnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnn</p>
</div>

<div class="side-text2">
<p>dnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnndnnnnnnnnnnnnnnnnnnnnnnnnnnnn
	nnnnnnnnnnnndnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnndnnnnnnnnnnnnnnnnnn
	nnnnnnnnnnnnnnnnnnnnnndnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnndnnnnnnnnnn
	nnnnnnnnnnnnnnnnnnnnnnnnnnnnnndnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnndnnnn
	nnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnndnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnn
	ndnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnn</p>
</div>

<div class="side-text">
<p>dnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnndnnnnnnnnnnnnnnnnnnnnnnnnnnnn
	nnnnnnnnnnnndnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnndnnnnnnnnnnnnnnnnnn
	nnnnnnnnnnnnnnnnnnnnnndnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnndnnnnnnnnnn
	nnnnnnnnnnnnnnnnnnnnnnnnnnnnnndnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnndnnnn
	nnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnndnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnn
	ndnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnn</p>
</div>

<?php include "footer.php";?>
</body>
</html>
