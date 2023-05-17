<?php
session_start();
require_once '../connect.php';

if(!$_SESSION['user'])
{
    header('Location: auth.php');
}

$new_data = $_POST;

$new_login = $new_data['login'];
$new_about_me = $new_data['about_me'];
$new_steam = $new_data['steam'];
$new_discord = $new_data['discord'];
$new_avatar = $new_data['avatar'];

$id = $_GET['id'];
$user = mysqli_query($connect, "SELECT * FROM `users` WHERE `id` = '$id'");
$contacts = mysqli_query($connect, "SELECT * FROM `contacts` WHERE `user_id` = '$id'");

$user = mysqli_fetch_assoc($user);
$contacts = mysqli_fetch_assoc($contacts);

if($user['login'] != $new_login && mysqli_num_rows(mysqli_query($connect, "SELECT * FROM `users` WHERE `login` = '$new_login'")) != 0)
{
    $_SESSION['message'] .= "Такий логін вже існує\n";
    header('Location: edit-account.php?id=', $_SESSION['user']['id']);
}
if($user['about_me'] != $new_data['about_me'] && strlen($new_data['about_me']) > 500)
{
    $_SESSION['message'] .= "BIO занадто довгий (більше 500 символів)\n";
    header('Location: edit-account.php?id=', $_SESSION['user']['id']);
}

if($user['login'] != $new_login)
{
    mysqli_query($connect, "UPDATE `users` SET `login` = '$new_login' WHERE `id` = '$id'");
}

if($user['about_me'] != $new_about_me)
{
    mysqli_query($connect, "UPDATE `users` SET `about_me` = '$new_about_me' WHERE `id` = '$id'");
}

if($contacts['steam'] != $new_steam)
{
    mysqli_query($connect, "UPDATE `contacts` SET `steam` = '$new_steam' WHERE `user_id` = '$id'");
}

if($contacts['discord'] != $new_discord)
{
    mysqli_query($connect, "UPDATE `contacts` SET `discord` = '$new_discord' WHERE `user_id` = '$id'");
}

if($user['avatar'] != $new_avatar)
{
    mysqli_query($connect, "UPDATE `contacts` SET `discord` = '$new_discord' WHERE `user_id` = '$id'");
}

header('Location: ./../../account.php');

