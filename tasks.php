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
        <form>
            Task <input id='text' type="text" name="text" value="<?= $text ?>"><br><br>
    </div>
    <button type="submit">Confirm</button>
    </form><br><br>
    <a href="logout.php" name='logout'>Logout</a><br><br>
    <?

    if (session_name('id')) {
        $conn = mysqli_connect(
            'tasklist',
            'root',
            '',
            'users'
        );

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        };

        $userTask = 'SELECT `task` FROM `tasks` WHERE id="' . session_status() . '"';
        $userId = mysqli_fetch_assoc(mysqli_query($conn, $userTask));

        echo $userId['task'];
    };

    if (isset($_GET['text'])) {
        $text = $_GET['text'];
    };

    if (!empty($text)) {
        $conn = mysqli_connect(
            'tasklist',
            'root',
            '',
            'users'
        );
        $add = 'INSERT INTO `tasks`
    (`task` , `id`)
    VALUES 
    ("' . $text . '" , "' . session_status() . '")';

        mysqli_query(
            $conn,
            $add
        );
        } else {
            echo 'gdfgdfg';
        };


        mysqli_close($conn);
