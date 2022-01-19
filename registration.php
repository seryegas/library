<?php
    session_start();

    if ($_SESSION['user'])
    {
        header('Location: index.php');
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="/assets/css/loginv2.css" type="text/css" />
    <title>Войти в библиотеку</title>
</head>

<body>
    <form action="/vendor/controllers/register.php" method="post">
        <header>
            <h1>Регистрация в библиотеке</h1>
        </header>
        <label>ФИО</label>
        <input type="text" name="full_name" placeholder="Введите ФИО">
        <label>Логин</label>
        <input type="text" name="login" placeholder="Введите логин">
        <label>Почта</label>
        <input type="email" name="email" placeholder="Введите вашу почту">
        <label>Дата рождения</label>
        <input type="date" name="date" placeholder="Введите вашу дату родения">
        <label>Пароль</label>
        <input type="password" name="password" placeholder="Введите пароль">
        <label>Подтвердите пароль</label>
        <input type="password" name="confirm_password" placeholder="Подтвердите пароль">
        
        <?php
            if ($_SESSION['message'])
            {
                echo '
                <p class="msg">' . $_SESSION['message'] . '</p>
                ';
            }
            unset($_SESSION['message']);
        ?>
        
        <button type="submit">
            <h2>Зарегистрироваться</h2>
        </button>
        <p>Уже есть аккаунт? -
            <a href="login.php"> войдите</a>
        </p>
        <p>
            <a href="index.php"> Вернуться на главную страницу</a>
        </p>
    </form>
</body>

</html>