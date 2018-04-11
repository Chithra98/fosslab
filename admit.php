<?php
require "database.php";

echo $name=$_POST['name'];
echo $course=$_POST['course'];
echo $branch=$_POST['branch'];
echo $email=$_POST['email'];
echo $phone=$_POST['phone'];
echo $reg_no=$_POST['reg_no'];
echo $sem=$_POST['sem'];
echo $address=$_POST['address'];
echo $pass1=$_POST['pass1'];
echo $pass2=$_POST['pass2'];
echo $roll_no=$_POST['roll_no'];

if($pass1==$pass2)
{	
mysqli_query($connect,"INSERT INTO students VALUES('$name','$course','$branch','$email','$phone','$reg_no','$sem','$address','$pass1','$roll_no','0')") or die(mysqli_error($connect));
header("Location: admit_success.html");
}
else 
header("Location: register.html");
?>