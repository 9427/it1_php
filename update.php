<?php
require_once 'connection.php';
 
$link = mysqli_connect($host, $user, $password, $database) 
    or die ("Ошибка:" . mysqli_error());

$mark_id = $_GET['mark_id'];
$mark_student = $_GET['mark_student'];
$mark_class = $_GET['mark_class'];
$mark_subject = $_GET['mark_subject'];
$mark_teacher = $_GET['mark_teacher'];
$mark_value = $_GET['mark_value'];

$sql = "UPDATE mark
        SET mark_student = '" . $mark_student . "',
		mark_class = '" . $mark_class . "', 
		mark_subject = '" . $mark_subject . "', 
		mark_teacher = '" . $mark_teacher . "',
		mark_value = '" . $mark_value . "',
        WHERE mark_id=" . $mark_id . ";";

mysqli_query($link, $sql);		

mysqli_close($link);

header("Location: list.php");

?>
