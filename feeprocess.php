<?php
	session_start();
	$con = mysqli_connect("localhost", "root", "");
	mysqli_select_db($con, "ohms");
	 $room=$_SESSION["room"];
  $sid=$_SESSION["sid"];
	if(isset($_POST["fees"]))
	{
		$receipt=$_POST['receipt'];
		$result=mysqli_query($con,"INSERT INTO fees(sid,room,receipt) VALUES ('$sid','$room','$receipt')");
		header("Location:userhome.php");
	}
?>