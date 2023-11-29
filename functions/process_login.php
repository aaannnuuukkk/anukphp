<?php 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = isset($_POST["email"]) ? $_POST["email"] : "";
    $password = isset($_POST["password"]) ? $_POST["password"] : "";
    $loginResult = loginUser($conn, $email, $password);

    echo $loginResult;
}

function loginUser($conn, $email, $password)
{
    $query = "SELECT * FROM users WHERE  email='$email'";
    $result = $conn->query($query);

    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user["password"])) {
            $_SESSION["user_id"] = $user["id"];
            #проверка на роль авторизованного
            $roleQuery = "SELECT role FROM users WHERE email='$email'";
            $roleResult = $conn ->query($roleQuery);

            if ($roleResult->num_rows == 1) {
                $role = $roleResult->fetch_assoc()["role"];
                if ($role == 'admin') {
                    return "Вход выполнен как администратор";
                } elseif ($role === 'student') {
                    header("Location: ../Student_Dash.php");
                } elseif ($role === 'teacher') {
                    header("Location: ../add_assignment.php");
                } else {
                    return "Неизвестная роль пользователя";
                }
            } else {
                return "Не удалось получить роль пользователя";
            } 
        } else {
            return "Неверный пароль";
        }
    } else {
        return "Пользователь с такими данными не существует";
    }
}
