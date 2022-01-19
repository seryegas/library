<?php
    session_start();

    include '/OpenServer/domains/library/vendor/controllers/book-controllers/book-check.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css" type="text/css" /> 
    <link rel="stylesheet" href="/assets/css/request.css" type="text/css" />
    <title><? echo $bookInfo[0][1] ?></title>
</head>

<body>
    <div class="request_info">
        <header>
            <h1><? echo $bookInfo[0][1]?></h1>
        </header>
        <div>
            <div class="float">
                <label>Название книги</label>
                <label class="info"><? echo $bookInfo[0][1] ?></label>
                <label>Автор</label>
                <label class="info"><? echo $bookInfo[0][2] ?></label>
            </div>
            <? echo '<img src="uploads/database/book-covers/' . $bookInfo[0][0] . '.jpg" class="img-right">' ?>
        </div>
        <label>Описание</label>
        <label class="info"><? echo $bookInfo[0][3] ?></label>
        <div class="buts"> 
            <? if ($_SESSION['user']) echo '<button><a class="href" href="/vendor/controllers/book-controllers/download-book.php?book_id=' . $book_id . '">Скачать книгу</a></button>'; ?>
            <? if ($_SESSION['user']['user_role'] > 1) echo '<button><a class="href" href="push-new-book.php">Добавление книги</a></button>'; ?>
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