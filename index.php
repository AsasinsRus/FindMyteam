<?php
    session_start();

    if(!$_SESSION['user'])
    {
        header('Location: mainpage.php');
    }
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Авторизація</title>
    <link rel="stylesheet" href="assets/css/style.css">
    </head>
<body class="profile">
    <div>
        <h2><?= $_SESSION['user']['full_name'] ?></h2>
        <p><?= $_SESSION['user']['login'] ?></p>
        <a href="#"> <?= $_SESSION['user']['email'] ?> </a><br>
        <a href="includes/logout.php" class="logout">Вийти</a>
    </div>
</body>
<body>
    <?php if($_SESSION['user']['role'] != 'user') require_once 'includes/user-panel/table.php' ?>
</body>
</html>