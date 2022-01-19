<?php
session_start();

if (!$_SESSION['user'] || $_SESSION['user']['user_role'] == 1) {
    header('Location: index.php');
}
include '/OpenServer/domains/library/vendor/controllers/user-controllers/users-loader.php';
?>

<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="/assets/css/user-profile.css" type="text/css" />
    <title>Список пользователей</title>
</head>

<body>
    <div id="container"></div>
    <header>
        <div class="logo">
            <h1>Список пользователей</h1>
        </div>
   
        <div>
            <a href="/vendor/controllers/quit.php"><button class="quit">Выйти</button></a>
        </div>
    </header>

    <div class="main-content">
        <aside>
            <nav>
                <ul>
                    <li><a href="index.php">На главную</a></li>
                    <li><a href="profile-edit.php">Редактирование</a></li>
                    <?php 
                        if ($_SESSION['user']['user_role'] > 1)
                            echo '<li><a href="push-new-book.php">Добавить книгу</a></li>';
                    ?>
                    <li><a href="create-book-request.php">Запрос на добавление книги</a></li>
                    <?php 
                        if ($_SESSION['user']['user_role'] > 1)
                            echo '<li><a href="book-requests.php">Просмотр заявок на книги</a></li>';
                    ?>
                    <?php 
                        if ($_SESSION['user']['user_role'] > 1)
                            echo '<li><a href="users.php">Список пользователей</a></li>';
                    ?>
                </ul>
            </nav>
        </aside>
        <section>
            <div class="contan">
                <?php
                if (count($usersToDisplay))
                {
                    echo '<table>
                            <tr><th>№</th><th>Пользователь</th><th>дата рождения</th><th>Ссылка</th></tr>';
                            foreach ($usersToDisplay as $users => $user)
                                echo '<tr><td>' . $user[0] . '</td><td>' . $user[1] . '</td><td>' . $user[2] . '</td>
                                <td><a href="user-profile.php?user_id=' . $user[0] . '" class="to_user"><button>В профиль</button></a></td></tr>';
                    echo '</table>';
                }
                else
                {
                    echo 'Запросов на новые книги нет!';
                }
                ?>
            </div>
        </section>
    </div>

    <footer></footer>
</body>

</html>