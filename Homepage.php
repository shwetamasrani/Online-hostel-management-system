<?php
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Hostel Management</title>
	<link rel="stylesheet" type="text/css" href="base.css">
	<meta name="viewport" content="width=device-width initial-scale=1">
</head>
<body>

<div class="container">		<!--For header-->
	<div class="wrapper">

		<div class="logo_left">
			<a href="Homepage.php"><img src="ft-logo.png"></a>
		</div>

		<div class="logo_right2">
			
			<form action="login.php" method="POST">
				<input type="text" class="box" name="user" placeholder="Username" required>
				<input type="password" class="box" name="psw" placeholder="Password" oncopy="return false" onpaste="return false" required>
				<!--<button  type="submit" name="Login" class="btn">Login</button>-->
				<input type="submit" class="btn" name="Login" value="Login"></br>
				<center><a href="forgotpsw.php" style="color: white"> Forgot  Password? </a></center>
				<div class="msg"><?php if(isset($_SESSION['message'])) { echo $_SESSION['message']; } session_destroy(); ?></div>
			</form>
		</div>

		<div id="clear">
		</div>

	</div>
</div>

<div class="container list"> <!--For Navigation bar-->
	<div class="wrapper">

			<ul>
				<li><a href="#Home" class="tablinks" style="font-size: 20px;">Home</a></li>
				<li><a href="#Facilities" class="tablinks" style="font-size: 20px;">Facilities</a></li>
				<li><a href="#Activities" class="tablinks" style="font-size: 20px;">Activities</a></li>
				<li><a href="#Aboutus" class="tablinks" style="font-size: 20px;">About us</a></li>
				<li><a href="#Contactus" class="tablinks" style="font-size: 20px;">Contact us</a></li>
			</ul>

	</div>
</div>


<div class="backgrnd" id="Home">
	<div class="wrapper">
		<center><h3>Home</h3></center>
		<p style="text-align:justify" >
 Charotar University of Science and Technology - CHARUSAT has been conceived by Shri Charotar Moti Sattavis Patidar Kelavani Mandal to put India on global education map by making Charotar - the Land of Sardar Patel the Global Education Hub.

Kelavani Mandal, established in 1994, is a not for profit premier trust of India that works with the mission of social service through education. It has social lineage of more than 118 years from its parent organization Shri Charotar Moti Sattavis Leuva Patidar Samaj Matrusanstha- known for its dynamic social revolution brought about by initiating Mass Marriages on a massive scale.

Following some reflective discussions (during the centenary celebrations of Matrusanstha in 1993-94) on the activities of the Samaj since its birth, and the challenges facing the development of India in the context of liberalization, privatization and globalization of Indian economy, the Samaj decided to create a dedicated organization for knowledge creation and dissemination. The Samaj created an educational trust Shri Charotar Moti Sattavis Patidar Kelavani Mandal in 1994 with the distinct objective of creating and developing state-of-the-art educational facilities. The trust is a democratically managed institution with three layers of governance and is known for its transparent functioning and its integrity.

		</p>
	</div>
</div>
<div class="polaroid" >
<center>
	<img src="about.jpg" height="400" width="500" class="img">
</center>
</div>




<div class="backgrnd" id="Facilities">
	<div class="wrapper">
		<center><h3>Facilities</h3></center>
		<p >
		<ol>
<li>Lodging Facility(Accommodation)</li>
<li>Boarding Facility(Food)</li>
<li>Infrastructure</li>
<li>Reading Room</li>
<li>Prayer Hall</li>
<li>Gymnasium</li>
<li>T.V. Room</li>
<li>Sports</li>
<li>Music</li>
<li>Garden</li>
</ol>
		</p>

	</div>
</div>
<div class="polaroid">
<center>
	<img src="fac.jpg" height="400" width="500" class="img">
	</center>
</div>



<div class="backgrnd" id="Activities">
	<div class="wrapper">
		<center><h3>Activities</h3></center>
		<p style="text-align:justify">
We strongly feel that leisure, recreation, games and sports, extra-curricular and co-curricular activities are essential things to rejuvenate the energy of the students and therefore provides opportunity to express their skills, talents and creativity in different field.Various activities are performed in hostl some of them are mentioned below.

Co-Curricular Activities
<ol>
<li>Rangoli</li>
<li>Mehendi</li>
<li>Drawing</li>
<li>Dance Competition</li>
<li>Speech Competion</li>
<li>Drama</li>
<li>Navratri</li>
</ol>
		</p>
	</div>
</div>
<div class="polaroid" >
<center>
	<img src="act.jpg" height="400" width="500" class="img">
	</center>
</div>





<div class="backgrnd" id="Aboutus">
	<div class="wrapper">
		<center><h3>About us</h3></center>
		<p style="text-align:justify">
Overarching goal of CHARUSAT is to teach students how to live and to help them experience long-term social success. For the purpose, CHARUSAT provides ample opportunities to students to enhance their social life on campus. Many activities, clubs and events are organized to enhance student's social interactions and skills. In fact, CHARUSAT promotes: healthy friendship, group activities, enhancement of fraternity, respect for others, dignity in behaviour, upholding social and moral values, outreach activities in the society, and development of network.

Thus, CHARUSAT strongly believes that a student's life at the campus should be comfortable and hassle-free, and for the purpose it has carefully designed various services for the students. They are Library, Residences, Transport, Healthcare, Safety Cells, Wincell - E-governance, Reprography and Stationery, Bank, and ATMs, and Training and Placement.

		</p>
	</div>
</div>
<div class="polaroid" >
<center>
	<img src="clg.png" height="400" width="500" class="img">
	</center>
</div>



<div class="backgrnd" id="Contactus">
	<div class="wrapper">
		<center><h3>Contact us</h3></center>
		<p style="text-align:justify" >
Address

    <br>Charotar University of Science & Technology        CHARUSAT Campus-Changa
           <br>Off. Nadiad-Petlad Highway
           <br>Gujarat (India) 388 421  INDIA
    <br>Telephone: 02697-265011/21
   <br> Fax: 02697-265007
    <br>Email: info@charusat.ac.in
		</p>
	</div>
</div>
<div class="polaroid" >
<center>
	<img src="lake.jpg" height="400" width="500" class="img">
	</center>
</div>


</body>
</html>
