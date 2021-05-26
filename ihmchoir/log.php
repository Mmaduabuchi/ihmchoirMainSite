<?php
//connect to server
$conn = mysqli_connect("localhost","root","","choirdb");

//create empty variable
$emailerr = $passworderr = "";

//check the connection
if (!$conn) {
  // if false
  echo "false connection to the server";
}

//check if the form have been posted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  // get user input logges
$email = $_POST['email-log'];
$password = $_POST['password-log'];

//select the database table
$sel = "SELECT * FROM members WHERE email = '$email' AND password = '$password'";

//run query
$queryit = mysqli_query($conn, $sel);
//fetch data as array
$arrdata =  mysqli_fetch_assoc($queryit);


if ($email === $arrdata['email'] && $password === $arrdata['password'] && $arrdata['roles'] == 001) {
  // re-direct to admin page

  header("Location: admin.php");
  exit();
}elseif ($email === $arrdata['email'] && $password === $arrdata['password'] && $arrdata['roles'] == 000) {
  // re-direct to poster page;

  header("Location: poster.php");
  exit();
}else {
  // code...
  $emailerr = "incorrect email";
  $passworderr = "incorrect password";
}


}



 ?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta charset="utf-8">
    <title>log in</title>
    <style media="screen">

    .logIN_form{
  		margin-top: 5%;
      width: 40%;
      margin-left: 15%;
      border-left: 4px solid rgba(0,0,0,0.6);
      padding-left: 1rem;
  	}
  	#email-log{
  		border: none;
  		border-left: 6px solid green;
  		padding: 1rem;
  		border-radius: 0.2rem;
  		margin-bottom: 2%;
  		color: black;
  		background: rgba(0,0,0,0.1);
  		width: 40%;
  		cursor: pointer;
  	}
  	#password-log{
  		border: none;
  		border-left: 6px solid green;
  		padding: 1rem;
  		border-radius: 0.2rem;
  		margin-bottom: 2%;
  		color: black;
  		background: rgba(0,0,0,0.1);
  		width: 40%;
  		cursor: pointer;
  	}
    #login{
      padding: 0.8rem;
      border: none;
      background: green;
      color: white;
      text-align: center;
      border-radius: 0.2rem;
      cursor: pointer;
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
    </style>
  </head>
  <body>
<?php include "header.php"; ?>

  <form class="logIN_form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
    Email:<br>
    <input type="text" name="email-log" id="email-log" placeholder="UserName@domail.com" required><br>
    <span><?php echo $emailerr; ?></span>
    <br>
    Password:<br>
    <input type="password" name="password-log" id="password-log" placeholder="**********" required><br>
    <span><?php echo $passworderr; ?></span>
    <br>
    <input type="submit" name="submit-log" id="login" value="log-in">
  </form>

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

<?php include "footer.php"; ?>

<script>

  window.onload = ()=>{
    alert("Sing praises To De LORD!");
  }
</script>
  </body>
</html>
