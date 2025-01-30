<?php


$conn = mysqli_connect("localhost", "root", "");

$sql = "CREATE DATABASE IF NOT EXISTS todoapp";

$result = mysqli_query($conn, $sql);

if (!$result) {
    echo "Error creating database: " . mysqli_error($conn);
    die;
}

mysqli_close($conn);

$conn = mysqli_connect("localhost", "root", "", "todoapp");

$sql = "CREATE TABLE IF NOT EXISTS tasks (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    task VARCHAR(200) NOT NULL
)";

$result = mysqli_query($conn, $sql);

if (!$result) {
    echo "Error creating table: " . mysqli_error($conn);
    die;
}


header("Location: ../index.php");
