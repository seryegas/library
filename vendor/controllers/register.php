<?php

session_start();
require_once '../connection.php';
require_once '../../assets/classes/UserRegistration.class.php';
require_once '../../assets/classes/UserProfile.class.php';

$full_name = $_POST['full_name'];
$login = $_POST['login'];
$email = $_POST['email'];
$birthday = $_POST['date'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];

$userRegistration = new UserRegistration();
$userAge = UserProfile::GetUserAgeByUserBirthday($birthday);
$is_login_taken = $userRegistration->VerifyEnteredLogin($login, -1,  $connect);
$is_email_taken = $userRegistration->VerifyEnteredEmail($email, -1,  $connect);
$are_passwords_same = $userRegistration->CheckPasswordsForTheSame($password, $confirm_password);

if (!$is_login_taken) 
{
    if (!$is_email_taken)
    {
        if ($age < 16)
        {
            if ($are_passwords_same)
            {
                $push = $userRegistration->PushNewUserInDatabase($full_name, $login, $email, $birthday, $password, $connect);
                if ($push)
                {
                    $_SESSION['message'] = 'Регистрация прошла успешно!';
                    header('Location: ../../login.php');
                }
                else
                {
                    $_SESSION['message'] = 'Ошибка при регистации!';
                    header('Location: ../../registration.php');
                }
            }
            else
            {
                $_SESSION['message'] = 'Пароли не совпадают!';
                header('Location: ../../registration.php');
            }
        }
        else
        {
            $_SESSION['message'] = 'Меньше 16 лет!';
            header('Location: ../../registration.php');
        }
    }
    else
    {
        $_SESSION['message'] = 'Аккаунт с этой почтой уже занят!';
        header('Location: ../../registration.php');
    }
}
else
{
    $_SESSION['message'] = 'Логин уже занят!';
    header('Location: ../../registration.php');
}