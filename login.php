<?php
	session_start();
	$_SESSION['message'] = "";
	// Get values pass from form in login.php file
	$username = $_POST['user'];
	$password = $_POST['psw'];
	$_SESSION['loggedin']="";

	// connect to the server and select database
	$con = mysqli_connect("localhost", "root", "");
	mysqli_select_db($con, "ohms");
	

	// to prevent mysql injection
	$username = stripcslashes($username);
	$password = stripcslashes($password);
	$username = mysqli_real_escape_string($con, $username);
	$password = mysqli_real_escape_string($con, $password);

	if ($username == "nimisha" && $password == "abc123")
	{
		header("Location:adminhome.php");
		break;
	}
	else
	{
		//Query the database for user
		$result = mysqli_query($con ,"SELECT * from students where sid = '$username' and password = '$password'") or die("Failed to query database".mysql_error());
		$row = mysqli_fetch_array( $result);
		if(is_array($row)) {
			//$_SESSION["u_id"] = $row['u_id'];
			$_SESSION["sid"] = $row['sid'];
			$_SESSION = $row;
		}
		if ($row['sid'] == $username && $row['password'] == $password)
		{
			header("Location:userhome.php");
			$_SESSION['loggedin']="1";
		}
		else 
		{
			$_SESSION['message']="Invalid Username or Password!";
			header("Location:Homepage.php");
		}
	} 

?>