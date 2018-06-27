<?php
require_once 'connection.php';
 
$link = mysqli_connect($host, $user, $password, $database) 
    or die ("Ошибка:" . mysqli_error());

$mark_id = $_GET['mark_id'];

$sql = "DELETE
        FROM mark
        WHERE mark_id='" . $mark_id . "';";

mysqli_query($link, $sql);
		
mysqli_close($link);

header("Location: list.php");

?>
