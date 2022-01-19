<?php

session_start();
include '/OpenServer/domains/library/vendor/connection.php';
include '/OpenServer/domains/library/assets/classes/BookRequest.class.php';

$request_id = $_GET['request_id'];

$bookRequest = new BookRequest();
$is_success = $bookRequest->CloseRequest($connect, $request_id);

if ($is_success) 
{
    $_SESSION['message'] = 'Запрос закрыт!';
    header('Location: ../../../request-info.php?' . $request_id);
} 
else 
{
    $_SESSION['message'] = 'Ошибка!';
    header('Location: ../../../request-info.php?' . $request_id);
}
