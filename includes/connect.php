<?php  
// подключение к базе данных
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bd";

$conn = new mysqli($servername, $username, $password, $dbname);

// проверка подключения
if ($conn->connect_error) {
    die("connect failed: " . $conn->connect_error);
}
?>