<?php
require "database.php";

$id=$_GET['id'];
mysqli_query($connect,"DELETE FROM news WHERE id='$id'");
header("Location: teacher_login.php");
?>