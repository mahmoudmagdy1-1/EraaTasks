<?php
$sql = "SELECT * FROM tasks";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    $tasks = mysqli_fetch_all($result, MYSQLI_ASSOC);
}
mysqli_close($conn);
