<nav class="navbar navbar-expand-lg navbar-light">
            <div class="container">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <span class="nav-link text-primary" href="">
                                <?php
                                session_start();
                                if (isset($_SESSION['name'])) {
                                    $name = $_SESSION['name'];
                                    echo $name;
                                } else {
                                    echo 'Гость'; // Сообщение по умолчанию, если имя не установлено в сессии
                                }
                            ?>
                            </span>
                        </li>
                        <?php 
                            if (isset($_SESSION['role'])) {
                                $role = $_SESSION['role'];
                                if ($role === 'admin') {
                                    // Показать все элементы для администратора
                                    echo '
                                        <li class="nav-item">
                                            <a class="nav-link" href="index.php">Главная</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="add_assignment.php">Добавить задание</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="add_news.php">Добавить новость</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="Student_Dash.php">Дашборд</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="view_assignments.php">Просмотр заданий</a>
                                        </li></ul>
                                        <form action="functions/process_logout.php" method="post">
                                            <button type="submit" name="logout" class="btn btn-primary">Выйти</button>
                                        </form>
                                    ';
                                } elseif ($role === 'teacher') {
                                        // Показать элементы для учителя
                                        echo '
                                            <li class="nav-item">
                                                <a class="nav-link" href="index.php">Главная</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="add_assignment.php">Добавить задание</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="view_assignments.php">Просмотр заданий</a>
                                            </li></ul>
                                            <form action="functions/process_logout.php" method="post">
                                                <button type="submit" name="logout" class="btn btn-primary">Выйти</button>
                                            </form>
                                        ';
                                    } elseif ($role === 'student') {
                                        // Показать элементы для студента
                                        echo '
                                            <li class="nav-item">
                                                <a class="nav-link" href="index.php">Главная</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="Student_Dash.php">Дашборд</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="view_assignments.php">Просмотр заданий</a>
                                            </li> </ul>
                                            <form action="functions/process_logout.php" method="post">
                                                <button type="submit" name="logout" class="btn btn-primary">Выйти</button>
                                            </form>
                                        ';
                                    } 
                                } else {
                                    echo '
                                    <li class="nav-item">
                                        <a href="login.php" class="btn">Войти</a>
                                    </li></ul>';
                                }
                        ?>
                </div>
            </div>
        </nav>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>