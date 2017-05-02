<?php
session_start();
$id=$_SESSION["sid"];
$connection=new mysqli("localhost","root","","ohms");
$_SESSION['fomr']='0';

 if ($_SERVER["REQUEST_METHOD"] == "POST") {
      if (empty($_POST["psw"])) {
        $_SESSION['pswErr'] = "Password is required";
        $_SESSION['fomr']='1';
      }
      else {
        if(strlen($_POST["psw"]) < 6)
      {
        $_SESSION['pswErr'] = "Password is too short";
      }
      else
        $psw = test_input($_POST["psw"]);
      }
      //$validate=$_SESSION["pswErr"];
    }


    if ($_SERVER["REQUEST_METHOD"] == "POST"){
      if (empty($_POST["cpsw"])) {
        $_SESSION['cpswErr'] = "This feild is required";
        $_SESSION['fomr']='1';
      } else {
         $cpsw = test_input($_POST["cpsw"]);
        if( $psw != $cpsw )
       {
          $_SESSION['cpswErr'] = "Password should be same";
          $_SESSION['fomr']='1';
       }
       //$validate=$_SESSION["cpswErr"];
      }
     }
     if($_SESSION['fomr']==='1')
    {
        header("Location:resetpass.php");
    }

    if($_SESSION['fomr']==='0')
    {
        $query=$connection->query("UPDATE students SET password='$psw' WHERE sid='$id'");
        if($query)
        {
            //$_SESSION["u_id"] = $u_id;
            //$_SESSION["username"] = $user;
            header("Location:Homepage.php");
          //echo "done";
        }
        else
        {
             $_SESSION['Err'] = "Try again";
             $_SESSION['fomr']='1';
            //echo "Error failed to query";
            header("Location:resetpass.php");
        }   
    }
    function test_input($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }


?>