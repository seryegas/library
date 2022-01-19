<?php

class BookPage 
{
    function UploadBookPdfFile($book_id, $file)
    {
        $path = "../../../uploads/books/" . $book_id . ".pdf";
        move_uploaded_file($file['book_pdf']['tmp_name'], $path);
    }

    function UploadBookCover($book_id, $cover)
    {
        $path = "../../../uploads/database/book-covers/" . $book_id . ".jpg";
        move_uploaded_file($cover['book_cover']['tmp_name'], $path);
    }

    function PushNewBookInDataBase($connection, $book_name, $book_author, $book_description, $category_id)
    {
        $query = "INSERT INTO book
            VALUES (NULL, '$book_name', '$book_author', '$book_description', '$category_id')";
        return mysqli_real_query($connection, $query);
    }

    function GetBookIdByNameAndAuthor($connection, $book_name, $book_author)
    {
        $query = "SELECT book_id FROM book WHERE book_name = '$book_name' AND book_author = '$book_author'";
        return mysqli_fetch_all(mysqli_query($connection, $query))[0][0];
    }

    function GetInfoAboutDisplayedBooks($connection, $category_id)
    {
        $query = "SELECT * FROM book";
        if ($category_id)
        {
            $query .= " WHERE category_id = '$category_id'";
        }
        return mysqli_fetch_all(mysqli_query($connection, $query));
    }

    function GetBookInfoByBookId($connection, $book_id)
    {
        $query = "SELECT * FROM book WHERE book_id = '$book_id'";
        return mysqli_fetch_all(mysqli_query($connection, $query));
    }

    static function file_force_download($file) 
    {
        if (file_exists($file)) 
        {
          // сбрасываем буфер вывода PHP, чтобы избежать переполнения памяти выделенной под скрипт
          // если этого не сделать файл будет читаться в память полностью!
          if (ob_get_level()) {
            ob_end_clean();
          }
          // заставляем браузер показать окно сохранения файла
          header('Content-Description: File Transfer');
          header('Content-Type: application/octet-stream');
          header('Content-Disposition: attachment; filename=' . basename($file));
          header('Content-Transfer-Encoding: binary');
          header('Expires: 0');
          header('Cache-Control: must-revalidate');
          header('Pragma: public');
          header('Content-Length: ' . filesize($file));
          // читаем файл и отправляем его пользователю
          readfile($file);
          exit;
        }
    }

    function CreateNewRecord($connection, $book_id, $user_id)
    {
        $query = "INSERT INTO recording 
        VALUES (NULL, '$user_id', '$book_id', DEFAULT)";
        mysqli_real_query($connection, $query); 
    }

    function GetUserRecords($connection, $user_id)
    {
        $query = "SELECT DISTINCT recording.book_id, recording.recording_date, book.book_name, book.book_author FROM 
        recording LEFT JOIN book ON recording.book_id = book.book_id WHERE recording.user_id = '$user_id'";
        return mysqli_fetch_all(mysqli_query($connection, $query));
    }
}

