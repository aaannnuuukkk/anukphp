<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST["title"];
    $deadline = $_POST["deadline"];
    $description = $_POST["description"];

    // вставка данных в таблицу заданий
    $query = "INSERT INTO assignments (title, deadline, description) VALUES ('$title', '$deadline', '$description')";

    if ($conn->query($query) === TRUE) {
        echo "Задание успешно добавлено";
    } else {
        echo "Ошибка добавления задания: " . $conn->error;
    }
}
?>