<?php
require_once 'connection.php';
 
$link = mysqli_connect($host, $user, $password, $database) 
    or die ("Ошибка:" . mysqli_error());

$id_record = $_GET['id'];

$sql = "DELETE
        FROM mark
        WHERE mark_id='" . $id_record . "';";

mysqli_query($link, $sql)
		
mysqli_close($link);

header("Location: list.php");

?>
