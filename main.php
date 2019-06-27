<html>

<head>
    <title>Authorization</title>
    <style type="text/css">
        #block {
            display: inline-grid;
            padding-left: 20px;
        }
    </style>
</head>

<body>
    <div id="block">
        <form action="login.php">
            <p>Authorization</p>
            Log <input type="text" name="login" value="<?= $login ?>"><br><br>
            Pass <input type="text" name="pass" value="<?= $pass ?>"><br><br>
            <button type="submit">Confirm</button>
        </form>
        <a href="logout.php" name='logout'>Logout</a><br><br>
    </div>
    <div id="block">
        <p>Registration</p>
        <form action="reg.php">
            Log <input type="text" name="regLog" value="<?= $regLog ?>"><br><br>
            Pass <input type="text" name="regPass" value="<?= $regPass ?>"><br><br>
            Email <input type="text" name="email" value="<?= $email ?>"><br><br>
            <button type="submit">Confirm</button>
        </form>
    </div>

    <? session_start();
    ini_set('display_errors', true);
    ini_set('display_startup_errors', true);
    error_reporting(E_ALL);

    if (
        isset($_GET['login']) && isset($_GET['pass']) && isset($_GET['regLog'])
        && isset($_GET['regPass']) && isset($_GET['email'])
    ) {
        $email = $_GET['email'];
        $regLog = $_GET['regLog'];
        $regPass = $_GET['regPass'];
        $login = $_GET['login'];
        $pass = $_GET['pass'];
    };

    if (isset($_GET['logout'])) {
        header('location: logout.php');
    };

    if (!empty($login && $pass)) {
        header('location: login.php');
    };

    if (!empty($regLog && $regPass && $email)) {
        header('location: reg.php');
    } else ('Fill all forms');

    $conn = mysqli_connect(
        'tasklist',
        'root',
        '',
        'users'
    );

    $sql = 'SELECT * from `users`';

    $result = mysqli_query(
        $conn,
        $sql
    );

    echo '<pre>';
    while ($row = mysqli_fetch_assoc($result)) {
        print_r($row);
    }
    '</pre>';
    mysqli_close($conn);

    echo $_SESSION['id'];

    if ($_SESSION['id']) {
        ?><a href="tasks.php" name='return'>Return to tasks</a><br><br>
    <?
}
?>
</body>



</html>