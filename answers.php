<?php
session_start();
if (!(isset($_SESSION['role']) && ($_SESSION['role'] === 'teacher' || $_SESSION['role'] === 'admin'))) {
    // Если у пользователя нет нужной роли, перенаправить его 
    header("Location: index.php"); // Перенаправление на страницу
    exit(); // Завершаем выполнение скрипта после перенаправления
}

include("./includes/connect.php");

if (isset($_GET['id'])) {
    $assignment_id = $_GET['id'];

    // Получаем информацию о задании
    $query = "SELECT * FROM assignments WHERE id = $assignment_id";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $assignment = $result->fetch_assoc();
        $assignment_title = $assignment['title'];
    } 
} 
?>
<!DOCTYPE html>
<?php 
    include("./templates/head.php");
?>
<body>
    <?php
            include("./templates/navbar.php"); 
    ?>
    <div class="container">
        <?php
        if (!empty($assignment_title)) {
            echo "<h1>Название задания: $assignment_title</h1>";
        }

        if (!(empty($assignment_title))) {

            $file_query = "SELECT sf.file_path, sf.submission_time, u.name FROM submitted_files sf 
                            JOIN users u ON sf.student_id = u.id 
                            WHERE sf.assignment_id = $assignment_id";
            $file_result = $conn->query($file_query);

            if ($file_result->num_rows > 0) {
                echo "<h2>Ответы учеников:</h2>";
                while ($file_row = $file_result->fetch_assoc()) {
                    $file_path = $file_row['file_path'];
                    $submission_time = $file_row['submission_time'];
                    $student_name = $file_row['name'];

                    echo "<p><strong>Ученик: </strong>$student_name</p>";
                    echo "<p>Дата отправки: $submission_time</p>";
                    echo "<p>Файл: <a href='$file_path' class='btn btn-primary' target='_blank'>Скачать ответ</a></p>";
                    echo "<hr>";
                }
            } else {
                echo "<p>Ученики еще не отправляли ответы на это задание.</p>";
            }
            $conn->close();
        }
        ?>
        </div>
</body>
</html>
