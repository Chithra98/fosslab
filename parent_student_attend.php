<?php
session_start();
if(!$_SESSION['user'])
	 header("Location: logout.php");

require "database.php";
$user=$_SESSION['user'];

$table=mysqli_query($connect,"SELECT * FROM parents WHERE name='$user'");
$row=mysqli_fetch_array($table);
$student=$row['student'];

$table=mysqli_query($connect,"SELECT * FROM teachers WHERE type='admin'");
$row=mysqli_fetch_array($table);
$max=$row['max_attend'];

$students=mysqli_query($connect,"SELECT * FROM students ORDER BY roll_no");
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
					<li><a href="parent_login.php"><div class="glyphicon glyphicon-check"></div>&nbsp Notice Board</a></li>
					<li><a href="parent_student_profile.php"><div class="glyphicon glyphicon-user"></div>&nbsp Student Details</a></li>
					<li><a href="parent_student_attend.php" class="active"><div class="glyphicon glyphicon-calendar"></div>&nbsp Attendance</a></li>
				</div>
				<div class="notif">
					<h3>Attendance List</h3><hr>
					<p>Total no. of hours : &nbsp<?php echo $max ?> </p>
					<table class="table">
						<tr style="background:white">
							<th width="80px">Roll no.</th>
							<th width="200px">Name of the Student</th>
							<th width="180px">No. of hours present</th>
							<th width="100px">Percentage</th>
							<th width="150px">Remarks</th>
						</tr>
						<?php
						mysqli_query($connect,"TRUNCATE TABLE temp");
							while($row=mysqli_fetch_array($students)){
								if($row['reg_no']==$student) 
								$son="style='background:#cfcfcf'";
								else $son="";
								$per=ceil(($row['attend']/$max)*100);
								$fill=NULL;
								if($per>=75) $remark="ATTENDANCE OK";
								else if($per>70) $remark="INSUFFICIENT";
								else $remark="TOO INSUFFICIENT";
								if($per<75) $fill="style='color:red'";
								echo "
									<tr ".$fill.$son.">
										<td>".$row['roll_no']."</td>
										<td>".$row['name']."</td>
										<td>".$row['attend']."</td>
										<td>".$per."%</td>
										<td>".$remark."</td>
									</tr>";
									$roll=$row['roll_no'];
								$name=$row['name'];
								$attend=$row['attend'];
								$per=$per."%";
									mysqli_query($connect,
		"INSERT INTO temp VALUES('$roll','$name','$attend','$per','$remark')");
								
							}
						?>
	
					</table>
					*Highlighted row represents your student
					<br>
					<br>
					<center>
						<a  href="generate_report.php" target="_blank"  class="btn" style="display:block;background:#1855a1;color:white;width:200px">Download PDF</a>
					</center>
				</div>
			</div>
		</div>
	</body>
</html>