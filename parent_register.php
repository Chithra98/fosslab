<?php
require "database.php";
$table=mysqli_query($connect,"SELECT * FROM students");
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
			</div>
			<div class="content">
				
				<div class="form_wrapper">
					<center>
				<h2>Parent's Registration form</h2>
				<p>Please fill in the form carefully. Remember your passwords.</p><hr>
			</center>
				<form method="POST" action="admit_parent.php">
				<table class="ad_form">
					<tr>
						<td>Name of the Parent(This will be your username) :</td>				
						<td><input type="text" name="name" class="form-control" required></td>
					</tr>
					<tr>
						<td>Password :</td>				
						<td><input type="password" class="form-control" name="pass1" id="pass1" required></td>
					</tr>
					<tr>
						<td>Confirm Password :</td>				
						<td><input type="password" class="form-control" name="pass2" id="pass2"required></td>
					</tr>
					<tr>
						<td colspan="2" class="head" style="padding-left:20px;height:40px">
							Details of the student
						</td>
					</tr>
					<tr>
						<td>Select your student :</td>				
						<td>
							<select class="form-control" name="student">
								<option value="">Select student</option>
								<?php
									while($row=mysqli_fetch_array($table)){
										$reg=$row['reg_no'];
										$name=$row['name'];
									echo "<option value='".$reg."'>".$name."</option>";
									}
								?>
							
							</select>
						</td>
					</tr>
					<tr>
						<td>Department :</td>				
						<td>
							<select name="branch" class="form-control" required>
								<option value="CSE">Computer Science & Engineering</option>
							</select>
						</td>
					</tr>
					
				</table><br>
				<center><input type="submit" value="Submit" class="btn" id="submit"></center>
					</form>
				</div>
				
			</div>
		</div>
	</body>
</html>