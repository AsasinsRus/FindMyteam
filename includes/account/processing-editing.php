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

if(($user['login'] != $new_login &&
    mysqli_num_rows(mysqli_query($connect, "SELECT * FROM `users` WHERE `login` = '$new_login'")) != 0))
{
    $_SESSION['message'] .= "Такий логін вже існує\n";
    header('Location: edit-account.php?id=', $_SESSION['user']['id']);
    return;
}

if($new_login == '')
{
    $_SESSION['message'] .= "Поле логіну не може бути пустим\n";
    header('Location: edit-account.php?id=', $_SESSION['user']['id']);
    return;
}

if($user['about_me'] != $new_data['about_me'] && strlen($new_data['about_me']) > 500)
{
    $_SESSION['message'] .= "BIO занадто довгий (більше 500 символів)\n";
    header('Location: edit-account.php?id=', $_SESSION['user']['id']);
    return;
}

if($_FILES['avatar']['name'] != '')
{
    $path = 'assets/pics/upload_pics/' . time() . $_FILES['avatar']['name'];
    if(!move_uploaded_file($_FILES['avatar']['tmp_name'], './../../' . $path))
    {
        $_SESSION['message'] .= "Помилка завантаження файлу\n";
        header('Location: edit-account.php?id=', $_SESSION['user']['id']);
    }

    mysqli_query($connect, "UPDATE `users` SET `avatar` = '$path' WHERE `id` = '$id'");
    $_SESSION['user']['avatar'] = $path;
    return;
}

if($user['login'] != $new_login)
{
    mysqli_query($connect, "UPDATE `users` SET `login` = '$new_login' WHERE `id` = '$id'");
    $_SESSION['user']['login'] = $new_login;
}

if($user['about_me'] != $new_about_me)
{
    mysqli_query($connect, "UPDATE `users` SET `about_me` = '$new_about_me' WHERE `id` = '$id'");
    $_SESSION['user']['about_me'] = $new_about_me;
}

if($contacts['steam'] != $new_steam)
{
    mysqli_query($connect, "UPDATE `contacts` SET `steam` = '$new_steam' WHERE `user_id` = '$id'");
}

if($contacts['discord'] != $new_discord)
{
    mysqli_query($connect, "UPDATE `contacts` SET `discord` = '$new_discord' WHERE `user_id` = '$id'");
}

header('Location: ./../../account.php');

