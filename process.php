<?php
  session_start();
	$con=new mysqli("localhost","root","","ohms");
	
  $room=$_SESSION["room"];
  $sid=$_SESSION["sid"];
  $name=$_SESSION["name"];
	if(isset($_POST["complain"]))
	{
    $date=date("Y:m:d");
    $detail= mysqli_real_escape_string($con, $_POST["detail"] );
  	$result= mysqli_query($con ,"INSERT INTO complaint (sid,cdate,room,detail,status)VALUES ('$sid', '$date', '$room', '$detail','Pending' )");
    if($result)
    {
      echo "<script>alert('Success');</script>";
      header("Location:userhome.php");
    }
    else
    {
      echo "fail";
    }
  }

  if(isset($_POST["solvecomplain"]))
  {
    foreach($_POST['com_list'] as $selected)
    {
      $result= mysqli_query($con,"UPDATE complaint SET status='Solved' WHERE cid='$selected'");
    }
    header("Location:adminhome.php");
  }


  if(isset($_POST["allow_outpass"]))
  {
    foreach($_POST['out_list'] as $selected)
    {
      $result= mysqli_query($con,"UPDATE outpass SET ostatus='Allowed' WHERE pid='$selected'");
    }
    header("Location:adminhome.php");
  }

  if(isset($_POST["delout"]))
  {
    foreach($_POST['out_list'] as $selected)
    {
      $result= mysqli_query($con,"DELETE FROM outpass WHERE pid='$selected'");
    }
    header("Location:userhome.php");
  }


  if(isset($_POST["outpass"]))
  {
    $tdate = mysqli_real_escape_string($con, $_POST["tdate"] );
   $date = DateTime::createFromFormat('m/d/Y',$tdate);
    $tdate=$date->format("Y-m-d");
    $place= mysqli_real_escape_string($con, $_POST["place"] );
    $purpose = mysqli_real_escape_string($con, $_POST["purpose"] );
    $dtime= mysqli_real_escape_string($con, $_POST["dtime"] );
    $atime = mysqli_real_escape_string($con, $_POST["atime"] );
    $result= mysqli_query($con ,"INSERT INTO outpass (sid,tdate,room,name,place,purpose,dtime,atime,ostatus)VALUES ('$sid', '$tdate', '$room', '$name','$place' , '$purpose' , '$dtime' , '$atime','Not Approved' )");
    if($result)
    {
      //echo "success";
      header("Location: userhome.php");
    }
    else
    {
      echo "fail";
    }
  }
?>