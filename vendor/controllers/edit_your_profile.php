<?php

session_start();
require_once '/OpenServer/domains/library/vendor/connection.php';
require_once '/OpenServer/domains/library/assets/classes/UserProfile.class.php';
require_once '/OpenServer/domains/library/assets/classes/UserRegistration.class.php';


$new_name = $_POST['full_name'];
$new_login = $_POST['login'];
$new_email = $_POST['email'];
$new_birthday = $_POST['date'];
$user_id = $_SESSION['user']['user_id'];

$userProfile = new UserProfile();
$userCheck = new UserRegistration();
$is_update_completed = NULL;
$is_login_taken = $userCheck->VerifyEnteredLogin($new_login, $user_id, $connect);
$is_email_taken = $userCheck->VerifyEnteredEmail($new_email, $user_id, $connect);
if (!$is_login_taken && !$is_email_taken) 
{
    $is_update_completed = $userProfile->UpdateUserData($user_id, $new_name, $new_login, $new_email, $new_birthday, $connect);

    if ($is_update_completed)
    {
        unset($_SESSION['user']);
        $user = $userProfile->GetUserDataByUserId($user_id, $connect);
        $_SESSION['user'] = $userProfile->SetUserDataInSession($user, $connect);
        $_SESSION['message'] = 'Данные успешно изменены';
        header('Location: ../../profile-edit.php');
    } 
    else 
    {
        $_SESSION['message'] = 'Данные не сохранены!';
        header('Location: ../../profile-edit.php');
    }
}
else
{
    $_SESSION['message'] = 'Данные логин или почта уже заняты!';
    header('Location: ../../profile-edit.php');
}

if ($_FILES['profile_photo'])
{
    $userProfile->UploadUserAvatar($user_id, $_FILES, $connect);
}


