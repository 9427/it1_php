<?php
require_once 'connection.php'; 
$link = mysqli_connect($host, $user, $password, $database) 
    or die ("Ошибка подключения к базе данных" . mysqli_error($link));
echo "Вы подключились!<br>";

$sql = 'create table teacher (
teacher_name varchar(100) NOT NULL,
teacher_classroom int(4) NOT NULL,
teacher_salary int(6) NOT NULL,
PRIMARY KEY (teacher_name)
) ENGINE=MyISAM';
if (mysqli_query($link, $sql)) {
echo "Table
created successfully<br>";
} else {
echo "Error 
creating table: <br>" . mysqli_error($link);
}

$sql = "insert into teacher values ('Ivanov Petr Sidorovich', 101, 8600),
('Petrov Sidor Ivanovich', 202, 11200),
('Sidorov Ivan Petrovich', 303, 10400)";
if (mysqli_query($link, $sql)) {
  echo "Created successfully<br>";
} else {
  echo "Error creating <br>" . mysqli_error($link);
}

$sql ="create table class (
class_name varchar(5) NOT NULL,
class_size tinyint unsigned NOT NULL,
class_year year(4) NOT NULL,
class_teacher varchar(100) NOT NULL,
PRIMARY KEY (class_name),
FOREIGN KEY (class_teacher) REFERENCES teacher (teacher_name)
) ENGINE=MyISAM";
if (mysqli_query($link, $sql)) {
echo "Table
created successfully";
} else {
echo "Error 
creating table: " . mysqli_error($link);
}

$sql = "insert into class values ('9A', 3, 2015, 'Ivanov Petr Sidorovich'),
('10B', 3, 2014, 'Petrov Sidor Ivanovich'),
('11V', 3, 2013, 'Sidorov Ivan Petrovich')";
if (mysqli_query($link, $sql)) {
  echo "Created successfully<br>";
} else {
  echo "Error creating <br>" . mysqli_error($link);
}

$sql ="create table student (
student_name varchar(100) NOT NULL,
student_class varchar(5) NOT NULL,
student_age tinyint unsigned NOT NULL,
student_sex varchar(2) NOT NULL,
PRIMARY KEY (student_name),
FOREIGN KEY (student_class) REFERENCES class (class_name)
) ENGINE=MyISAM";
if (mysqli_query($link, $sql)) {
echo "Table
created successfully";
} else {
echo "Error 
creating table: " . mysqli_error($link);
}

$sql = "insert into student values ('Vasya Pupkin', '10B', 16, 'm'),
('Kusya Pipkin', '11V', 17, 'm'),
('Pusya Vapkin', '9A', 16, 'm'),
('Musya Kipkin', '10B', 16, 'm'),
('Asya Kepkina', '11V', 17, 'f'),
('Kisya Pepkin', '9A', 14, 'm'),
('Pesya Vipkin', '10B', 16, 'm'),
('Visya Mapkin', '11V', 18, 'm'),
('Usya Pipkina', '9A', 15, 'f')";
if (mysqli_query($link, $sql)) {
  echo "Created successfully<br>";
} else {
  echo "Error creating <br>" . mysqli_error($link);
}

$sql="create table subject (
subject_name varchar(50) NOT NULL,
subject_teachers tinyint unsigned NOT NULL,
PRIMARY KEY (subject_name)
) ENGINE=MyISAM";
if (mysqli_query($link, $sql)) {
echo "Table
created successfully";
} else {
echo "Error 
creating table: " . mysqli_error($link);
}

$sql = "insert into subject values ('Russkiy', 1),
('Matematika', 1),
('Angliyskiy', 1)";
if (mysqli_query($link, $sql)) {
  echo "Created successfully<br>";
} else {
  echo "Error creating <br>" . mysqli_error($link);
}

$sql ="create table mark (
mark_id int(5) AUTO_INCREMENT,
mark_student varchar(100) NOT NULL,
mark_teacher varchar(100) NOT NULL,
mark_class varchar(5) NOT NULL,
mark_subject varchar(50) NOT NULL,
mark_value tinyint unsigned NOT NULL,
PRIMARY KEY (mark_id),
FOREIGN KEY (mark_student) REFERENCES student (student_name),
FOREIGN KEY (mark_teacher) REFERENCES teacher (teacher_name),
FOREIGN KEY (mark_class) REFERENCES class (class_name),
FOREIGN KEY (mark_subject) REFERENCES subject (subject_name)
) ENGINE=MyISAM";
if (mysqli_query($link, $sql)) {
echo "Table
created successfully";
} else {
echo "Error 
creating table: " . mysqli_error($link);
}

$sql = "insert into mark values (1, 'Vasya Pupkin', 'Ivanov Petr Sidorovich', '10B', 'Matematika', 4),
(2, 'Kusya Pipkin', 'Ivanov Petr Sidorovich', '11V', 'Matematika', 4),
(3, 'Pusya Vapkin', 'Ivanov Petr Sidorovich', '9A', 'Matematika', 3),
(4, 'Vasya Pupkin', 'Petrov Sidor Ivanovich', '10B', 'Russkiy', 4),
(5, 'Kusya Pipkin', 'Petrov Sidor Ivanovich', '11V', 'Russkiy', 5),
(6, 'Pusya Vapkin', 'Petrov Sidor Ivanovich', '9A', 'Russkiy', 2),
(7, 'Vasya Pupkin', 'Sidorov Ivan Petrovich', '10B', 'Angliyskiy', 4),
(8, 'Kusya Pipkin', 'Sidorov Ivan Petrovich', '11V', 'Angliyskiy', 5),
(9, 'Pusya Vapkin', 'Sidorov Ivan Petrovich', '9A', 'Angliyskiy', 3)";
if (mysqli_query($link, $sql)) {
  echo "Created successfully<br>";
} else {
  echo "Error creating <br>" . mysqli_error($link);
}

$sql ="create table lesson (
lesson_id int(6) AUTO_INCREMENT,
lesson_teacher varchar(100) NOT NULL,
lesson_class varchar(5) NOT NULL,
lesson_subject varchar(50) NOT NULL,
lesson_time datetime NOT NULL,
PRIMARY KEY (lesson_id),
FOREIGN KEY (lesson_teacher) REFERENCES teacher (teacher_name),
FOREIGN KEY (lesson_class) REFERENCES class (class_name),
FOREIGN KEY (lesson_subject) REFERENCES subject (subject_name)
) ENGINE=MyISAM";
if (mysqli_query($link, $sql)) {
echo "Table
created successfully";
} else {
echo "Error 
creating table: " . mysqli_error($link);
}

$sql = "insert into lesson values ('1', 'Ivanov Petr Sidorovich', '9A', 'Matematika', '2004-05-23T10:00:00'),
('2', 'Ivanov Petr Sidorovich', '10B', 'Matematika', '2004-05-23T10:55:00'),
('3', 'Ivanov Petr Sidorovich', '11V', 'Matematika', '2004-05-23T14:30:00')";
if (mysqli_query($link, $sql)) {
  echo "Created successfully<br>";
} else {
  echo "Error creating <br>" . mysqli_error($link);
}

mysqli_close($link);
?>
