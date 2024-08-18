<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'db_connect.php';

session_start();
if (!isset($_SESSION['user_id'])) {
    echo 'User not logged in';
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $task_description = $_POST['task_description'];
    $user_id = $_SESSION['user_id'];
    
    $stmt = $conn->prepare("INSERT INTO tasks (task_description, user_id) VALUES (?, ?)");
    $stmt->bind_param("si", $task_description, $user_id);
    
    if ($stmt->execute()) {
        echo 'Task added successfully';
    } else {
        echo 'Error: ' . $stmt->error;
    }
    
    $stmt->close();
    $conn->close();
} else {
    echo 'Invalid request method';
}
?>
