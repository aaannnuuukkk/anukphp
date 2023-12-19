<?php
session_start();
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
    <div class="container">
        <h2>Список заданий</h2>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()){
                echo "<p><strong>Название:</strong>" . $row["title"] . "</p>";
                echo "<p><strong>Название:</strong>" . $row["title"] . "</p>";
                echo "<p><strong>Название:</strong>" . $row["title"] . "</p>";
                echo "<p><strong>Название:</strong>" . $row["title"] . "</p>";
                echo "<hr>";
            }
        } else {
            echo "Нет заданий";
        }
        ?>
        </div>
</body>
</html>