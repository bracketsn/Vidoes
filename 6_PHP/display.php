<?php

$server = 'localhost';
$user = 'root';
$password = 'Kshitija97';
$db = 'servlet_login';
$tname = 'emp';

$conn = new mysqli($server, $user, $password, $db);

$sql = "select * from ".$tname;
$result = mysqli_query($conn, $sql);

echo "<br>-----------Contents------------<br>";

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