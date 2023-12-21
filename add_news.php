<?php
session_start();
include("./includes/connect.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Добавить новость</title>
</head>
<body>
    <h2>Добавить новость</h2>
    <form action="functions/process_add_news.php" method="post">
        <label for="title">Заголовок:</label>
        <input type="text" id="title" name="title" required><br>

        <label for="content">Содержание:</label>
        <textarea id="content" name="content" required></textarea><br>

        <input type="submit" value="Добавить новость">
    </form>
</body>
</html>