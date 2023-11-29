<?php
session_start();
include("./includes/connect.php");
include("./functions/process_add_assignment.php");

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<?php
        include("./templates/head.php"); 
?>
<head>
    <title>Добавление заданий</title>
</head>
<body>

    <div class="container">
        <h2>Добавление заданий</h2>
        <form action="dashboard.php" method="post">
            <label for="title">Название:</label>
            <input type="text" id="title" name="title" required>

            <label for="deadline">Дедлайн:</label>
            <input type="date" id="deadline" name="deadline" required>

            <label for="description">Описание задания:</label>
            <textarea id="description" name="description" rows="4" required></textarea>

            <button type="submit">Добавить задание</button>
        </form>
    </div>
</body>
</html>