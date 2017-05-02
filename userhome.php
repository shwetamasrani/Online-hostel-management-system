<?php
	session_start();
	$con = mysqli_connect("localhost", "root", "");
	mysqli_select_db($con, "ohms");
	$username=$_SESSION["sid"];
	if($_SESSION['loggedin'])
	{
	
?>
<!DOCTYPE html>
<html>
<head>
	<title>Hostel Management</title>
	<link rel="stylesheet" type="text/css" href="base.css">
	<style>
		#diff{
			width: 900px;
		}
		.wrapper{
			width: 1000px;
			margin: auto;
		}
		ul li{
			width: 162px;
			line-height: 35px;
			height: 35px;
			display: inline-block;
			text-align: center;
		}
	</style>
</head>
<body>

<div class="container">
	<div class="wrapper">

		<div class="logo_left">
			<a href="userhome.php"><img src="ft-logo.png"></a>
		</div>

		<div class="logo_right2">
				<!--<button class="tablinks btn" onclick="openTab(event, 'change')">Change password</button>-->
				<a href="resetpass.php" class="btn" class="logo_right1">Change Password</a>
				<a href="logout.php" class="btn" class="logo_right1">Logout</a></br></br>
		</div>

		<div id="clear">
		</div>

	</div>
</div>

<div class="container list">
	<div class="wrapper">

			<ul>
				<li><button class="tablinks" onclick="openTab(event, 'E-notice board')" id="defaultOpen">E-notice board</button></li>
				<li><button class="tablinks" onclick="openTab(event, 'Log complaint')">Log complaint</button></li>
				<li><button class="tablinks" onclick="openTab(event, 'Outpass request')">Outpass request</button></li>
				<li><button class="tablinks" onclick="openTab(event, 'Room vacancy')">Room vacancy</button></li>
				<li><button class="tablinks" onclick="openTab(event, 'Fee status')">Fee status</button></li>
				<li><button class="tablinks" onclick="openTab(event, 'profile')">Profile</button></li>
			</ul>

	</div>
</div>

	<div id="change" class="tabcontent">
		<div class="wrapper">
			<center>

				<form class="form-style-9" action="resetprocess.php" method="POST">
						<h2>Change password</h2></br>
						<table>
						<tr>
						<td><label>New Password:</label></td>
						<td><input type="password" name="psw" class="iput"></td>
						</tr>
						<tr>
						<td><label >Confirm Password:</label></td>
						<td><input type="password" name="cpsw" class="iput"></td></br>
						</tr>
						<tr>
						<td colspan="2"><center><input type="submit" name="reset" value="GO" class="btn"></center></td>
						</tr>
						</table>
				</form>
			</center>
		</div>
	</div>


	<div class="wrapper">
		<div id="E-notice board" class="tabcontent">
		<center>
			<h2>E-notice board</h2>
			<?php
						$data=mysqli_query($con,"SELECT * FROM enotice");
						if(mysqli_num_rows($data)>0)
						{ ?>
							
							<table class='comtable' id="diff" align='center'>
					      	<tr>
					      	<th>Title</th>
					      	<th>Details</th>
					      	<th>Date</th>
					      	</tr>
					      	<?php
					       	while($row = mysqli_fetch_assoc($data))
				       	 	{ ?>
				       	 		
									<table class="comtable" id="diff" align="center">
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
				</center>
		</div>
	</div>

	<div id="Log complaint" class="tabcontent">
	<div class="wrapper">
	<center>
		<h2>Complaint status</h2>
			<div>
				<?php
					$data=mysqli_query($con,"SELECT * FROM complaint WHERE sid= '$username' and status= 'Pending'");
					if(mysqli_num_rows($data)>0)
					{ ?>
							
							<table class='comtable' id="diff" align='center'>
					      	<tr>
					      	<th>Date</th>
					      	<th>Details</th>
					      	<th>Status</th>
					      	</tr>
					      	<?php
					       	while($row = mysqli_fetch_assoc($data))
				       	 	{ ?>
				       	 		
									<table class="comtable" id="diff" align="center">
									<td><?php echo "{$row['cdate']}"?></td>
									<td><?php echo "{$row['detail']}"?></td>
									<td><?php echo "{$row['status']}"?></td>
									</table>
						  	<?php
						   }
					}
					else{?>
						<h3>No pending complaint</h3>
						<?php	
					}
				?>
			</div>	
			</div>
			
					<form class="form-style-9" action="process.php" method="POST">
						<h2>Log new complaint</h2></br>
						<table>
						<tr>
						<td><label >Description:</label></td>
						<td><textarea name="detail" type="text" required></textarea></td></br>
						</tr>
						<tr>
						<td colspan="2"><center><input type="submit" name="complain" value="Submit" class="btn"></center></td>
						</tr>
						</table>
					</form>
			</center>
		
	</div>

	<div class="wrapper">
		<div id="Outpass request" class="tabcontent">
		<center>
		<h2>Outpass status</h2>
			<div>
				<?php
					$data=mysqli_query($con,"SELECT * FROM outpass WHERE sid= '$username'");
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
					      	</table>
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
						   			<br><input type="submit" name="delout" value="Delete" class="btn">
									</form>
									
						   <?php
					}
					else{?>
						<h3>No pending outpass request</h3>
						<?php
					}
				?>
			</div>
			
					<form class="form-style-9" action="process.php" method="POST">
						<h2>Request an outpass</h2></br>
						<table>
						<tr>
						<td><label>Date:</label></td>
						<td><input type="Date" name="tdate" class="iput" pattern="^(0[1-9]|1[012])[- /.](0[1-9]|[12][0-9]|3[01])[- /.](19|20)\d\d$" placeholder="mm/dd/yyyy" title="Enter in valid format" .required></td>
						</tr>
						<tr>
						<td><label>Place:</label></td>
						<td><input type="text" name="place" class="iput" required></td>
						</tr>

						<tr>
						<td><label>Purpose:</label></td>
						<td><input type="text" name="purpose" class="iput" required></td>
						</tr>

						<tr>
						<td><label>Arrival Time:</label></td>
						<td><input type="time" name="atime" class="iput" pattern="^([0-9]|0[0-9]|1[0-9]|2[0-3]):[0-5][0-9]$"  placeholder="hh:mm" required></td>
						</tr>

						<tr>
						<td><label>Departure Time:</label></td>
						<td><input type="time" name="dtime" class="iput" pattern="^([0-9]|0[0-9]|1[0-9]|2[0-3]):[0-5][0-9]$" placeholder="hh:mm" required>

						</td>
						</tr>
						
						<tr>
						<td colspan="2"><center><input type="submit" name="outpass" value="Submit" class="btn"></center></td>
						</tr>
						</table>
					</form>
			</center>
		</div>
	</div>


	<div id="Room vacancy" class="tabcontent">
	<div class="wrapper">
	<center>
			<p><h2>Room vacancy</h2></p>
			<?php
					$con = mysqli_connect("localhost", "root", "","ohms");
					mysqli_select_db($con, "ohms");
					
					$data=mysqli_query($con,"SELECT * FROM room WHERE vacant>0");
					if(mysqli_num_rows($data)>0)
					{ ?>
						
						<table class='comtable' align="center">
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
	</center>
		</div>
	</div>


	<div class="wrapper">
		<div id="Fee status" class="tabcontent">
		<center>

			<form class="form-style-9" action="feeprocess.php" method="POST">
				<h2>Enter your fee details</h2></br>
				<table>
				<tr>
				<td><label>Enter receipt number:</label></td>
				<td><input type="text" name="receipt" class="iput" required></td>
				</tr>
				<tr>
				<td colspan="2"><center><input type="submit" name="fees" value="Submit" class="btn"></center></td>
				</tr>
				</table>
			</form>
		</center>
		</div>
	</div>

	<div class="wrapper">
		<div id="profile" class="tabcontent">
		<center>
			<div style="text-align: center;">
				<?php
					$result=mysqli_query($con,"SELECT * FROM students WHERE sid= '$username'");
					$data=mysqli_fetch_assoc($result);
					?>
					<table class="profiletb">
					<tr>
						<td><label>I.D. NO: </label></td>
						<td><input value="<?php echo $data["sid"]?>" disabled class="iput" ></td>
					</tr><br>
					<tr>
						<td><label>Date Of Admission: </label></td>
						<td><input value="<?php echo $data["doa"]?>" class="iput" disabled ></td>
					</tr>
					<tr>
						<td><label>Branch: </label></td>
						<td><input value="<?php echo $data["branch"]?>" class="iput" disabled ></td>
					</tr>
					<tr>
						<td><label>Name: </label></td>
						<td><input value="<?php echo $data["name"]?>" class="iput" disabled ></td>
					</tr>
					<tr>
						<td><label>Date of Birth: </label></td>
						<td><input value="<?php echo $data["dob"]?>" class="iput" disabled ></td>
					</tr>
					<tr>
						<td><label>Father's name: </label></td>
						<td><input value="<?php echo $data["father"]?>" class="iput" disabled ></td>
					</tr>
					<tr>
						<td><label>Address: </label></td>
						<td><textarea  class="iput" disabled ><?php echo $data["address"]?></textarea></td>
					</tr>
					<tr>
						<td><label>City: </label></td>
						<td><input value="<?php echo $data["city"]?>" class="iput" disabled ></td>
					</tr>
					<tr>
						<td><label>PIN: </label></td>
						<td><input value="<?php echo $data["pin"]?>" class="iput" disabled ></td>
					</tr>
					<tr>
						<td><label>Phone: </label></td>
						<td><input value="<?php echo $data["phone"]?>" class="iput" disabled ></td>
					</tr>
					<tr>
						<td><label>Email: </label></td>
						<td><input value="<?php echo $data["email"]?>" class="iput" disabled ></td>
					</tr>
					<tr>
						<td><label>Mobile: </label></td>
						<td><input value="<?php echo $data["mobile"]?>" class="iput" disabled ></td>
					</tr>
					<tr>
						<td><label>Blood Group: </label></td>
						<td><input value="<?php echo $data["blood_grp"]?>" class="iput" disabled ></td>
						
					</tr>
					<tr>
						<td><label>Room No: </label></td>
						<td><input value="<?php echo $data["room"]?>" class="iput" disabled ></td>
					</tr>
					<tr>
						<td><label>Student Photo: <?php echo $data["photo"]?></label></td></br>
						<td><img src="<?php echo $data['photo']?>"></td>
					</tr>
					</table>
			</div>
		</center>
		</div>
	</div>
	


	

</body>
<script>

document.getElementById("defaultOpen").click();
function openTab(evt, tabName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(tabName).style.display = "block";
    evt.currentTarget.className += " active";
}

// Get the element with id="defaultOpen" and click on it

</script>
</html>
<?php
}
else
{
	header("Location:Homepage.php");
}
?>
