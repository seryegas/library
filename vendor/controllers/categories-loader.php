<?php


session_start();
require_once '/OpenServer/domains/library/vendor/connection.php';
require_once '/OpenServer/domains/library/assets/classes/CategoriesPage.class.php';
require_once '/OpenServer/domains/library/assets/classes/BookPage.class.php';

$categoryPage = new CategoriesPage();
$bookPage = new BookPage();
$categories = $categoryPage->GetCategoriesNamesFromDB($connect);

$current_category = $_GET['category_id'];

$booksToDisplay = $bookPage->GetInfoAboutDisplayedBooks($connect, $current_category);
