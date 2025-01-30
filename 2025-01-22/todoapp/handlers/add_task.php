<?php
session_start();


require_once('../config.php');
require_once('../helpers/validation.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['task'])) {

    $task = validate_string($_POST['task']);

    if (empty($task)) {
        $_SESSION["error"] = "Task field is required";
        header("Location: ../index.php");
        die;
    }


    $sql = "INSERT INTO tasks (task) VALUES ('" . $_POST['task'] . "')";

    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_affected_rows($conn) > 0) {
        $_SESSION["success"] = "Task added successfully";
        header("Location: ../index.php");
        die;
    } else {
        $_SESSION["error"] = "Error adding task";
        header("Location: ../index.php");
        die;
    }
} else {
    $_SESSION["error"] = "Error adding task";
    header("Location: ../index.php");
    die;
}
