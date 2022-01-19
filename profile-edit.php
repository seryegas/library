<?php
session_start();

if (!$_SESSION['user']) {
    header('Location: login.php');
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="/assets/css/user-profile.css" type="text/css" />
    <title>Редактирование профиля</title>
</head>

<body>
    <div id="container"></div>
    <header>
        <div class="logo">
            <h1><? echo 'Редактирование профиля: ' . $_SESSION['user']['user_login'] ?></h1>
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
            <form action="/vendor/controllers/edit_your_profile.php" method="post" enctype="multipart/form-data">
                <label>Загрузите новую фотографию профиля</label>
                <div>
                    <?php
                        if ($_SESSION['user']['user_avatar'] == 0) {
                            echo '<img src="/uploads/database/user-profile-photo/profile.jpg">';
                        } 
                        else 
                        {
                            echo '<img src="/uploads/database/user-profile-photo/' . $_SESSION['user']['user_id'] . '.jpg">';
                        }
                    ?>
                    <input type="file" name="profile_photo">
                </div>
                <label>ФИО</label>
                <input type="text" name="full_name" value="<? echo $_SESSION['user']['user_name'] ?>">
                <label>Логин</label>
                <input type="text" name="login" value="<? echo $_SESSION['user']['user_login'] ?>">
                <label>Почта</label>
                <input type="email" name="email" value="<? echo $_SESSION['user']['user_email'] ?>">
                <label>Дата рождения</label>
                <input type="date" name="date" value="<? echo $_SESSION['user']['user_birthday'] ?>">
                <div>
                    <a href="change_password_menu" class="change_pass"><button>Изменить данные</button></a>
                    <a href="change_password_menu" class="change_pass"><button>Сменить пароль</button></a>
                </div>
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