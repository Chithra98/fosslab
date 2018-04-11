<?php
require "database.php";

$user=$_POST['user'];
$pass=$_POST['pass'];
$type=$_POST['type'];


if($type=='s')
{
$table=mysqli_query($connect,"SELECT * FROM students WHERE reg_no='$user'");
$row=mysqli_fetch_array($table);
	if($pass==$row['password']){
		session_start();
		$_SESSION['user']=$row['reg_no'];
		header("Location: student_login.php");
	}
	else 
		header("Location: index.html");
}
else if($type=='t')
{
	$table=mysqli_query($connect,"SELECT * FROM teachers WHERE name='$user'");
	$row=mysqli_fetch_array($table);
	if($pass==$row['password']){
		session_start();
		$_SESSION['user']=$row['name'];
		if($row['type']=="admin")
		header("Location: teacher_login.php");
		else if($row['type']=="lecturer")
		header("Location: lect_login.php");
	}
}
else if($type=='p')
{
	$table=mysqli_query($connect,"SELECT * FROM parents WHERE name='$user'");
	$row=mysqli_fetch_array($table);
	if($pass==$row['password']){
		session_start();
		$_SESSION['user']=$row['name'];
		header("Location: parent_login.php");
}
	else 
		header("Location: index.html");
}
else 
		header("Location: index.html");

?>