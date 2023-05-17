<?php
    session_start();

    if($_SESSION['user'])
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
    <link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>
    <?php require_once 'includes/header.php' ?>
    <div class="form">
        <form action="/includes/signin.php" method="post">
            <?php
            if($_SESSION['message'])
            {
                echo "<p class='msg'>" . $_SESSION['message'] . "</p>";
            }
            unset($_SESSION['message']);
            ?>
            <label>Логін</label>
            <input type="text" placeholder="Введіть свій логін" name="login">
            <label>Пароль</label>
            <input type="password" placeholder="Введіть свій пароль" name="password">
            <button type="submit">Увійти</button>
            <p>
                Нема аккаунта? - <a href="register.php">зареєструватись</a>
            </p>
        </form>
    </div>
    <?php require_once 'includes/footer.php' ?>
</body>
</html>