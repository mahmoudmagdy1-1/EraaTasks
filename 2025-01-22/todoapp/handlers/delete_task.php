<?php
session_start();


require_once('../config.php');

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])) {

    $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
    $id_exists = "SELECT * FROM tasks WHERE id = $id";
    if (!$id || $id < 1 || !$id_exists) {
        $_SESSION["error"] = "Invalid task ID";
        header("Location: ../index.php");
        exit;
    }

    $sql = "DELETE FROM tasks WHERE id = $id";

    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_affected_rows($conn) > 0) {
        $_SESSION["success"] = "Task deleted successfully";
        header("Location: ../index.php");
        die;
    } else {
        $_SESSION["error"] = "Error deleting task";
        header("Location: ../index.php");
        die;
    }
} else {
    $_SESSION["error"] = "Error deleting task";
    header("Location: ../index.php");
    die;
}
