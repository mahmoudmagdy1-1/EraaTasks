<?php
$conn = mysqli_connect("localhost", "root", "", "todoapp");

if (!$conn) {
    echo "Error connecting to database: " . mysqli_connect_error();
    die;
}
