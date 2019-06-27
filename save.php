<?php
session_start();
header('location: tasks.php');
ini_set('display_errors', true);
ini_set('display_startup_errors', true);
error_reporting(E_ALL);

require_once('tasks.php');

if ($text) {
    $conn = mysqli_connect(
        'tasklist',
        'root',
        '',
        'users'
    );

    $add = 'INSERT INTO `task`
    (`task` , `id`)
    VALUES 
    ("' . $text . '" , "' . $_SESSION['id'] . '")';

    mysqli_query(
        $conn,
        $add
    );
};
mysqli_close($conn);
?>
