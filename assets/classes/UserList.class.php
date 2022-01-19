<?php

class UserList 
{
    function GetInfoAboutUsers($connection, $flag)
    {
        $query = "SELECT * FROM users ORDER BY user_id";
        if ($flag == 1)
        {
            $query .= " DESC";
        }
      
        return mysqli_fetch_all(mysqli_query($connection, $query));
    }

    
}