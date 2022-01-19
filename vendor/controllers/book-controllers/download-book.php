<?php

session_start();
include '/OpenServer/domains/library/vendor/connection.php';
include '/OpenServer/domains/library/assets/classes/BookPage.class.php';

$book_id = $_GET['book_id'];
$bookPage = new BookPage();

$bookPage->CreateNewRecord($connect, $book_id, $_SESSION['user']['user_id']);

BookPage::file_force_download('/OpenServer/domains/library/uploads/books/' . $book_id . '.pdf');
header('Location: ../../../book-page.php?book_id=' . $book_id);