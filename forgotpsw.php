<?php
  include('function.php');
  $connection=new mysqli("localhost","root","","ohms");
  session_start();
  //$id=$_SESSION["id"];
  if(isset($_POST["forgotpass"]))
  {
  	$email=$connection->real_escape_string($_POST["email"]);
    $id=$connection->real_escape_string($_POST["id"]);
    $_SESSION["sid"]=$id;
  	$data=$connection->query("SELECT * FROM students WHERE email='$email' AND sid='$id' and 1");
  	if(mysqli_num_rows($data)>0)
  	{
       $str="0123456789qwertyuiopasdfghjklzxcvbnm";
       $str=str_shuffle($str);
       $str=substr($str, 0,4);
      $send_mail=send_mail($email,$str);
       $connection->query("UPDATE students SET rcode='$str' WHERE email='$email'");
       
  	}
  	else
  	{
  		echo"Please check your inputs";
  	}
  }
  ?>
<!DOCTYPE HTML>
<html>
<head>
	<title>Forgot Password</title>
  <link rel="stylesheet" type="text/css" href="base1.css">
  <style type="text/css">
    label{
  font-weight: bold;
  margin-right: 30%
}
input {
  margin-right: 30%;

}
  </style>
</head>
<body>
<div class="container">
  <div class="wrapper">

    <div class="logo_left">
      <a href="Homepage.php"><img src="ft-logo.png"></a>
    </div>
    <div id="clear">
    </div>
  </div>
</div>
<center>
<div id="frm">
	<form action="forgotpsw.php" method="POST">
		<label>E-mail id:</label>
        <input type="text" name="email" required>
        <br><br>
        <label>Id:</label>
        <input type="text" name="id" required>
        <br><br>
  <input type="submit" name='forgotpass' value="GO" id="btn">
  <br>
<br>
</form> 
</div>
</center>
</body>