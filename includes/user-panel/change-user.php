<?php
    session_start();
    require_once '../connect.php';

    $id = $_SESSION['id'];
    unset($_SESSION['id']);

    $user = mysqli_query($connect, "SELECT * FROM `users` WHERE `id` = '$id'");
    $user = mysqli_fetch_assoc($user);

    if($user['login'] != $_POST['login'])
    {
        $login = $_POST['login'];
        mysqli_query($connect, "UPDATE `users` SET `login` = '$login' WHERE `id` = '$id'");
    }

    if($user['full_name'] != $_POST['full_name'])
    {
        $full_name = $_POST['full_name'];
        mysqli_query($connect, "UPDATE `users` SET `full_name` = '$full_name' WHERE `id` = '$id'");
    }

    if($user['email'] != $_POST['email'])
    {
        $email = $_POST['email'];
        mysqli_query($connect, "UPDATE `users` SET `email` = '$email' WHERE `id` = '$id'");
    }

    if($_POST['password'] != "")
    {
        $password = md5($_POST['password']);
        mysqli_query($connect, "UPDATE `users` SET `password` = '$password' WHERE `id` = '$id'");
    }

    if($user['role'] != $_POST['role'] && $_POST['role'] != "нова роль")
    {
        $role = $_POST['role'];
        mysqli_query($connect, "UPDATE `users` SET `role` = '$role' WHERE `id` = '$id'");
    }

    header('Location: ../../index.php');
