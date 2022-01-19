<?php
    session_start();

    if (!$_SESSION['user'] || $_SESSION['user']['user_role'] == 1)
    {
        header('Location: index.php');
    }
    include '/OpenServer/domains/library/vendor/controllers/categories-loader.php';
?>

<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="/assets/css/user-profile.css" type="text/css" />
    <title>Добавление книги</title>
</head>

<body>
    <div id="container"></div>
    <header>
        <div class="logo">
            <h1><? echo 'Добавление новой книги' ?></h1>
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
            <form action="/vendor/controllers/book-controllers/push-new-book.php" method="post" enctype="multipart/form-data">
                <label>Фамилия И. О. автора</label>
                <input type="text" name="author_name" placeholder="Введите ФИО автора книги">
                <label>Название книги</label>
                <input type="text" name="book_name" placeholder="Введите название книги">
                <label>Краткое описание книги</label>
                <textarea name="description" placeholder="Введите описание книги" rows="5"></textarea>
                <label>Категория книги</label>
                <input type="text" name="book_category" list="list" placeholder="Нажмите чтобы выбрать категорию">
                    <datalist id="list">
                    <?php
                        foreach ($categories as $cat => $categoryNum)
                        {
                        echo '<option value="' . $categoryNum[1] . '">';
                        }
                    ?>
                </datalist>
                <label>Загрузите обложку книги</label>
                <input type="file" name="book_cover" required>
                <label>Загрузите pdf версию книги</label>
                <input type="file" name="book_pdf" required>
                <div><a href="" class="change_pass"><button>Добавить книгу</button></a></div>
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