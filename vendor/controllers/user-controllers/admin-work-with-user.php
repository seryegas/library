<?php

session_start();
include '/OpenServer/domains/library/vendor/connection.php';
include '/OpenServer/domains/library/assets/classes/UserProfile.class.php';

$user_id = $_GET['user_id'];
$flag_id = $_GET['flag'];


$admin_did = new UserProfile();
$userInfo = $admin_did->GetUserDataByUserId($user_id, $connect);
$result = 1;
if ($flag_id == 1)
{
    $result = $admin_did->PromoteUserInDataBase($user_id, $flag_id, $connect);
    $_SESSION['message'] = 'Пользователь повышен до библиотекаря!';
    header('Location: ../../../user-profile.php?user_id=' . $user_id);
}
else
{
    if ($flag_id == 2)
    {
        $result = $admin_did->PromoteUserInDataBase($user_id, $flag_id, $connect);
        $_SESSION['message'] = 'Пользователь повышен до администратора!';
        header('Location: ../../../user-profile.php?user_id=' . $user_id);
    }
    if ($flag_id == 3)
    {
        $cleantable1 = $admin_did->DeleteAllConnectedRecordings($user_id, $connect);
        $cleantable2 = $admin_did->DeleteAllConnectedRequests($userInfo['user_login'], $connect);
        $result = $admin_did->DeleteUserFromDataBase($user_id, $connect);
        if ($result && $cleantable1 && $cleantable2)
        {
            $_SESSION['message'] = 'Пользователь' . $user_id .  ' удален из сервиса!';
            header('Location: ../../../user-profile.php');
        }
        else
        {
            $_SESSION['message'] = 'Пользователь' . $user_id .  ' не может быть удален из сервиса!';
            header('Location: ../../../user-profile.php');
        }
    }
}