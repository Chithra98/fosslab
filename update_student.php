<?php
require "database.php";

echo $name=$_POST['name'];
echo $reg_no=$_POST['reg_no'];
echo $sem=$_POST['sem'];
echo $branch=$_POST['branch'];
echo $course=$_POST['course'];
echo $address=$_POST['address'];
echo $phone=$_POST['phone'];
echo $email=$_POST['email'];
echo $roll_no=$_POST['roll_no'];

mysqli_query($connect,"UPDATE students SET roll_no='$roll_no',name='$name',sem='$sem',branch='$branch', course='$course',phone='$phone',email='$email',address='$address' WHERE reg_no='$reg_no'") or die(mysqli_error($connect));
header("Location: student_list.php");
?>