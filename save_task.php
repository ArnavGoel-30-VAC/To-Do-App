<?php
session_start();
require 'connect.php';

$user_id = $_SESSION['user_id'];
$task_description = $_POST['task_description'];

$sql = "INSERT INTO tasks (user_id, task_description) VALUES ('$user_id', '$task_description')";

if ($conn->query($sql) === TRUE) {
    echo "Task saved";
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>
