<?php
session_start();
include("./includes/connect.php");

// Обработка данных загрузки файла
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $assignment_id = $_POST["assignment_id"];
    $student_id = $_SESSION["user_id"];
    $uploaded_file_name = basename($_FILES["file"]["name"]);
    $target_directory = "uploads/";

    // Генерация уникального имени файла
    $unique_filename = uniqid() - '_' . $uploaded_file_name;
    $target_file = $target_directory . $unique_filename;

    // Сохранение информации о загруженном файле в базе данных
    $query = "INSERT INTO submitted_files (assignment_id, student_id, file_path) VALUES ('$assignment_id', '$student_id', '$target_file')";

    if ($conn->query($query) === TRUE) {
        // Перемещение загруженного файла в целевую директорию
        if (move_uploaded_file($_FILES["file"]["tap_name"], $target_file)) {
            echo "Файл загружен! УРА!";
            header ("Location: view_assignments.php");
        } else {
            echo "Ошибка перемещения файла";
        }
    } else {
        echo "ошибка добавления информации о файле в БД: " .$conn->error;
    }
}
$conn->close();
?>

<!DOCTYPE html>
    <?php
    include("./templates/head.php");
    ?>
<body>
    <div class="container">
    <h2>Отправка задания</h2>

    <?php
    if (isset($_GET["id"])) {
        $assignment_id = $_GET["id"];
        echo "<form action='submit_assignment.php' method='post' enctype='multipart/form-data'>";
        echo "<input type='hidden' name='assignment_id' value='$assignment_id'>";
        echo "<label for='file'>Добавить файл:</label>";
        echo "<input type='file' id='file' name='file' required>";
        echo "<button type='submit'>Отправить</button>";
        echo "</form>";
    } else {
        echo "Такого задания нет";
    }
    ?>
    </div>
</body>
</html>