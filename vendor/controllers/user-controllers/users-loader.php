<?php

session_start();
include '/OpenServer/domains/library/vendor/connection.php';
include '/OpenServer/domains/library/assets/classes/UserList.class.php';

$flag = $_GET['flag'];

$userList = new UserList();
$usersToDisplay = $userList->GetInfoAboutUsers($connect, $flag);
