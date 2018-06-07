<html>
<body>

<?php

require_once 'connection.php';

$link = mysqli_connect($host, $user, $password, $database) 
    or die ("Ошибка:" . mysqli_error());

$mark_id = $_GET["id"];

$sql ="SELECT mark_student, mark_class, mark_subject, mark_teacher, mark_value
    FROM mark
    WHERE mark_id=" . $mark_id . ";";

$result = mysqli_query($link, $sql);
$record = mysqli_fetch_assoc($result);
?>

<form action="update.php" method="get">
    <input type="hidden" name="mark_id" value=<?php echo $mark_id; ?>><br>
    Имя ученика:
    <input type="text" name="mark_student" value=<?php echo $record['mark_student']; ?>><br>
    Класс:
	<input type="text" name="mark_class" value=<?php echo $record['mark_class']; ?>><br>
	Предмет:
	<input type="text" name="mark_subject" value=<?php echo $record['mark_subject']; ?>><br>
	Учитель:
	<input type="text" name="mark_teacher" value=<?php echo $record['mark_teacher']; ?>><br>
	Оценка:
	<input type="text" name="mark_value" value=<?php echo $record['mark_value']; ?>><br>
    <input type="submit">
</form>

</body>
</html>
