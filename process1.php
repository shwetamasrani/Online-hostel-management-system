<?php
session_start();
	$con = mysqli_connect("localhost", "root", "","ohms");
					mysqli_select_db($con, "ohms");
	if($con)
		echo 'connected successfully to mydb database';

	function test_input($data) {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
	}

				$_SESSION['roomerr'] = NULL;
				$_SESSION['fomr']='1';
				
	 if ($_SERVER["REQUEST_METHOD"] == "POST") {

	 	

	 	//$orn=test_input($_POST["orn"]);
		$sid=test_input($_POST["sid"]);
	    $room = test_input($_POST["room"]);
	    echo "if1";
	  }
	  $result = mysqli_query($con ,"select * from room where vacant>0");

	  		
	  			# code...
	  		
		    if (mysqli_num_rows($result)>0) {
		    	while ($row = mysqli_fetch_assoc($result))
		    	{ 
		    		if($room == $row['room'])
		    		{
		    			$_SESSION['fomr']='0';
		    		}
		    	/*	else
		    		{
		    			$_SESSION['fomr']='1';
		    			break;
		    		}*/
	    		}
		    }
		   if ($_SESSION['fomr'] ==1 ) {
		    	echo "<script>alert('Room not vacant!');</script>";
		    	//echo "err";
		    	$_SESSION['roomerr'] = "Room not vacant";
		    	header("Location:adminhome.php");
		     // $_SESSION['fomr']='1';
		    	
		    }
		    

	if($_SESSION['fomr']==='0')
	{
		$temp=mysqli_query($con,"select room from students where sid='$sid' ");
		$orn=mysqli_fetch_assoc($temp);
		$orn=$orn['room'];
		$query=mysqli_query($con,"update students set room='$room' where sid='$sid' ");
		$query1=mysqli_query($con,"select vacant from room where room='$room'" );
		$data1 = mysqli_fetch_assoc($query1);
		$data= $data1['vacant'];
		$data--;
		
		$query2=mysqli_query($con,"update room set vacant='$data' where room = '$room' ");
		if($orn != 'NULL')
		{	
			
			$query3=mysqli_query($con,"select vacant from room where room='$orn'" );
			$data1 = mysqli_fetch_assoc($query3);
			$data1=$data1['vacant'] ;
			$data1++;
			
			$query4=mysqli_query($con,"update room set vacant = '$data1' where room = '$orn' ");
		}
		header("Location:adminhome.php");
	}	
	  //$validate=$_SESSION["userErr"];
	  
 ?>