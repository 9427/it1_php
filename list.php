<?php
require_once 'connection.php';
 
$link = mysqli_connect($host, $user, $password, $database) 
    or die ("Ошибка:" . mysqli_error());

$sql ="SELECT mark_id, mark_student, mark_class, mark_subject, mark_teacher, mark_value
    FROM mark";

echo "<table border='1'>
<tr> 
<th>mark_id</th>
<th>mark_student</th>
<th>mark_class</th>
<th>mark_subject</th>
<th>mark_teacher</th>
<th>mark_value</th>
<th>edit</th>
<th>delete</th>
</tr>";

$result = mysqli_query($link, $sql);
while($row = mysqli_fetch_array($result))
{
echo "<tr>";
echo "<td>" . $row['mark_id'] . "</td>";
echo "<td>" . $row['mark_student'] . "</td>";
echo "<td>" . $row['mark_class'] . "</td>";
echo "<td>" . $row['mark_subject'] . "</td>";
echo "<td>" . $row['mark_teacher'] . "</td>";
echo "<td>" . $row['mark_value'] . "</td>";
echo "<td><a href='edit.php?mark_id=" . $row['mark_id'] . "'>edit</a></td>";
echo "<td><a href='delete.php?mark_id=" . $row['mark_id'] . "'>delete</a></td>";
echo "</tr>";
}


mysqli_close($link);
?>
