<?php
  	session_start();
	$con=new mysqli("localhost","root","","ohms");
	$row= $_SESSION;

	$i=0;
	if(isset($_POST["View"]))
	{
	$result=mysqli_query($con,"SELECT * from students");
	while($row= mysqli_fetch_assoc($result));
	{
	echo $row[$i];
	$i+=$i;
	}
}
else{
	echo "fail";
}

	return;
?>