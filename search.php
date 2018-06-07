   <?php
   require_once 'connection.php';
 
    $link = mysqli_connect($host, $user, $password, $database) 
    or die ("Ошибка:" . mysqli_error());
    $name = strtr($_GET['name'], '*', '%');
    $subj = strtr($_GET['subj'], '*', '%');
	 $name1 = strtr($_GET['name'], '*', '*');
    $subj1 = strtr($_GET['subj'], '*', '*');

    echo "<form method='GET' action='search.php'>
    <p>Введите имя ученика: <input type='text' name='name' placeholder='$name1' value='$name'></p>
    <p>Введите предмет: <input type='text' name='subj' placeholder='$subj1' value='$subj'></p>
    <p><input type='submit' name='enter' value='Поиск'></p>
    </form>";

    if (isset($_GET['enter']))
    {   
      $sql="SELECT mark_student, mark_class, mark_subject, mark_teacher, mark_value
    FROM mark
    WHERE mark_student LIKE '%$name%' AND mark_subject LIKE '%$subj%'";

$result = mysqli_query($link, $sql);
echo "<table border='1'>
<tr> 
<th>mark_student</th>
<th>mark_class</th>
<th>mark_subject</th>
<th>mark_teacher</th>
<th>mark_value</th></tr>";
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

