<?php
session_start();
if(!$_SESSION['user'])
	header("Location: logout.php");

require "database.php";
$table=mysqli_query($connect,"SELECT * FROM news ORDER BY id DESC");
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
					<li><a href="student_login.php" class="active"><div class="glyphicon glyphicon-check"></div>&nbsp Notice Board</a></li>
					<li><a href="talk.php"><div class="glyphicon glyphicon-comment"></div>&nbsp Discussion</a></li>
					<li><a href="student_profile.php"><div class="glyphicon glyphicon-user"></div>&nbsp Student Details</a></li>
					<!--<li><a href="student_attend.php"><div class="glyphicon glyphicon-calendar"></div>&nbsp Attendance</a></li>-->
				</div>
				<div class="notif">
				<h3>Notice Board</h3><hr>
					<table class="table" style="background:white">
						<?php
							while($row=mysqli_fetch_array($table)){
								echo "
						<tr>
							<td width='20px' style='padding-top:13px'>
								<span class='glyphicon glyphicon-circle-arrow-right'></span>
							</td>
							<td>
								".$row['news']."
							</td>
						</tr>
									 ";
							}
						
						
						?>
					</table>
				</div>
				
			</div>
		</div>
	</body>
</html>
