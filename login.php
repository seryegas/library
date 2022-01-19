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
    <form action="vendor/controllers/signup.php" method="post">
        <header>
            <h1>Войти в библиотеку</h1>
        </header>
        <label>Почта</label>
        <input type="text" name="login" placeholder="Введите логин">
        <label>Пароль</label>
        <input type="password" name="password" placeholder="Введите пароль">
        <button type="submit"><h2>Войти</h2></button>
        <?php
            if ($_SESSION['message'])
            {
                echo '
                <p class="msg">' . $_SESSION['message'] . '</p>
                ';
            }
            unset($_SESSION['message']);
        ?>
        <p>Нет аккаунта? - <a href="registration.php"> зарегистрируйтесь</a></p>
        <p><a href="index.php"> Вернуться на главную страницу</a></p>
    </form>
</body>

</html>