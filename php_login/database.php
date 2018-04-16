<?php

/*------------------- Establishing Connection---------------------------*/

$id = $_POST["id"];
$name = $_POST["name"];
$email = $_POST["email"];

$server = 'localhost';
$user = 'root';
$pass = 'Kshitija97';
$db = 'servlet_login';
$tablename = 'emp';

$conn = new mysqli($server,$user,$pass,$db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

insert($tablename,$conn ,$id, $name , $email);

/*------------------- Inserting---------------------------*/

function insert($tablename,$conn ,$id, $name , $email){
    
    $sql = "INSERT INTO ".$tablename." (id,name, email)
    VALUES (' ".$id." ',' ".$name." ', '".$email."')";

    if ($conn->query($sql) === TRUE) {
        echo "<br>-------New record created successfully-------<br>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}


/*-----------------Close Connection ---------------------*/
$conn->close();
?>