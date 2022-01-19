<?php

session_start();
include '/OpenServer/domains/library/vendor/connection.php';
include '/OpenServer/domains/library/assets/classes/BookRequest.class.php';

$bookRequest = new BookRequest();
$requests = $bookRequest->GetRequestsForNewBooks($connect);