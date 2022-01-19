<?php


class UserProfile
{
    public function CheckUserLoginAndPassword($login, $password, $connection)
    {
        return mysqli_query($connection, "SELECT * FROM users WHERE user_login = '$login' AND user_password = '$password'");
    }

    public function SetUserDataInSession($user, $connection)
    {
        $user_role_name = self::GetUserRoleNameByRoleId($user['user_role'], $connection);
        $user_age =  self::GetUserAgeByUserBirthday($user['user_birthday']);
        
        $userData = [
            'user_id' => $user['user_id'],
            'user_name' => $user['user_name'],
            'user_age' => $user_age,
            'user_birthday' => $user['user_birthday'],
            'user_email' => $user['user_email'],
            'user_login' => $user['user_login'],
            'user_avatar' => $user['user_avatar'],
            'user_role' => $user['user_role'],
            'user_role_name' => $user_role_name['role_name']
        ];
        return $userData;
    }

    public function GetUserDataByUserId($user_id, $connection)
    {
        $query = "SELECT * FROM users WHERE user_id = '$user_id'";
        return mysqli_fetch_assoc(mysqli_query($connection, $query));
    }

    public function UpdateUserData($user_id, $new_name, $new_login, $new_email, $new_birthday, $connection)
    {
        $query = "UPDATE users SET user_name = '$new_name', user_login = 
            '$new_login', user_email = '$new_email', user_birthday = 
            '$new_birthday' WHERE user_id = $user_id";
        return mysqli_real_query($connection, $query);
    }

    public function UploadUserAvatar($user_id, $avatar, $connection)
    {
        $path = "../../uploads/database/user-profile-photo/" . $user_id . ".jpg";
        move_uploaded_file($avatar['profile_photo']['tmp_name'], $path);
        self::UpdateUserAvatarStatus($user_id, $connection);
    }

    public function DeleteUserFromDataBase($user_id, $connection)
    {
        $query = "DELETE FROM users WHERE user_id = '$user_id'";
        return mysqli_real_query($connection, $query);
    }

    public function DeleteAllConnectedRecordings($user_id, $connection)
    {
        $query = "DELETE FROM recording WHERE user_id = '$user_id'";
        return mysqli_real_query($connection, $query);
    }

    public function DeleteAllConnectedRequests($user_login, $connection)
    {
        $query = "DELETE FROM book_request WHERE user_login = '$user_login'";
        return mysqli_real_query($connection, $query);
    }

    public function PromoteUserInDataBase($user_id, $promoteLevel, $connection)
    {
        $promoteLevel++;
        $query = "UPDATE users SET user_role = '$promoteLevel' WHERE user_id = '$user_id'";
        return mysqli_real_query($connection, $query);
    }

    static function UpdateUserAvatarStatus($user_id, $connection)
    {
        $query = "UPDATE users SET user_avatar = 1 WHERE user_id = '$user_id'";
        mysqli_real_query($connection, $query);
    }

    static function GetUserRoleNameByRoleId($role_id, $connection)
    {
        return mysqli_fetch_assoc(mysqli_query($connection, "SELECT * FROM user_roles WHERE role_id = '$role_id'"));
    }

    static function GetUserAgeByUserBirthday($user_birthday)
    {
        return floor(((time() - strtotime($user_birthday)) / (3600 * 24 * 365)));
    }


}
