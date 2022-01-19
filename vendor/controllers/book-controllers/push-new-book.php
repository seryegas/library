<?php

session_start();
require_once '/OpenServer/domains/library/vendor/connection.php';
require_once '/OpenServer/domains/library/assets/classes/BookPage.class.php';
require_once '/OpenServer/domains/library/assets/classes/CategoriesPage.class.php';

$book_name = $_POST['book_name'];
$author_name = $_POST['author_name'];
$description = $_POST['description'];
$category_name = $_POST['book_category'];

$categoryPage = new CategoriesPage();
$bookPage = new BookPage();

$category_id = $categoryPage->GetCategoryIdByName($connect, $category_name);

$is_upload_completed = $bookPage->PushNewBookInDataBase($connect, $book_name, $author_name, $description, $category_id[0][0]);

$book_id = $bookPage->GetBookIdByNameAndAuthor($connect, $book_name, $author_name);
if ($is_upload_completed) 
{
    $bookPage->UploadBookPdfFile($book_id, $_FILES);
    $bookPage->UploadBookCover($book_id, $_FILES);
    $_SESSION['message'] = 'Новая книга добавлена!';
    header('Location: ../../../push-new-book.php');
} 
else 
{
    $_SESSION['message'] = 'Данные не сохранены!';
    header('Location: ../../../push-new-book.php');
}
