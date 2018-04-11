<?php
session_start();
if(!$_SESSION['user'])
	header("Location: logout.php");

require "database.php";
$table=mysqli_query($connect,"SELECT * FROM students ORDER BY roll_no");
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
					<li><a href="teacher_login.php"><div class="glyphicon glyphicon-check"></div>&nbsp Notice Board</a></li>
					<li><a href="teacher_talk.php"><div class="glyphicon glyphicon-comment"></div>&nbsp Discussion</a></li>
					<li><a href="student_list.php" class="active"><div class="glyphicon glyphicon-user"></div>&nbsp Student Details</a></li>
				<!--	<li><a href="attendance.php"><div class="glyphicon glyphicon-calendar"></div>&nbsp Attendance</a></li>-->
				</div>
				<div class="notif">
				<h3>Students Record</h3><hr>
					<table class="table spl">
						<?php
							if($row=mysqli_fetch_array($table))
				  echo "
						<tr style='background:white'>
							<th></th>
							<th width='100px'>Roll no</th>
							<th width='300px'>Name of the student</th>
							<th width='200px'>Register no.</th>
						</tr>
						<tr>
							<td>
								<span class='glyphicon glyphicon-circle-arrow-right'></span>
							</td>
							
							<td style='width:60px'>
								".$row['roll_no']."
							</td>
							<td style='width:450px'>
						<a href='edit_student.php?id=".$row['reg_no']."'>
								".$row['name']."</a>
							</td>
							<td>
								".$row['reg_no']."
							</td>
						</tr>";
							else echo "<tr><td>No data in database</td></tr>"; 
							
							while($row=mysqli_fetch_array($table)){
								echo "
						<tr>
							<td>
								<span class='glyphicon glyphicon-circle-arrow-right'></span>
							</td>
							<td style='width:60px'>
								".$row['roll_no']."
							</td>
							<td style='width:450px'>
						<a href='edit_student.php?id=".$row['reg_no']."'>
								".$row['name']."</a>
							</td>
							<td>
								".$row['reg_no']."
							</td>
						</tr>";
							}
						
						
						?>
					</table>
			
				</div>
				
			</div>
		</div>
	</body>
</html>
