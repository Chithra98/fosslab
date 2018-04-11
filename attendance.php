<?php
session_start();
if(!$_SESSION['user'])
	 header("Location: logout.php");

require "database.php";
$user=$_SESSION['user'];


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
					<li><a href="teacher_login.php"><div class="glyphicon glyphicon-check"></div>&nbsp Notice Board</a></li>
					<li><a href="teacher_talk.php"><div class="glyphicon glyphicon-comment"></div>&nbsp Discussion</a></li>
					<li><a href="student_list.php"><div class="glyphicon glyphicon-user"></div>&nbsp Student Details</a></li>
					<li><a href="attendance.php" class="active"><div class="glyphicon glyphicon-calendar"></div>&nbsp Attendance</a></li>
				</div>
				<div class="notif">
					<h3>Attendance List</h3>
					<hr>
					<form method="POST" action="update_max_attend.php">
					<p style="float:left;margin-top:5px">Total no. of hours : &nbsp<?php echo $max=$row['max_attend']; ?> </p>
<input type="number" style="float:left;margin-left:20px;margin-right:20px" class="form-control" name="max" placeholder="Hours to add">
					<input type="submit" style="float:left; background:green;color:white" value="Update" class="btn">
					</form>
					<?php if(isset($_SESSION['info'])) echo $_SESSION['info']; $_SESSION['info']=NULL; ?>
					<br><br><br>
					<form method="POST" action="update_attend.php">
					<table class="table">
						<tr style="background:white">
							<th width="60px">Roll no.</th>
							<th width="180px">Name of the Student</th>
							<th width="130px">No. of hours present</th>
							<th width="100px">Percentage</th>
							<th width="100px">Remarks</th>
							<th width="100px">Hours to add</th>
						</tr>
						<?php
						mysqli_query($connect,"TRUNCATE TABLE temp");
							while($row=mysqli_fetch_array($students)){
								$per=ceil(($row['attend']/$max)*100);
								$fill=NULL;
								if($per>=75) $remark="ATTENDANCE OK";
								else if($per>70) $remark="INSUFFICIENT";
								else $remark="TOO INSUFFICIENT";
								if($per<75) $fill="style='color:red'";
								echo "
									<tr ".$fill.">
										<td>".$row['roll_no']."</td>
										<td>".$row['name']."</td>
										<td>".$row['attend']."</td>
										<td>".$per."%</td>
										<td>".$remark."</td>
					<td><input type='number' name='".$row['reg_no']."' class='form-control' min='0' max='6'></td>
									</tr>";
									$roll=$row['roll_no'];
								$name=$row['name'];
								$attend=$row['attend'];
								$per=$per."%";
									mysqli_query($connect,
		"INSERT INTO temp VALUES('$roll','$name','$attend','$per','$remark')");
								
							}
						?>
						<tr>
							<td colspan="6">
							<input type="submit" value="Update" class="btn" style="float:right;margin-right:40px;background:green;color:white">
							</td>
						</tr>
					</form>
					</table>
					<br>
					<center>
						<a  href="generate_report.php" target="_blank"  class="btn" style="display:block;background:#1855a1;color:white;width:200px">Download PDF</a>
					</center>
				</div>
			</div>
		</div>
	</body>
</html>