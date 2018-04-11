<?php
session_start();
if(!$_SESSION['user'])
	header("Location: logout.php");

require "database.php";
$user=$_SESSION['user'];
$table=mysqli_query($connect,"SELECT * FROM students WHERE reg_no='$user'");
$row=mysqli_fetch_array($table);
?>
<html>
	<head>
		<title>Student Information System</title>
		<link rel="Stylesheet" href="bootstrap/css/bootstrap.css">
		<link rel="Stylesheet" href="css/style.css">
	</head>
	<body>
		<div class="body_wrapper">
			<div class="header">
				<a href="logout.php"><span class="glyphicon glyphicon-off"></span> Logout</a>
			</div>
			<div class="content">
				<div class="side_menu">
					<li><a href="student_login.php"><div class="glyphicon glyphicon-check"></div>&nbsp Notice Board</a></li>
					<li><a href="talk.php"><div class="glyphicon glyphicon-comment"></div>&nbsp Discussion</a></li>
					<li><a href="student_profile.php" class="active"><div class="glyphicon glyphicon-user"></div>&nbsp Student Details</a></li>
					
				</div>
				<div class="notif">
					<table class="table">
						<tr>
							<td colspan="2" style="background:white">
								Academic details
							</td>
						</tr>	
						<tr>
							<td style="width:300px;"><div class="glyphicon glyphicon-user"></div>&nbsp&nbspName of the student  : </td>
							<td><b><?php echo $row['name']; ?></b></td>
						</tr>
						<tr>
							<td><div class="glyphicon glyphicon-bookmark"></div>&nbsp&nbspCourse  : </td>
							<td><b><?php echo $row['course']; ?></b></td>
						</tr>
						<tr>
							<td><div class="glyphicon glyphicon-tag"></div>&nbsp&nbspBranch  : </td>
							<td><b><?php 
												if($row['branch']=="CSE") echo "Computer Science Engineering"; 
												else if($row['branch']=="IT") echo "Information Technology"; 
												else if($row['branch']=="MECH") echo "Mechanical Engineering"; 
												else if($row['branch']=="EEE") echo "Electrical and Electronics Engineering"; 
												else if($row['branch']=="ECE") echo "Electronics and Communication Engineering"; 
											?>
									</b>
							</td>
						</tr>
						<tr>
							<td><div class="glyphicon glyphicon-check"></div>&nbsp&nbspRegistration  number  : </td>
							<td><b><?php echo $row['reg_no']; ?></b></td>
						</tr>
						<tr>
							<td><div class="glyphicon glyphicon-flag"></div>&nbsp&nbspCurrent Semester  : </td>
							<td><b><?php echo $row['sem']; ?></b></td>
						</tr>
						<tr>
							<td colspan="2" style="background:white">
								Personal details
							</td>
						</tr>
						<tr>
							<td><div class="glyphicon glyphicon-envelope"></div>&nbsp&nbspEmail  ID : </td>
							<td><b><?php echo $row['email']; ?></b></td>
						</tr>
						<tr>
							<td><div class="glyphicon glyphicon-earphone	"></div>&nbsp&nbspPhone number  : </td>
							<td><b><?php echo $row['phone']; ?></b></td>
						</tr>
						<tr>
							<td><div class="glyphicon glyphicon-home"></div>&nbsp&nbspAddress  : </td>
							<td><b><?php echo $row['address']; ?></b></td>
						</tr>
						
						
					</table>
				</div>
				
			</div>
		</div>
	</body>
</html>
