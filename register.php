<?php
	session_start();
	$con = mysqli_connect("localhost", "root", "");
	mysqli_select_db($con, "ohms");
	if(isset($_POST["View"]))
	{
		$sid=$_POST["currentid"];
		$_SESSION["currentid"]=$sid;
		$result=mysqli_query($con,"SELECT * FROM students WHERE sid= '$sid'");
		$data=mysqli_fetch_assoc($result);
	}
?>

<!DOCTYPE html>
<html>
<head>
	<!--<link rel="stylesheet" type="text/css" href="base.css">-->
	<script type="text/javascript" src="user.js" ></script>
	<title></title>
	<style>
		.wrapper{
			width: 100%;
			margin: auto;
		}
		ul li{
			width: 162px;
			line-height: 35px;
			height: 35px;
			display: inline-block;
			text-align: center;
		}


		label{
		width: 250px;
		color: #000000;
		font-family: sans-serif;
		font-weight: bold;
		float: left;
		clear: left;
		display: inline-block;
	}
	body{
	background-color: #E2E2E2;
	}

	.c1{
	justify-content: center;
	text-indent: center;
	width: 550px;
    margin: 0 auto
	}
	.iput{
		display: inline-block;
		width: 200px;
		line-height: 20px;
		border-radius: 3px;
	}
	textarea{
		border-radius: 3px;
		display: inline-block;
	}
	span{
		display: inline-block;
	}
	input{
		display: inline-block;
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




	</style>
</head>
<body>
	<div class="wrapper">
		
			<h1 style="text-align: center;">Enter student data</h1><br>
			<form method="POST" action="regpro.php"  style="margin-left: 34%;" onsubmit="return validateForm()">
			<!--<p>
				<label>Registeration No:</label>
				<input type="text" name="reg" class="iput" value="<?php if(isset($_POST['View'])) {echo $data['sid'];} ?>" required><br><br>
			</p>-->
			<p>
				<label>I.D. NO:</label>
				<input type="text" name="id" class="iput" value="<?php if(isset($_POST['View'])) {echo $data['sid'];} ?>" id="id" onblur="return validateId('id')">
				<span name="idError" id="idError" style="display: none;">You can only use alphabetic characters and numbers</span><br><br>
			</p>
			<p>
				<label>Date Of Admission:</label>
				<input type="Date" name="doa" id="doa" class="iput" value="<?php if(isset($_POST['View'])) {echo $data['doa'];} ?>" pattern="^(0[1-9]|1[012])[- /.](0[1-9]|[12][0-9]|3[01])[- /.](19|20)\d\d$" placeholder="mm/dd/yyyy" title="Enter in valid format" required onblur="validateDate('doa')">
				<span name="doaError" id="doaError" style="display: none;">Enter valid date</span><br><br>
			</p>
			<p>
				<label>Branch:</label>
				<input type="text" name="branch" id="branch" class="iput" value="<?php if(isset($_POST['View'])) {echo $data['branch'];} ?>" required onblur="validateName('branch')">
				<span name="branchError" id="branchError" style="display: none;">You can only use alphabetic characters</span><br><br>
			</p>
			<p>
				<label>Name:</label>
				<input type="text" name="sname" id="sname" placeholder="Surname" class="iput" value="<?php if(isset($_POST['View'])) {echo $data['name'];} ?>" required onblur="validateName('sname')"> 	
				<input type="text" name="fname" id="fname" placeholder="Firstname" class="iput" value="<?php if(isset($_POST['View'])) {echo $data['name'];} ?>" required onblur="validateName('fname')">
				<span name="snameError" id="snameError" style="display: none;">You can only use alphabetic characters</span>
				<span name="fnameError" id="fnameError" style="display: none;">You can only use alphabetic characters</span><br><br>
			</p>
			<p>
				<label>Date of Birth:</label>
				<input type="Date" name="dob" id="dob" pattern="^(0[1-9]|1[012])[- /.](0[1-9]|[12][0-9]|3[01])[- /.](19|20)\d\d$" placeholder="mm/dd/yyyy" title="Enter in valid format" class="iput" value="<?php if(isset($_POST['View'])) {echo $data['dob'];} ?>" required onblur="validateDate('dob')">
				<span name="dobError" id="dobError" style="display: none;">Enter valid date</span><br><br>
			</p>
			<p>
				<label>Father's name:</label>
				<input type="text" name="faname" id="faname" placeholder="Father's name" class="iput" value="<?php if(isset($_POST['View'])) {echo $data['father'];} ?>" required onblur="validateName('faname')">
				<span name="fanameError" id="fanameError" style="display: none;">You can only use alphabetic characters</span><br><br>
			</p>
			<p>
				<label>Address:</label>
				<textarea name="address" id="address" class="iput" required onblur="validateAddress('address')"><?php if(isset($_POST['View'])) {echo $data['address'];} ?></textarea>
				<span name="addressError" id="addressError" style="display: none;">You can only use alphabetic characters, hyphens and apostrophes</span><br><br>
			</p>
			<p>
				<label>City:</label>
				<input type="text" name="city" id="city" class="iput" onblur="validateName('city')" value="<?php if(isset($_POST['View'])) {echo $data['city'];} ?>" required>
				<span name="cityError" id="cityError" style="display: none;">You can only use alphabetic characters</span><br><br>

			</p>
			<p>
				<label>PIN:</label>
				<input type="text"  name="pin" id="pin" class="iput" value="<?php if(isset($_POST['View'])) {echo $data['pin'];} ?>" maxlength="6" pattern="[0-9]*" required onblur="validatePin('pin')">
				<span name="pinError" id="pinError" style="display: none;">Enter valid pin</span><br><br>
			</p>
			<p>
				<label>Phone:</label>
				<input type="text"  name="phone" class="iput" value="<?php if(isset($_POST['View'])) {echo $data['phone'];} ?>"><br><br>
			</p>
			<p>
				<label>Email:</label>
				<input type="text"  name="email" id="email" class="iput" value="<?php if(isset($_POST['View'])) {echo $data['email'];} ?>" required onblur="validateEmail('email')">
				<span name="emailError" id="emailError" style="display: none;">Enter valid email address</span><br><br>
			</p>
			<p>
				<label>Mobile:</label>
				<input type="text"  name="mobile" id="mobile" class="iput" value="<?php if(isset($_POST['View'])) {echo $data['mobile'];} ?>" minlength="10" maxlength="10" pattern="[0-9]*" required onblur="validateMobile('mobile')">
				<span name="mobileError" id="mobileError" style="display: none;">Enter valid mobile number</span><br><br>
			</p>
			<p>
				<label>Blood Group:</label>
				
				<select id="grp" type="text" class="iput" name="blood" onblur="validateSelect('grp')">
					<option value=""></option>
				    <option value="A+">A+</option>
				    <option value="B+">B+</option>
				    <option value="O+">O+</option>
				    <option value="AB+">AB+</option>
				    <option value="A-">A-</option>
				    <option value="B-">B-</option>
				    <option value="O-">O-</option>
				    <option value="AB-">AB-</option>
				</select>
				<span name="grpError" id="grpError" style="display: none;">Choose one</span><br><br><br><br>
			</p>
			<p>
				<label>Reciept No:</label>
				<input type="text" name="rno" id="rtno" class="iput" onblur="validateNumber('rtno')" value="<?php if(isset($_POST['View'])) {echo $data['reciept_no'];} ?>" required>
				<span name="rtnoError" id="rtnoError" style="display: none;">Enter valid receipt number</span><br><br>
			</p>
			<!--<p>
				<label>Date:</label>
				<input type="date" name="date" class="iput" value="<?php if(isset($_POST['View'])) {echo $data['date'];} ?>" pattern="^(0[1-9]|1[012])[- /.](0[1-9]|[12][0-9]|3[01])[- /.](19|20)\d\d$" placeholder="mm/dd/yyyy" title="Enter in valid format" required>
				<span name="dateError" style="display: none;">Enter valid date</span><br><br>
			</p>-->
			<p>
				<label>Amount:</label>
				<input type="text" name="amount" id="amt" onblur="validateNumber('amt')" class="iput" value="<?php if(isset($_POST['View'])) {echo $data['amount'];} ?>" required>
				<span name="amtError" id="amtError" style="display: none;">Enter valid amount</span><br><br>
			</p>
			<!--<p>
				<label>Room No:</label>
				<input type="text" name="room" class="iput" value="<?php if(isset($_POST['View'])) {echo $data['room'];} ?>" required><br><br>
			</p>-->
			<p>
				<label>Student Photo:</label>
				<input type="file" name="img" value="fileupload" accept="image/*" value="<?php if(isset($_POST['View'])) {echo $data['photo'];} ?>" class="iput" ></input><br><br>
			</p>
			<p>
				<!--<center><button  type="submit" name="signup" class="btn">Submit</button></center>-->
				<input type="submit" style="margin-left: 15%;" class="btn" name="go" value="Submit"></br>
			</p>
			</form>
	
	</div>
</body>
</html>