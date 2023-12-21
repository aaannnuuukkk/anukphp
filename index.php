<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./Style/main.css">
    <title>Главная страница</title>
</head>
<body>
    <h1>Добро пожаловать!</h1>

    <a href="login.php" class="button">Войти</a>
    <a href="register.php" class="button">Зарегистрироваться</a>

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

    
</body>
</html>