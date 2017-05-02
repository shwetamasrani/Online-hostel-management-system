<?php
	session_start();
	$con = mysqli_connect("localhost", "root", "");
	mysqli_select_db($con, 'ohms');

	if($con)
		echo 'connected successfully to mydb database';

	function test_input($data) {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
	}

	//$reg_no = test_input($_POST['reg']);
	$sid = test_input($_POST['id']);
	$doa = test_input($_POST['doa']);
$doa = DateTime::createFromFormat('m/d/Y',$doa);
    $doa=$doa->format("Y-m-d");
	$branch = test_input($_POST['branch']);
	$fname = test_input($_POST['fname']);
	$sname = test_input($_POST['sname']);
	$name=$fname.$sname;
	$dob = test_input($_POST['dob']);
	$dob = DateTime::createFromFormat('m/d/Y',$dob);
    $dob=$dob->format("Y-m-d");
	$father = test_input($_POST['faname']);
	$address = test_input($_POST['address']);
	$city = test_input($_POST['city']);
	$pin = test_input($_POST['pin']);
	$phone = test_input($_POST['phone']);
	$mobile = test_input($_POST['mobile']);
	$blood_grp = test_input($_POST['blood']);
	//$disease = test_input($_POST['disease']);
	//$allergic_med = test_input($_POST['med']);
	//$treatment = test_input($_POST['trt']);
	$reciept_no = test_input($_POST['rno']);
	//$date = test_input($_POST['date']);
	//$date=DateTime::createFromFormat('m/d/Y',$date);
	//$date=$date->format("Y-m-d");
	$amount = test_input($_POST['amount']);
	//$room = test_input($_POST['room']);
	$photo = test_input($_POST['img']);
	$email = test_input($_POST['email']);
	if(isset($_SESSION["currentid"]))
	{
		$currentid=$_SESSION["currentid"];
	

		$result=mysqli_query($con,"SELECT * FROM students WHERE sid= '$currentid'");
		//$row=mysqli_fetch_assoc($result);
		if (mysqli_num_rows($result)>0) {
			# code...
			$sql="UPDATE students SET `sid`='$sid', `doa`='$doa', `branch`='$branch', `name`='$name', `dob`='$dob', `father`='$father', `address`='$address', `city`='$city', `pin`='$pin', `phone`='$phone', `mobile`='$mobile', `blood_grp`= '$blood_grp', `reciept_no`='$reciept_no', `amount`='$amount', `photo`='$photo', `email`='$email' WHERE sid='$currentid'";
			echo $sql;
			$update=mysqli_query($con,$sql);

			if ($update) {
				# code...
				header("Location:adminhome.php");
			}
			else{
				echo "Fail";
			}
		}
	}
	else
	{
		$sql="INSERT INTO students (`sid`, `doa`, `branch`, `name`, `dob`, `father`, `address`, `city`, `pin`, `phone`, `mobile`, `blood_grp`, `reciept_no`, `amount`, `photo`, `password`, `email` ) VALUES ('$sid', '$doa', 'branch', '$name', '$dob', '$father', '$address', '$city', '$pin', '$phone', '$mobile', '$blood_grp','$reciept_no', '$amount', '$photo', '$sid', '$email')";
		echo $sql;
		$query=mysqli_query($con,$sql);
			if($query)
			{
				//$_SESSION["u_id"] = $u_id;
				$_SESSION["sid"] = $sid;
				//$roomsql=mysqli_query($con ,"INSERT INTO roomalloc (sid,room,name,branch)VALUES ('$sid', '$room', '$name','$branch' )");
				$roomsql=mysqli_query($con ,"INSERT INTO fees (sid,room,receipt)VALUES ('$sid', '$room', '$reciept_no')");
				header("Location:adminhome.php");
			}
			else
			{
				echo "Error failed to query";
				//header("Location:signup1.php");
			}	
	}
?>