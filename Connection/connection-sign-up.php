<?php
define('DB_HOST','localhost');
define('DB_USER','root');
define('DB_PASSWORD','');
define('DB_NAME','users');

$con = mysqli_connect (DB_HOST,DB_USER,DB_PASSWORD,DB_NAME) or die ("Failed to connect to MySQL!" . mysqli_error());
$db = mysqli_select_db ($con, 'users') or die ("Failed to connect to MySQL!" . mysqli_error());

function NewUser()
{
	$con = mysqli_connect (DB_HOST,DB_USER,DB_PASSWORD,DB_NAME) or die ("Failed to connect to MySQL!" . mysqli_error());
	$name = $_POST['fname'];
	$email = $_POST['email'];
        $userName = $_POST['uname'];
	$password =  $_POST['pwd'];
	$query = "INSERT INTO signupform (Name,Email,Username,Password) VALUES ('$name','$email','$userName','$password')";
	$data = mysqli_query ($con, $query) or die (mysqli_error($con));
	if($data)
	{
	echo "YOUR REGISTRATION IS COMPLETED!";
	}
}

function SignUp()
{
	$con = mysqli_connect (DB_HOST,DB_USER,DB_PASSWORD,DB_NAME) or die ("Failed to connect to MySQL!" . mysqli_error());
	
	$sql = "SELECT * FROM signupform WHERE Username = '$_POST[uname]' AND Password= '$_POST[pwd]'";
	
	$res = mysqli_query($con, $sql);
	
	$query = mysqli_query ($con, $sql) or die (mysqli_error($con));
	
	if(mysqli_num_rows($res) > 0) {
		
		echo "SORRY, THE USER IS ALREADY REGISTERED!";
	}	
	else if(!$row = mysqli_fetch_array ($query) or die (mysqli_error($con)))
	{
		NewUser();
	}
		
}

if(isset($_POST['submit']))
{
	SignUp();
}
?>
