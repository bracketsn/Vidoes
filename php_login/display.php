<?php 
$server = 'localhost';
$user = 'root';
$pass = 'Kshitija97';
$db = 'servlet_login';


$conn = new mysqli($server,$user,$pass,$db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$tablename = 'emp';

display($tablename,$conn);

function display($tablename ,$conn){
$sql = "SELECT * FROM ".$tablename;
$result = mysqli_query($conn, $sql);

    echo "<br>---------Display----------<br>";

    if (mysqli_num_rows($result) > 0) {
        echo "<ul>";
        while($row = mysqli_fetch_assoc($result)) {
            echo "<li>  id: " . $row["id"]. " - Name: " . $row["name"]." Email : ".$row["email"]."  </li>";
        }
        echo "</ul>";
    } else {
        echo "0 results";
    }
}
?>