<?php
session_start();
if(!$_SESSION['user'])
	header("Location: logout.php");

require "database.php";
$table=mysqli_query($connect,"SELECT * FROM talk ORDER BY id DESC");
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
					<li><a href="lect_talk.php" class="active"><div class="glyphicon glyphicon-comment"></div>&nbsp Discussion</a></li>
					<li><a href="lect_student_list.php"><div class="glyphicon glyphicon-user"></div>&nbsp Student Details</a></li>
				<!--	<li><a href="lect_student_attend.php"><div class="glyphicon glyphicon-calendar"></div>&nbsp Attendance</a></li>-->
				</div>
				<div class="notif" style="overflow:hidden">
					
					<div class="msg">
						<?php
							while($row=mysqli_fetch_array($table)){
								echo "
										<div class='bubble'>
											<div class='bubble-head'>
											".$row['user']."
											<p>".$row['date']."</p>
											</div>
											<p class='msg_cont'>
											".$row['content']."
											</p>
										</div>
									 "; 
							}
						?>
					</div>
					<div class="text">
					<form method="POST" action="add_lect_talk.php">
						<input type="text" class="form-control" name="text" style="float:left;width:680px;">
						<input type="submit" value="Send" class="btn btn-danger" style="float:left;margin-left:10px;width:70px;">
					</div>
					</form>
				</div>
				
			</div>
		</div>
	</body>
</html>
