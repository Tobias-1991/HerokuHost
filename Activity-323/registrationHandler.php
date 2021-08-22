<?php
$servername = "localhost:3307";
$username = "root";
$password = "root";
$dbname = "activitydb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$name = $_POST["name"];
$pass = $_POST["password"];
$user = $_POST["username"];

$sql = "INSERT INTO users (USER_NAME, PASSWORD, NAME)
VALUES ('$user', '$pass', '$name')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
require 'index.php';
?>