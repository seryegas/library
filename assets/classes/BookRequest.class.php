<?php

class BookRequest
{
    function GetRequestsForNewBooks($connection)
    {
        $query = "SELECT * FROM book_request WHERE is_checked = 0";
        return mysqli_fetch_all(mysqli_query($connection, $query));
    }

    function AddNewBookRequest($book_request_name, $book_request_author, $book_request_link, $book_request_comm, $user_login, $connection)
    {
        $query = "INSERT INTO book_request 
                  VALUES (NULL, '$user_login', '$book_request_name', '$book_request_author', '$book_request_link', '$book_request_comm', 0)";
        return mysqli_real_query($connection, $query);
    }

    function GetBookRequestInfoByRequestId($connection, $request_id)
    {
        $query = "SELECT * FROM book_request WHERE book_request_id = '$request_id'";
        return mysqli_fetch_all(mysqli_query($connection, $query));
    }

    function CloseRequest($connection, $request_id)
    {
        $query = "UPDATE book_request SET is_checked = 1 WHERE book_request_id = '$request_id'"; 
        return mysqli_real_query($connection, $query);
    }
}