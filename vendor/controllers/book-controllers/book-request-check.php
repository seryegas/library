<?php

session_start();
include '/OpenServer/domains/library/vendor/connection.php';
include '/OpenServer/domains/library/assets/classes/BookRequest.class.php';

$request_id = $_GET['request_id'];

$bookRequest = new BookRequest();
$requestInfo = $bookRequest->GetBookRequestInfoByRequestId($connect, $request_id);
