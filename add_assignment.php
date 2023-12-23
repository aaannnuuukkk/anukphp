<?php
session_start();

if (!(isset($_SESSION['role']) && ($_SESSION['role'] === 'teacher' || $_SESSION['role'] === 'admin'))) {
    // Если у пользователя нет нужной роли, перенаправить его или показать сообщение об ошибке
    header("Location: index.php"); // Перенаправление на страницу с сообщением об отказе в доступе
    exit(); // Завершаем выполнение скрипта после перенаправления
}

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
    <?php
            include("./templates/navbar.php"); 
    ?>
    <div class="container">
        <h2>Добавление заданий</h2>
        <form action="" method="post">
            <label for="title">Название:</label>
            <input type="text" id="title" name="title" class="form-control" required>

            <label for="deadline">Дедлайн:</label>
            <input type="date" id="deadline" name="deadline" class="form-control" required>

            <label for="description">Описание задания:</label>
            <textarea id="description" name="description" rows="4" class="form-control" required></textarea>

            <button class="btn btn-success" type="submit">Добавить задание</button>
        </form>
    </div>
</body>
</html>