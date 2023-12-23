<?php
session_start();
include("./includes/connect.php");

if (!(isset($_SESSION['role']) && ($_SESSION['role'] === 'student' || $_SESSION['role'] === 'admin'))) {
    // Если у пользователя нет нужной роли, перенаправить его
    header("Location: index.php"); // Перенаправление
    exit(); // Завершаем выполнение скрипта после перенаправления
}

//Получение предстоящих заданий из базы данных
$query = "SELECT * FROM assignments WHERE deadline >= CURDATE() ORDER BY deadline";
$result = $conn->query($query);

$conn->close();

?>

<!DOCTYPE html>
<html lang="en">
<?php
        include("./templates/head.php"); 
?>
<head>
    <title>Студенческий дашборд</title>
</head>
<body>
    <?php
            include("./templates/navbar.php"); 
    ?>
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