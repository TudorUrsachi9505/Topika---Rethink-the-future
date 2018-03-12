<?php
define('DB_HOST','localhost');
define('DB_USER','root');
define('DB_PASSWORD','');
define('DB_NAME','users');

//$con = mysqli_connect("localhost","root","","users") or die("Failed to connect to MySQL!");

$con = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME) or die("Failed to connect to MySQL!" . mysqli_error());
$db = mysqli_select_db($con, 'users') or die("Failed to connect to MySQL!" . mysqli_error());
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL!" . mysqli_connect_error();
  }
else
{
echo "Successfully connected to the database: " . DB_NAME;
}
?>