<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT status FROM tasks WHERE id = $id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    $new_status = $row['status'] == 'pending' ? 'completed' : 'pending';
    $sql = "UPDATE tasks SET status = '$new_status' WHERE id = $id";

    if ($conn->query($sql)) {
        header("Location: mulai.php");
        exit;
    } else {
        echo "Error: " . $conn->error;
    }
}
?>