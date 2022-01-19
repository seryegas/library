<?php
session_start();

if (!$_SESSION['user']) {
    header('Location: index.php');
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="/assets/css/user-profile.css" type="text/css" />
    <title>Создание запроса на добавление книги</title>
</head>

<body>
    <div id="container"></div>
    <header>
        <div class="logo">
            <h1><? echo 'Создание запроса на добавление книги' ?></h1>
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
        <form action="/vendor/controllers/book-controllers/push-new-request-cont.php" method="post">
                <label>Название книги</label>
                <input type="text" name="book_request_name" placeholder="Введите название книги">
                <label>Автор</label>
                <input type="text" name="book_request_author" placeholder="Введите ФИО автора">
                <label>Ссылка на книгу в магазине</label>
                <input type="url" name="book_request_link" placeholder="Вставьте ссылку">
                <label>Добавьте комментарий к заявке </label>
                <input type="text" name="book_request_comm" placeholder="Напишите комментарий к запросу">
                <button type="submit">Создать запрос</button>
                <?php
                    if ($_SESSION['message'])
                    {
                        echo '
                        <p class="msg">' . $_SESSION['message'] . '</p>
                        ';
                    }
                    unset($_SESSION['message']);
                ?>
            </form>
        </section>
    </div>

    <footer></footer>
</body>

</html>