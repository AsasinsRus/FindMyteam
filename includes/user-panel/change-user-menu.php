<?php
    session_start();
    require_once '../connect.php';

    $id = $_GET['id'];

    if($_SESSION['user']['role'] != 'admin')
    {
        header('Location: ../../index.php');
    }

    $user = mysqli_query($connect, "SELECT * FROM `users` WHERE `id` = '$id'");

    if(mysqli_num_rows($user) == 0)
    {
        header('Location: ../../index.php');
    }

    $_SESSION['id'] = $id;
    $user = mysqli_fetch_assoc($user);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../../assets/css/style.css">
    <title>Change</title>
</head>
<body>
    <form action="change-user.php" method="post">
        <label>Логін</label>
        <input type="text" placeholder="Введіть новий логін" name="login" value="<?=$user['login']?>">
        <label>ПІБ</label>
        <input type="text" placeholder="Введіть нове ім'я" name="full_name" value="<?=$user['full_name']?>">
        <label>E-mail</label>
        <input type="text" placeholder="Введіть нову адресу електронної пошти" name="email" value="<?=$user['email']?>">
        <label>Пароль</label>
        <input type="password" placeholder="<?=$user['password']?>" name="password">
        <?php if($_SESSION['user']['id'] != $id)
        {?>
        <label>Роль</label>
        <select name="role">
            <option>нова роль</option>
            <option>user</option>
            <option>manager</option>
            <option>admin</option>
        </select>
        <?php
        }?>
        <button type="submit">Змінити</button>
        <br>
        <a href="../../index.php" >Назад</a>
    </form>
</body>
</html>