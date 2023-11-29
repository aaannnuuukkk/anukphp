<?php  
// подключение к базе данных
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bd";

$conn = new mysqli($servername, $username, $password, $dbname);
// проверка подключения
if ($conn->connect_error) {
    die("connect failed: " . $conn->connect_error);
}
// обработка данных из формы регистрации
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $role = $_POST["role"];

    // ВСТАВКА данных в таблицу пользователей
    $query = "INSERT INTO users (name, email, password, role) VALUES ('$name', '$email', '$password', '$role')";

    if ($conn->query($query) === TRUE) {
        echo "Вы зарегистрированы";
        if ($role == 'teacher') {

        } else if ($role == 'student') {
            header("Location: Student_Dash.php");
            exit;
        }
    } else {
        echo "Ошибка: " . $conn->error;
    }
}

//закрытие соединения с базой данных
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Регистрация</title>
</head>
<body>

    <div class="container">
        <h2>Регистрация</h2>

        <form action="register.php" method="post">
            <label for="role">Роль:</label>
            <select id="role" name="role">
                <option value="teacher">Учитель</option>
                <option value="student">Ученик</option>
            </select>

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