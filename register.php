<?php
session_start();
include("./includes/connect.php");
include("./functions/process_reg.php");

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
    <?php
        include("./templates/head.php"); 
    ?>
<head>
    <title>Регистрация</title>
</head>
<body>

    <div class="container">
        <h2>Регистрация</h2>

        <form action="register.php" method="post">
            <label for="name">Имя:</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Почта:</label>
            <input type="email" id="email" name="email" required>

            <label for="password">Пароль:</label>
            <input type="password" id="password" name="password" required>

            <button type="submit">Зарегистрироваться</button>
        </form>
    </div>
    
</body>
</html>