<?php
require "database.php";
session_start();

echo $user=$_SESSION['user'];
$text=$_POST['text'];

$h=date("h")+3;
$m=date("i")+30;
$a=date("a");
$time=$h.".".$m.$a;

$date=$time.",".date("D-d/M/y");

$table=mysqli_query($connect,"SELECT * FROM count");
$row=mysqli_fetch_array($table);
echo $count=$row['count'];
$count++;
$old_count=$count-1;
mysqli_query($connect,"UPDATE count SET count='$count' WHERE count='$old_count'");

$table=mysqli_query($connect,"SELECT * FROM students WHERE reg_no='$user'");
$row=mysqli_fetch_array($table);
$name=$row['name'];

mysqli_query($connect,"INSERT INTO talk VALUES('$count','$name','$text','$date')");
header("Location: talk.php");

?>