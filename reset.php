<?php
//session start();
$id=$_SESSION["id"];
if(isset($_GET["email"])&& isset($_GET["token"]))
{
	$connection=new mysqli("localhost","root","","ohms");
	$email=$connection->real_escape_string($_GET["email"]);
	$token=$connection->real_escape_string($_GET["token"]);
	$data=$connection->query("SELECT sid FROM students WHERE email='$email' AND rcode='$token'");
	if(mysqli_num_rows($data)>0)
	{
      
       header("Location:resetpass.php");

	}
}
else
{
	echo "no";
	//header("Location: login.php");
	exit();
}
?>