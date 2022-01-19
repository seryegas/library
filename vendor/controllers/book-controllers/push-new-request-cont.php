<?php

session_start();
include '/OpenServer/domains/library/vendor/connection.php';
include '/OpenServer/domains/library/assets/classes/BookRequest.class.php';

$book_request_name = $_POST['book_request_name'];
$book_request_author = $_POST['book_request_author'];
$book_request_link = $_POST['book_request_link'];
$book_request_comm = $_POST['book_request_comm'];

$bookRequest = new BookRequest();

$is_request_succesfull = $bookRequest->AddNewBookRequest($book_request_name, $book_request_author, 
    $book_request_link, $book_request_comm, $_SESSION['user']['user_login'], $connect);

if ($is_request_succesfull)
{
    $_SESSION['message'] = 'Запрос добавлен!';
    header('Location: ../../../create-book-request.php');
}
else
{
    $_SESSION['message'] = 'Запрос не добавлен!';
        header('Location: ../../../create-book-request.php');
}