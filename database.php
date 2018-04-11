<?php
 define('DB_SERVER', 'localhost');
   define('DB_USERNAME', 'root');
   define('DB_PASSWORD', 'Chithra@1998');
   define('DB_DATABASE', 'mini');

$connect=mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
if ($connect->connect_error) {
    die("Connection failed: " . $db->connect_error);
}
else
{
echo "connected";
}

?>
