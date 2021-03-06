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
					<li><a href="teacher_login.php" class="active"><div class="glyphicon glyphicon-check"></div>&nbsp Notice Board</a></li>
					<li><a href="teacher_talk.php"><div class="glyphicon glyphicon-comment"></div>&nbsp Discussion</a></li>
					<li><a href="student_list.php"><div class="glyphicon glyphicon-user"></div>&nbsp Student Details</a></li>
				<!--	<li><a href="attendance.php"><div class="glyphicon glyphicon-calendar"></div>&nbsp Attendance</a></li>-->
				</div>
				<div class="notif">
				<h3>Notice Board</h3><hr>
					<table class="table" style="background:white">
						<?php
							if($row=mysqli_fetch_array($table))
				  echo "<tr>
							<td width='20px' style='padding-top:13px'>
								<span class='glyphicon glyphicon-circle-arrow-right'></span>
							</td>
							<td style='width:650px'>
								".$row['news']."
							</td>
							<td>
								<a href='delete_news.php?id=".$row['id']."' style='color:black'>
								<span class='glyphicon glyphicon-trash'></span></a>
							</td>
						</tr>";
							else echo "<tr><td>No notifications yet</td></tr>"; 
							
							while($row=mysqli_fetch_array($table)){
								echo "
						<tr>
							<td width='20px' style='padding-top:13px'>
								<span class='glyphicon glyphicon-circle-arrow-right'></span>
							</td>
							<td>
								".$row['news']."
							</td>
							<td>
								<a href='delete_news.php?id=".$row['id']."' style='color:black'>
								<span class='glyphicon glyphicon-trash'></span></a>
							</td>
						</tr>
									 ";
							}
						
						
						?>
					</table>
					<hr>
					<form method="POST" action="update_news.php">
						<h4>Add new notification</h4>
						<input type="text" class="form-control" name="news" style="float:left;width:600px">
						<input type="submit" class="btn btn-danger" name="Submit" style="margin-left:20px;float:left">
					</form>
				</div>
				
			</div>
		</div>
	</body>
</html>
