<?php

session_start();
include '/OpenServer/domains/library/vendor/connection.php';
include '/OpenServer/domains/library/assets/classes/BookPage.class.php';

$book_id = $_GET['book_id'];

$bookPage = new BookPage();

$bookInfo = $bookPage->GetBookInfoByBookId($connect, $book_id);