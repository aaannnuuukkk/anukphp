<?php
session_start();
include("./includes/connect.php");
include("./functions/process_login.php");

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<?php
        include("./templates/head.php"); 
?>
<head>
    <title>Вход</title>
</head>
<body>

    <div class="container">
        <h2>Вход</h2>
        <form action="login.php" method="post">
            <label for="email">Почта:</label>
            <input type="email" id="email" name="email" required>

            <label for="password">Пароль:</label>
            <input type="password" id="password" name="password" required>

            <button type="submit">Войти</button>
        </form>
    </div>
</body>
</html>