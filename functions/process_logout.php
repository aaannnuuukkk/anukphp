<?php
if (isset($_POST['logout'])) {
    session_start();
    // Уничтожить все данные сессии
    session_unset();
    session_destroy();

// Перенаправить пользователя на страницу входа
    header("Location: ../index.php");
} else {
    echo "Невозможно выполнить выход из аккаунта." . $conn->error;
}
?>
