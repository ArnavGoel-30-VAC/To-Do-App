<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'db_connect.php';

session_start();
if (!isset($_SESSION['user_id'])) {
    echo 'User not logged in';
    exit;
}

$user_id = $_SESSION['user_id'];

$stmt = $conn->prepare("SELECT * FROM tasks WHERE user_id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

$tasks = [];
while ($row = $result->fetch_assoc()) {
    $tasks[] = $row;
}

echo json_encode($tasks);

$stmt->close();
$conn->close();
?>
