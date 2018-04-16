<?php

$id = $_POST["id"];
$name = $_POST["name"];
$email= $_POST["email"];

$server = 'localhost';
$user = 'root';
$password ='Kshitija97';
$database = 'servlet_login';
$tname = 'emp';

$conn = new mysqli($server, $user, $password, $database);

if($conn->connect_error)
{
	die("Connection failed");
}

$sql = "insert into ".$tname." values ('".$id."','".$name."','".$email."')";

if ($conn->query($sql)==TRUE)
	echo "<br>--------Record added---------<br>";
else
	echo "<br>--------Error----------<br>";

$conn->close();

?>