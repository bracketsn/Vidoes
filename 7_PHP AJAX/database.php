<?php

$server="localhost";
$user="root";
$password="Kshitija97";
$db="servlet_login";
$tname="emp";

$conn = new mysqli($server, $user, $password, $db);

$name = $_GET["username"];
$query = "select * from " .$tname. "where name = '".$name."'";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0)
{
	echo "<table> <tr> <th> ID </th> <th> NAME </th> <th> EMAIL </th> </tr>";
	while ($row = mysqli_fetch_assoc($result))
	{
		echo "<tr> <td>".$row["id"]."</td> <td>".$row["name"]."</td> <td>".$row["email"]."</td> </tr>";
	}
	echo "</table>";
}
else
{
	echo "0 results";
}
?>