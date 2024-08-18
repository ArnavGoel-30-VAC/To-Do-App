<?php
require 'connect.php';

$username = $_POST['username'];
$password = md5($_POST['password']); // Hashing password

$sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";

if ($conn->query($sql) === TRUE) {
    echo "Signup successful";
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>
