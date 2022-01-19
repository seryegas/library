<?php
session_start();

if (!$_SESSION['user']) {
    header('Location: login.php');
}
include '/OpenServer/domains/library/vendor/controllers/user-profile.php';
?>

<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="/assets/css/user-profile.css" type="text/css" />
    <title>Профиль читателя</title>
</head>

<body>
    <div id="container"></div>
    <header>
        <div class="logo">
            <h1><? echo 'Профиль: ' . $userInfo['user_login'] ?></h1>
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
                <? $filename = ($userInfo['user_avatar'] == 0) ? 'profile.jpg' : $userInfo['user_id'] . '.jpg' ?>
                <img src="/uploads/database/user-profile-photo/<? echo $filename ?>">
                <div class="user_data">
                    <div class="col"><h2><? echo $userInfo['user_name'] ?></h2></div>
                    <div class="col"><? echo $user_role_name['role_name'] ?></div>
                    <div class="col"><? echo $userInfo['user_email'] ?></div>
                    <div class="col">Возраст: <? echo $user_age ?></div>
                </div>
            </div>
            <div class="books_list">
                <div class="title1">Cписок книг</div>
                <?php
                    foreach ($books as $bo => $book)
                    {
                        echo '<div class="book">' . $book[1] . '      ' . $book[2] . '     ' . $book[3] .'</div>';
                    }
                ?>
            </div>
            <?php
            if (($userInfo['user_id'] != $_SESSION['user']['user_id']) && $_SESSION['user']['user_role'] == 3)
            {
                echo '<div class="bus">';
                echo '<div><button class="bb"><a href="/vendor/controllers/user-controllers/admin-work-with-user.php?user_id=' . $userInfo['user_id'] . '&flag=1">Повысить до библиотекаря</a></button></div>';
                echo '<div><button class="bb"><a href="/vendor/controllers/user-controllers/admin-work-with-user.php?user_id=' . $userInfo['user_id'] . '&flag=2">Повысить до администратора</a></button></div>';
                if ($userInfo['user_role'] != 3)
                    echo '<div><button class="bb"><a href="/vendor/controllers/user-controllers/admin-work-with-user.php?user_id=' . $userInfo['user_id'] . '&flag=3">Удалить пользователя из системы</a></button></div>';
                echo '</div>';
            }
            ?>
            <?php
            if ($_SESSION['message'])
            {
                echo '
                <p class="msg">' . $_SESSION['message'] . '</p>
                ';
            }
            unset($_SESSION['message']);
        ?>
        </section>
    </div>

    <footer></footer>
</body>

</html>