<?php

session_start();
require_once '../connection.php';
require_once '../../assets/classes/UserProfile.class.php';

$login = $_POST['login'];
$password = hash("sha256", $_POST['password'], false);

$userProfile = new UserProfile();
$check_user = $userProfile->CheckUserLoginAndPassword($login, $password, $connect);

if (mysqli_num_rows($check_user) > 0) 
{
    $user = mysqli_fetch_assoc($check_user);
    $userData =  $userProfile->SetUserDataInSession($user, $connect);
    $_SESSION['user'] = $userData;
    header("Location: ../../index.php");
}
else 
{
    $_SESSION['message'] = 'Неверный логин или пароль!';
    header("Location: ../../login.php");
}