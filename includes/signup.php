<?php
    session_start();
    require_once 'connect.php';

    $login = $_POST['login'];
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password_confirm = $_POST['password_confirm'];

    $correct_format = true;

    if(strlen($login) < 2)
    {
        $_SESSION['message'] .= 'Некорректна довжина логіну' . "<br>";
        $correct_format = false;
    }
    if(!stristr($email, '@'))
    {
        $_SESSION['message'] .= 'Невірний формат електронної пошти' . "<br>";
        $correct_format = false;
    }
    if($password !== $password_confirm)
    {
        $_SESSION['message'] .= 'Паролі не співпадають' . "<br>";
        $correct_format = false;
    }

    if(mysqli_num_rows(mysqli_query($connect, "SELECT * FROM `users` WHERE `login` = '$login'")) > 0)
    {
        $_SESSION['message'] .= 'Користувач з таким логіном вже інує' . "<br>";
        $correct_format = false;
    }

    if($correct_format)
    {
        $password = md5($password);

        mysqli_query($connect, "INSERT INTO `users` (`full_name`, `login`, `email`, `password`) 
                                        VALUES ('$full_name', '$login', '$email', '$password')");

        $_SESSION['message'] = 'Успішна реєстраціія';
        header('Location: ../auth.php');
    }
    else
    {
        header('Location: ../register.php');
    }