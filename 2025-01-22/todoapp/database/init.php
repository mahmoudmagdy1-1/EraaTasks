<?php
function checkDatabaseAndTables($conn)
{
    $db_selected = mysqli_select_db($conn, 'todoapp');
    if (!$db_selected) {
        return false;
    }

    $result = mysqli_query($conn, "SHOW TABLES LIKE 'tasks'");
    if (mysqli_num_rows($result) == 0) {
        return false;
    }

    return true;
}

if (!checkDatabaseAndTables($conn)) {
    require_once('./database/migration.php');
}
