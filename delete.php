<?php
session_start();

ini_set('display_errors', true);
ini_set('display_startup_errors', true);
error_reporting(E_ALL);

header("Location: tasks.php"); 

if (isset($_GET['task'])) {
    $task = $_GET['task'];
};

if( $task && $_SESSION['id']){ 
    $conn = mysqli_connect(
        'tasklist',
        'root',
        '',
        'users'
    );

    $del = 'DELETE FROM `task` WHERE id=' . $_SESSION['id'] . ' AND task="' . $task . '"';
    mysqli_query(
        $conn,
        $del
    );
    mysqli_close($conn);
}


?>
