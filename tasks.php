<? session_start(); ?>
<html>

<head>
    <title>User Tasklist</title>
    <!-- <style type="text/css">
        #block {
            display: inline-grid;
            padding-left: 20px;
        }
    </style> -->
</head>

<body>
    <div id="task">
        <form action="save.php">
            New Task <input id='text' type="text" name="text" value="<?= $text ?>"><br><br>
            <button id="submit" type="submit">Confirm</button>
        </form><br>
    </div>
    <a href="logout.php" name='logout'>Logout</a><br><br>
    <?

    ini_set('display_errors', true);
    ini_set('display_startup_errors', true);
    error_reporting(E_ALL);

    if (isset($_GET['text'])) {
        $text = $_GET['text'];
    };

    if ($_SESSION['id']) {
        $conn = mysqli_connect(
            'tasklist',
            'root',
            '',
            'users'
        );

        $userTask = 'SELECT `task` FROM `task` WHERE id="' . $_SESSION['id'] . '"';
        $userId = mysqli_fetch_assoc(mysqli_query($conn, $userTask));

        $result = mysqli_query(
            $conn,
            $userTask
        );

        echo '<table>';
        $counter = 0;
        $counter1 = 0;
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<tr>';
            echo '<td>' . $row['task'] . '</td>';
            echo '<td><a href="delete.php?task=' . $row['task'] . '">X</a></td>';
            echo '<td><a href="update.php?task=' . $row['task'] . '">Modify</a></td>';
            '</tr>';
        }
        echo '</table>';

        mysqli_close($conn);
    };

    ?>
</body>

</html>