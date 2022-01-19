<?php

session_start();
include '/OpenServer/domains/library/vendor/connection.php';
include '/OpenServer/domains/library/assets/classes/BookPage.class.php';
include '/OpenServer/domains/library/assets/classes/UserProfile.class.php';

$foreign_user_id = $_GET['user_id'];
$current_user_id = $_SESSION['user']['user_id'];

if ($_SESSION['user']['user_role'] > 1 && $foreign_user_id)
{
    $current_user_id = $foreign_user_id;
}



$bookPage = new BookPage();
$userProfile = new UserProfile();

$userInfo = $userProfile->GetUserDataByUserId($current_user_id, $connect);
$user_age = UserProfile::GetUserAgeByUserBirthday($userInfo['user_birthday']);
$user_role_name = UserProfile::GetUserRoleNameByRoleId($userInfo['user_role'], $connect);
$books = $bookPage->GetUserRecords($connect, $current_user_id);