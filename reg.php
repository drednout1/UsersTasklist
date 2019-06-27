<?
header('location: main.php');
if (
    isset($_GET['regLog']) && isset($_GET['regPass']) && isset($_GET['email'])
) {
    $email = $_GET['email'];
    $regLog = $_GET['regLog'];
    $regPass = $_GET['regPass'];
};

$conn = mysqli_connect(
    'tasklist',
    'root',
    '',
    'users'
);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
};

$allUsers = 'SELECT * from `users` where `pass`="' . $regPass . '"';
$user = mysqli_fetch_assoc(mysqli_query($conn, $allUsers));

$newUsers = 'INSERT INTO `users`
    (`login` , `pass` , `email`)
    VALUES 
    ("' . $regLog . '" , "' . $regPass . '" , "' . $email . '")';

if ($user == !$regPass) {
        mysqli_query(
        $conn,
        $newUsers);
} else {
    ?><a href="http://tasklist/main.php">Please, Login in</a><?php
};


mysqli_close($conn);