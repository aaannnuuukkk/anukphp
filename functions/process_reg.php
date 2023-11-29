<?php
// обработка данных из формы регистрации
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $role = 'student';

    // ВСТАВКА данных в таблицу пользователей
    $query = "INSERT INTO users (name, email, password, role) VALUES ('$name', '$email', '$password', '$role')";

    if ($conn->query($query) === TRUE) {
        echo "Вы зарегистрированы";
    } else {
        echo "Ошибка: " . $conn->error;
    }
}
?>