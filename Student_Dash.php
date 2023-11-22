<?php
// подключение к базе данных
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "training";

$conn = new mysqli($servername, $username, $password, $dbname);

// проверка подключения
if ($conn->connect_error) {
    die("connect failed: " . $conn->connect_error)
}

//Получение предстоящих заданий из базы данных
$query = "SELECT * FROM assignments WHERE deadline >= CURDATE() ORDER BY deadline";
$result = $conn->query($query);

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Студенческий дашборд</title>
</head>
<body>

    <div class="container">
        <h2>Студенческий дашборд</h2>
        <h3>Предстоящие задания</h3>

        <?php
        // Вывод списка предстоящих заданий
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<p><strong>Название:</strong> " .$row["title"] . "</p>";
                echo "<p><strong>Дедлайн:</strong> " .$row["deadline"] . "</p>";
                echo "<p><strong>Описание задания:</strong> " .$row["description"] . "</p>";
                echo "<hr>";
            }
        } else {
            echo "Нет предстоящих заданий.";
        }
        ?>
    </div>
</body>
</html>