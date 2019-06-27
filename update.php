<? session_start(); ?>
<html>

<head>
    <title>Modify</title>
</head>

<body>
    <div>
        <form>
            Modify <input id='text' type="text" name="text" value="<?= $text ?>"><br><br>
            <input type="hidden" name="" id="" value="<?= $task ?>">
            <button id="submit" type="submit">Confirm</button>
        </form><br>
    </div>
    <a href="tasks.php">Return to tasks</a><br><br>
    <?

    ini_set('display_errors', true);
    ini_set('display_startup_errors', true);
    error_reporting(E_ALL);

    if (isset($_GET['text']) || isset($_GET['task'])) {
        $text = $_GET['text'];
        $task = $_GET['task'];
    };

    $conn = mysqli_connect(
        'tasklist',
        'root',
        '',
        'users'
    );

    $modify = 'SELECT `task` FROM `task` WHERE id=' . $_SESSION['id'] . ' AND task="' . $task . '"';
    $path = mysqli_fetch_assoc(mysqli_query($conn, $modify));

    echo '<pre>';
    print_r($path['task']);
    '</pre>';

    $del = 'DELETE FROM `task` WHERE id=' . $_SESSION['id'] . ' AND task="' . $task . '"';
    mysqli_query(
        $conn,
        $del
    );

    mysqli_close($conn);

    echo $text;

    if ($text) {
        $conn = mysqli_connect(
            'tasklist',
            'root',
            '',
            'users'
        );

        $insert = 'INSERT INTO `task`
    (`task` , `id`)
    VALUES 
    ("' . $text . '" , "' . $_SESSION['id'] . '")';

        mysqli_query(
            $conn,
            $insert
        );

    mysqli_close($conn);
    }

    echo '<pre>';
    print_r($conn);
    '</pre>';
    ?>
</body>

</html>