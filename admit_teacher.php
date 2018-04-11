<?php
require "database.php";

echo $name=$_POST['name'];
echo $branch=$_POST['branch'];
echo $sem=$_POST['sem'];
echo $pass1=$_POST['pass1'];
echo $pass2=$_POST['pass2'];

if($sem) $type="admin";
else $type="lecturer";

if($pass1==$pass2)
{	
mysqli_query($connect,"INSERT INTO teachers VALUES('$name','$pass1','$sem','0','$branch','$type')") or die(mysqli_error($connect));
header("Location: admit_success.html");
}
else 
header("Location: teacher_register.html");
?>