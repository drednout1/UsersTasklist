<?
ini_set('display_errors', true);
ini_set('display_startup_errors', true);
error_reporting(E_ALL);

if (
    isset($_GET['login']) && isset($_GET['pass'])
) {
    $login = $_GET['login'];
    $pass = $_GET['pass'];
};

$conn = mysqli_connect(
    'tasklist',
    'root',
    '',
    'users'
);

$allUsers = 'SELECT * from `users` where `pass`="' . $pass . '"';
$id = 'SELECT `id` from `users` where `login`="' . $login . '"';

$user = mysqli_fetch_assoc(mysqli_query($conn, $allUsers));
$userId = mysqli_fetch_assoc(mysqli_query($conn, $id));

if (($login == $user['login']) && ($pass == $user['pass'])) {
    session_start();
    $_SESSION['id'] = $userId['id'];
    header('location: tasks.php');
} else {
    ?><a href="http://tasklist/main.php">Register please</a><?php
};
mysqli_close($conn);

    echo '<pre>';
        print_r($user);
    '</pre>';
