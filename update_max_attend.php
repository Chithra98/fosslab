<?php
require "database.php";

$max=$_POST['max'];

$table=mysqli_query($connect,"SELECT * FROM teachers WHERE type='admin'");
$row=mysqli_fetch_array($table);
$max+=$row['max_attend'];

mysqli_query($connect,"UPDATE teachers SET max_attend='$max' WHERE type='admin'");
header("Location: attendance.php");

?>