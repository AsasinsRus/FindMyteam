<?php
    session_start();
    require_once 'connect.php';

    $login = $_POST['login'];
    $password = md5($_POST['password']);

    $user = mysqli_query($connect, "SELECT * FROM `users` WHERE `login` = '$login' AND `password` = '$password'");

    if(mysqli_num_rows($user) > 0)
    {
        $user = mysqli_fetch_assoc($user);

        $_SESSION['user'] = [
            "id" => $user['id'],
            "full_name" => $user['full_name'],
            "login" => $user['login'],
            "email" => $user['email'],
            "about_me" => $user['about_me'],
            "avatar" => $user['avatar'],
            "role" => $user['role']
        ];

        header('Location: ../index.php');
    }
    else
    {
        $_SESSION['message'] = 'Не вірний логін або пароль';
        header('Location: ../auth.php');
    }