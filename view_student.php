<?php
session_start();
if(!$_SESSION['user'])
	header("Location: logout.php");

require "database.php";

$id=$_GET['id'];

$table=mysqli_query($connect,"SELECT * FROM students WHERE reg_no='$id'");
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
					<li><a href="lect_login.php"><div class="glyphicon glyphicon-check"></div>&nbsp Notice Board</a></li>
					<li><a href="lect_talk.php"><div class="glyphicon glyphicon-comment"></div>&nbsp Discussion</a></li>
					<li><a href="lect_student_list.php" class="active"><div class="glyphicon glyphicon-user"></div>&nbsp Student Details</a></li>
					<li><a href="lect_student_attend.php"><div class="glyphicon glyphicon-calendar"></div>&nbsp Attendance</a></li>
				</div>
				<div class="notif">
				<h3>Students Record</h3><hr>
					<table class="table edit">
						<tr><form method="POST" action="update_student.php">
							<td colspan="2" class="head" style="padding-left:30px">
								Academic details
							</td>
						</tr>	
						<tr><b>
							<td style="width:300px;"><div class="glyphicon glyphicon-user"></div>&nbsp&nbspName of the student  : </td>
							<td></b>
								<?php echo $row['name']; ?>
							</td>
						</tr>
						<tr><b>
							<td style="width:300px;"><div class="glyphicon glyphicon-copy"></div>&nbsp&nbspRoll number  : </td>
							<td></b>
								<?php echo $row['roll_no']; ?>
							</td>
						</tr>
						<tr><b>
							<td><div class="glyphicon glyphicon-bookmark"></div>&nbsp&nbspCourse  : </b></td>
							<td>
								<?php echo $row['course']; ?>
							</td>
						</tr>
						<tr><b>
							<td><div class="glyphicon glyphicon-tag"></div>&nbsp&nbspBranch  : </b></td>
							<td>
								<?php echo $row['branch']; ?>
							</td>
						</tr>
						<tr><b>
							<td><div class="glyphicon glyphicon-check"></div>&nbsp&nbspRegistration  number  : </td>
							</b>
							<td>
								<?php echo $row['reg_no']; ?>
							</td>
						</tr>
						<tr><b>
							<td><div class="glyphicon glyphicon-flag"></div>&nbsp&nbspCurrent Semester  : </td>
							</b>
							<td>
								<?php echo $row['sem']; ?>
							</td>
						</tr>
						<tr>
							<td colspan="2"  class="head"  style="padding-left:30px">
								Personal details
							</td>
						</tr>
						<tr><b>
							<td><div class="glyphicon glyphicon-envelope"></div>&nbsp&nbspEmail  ID : </td>
							</b>
							<td>
								<?php echo $row['email']; ?>
							</td>
						</tr>
						<tr><b>
							<td><div class="glyphicon glyphicon-earphone	"></div>&nbsp&nbspPhone number  : </td>
							</b>
							<td>
								<?php echo $row['phone']; ?>
							</td>
						</tr>
						<tr><b>
							<td><div class="glyphicon glyphicon-home"></div>&nbsp&nbspAddress  : </td>
							</b>
							<td>
								<?php echo $row['address']; ?>
							</td>
						</tr>
					

					</table>
			
				</div>
				
			</div>
		</div>
	</body>
</html>