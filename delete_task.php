<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");

include('db_connect.php');
session_start();

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    $task_description = $_POST['task_description'];

    $stmt = $conn->prepare("DELETE FROM tasks WHERE user_id = ? AND task_description = ?");
    $stmt->bind_param("is", $user_id, $task_description);

    if ($stmt->execute()) {
        echo "Task deleted successfully.";
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
    $conn->close();
} else {
    echo "Not logged in";
}
?>
