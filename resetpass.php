

<?php
    session_start();
    //$id=$_SESSION["id"];
     $_SESSION['fomr']='1';
     
?>
<!DOCTYPE html>
<html>
<head>
<title>Reset Password</title>
<!-- <link rel="stylesheet" type="text/css" href="stylefgp.css"> -->
    <style>
    body { 
        background-color: #E2E2E2;
    }
    
      
    .btn{
      background: black;
      color: white;
      padding: 7px;
      border-radius: 5px;
      width: 130px;
      display: inline-block;
      text-decoration: none;
      text-align: center;
      border-color: #404040;
      font-weight: bold;
    }
    .btn:hover{
      background: #004d4d;
      cursor: pointer;
    }
    #frm{
        width: 50%;
        margin-top: 80px;
        margin-left: 10px;
      }
    .error
    {
        color: #993333;
        font-weight: bold;
    }
    .form-style-9{
    max-width: 450px;
    background: #FAFAFA;
    padding: 30px;
    margin: 50px auto;
    box-shadow: 1px 1px 25px rgba(0, 0, 0, 0.35);
    border-radius: 10px;
    border: 6px solid #305A72;
}
label{
        width: 150px;
        color: #000000;
        font-family: sans-serif;
        font-weight: bold;
        float: left;
        clear: left;
        display: inline-block;
    }
    .iput{
        display: inline-block;
        width: 200px;
        line-height: 20px;
        border-radius: 3px;
    }
    textarea{
        border-radius: 3px;
        width: 200px;
        display: inline-block;
    }

</style>
</head>
<body>
    <center>
<div id="frm">

                <form class="form-style-9" action="resetprocess.php" method="POST">   
                        <table>
                        <tr>
                        <td colspan="2"><center> <h2>Change password</h2></center></td>
                        </tr>
                        <tr>
                        <td><label>New Password:</label></td>
                        <td><input type="password" name="psw" class="iput"></td>
                        </tr>
                        <tr>
                        <td colspan="2"><center><span class="error"> <?php if(isset($_SESSION['pswErr'])) { echo $_SESSION['pswErr']; session_destroy(); } ?></span></center></td><br><br>
                        </tr>
                        <tr>
                        <td><label >Confirm Password:</label></td>
                        <td><input type="password" name="cpsw" class="iput"></td></br>
                        </tr>
                        <tr>
                        <td colspan="2"><center><span class="error"> <?php if(isset($_SESSION['cpswErr'])) { echo $_SESSION['cpswErr']; session_destroy(); }?></span></center></td><br><br>
                        </tr>
                        <tr>
                        <td colspan="2"><center><input type="submit" name="reset" value="Submit" class="btn"></center></td>
                        </tr>
                        <tr>
                        <td colspan="2"><center><span class="error"> <?php if(isset($_SESSION['Err'])) { echo $_SESSION['Err']; session_destroy(); }?></span></center></td><br><br>
                        </tr>
                        </table>
                </form>
<!--<form action="resetprocess.php" method="POST">
        <label>New Password:</label>
        <input type="password" name="psw">
            <span class="error"> <?php if(isset($_SESSION['pswErr'])) { echo $_SESSION['pswErr']; }?></span><br><br>
        <p>
        <label>Confirm Password:</label>
        <input type="password" name="cpsw">
        <span class="error"> <?php if(isset($_SESSION['cpswErr'])) { echo $_SESSION['cpswErr']; }?></span><br><br>
        </p>
  <input type="submit" name='reset' value="GO">
  <br>
<br>

</form> -->
  </div>
</center>
</body>
</html>
