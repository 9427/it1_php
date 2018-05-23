   <?php
   require_once 'connection.php';
 
$link = mysqli_connect($host, $user, $password, $database) 
or die ("Ошибка подключения к базе данных" . mysqli_error());
$name = strtr($_GET['name'], '*', '%');
$class = strtr($_GET['class'], '*', '%');
echo "<form method='GET' action='search.php'>
<p>Имя ученика: <input type='text' name='name' value='$name'></p>
<p>Класс: <input type='text' name='class' value='$class'></p>
<p><input type='submit' name='enter' value='Найти'></p>
</form>";
if (isset($_GET['enter']))
{
  $sql="SELECT mark_student, mark_class, mark_subject, mark_teacher, mark_value
FROM mark
WHERE mark_student LIKE '%$name%' AND mark_class LIKE '%$class%'";
$result = mysqli_query($link, $sql);
echo "<table border='1'>
<tr> 
<th>mark_student</th>
<th>mark_class</th>
<th>mark_subject</th>
<th>mark_teacher</th>
<th>mark_value</th>
</tr>";
while($row = mysqli_fetch_array($result))
{
echo "<tr>";
echo "<td>" . $row['mark_student'] . "</td>";
echo "<td>" . $row['mark_class'] . "</td>";
echo "<td>" . $row['mark_subject'] . "</td>";
echo "<td>" . $row['mark_teacher'] . "</td>";
echo "<td>" . $row['mark_value'] . "</td>";
echo "</tr>";
}
echo "</table>"; 
}
mysqli_close($link);
?>
