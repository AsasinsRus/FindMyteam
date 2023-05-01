<?php
    session_start();

    if(!$_SESSION['user'])
    {
        header('Location: auth.php');
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
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