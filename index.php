<?php
session_start();
include("./includes/connect.php");

//Получение предстоящих заданий из базы данных
$query = "SELECT * FROM assignments WHERE deadline >= CURDATE() ORDER BY deadline";
$result = $conn->query($query);

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php
        include("./templates/head.php"); 
?>
    <link rel="stylesheet" href="./Style/main.css">
    <title>Главная страница</title>
</head>
<body>
<?php
    if (isset($_SESSION['role'])) {
    // Если есть роль - показать кнопки
    include("./templates/navbar.php"); 

} else {
    // Если нет роли - показать кнопки "Войти" и "Зарегистрироваться"
    echo '<h1>Добро пожаловать!</h1>
    ';
    echo '<a href="login.php" class="button">Войти</a>
    ';
    echo '<a href="register.php" class="button">Зарегистрироваться</a>';
}?>

    <h2>Последние новости</h2>

    <div class="news-container">
        <?php
        include("./includes/connect.php");

        $sql = "SELECT * FROM news ORDER BY id DESC LIMIT 5";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<div class='news-item'>";
                echo "<h3>" . $row["title"] . "</h3>";
                echo "<p>" . $row["content"] . "</p>";
                echo "</div>";
            }
        } else {
            echo "<p>Нет новостей</p>";
        }
        ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>