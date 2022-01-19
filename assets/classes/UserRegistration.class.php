<?php

class UserRegistration
{
    function PushNewUserInDatabase($full_name, $login, $email, $birthday, $password, $connection)
    {
        $hashed_password = hash("sha256", $password, false);
        $query = "INSERT INTO users 
            VALUES (NULL, '$full_name', '$birthday', '$login', '$email', '$hashed_password', 0, 1)";
        return mysqli_real_query($connection, $query);
    }

    function VerifyEnteredLogin($login, $user_id, $connection)
    {
        if (mysqli_num_rows(mysqli_query($connection, "SELECT * FROM users WHERE user_login = '$login' AND user_id NOT IN ('$user_id')")) > 0)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    function VerifyEnteredEmail($email, $user_id, $connection)
    {
        if (mysqli_num_rows(mysqli_query($connection, "SELECT * FROM users WHERE user_login = '$email' AND user_id NOT IN ('$user_id')")) > 0)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    function CheckPasswordsForTheSame($password, $confirm_password)
    {
        return $password == $confirm_password;
    }
}