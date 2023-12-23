<?php
session_start();
if (!(isset($_SESSION['role']))) {
    // Если у пользователя нет нужной роли, перенаправить его 
    header("Location: index.php"); // Перенаправление на страницу 
    exit(); // Завершаем выполнение скрипта после перенаправления
}
include("./includes/connect.php");


$query = "SELECT * FROM assignments";
$result = $conn->query($query);

$conn->close();
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
        <h2>Список заданий</h2>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()){
                echo "<p><strong>Название: </strong>" . $row["title"] ."</p><p><strong>Дедлайн: </strong>" . $row["deadline"] . "</p><p><strong>Описание: </strong>" . $row["description"] . "</p>"; 
                if ($_SESSION['role'] === 'admin') {
                    echo "<a href='submit_assignments.php?id=" . $row['id'] . "' class='btn btn-primary'>Добавить ответ</a> ";
                    echo "<a href='answers.php?id=" . $row['id'] . "' class='btn btn-primary'>Просмотреть ответы</a>";
                } elseif ($_SESSION['role'] === 'student') {
                    echo "<a href='submit_assignments.php?id=" . $row['id'] . "' class='btn btn-primary'>Добавить ответ</a>"; 
                    
                } elseif ($_SESSION['role'] === 'teacher') {
                    echo "<a href='answers.php?id=" . $row['id'] . "' class='btn btn-primary'>Просмотреть ответы</a>";
                } 
                echo "<hr>";
            }
        } else {
            echo "Нет заданий";
        }
        ?>
        </div>
</body>
</html>