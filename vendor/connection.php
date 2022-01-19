<?php

$connect = mysqli_connect('localhost', 'root', '', 'ais_library');

if (!$connect)
{
    die('Error connect to DataBase');
}