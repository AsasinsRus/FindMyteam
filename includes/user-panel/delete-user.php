<?php
    session_start();
    require_once '../connect.php';

    $id = $_GET['id'];

    if($_SESSION['user']['role'] != 'admin')
    {
        header('Location: ../../index.php');
    }

    mysqli_query($connect, "DELETE FROM `users` WHERE `id` = '$id'");

    header('Location: ../../index.php');