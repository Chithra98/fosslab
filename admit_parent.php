<?php
require "database.php";

echo $name=$_POST['name'];
echo $branch=$_POST['branch'];
echo $student=$_POST['student'];
echo $pass1=$_POST['pass1'];
echo $pass2=$_POST['pass2'];

if($pass1==$pass2)
{	
mysqli_query($connect,"INSERT INTO parents VALUES('$name','$pass1','$student','$branch')") or die(mysqli_error($connect));
header("Location: admit_success.html");
}
else 
header("Location: parent_register.php");
?>