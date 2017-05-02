<?php
  session_start();
	$connection=new mysqli("localhost","root","","ohms");
	if(isset($_POST["enotice"]))
	{
    $title=$connection->real_escape_string($_POST["title"]); 
		
    $from_date = date("Y-m-d");
   $detail=$connection->real_escape_string($_POST["detail"]);   
  	$result=$connection->query("INSERT INTO enotice (title,ndate,notice)VALUES ('$title','$from_date','$detail')");
    if($result)
    {
      header("Location:adminhome.php");
    }
    else
    {
      echo "fail";
    }
  }
  if(isset($_POST["delete"]))
  {
    $title=$connection->real_escape_string($_POST["title"]); 
    $result=$connection->query("DELETE FROM enotice WHERE Title='$title'");
    if($result)
    {
      header("Location:adminhome.php");;
    }
    else
    {
      echo "fail";
    }
  }
?>