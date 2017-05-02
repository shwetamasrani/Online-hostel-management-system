<?php
	session_start();
	$con = mysqli_connect("localhost", "root", "");
	mysqli_select_db($con, "ohms");
	if(isset($_SESSION['loggedin']))
	{
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Hostel Management</title>
	<link rel="stylesheet" type="text/css" href="base.css">
	<script type="text/javascript" src="user.js" ></script>
	<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
    
    <!-- Load jQuery JS -->
    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <!-- Load jQuery UI Main JS  -->
    <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
    
    <!-- Load SCRIPT.JS which will create datepicker for input field  -->
	<script src="script.js"></script>
	<style>
		
		#diff{
			width: 900px;
		}
		.wrapper{
			width: 1000px;
			margin: auto;
		}

		#diff
		{
			width: 800px;
		}
		ul li{
			width: 162px;
			line-height: 35px;
			height: 35px;
			display: inline-block;
			text-align: center;
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
	label{
		width: 250px;
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
		display: inline-block;
	}




	</style>
	
</head>
<body>
<div class="container">
	<div class="wrapper">

		<div class="logo_left">
			<a href="adminhome.php"><img src="ft-logo.png"></a>
		</div>

		<div class="logo_right2">
				<h3 id="text">New User?</h3>
				<!-- <button class="tablinks btn" onclick="openCity(event, 'register')" style="width: 170px">Register new student</button>-->
				<a href="register.php" class="btn">Register Here!</a>
				<a href="logout.php" class="btn">Logout</a></br></br>
		</div>

		<div id="clear">
		</div>

	</div>
</div>

<div class="container list">
	<div class="wrapper">

			<ul>
				<li><button class="tablinks" onclick="openCity(event, 'E-notice')" id="defaultOpen" onload="open()">E-notice</button></li>
				<li><button class="tablinks" onclick="openCity(event, 'complaint')">Complaint list</button></li>
				<li><button class="tablinks" onclick="openCity(event, 'Outpass')">Outpass Requests</button></li>
				<li><button class="tablinks" onclick="openCity(event, 'Room')">Room allocation</button></li>
				<li><button class="tablinks" onclick="openCity(event, 'Update data')">Update student data</button></li>
				<li><button class="tablinks" onclick="openCity(event, 'Fee')">Fee status</button></li>
			</ul>

	</div>
</div>


	<div class="wrapper">
			<div id="E-notice" class="tabcontent">
				<h2><center>E-notice board</center></h2>
				<center>
				<?php
						$con = mysqli_connect("localhost", "root", "","ohms");
						mysqli_select_db($con, "ohms");
						
						$data=mysqli_query($con,"SELECT * FROM enotice");
						if(mysqli_num_rows($data)>0)
						{ ?>
							
							<table class='comtable' id='diff' align='center'>
					      	<tr>
					      	<th>Title</th>
					      	<th>Details</th>
					      	<th>Date</th>
					      	</tr>
					      	<?php
					       	while($row = mysqli_fetch_assoc($data))
				       	 	{ ?>
				       	 		
									<table class="comtable" id='diff' align="center">
									<td><?php echo "{$row['title']}"?></td>
									<td><?php echo "{$row['notice']}"?></td>
									<td><?php echo "{$row['ndate']}"?></td>
									</table>
						  	<?php
						   }
						}
						else{
							?>
							<h2>No notice to show</h2>
							<?php
						}

				?>
					<form class="form-style-9" action="temp.php" method="POST">
						<h2>Log new notice</h2></br>
						<table>
						<tr>
						<td><label>Title:</label>
						<span style="">*should be unique</span></td>
						<td><input type="text" name="title" class="iput" pattern="[a-zA-z0-9\s]+" required></td>
						</tr>
						
						<tr>
						<td><label >Description:</label></td>
						<td><textarea name="detail" type="text"></textarea></td></br>
						</tr>
						<tr>
						<td colspan="2"><center><input type="submit"  name="enotice" value="Submit" class="btn" required></center></td>
						</tr>
						</table>
					</form>

					<form class="form-style-9" action="temp.php" method="POST">
						<h2>Enter the title of noticeto be deleted</h2></br>
						<table>
						<tr>
						<td><label>Title:</label></td>
						<td><input type="text" name="title" class="iput" required></td>
						</tr>
						<tr>
						<td colspan="2"><center><input type="submit" name="delete" value="DELETE" class="btn" required></center></td>
						</tr>
						</table>
					</form>

				

				</center>
		</div>
	</div>

	

	<div class="wrapper">
		<div id="complaint" class="tabcontent">
			<center>
			<br><h2>Pending complaints</h2></br>
			
			<?php
					$data=mysqli_query($con,"SELECT * FROM complaint WHERE status= 'Pending'");
					if(mysqli_num_rows($data)>0)
					{ ?>
							
							<table class='comtable' id='diff' align='center'>
					      	<tr>
					      	<th>Select</th>
					      	<th>Date</th>
					      	<th>Room</th>
					      	<th>Details</th>
					      	<th>Status</th>
					      	</tr>
					      	</table>
							<form action="process.php" method="POST" >
					      	<?php
					       	while($row = mysqli_fetch_assoc($data))
				       	 	{ ?>
				       	 			<table class="comtable" id='diff' align="center">
									<td><input type="checkbox" name="com_list[]" value="<?php echo "{$row['cid']}"?>"></td>
									<td><?php echo "{$row['cdate']}"?></td>
									<td><?php echo "{$row['room']}"?></td>
									<td><?php echo "{$row['detail']}"?></td>
									<td><?php echo "{$row['status']}"?></td>
									</table>
						  	<?php
						   }
						   ?>
						   			<br><input type="submit" name="solvecomplain" class="btn" value="Solve">
									</form>
									
						   <?php
					}
					else{?>
						<h3>No pending complaint</h3>
						<?php	
					}
				?>
			</center>
		</div>
	</div>

	<div class="wrapper">
		<div id="Outpass" class="tabcontent">
			<center>
			<br><h2>Outpass requests</h2></br>
			<div>
				<?php
					$data=mysqli_query($con,"SELECT * FROM outpass WHERE ostatus= 'Not Approved'");
					if(mysqli_num_rows($data)>0)
					{ ?>
							
							<table class='comtable' id='diff' align='center' width="700px">
					      	<tr>
					      	<th>Select</th>
					      	<th>Student ID</th>
					      	<th>Date</th>
					      	<th>Place</th>
					      	<th>Arrival time</th>
					      	<th>Departure time</th>
					      	<th>Status</th>
					      	</tr>
					      	<form action="process.php" method="POST" >
					      	<?php
					       	while($row = mysqli_fetch_assoc($data))
				       	 	{ ?>
				       	 		
									<table class="comtable" id='diff'>
									<td><input type="checkbox" name="out_list[]" value="<?php echo "{$row['pid']}"?>"></td>
									<td><?php echo "{$row['sid']}"?></td>
									<td><?php echo "{$row['tdate']}"?></td>
									<td><?php echo "{$row['place']}"?></td>
									<td><?php echo "{$row['atime']}"?></td>
									<td><?php echo "{$row['dtime']}"?></td>
									<td><?php echo "{$row['ostatus']}"?></td>
									</table>
						  	<?php
						   }
						    ?>
						   			<br><input type="submit" name="allow_outpass" value="Allow" class="btn">
									</form>
									
						   <?php
					}
					else{?>
						<h3>No pending outpass request</h3>
						<?php
					}
				?>
			</div>
			</center>
		</div>
	</div>

	<div class="wrapper">
		<div id="Room" class="tabcontent">
			<center>
			<p><h2>Room vacancy<h2></p>
			<?php
					$con = mysqli_connect("localhost", "root", "","ohms");
					mysqli_select_db($con, "ohms");
					
					$data=mysqli_query($con,"SELECT * FROM room WHERE vacant>0");
					if(mysqli_num_rows($data)>0)
					{ ?>
						
						<table class='comtable' align="center" width="30%">
				      	<tr>
				      	<th>Roomno</th>
				      	<th>Vacant Place</th>
				      	</tr>
				      	<?php
				       	while($row = mysqli_fetch_assoc($data))
			       	 	{ 
			       	 		?>
			       	 		
								<table class="comtable" align="center">
								<td><?php echo "{$row['room']}"?></td>
								<td><?php echo "{$row['vacant']}"?></td>
								</table>
					  	<?php
					   }
					}
				?>
				<?php 
					$_SESSION['fomr']='1';
					if($_SESSION['fomr']=='1'){
				?>
				<p>

					<form class="form-style-9" action="process1.php" method="POST">
						<table>
						<h2>Allocate Room</h2>
						<tr>
						<td><label>Enter roll no:</label></td>
						<td><input type="text" name="sid" required pattern="[a-zA-z0-9]+" class="iput"></td>
						</tr>
						<tr>
						<td><label >Enter new room:</label></td>
						<td><input type="text" name="room" pattern="[0-9]+" required class="iput"></td></br>
						</tr>
						<tr>
						<td colspan="2"><center><input type="submit" name="roomalloc" value="Submit" class="btn"></center></td>
						</tr>
						<tr>
						<td colspan="2"><center><span class="error"><?php if(isset($_SESSION['roomerr'])) { echo "*".$_SESSION['roomerr']; }?></span></center></td><br><br>
						</tr>
						</table>
					</form>
				</p>
				<?php } ?>
			</center>
		</div>
	</div>


	


	

	<div class="wrapper">
		<div id="Update data" class="tabcontent">
		<center>
			<form action="register.php" method="POST"  class="form-style-9">
				<h2>Update student data</h2></br>
					<table>
					<tr>
					<td><label>Student ID:</label></td>
					<td><input type="text" name="currentid" class="iput" required pattern="[a-zA-z0-9]+"></td>
					</tr>
					<tr>
					<td colspan="2"><center><input type="submit" name="View" value="GO" class="btn"></center></td>
					</tr>
					</table>
			</form>
		</center>
		</div>
	</div>


	<div class="wrapper">
		<div id="Fee" class="tabcontent">
			
			<center><h2>Fees-Paid</h2></center>
			<?php
					$con = mysqli_connect("localhost", "root", "","ohms");
					mysqli_select_db($con, "ohms");
					
					$data=mysqli_query($con,"SELECT * FROM fees WHERE receipt != 'NULL'");
					if(mysqli_num_rows($data)>0)
					{ ?>
						
						<center><table class='comtable' align="center">
				      	<tr>
				      	<th>Room no</th>
				      	<th>Roll no</th>
				      	<th>Receipt no</th>
				      	</tr>
				      	</table>
				      	</center>
				      	<?php
				       	while($row = mysqli_fetch_assoc($data))
			       	 	{ 
			       	 		?>
			       	 			<center>
								<table class="comtable" align="center">
								<td><?php echo "{$row['room']}"?></td>
								<td><?php echo "{$row['sid']}"?></td>
								<td><?php echo "{$row['receipt']}"?></td>
								</table>
								</center>
					  	<?php
					   }
					}
				?>
			<br>
			<!--<center><h2>Fees - Not Paid</h2></center>-->
			<?php
					$con = mysqli_connect("localhost", "root", "","ohms");
					mysqli_select_db($con, "ohms");
					
					$data=mysqli_query($con,"SELECT * FROM fees WHERE receipt = 'NULL'");
					if(mysqli_num_rows($data)>0)
					{ ?>
						
						<table class='comtable' align="center">
				      	<tr>
				      	<th>Room no</th>
				      	<th>Roll no</th>
				      	<th>Receipt no</th>
				      	</tr>
				      	<?php
				       	while($row = mysqli_fetch_assoc($data))
			       	 	{ 
			       	 		?>
			       	 		
								<table class="comtable" align="center">
								<td><?php echo "{$row['room']}"?></td>
								<td><?php echo "{$row['sid']}"?></td>
								<td> Pending</td>
								</table>
					  	<?php
					  	}
					}
				?>
		</div>
	</div>





	<div class="wrapper">
		<div id="register" class="tabcontent">
			<h1 style="text-align: center;">Register new student</h1><br>
			<form method="POST" action="regpro.php"  style="margin-left: 27%" onsubmit="return validateForm()">
			<p>
				<label>Registeration No:</label>
				<input type="text" name="reg" class="iput" required><br><br>
			</p>
			<p>
				<label>I.D. NO:</label>
				<input type="text" name="id" class="iput" id="id" required onblur="return validateId('id')">
				<span name="idError" id="idError" style="display: none;">You can only use alphabetic characters and numbers</span><br><br>
			</p>
			<p>
				<label>Date Of Admission</label>
				<input type="Date" name="doa" id="doa" class="iput" pattern="^(0[1-9]|1[012])[- /.](0[1-9]|[12][0-9]|3[01])[- /.](19|20)\d\d$" placeholder="mm/dd/yyyy" title="Enter in valid format" required onblur="validateDate('doa')">
				<span name="doaError" id="doaError" style="display: none;">Enter valid date</span><br><br>
			</p>
			<p>
				<label>Branch</label>
				<input type="text" name="branch" id="branch" class="iput" required onblur="validateName('branch')">
				<span name="branchError" id="branchError" style="display: none;">You can only use alphabetic characters</span><br><br>
			</p>
			<p>
				<label>Name:</label>
				<input type="text" name="sname" id="sname" placeholder="Surname" class="iput" required onblur="validateName('sname')"> 	
				<input type="text" name="fname" id="fname" placeholder="Firstname" class="iput" required onblur="validateName('fname')">
				<span name="snameError" id="snameError" style="display: none;">You can only use alphabetic characters</span>
				<span name="fnameError" id="fnameError" style="display: none;">You can only use alphabetic characters</span><br><br>
			</p>
			<p>
				<label>Date of Birth:</label>
				<input type="Date" name="dob" id="dob" pattern="^(0[1-9]|1[012])[- /.](0[1-9]|[12][0-9]|3[01])[- /.](19|20)\d\d$" placeholder="mm/dd/yyyy" title="Enter in valid format" class="iput" required onblur="validateDate('dob')">
				<span name="dobError" id="dobError" style="display: none;">Enter valid date</span><br><br>
			</p>
			<p>
				<label>Father's name:</label>
				<input type="text" name="faname" id="faname" placeholder="Father's name" class="iput" required onblur="validateName('faname')">
				<span name="fanameError" id="fanameError" style="display: none;">You can only use alphabetic characters</span><br><br>
			</p>
			<p>
				<label>Address:</label>
				<textarea name="address" id="address" class="iput" required onblur="validateAddress('address')"></textarea>
				<span name="addressError" id="addressError" style="display: none;">You can only use alphabetic characters, hyphens and apostrophes</span><br><br>
			</p>
			<p>
				<label>City:</label>
				<input type="text" name="city" id="city" class="iput" required>
				<span name="cityError" id="cityError" style="display: none;">You can only use alphabetic characters</span><br><br>

			</p>
			<p>
				<label>PIN:</label>
				<input type="text"  name="pin" id="pin" class="iput" maxlength="6" pattern="[0-9]*" required onblur="validatePin('pin')">
				<span name="pinError" id="pinError" style="display: none;">Enter valid pin</span><br><br>
			</p>
			<p>
				<label>Phone:</label>
				<input type="text"  name="phone" class="iput" required ><br><br>
			</p>
			<p>
				<label>Email:</label>
				<input type="email"  name="email" id="email" class="iput" required onblur="validateEmail('email')">
				<span name="emailError" id="emailError" style="display: none;">Enter valid email address</span><br><br>
			</p>
			<p>
				<label>Mobile:</label>
				<input type="text"  name="mobile" id="mobile" class="iput" minlength="10" maxlength="10" pattern="[0-9]*" required onblur="validateMobile('mobile')">
				<span name="mobileError" id="mobileError" style="display: none;">Enter valid mobile number</span><br><br>
			</p>
			<p>
				<label>Blood Group:</label>
				
				<select id="grp" type="text" class="iput" name="blood" required>
					<option value=""></option>
				    <option value="A+">A+</option>
				    <option value="B+">B+</option>
				    <option value="O+">O+</option>
				    <option value="AB+">AB+</option>
				    <option value="A-">A-</option>
				    <option value="B-">B-</option>
				    <option value="O-">O-</option>
				    <option value="AB-">AB-</option>
				</select><br><br>
			</p>
			<p>
				<label>Any Major Disease:</label>
				<input type="text" name="disease" class="iput" required><br><br>
			</p>
			<p>
				<label>Any Medication doesn't suit:</label>
				<input type="text" name="med" class="iput" required><br><br>
			</p>
			<p>
				<label>Undergoing any treatment:</label>
				<input type="radio" name="trt" value="Yes"><label1 style="font-weight: bold;" required>YES</label1>
				<input type="radio" name="trt" value="NO"><label1 style="font-weight: bold;">NO</label1><br><br>
			</p>
			<p>
				<label>Reciept No:</label>
				<input type="text" name="rno" class="iput" required><br><br>
			</p>
			<p>
				<label>Date:</label>
				<input type="date" name="date" pattern="^(0[1-9]|1[012])[- /.](0[1-9]|[12][0-9]|3[01])[- /.](19|20)\d\d$" placeholder="mm/dd/yyyy" title="Enter in valid format" class="iput" required>
				<span name="dateError" style="display: none;">Enter valid date</span><br><br>
			</p>
			<p>
				<label>Amount:</label>
				<input type="text" name="amount" class="iput" required><br><br>
			</p>
			<p>
				<label>Room No:</label>
				<input type="text" name="room" class="iput" required><br><br>
			</p>
			<p>
				<label>Student Photo:</label>
				<input type="file" name="img" value="fileupload" accept="image/*" class="iput" ></input><br><br>
			</p>
			<p>
				<!--<center><button  type="submit" name="signup" class="btn">Submit</button></center>-->
				<input type="submit" class="btn" name="go" value="Submit"></br>
			</p>
			</form>
		</div>
	</div>

</body>
<script type="text/javascript">

	function openCity(evt, cityName) {
	   var i, tabcontent, tablinks;
	   tabcontent = document.getElementsByClassName("tabcontent");
	   for (i = 0; i < tabcontent.length; i++) {
	     tabcontent[i].style.display = "none";
	   }
	   tablinks = document.getElementsByClassName("tablinks");
	   for (i = 0; i < tablinks.length; i++) {
	     tablinks[i].className = tablinks[i].className.replace(" active", "");
	   }
	   document.getElementById(cityName).style.display = "block";
	   evt.currentTarget.className += " active";
	}

	document.getElementById("defaultOpen").click();
</script>
</html>
<?php
	}
	else
	{
		header("Location:Homepage.php");
	}
?>