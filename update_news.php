<?php
require "database.php";
$table=mysqli_query($connect,"SELECT * FROM count");
$row=mysqli_fetch_array($table);	
echo $count=$row['count'];
$new_count=$count+1;

mysqli_query($connect,"UPDATE count SET count='$new_count' WHERE count='$count'");

echo $news=$_POST['news'];
mysqli_query($connect,"INSERT INTO news VALUES('$news','$new_count')");
header("Location: teacher_login.php");
?>