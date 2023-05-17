<?php
session_start();
require_once '../connect.php';

if(!$_SESSION['user'])
{
    header('Location: auth.php');
}

$new_data = $_POST;

$id = $_GET['id'];
$user = mysqli_query($connect, "SELECT * FROM `users` WHERE `id` = '$id'");
$contacts = mysqli_query($connect, "SELECT * FROM `contacts` WHERE `user_id` = '$id'");

$user = mysqli_fetch_assoc($user);
$contacts = mysqli_fetch_assoc($contacts);

if($user['login'] != $new_data['login'])
{
    $login = $new_data['login'];
    if(mysqli_num_rows(mysqli_query($connect, "SELECT * FROM `users` WHERE `login` = '$login'")) == 0)
    {

    }
}

