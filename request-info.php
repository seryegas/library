<?php
    session_start();

    if (!$_SESSION['user'] || ($_SESSION['user']['user_role'] == 1))
    {
        header('Location: index.php');
    }
    include '/OpenServer/domains/library/vendor/controllers/book-controllers/book-request-check.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="/assets/css/request.css" type="text/css" />
    <title>Заявка №<? echo $request_id . ' от ' . $requestInfo[0][1]?></title>
</head>

<body>
    <div class="request_info">
        <header>
            <h1>Заявка №<? echo $request_id . ' от ' . $requestInfo[0][1]?></h1>
        </header>
        <label>Название книги</label>
        <label class="info"><? echo $requestInfo[0][2] ?></label>
        <label>Автор</label>
        <label class="info"><? echo $requestInfo[0][3] ?></label>
        <label>Ссылка</label>
        <label class="info"><a href=<? echo '"' . $requestInfo[0][4] . '"' ?>><? echo $requestInfo[0][4] ?></a></label>
        <label>Комментарий</label>
        <label class="info"><? echo $requestInfo[0][3] ?></label>
        <div class="buts">
            <button><a class="href" href="/vendor/controllers/book-controllers/close-request.php?request_id=<? echo $requestInfo[0][0] ?>">Закрыть заявку</a></button>
            <button><a class="href" href="push-new-book.php">Добавление книги</a></button>
            <button><a class="href" href="index.php">На главную страницу</a></button>
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
    </div>
</body>

</html>