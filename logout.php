<? 
header('location: main.php');
session_start();
session_unset();
$_SESSION['id'] = array();
session_destroy();
?>