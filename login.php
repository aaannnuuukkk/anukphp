<?php
session_start();
include("./includes/connect.php");
include("./functions/process_login.php");

if (isset($_SESSION['role'])) {
    // Если у пользователя уже есть роль, перенаправить его на соответствующую страницу
    if ($_SESSION['role'] === 'admin') {
        header("Location: ../view_assignments.php"); 
        exit();
    } elseif ($_SESSION['role'] === 'student') {
        header("Location: ../Student_Dash.php"); 
        exit();
    } elseif ($_SESSION['role'] === 'teacher') {
        header("Location: ../view_assignments.php");
        exit();
    }
} else {
    // Если роль отсутствует, выполните вход или показывайт сообщение об ошибке
}

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
            <input type="email" id="email" name="email" class="form-control" required>

            <label for="password">Пароль:</label>
            <input type="password" id="password" name="password" class="form-control" required>

            <button type="submit" class="btn btn-primary">Войти</button>
        </form>
    </div>
</body>
</html>