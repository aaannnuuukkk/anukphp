<?php
session_start();
include("./includes/connect.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Добавить новость</title>
    <?php
        include("./templates/head.php"); 
    ?>
</head>
<body>
    <?php
            include("./templates/navbar.php"); 
    ?>
    <div class="container">
    <h2>Добавить новость</h2>
    <form action="functions/process_add_news.php" method="post">
        <label for="title">Заголовок:</label>
        <input type="text" id="title" name="title" class="form-control" required><br>

        <label for="content">Содержание:</label>
        <textarea id="content" name="content" class="form-control" required></textarea><br>

        <input type="submit" class="btn btn-success" value="Добавить новость">
    </form>
    </div>
</body>
</html>