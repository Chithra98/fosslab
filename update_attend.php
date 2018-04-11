<?php
require "database.php";

$table=mysqli_query($connect,"SELECT * FROM students ORDER BY roll_no");
while($row=mysqli_fetch_array($table)){
	$reg=$row['reg_no'];
	$attend=$_POST[$reg];
	$attend+=$row['attend'];
	mysqli_query($connect,"UPDATE students SET attend='$attend' WHERE reg_no='$reg'");
}

header("Location: attendance.php");

?>