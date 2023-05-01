<?php
    session_start();

    if($_SESSION['user'])
    {
        header('Location: index.php');
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
<body>
    <form action="includes/signup.php" method="post">

        <?php
            if($_SESSION['message'])
            {
                echo "<p class='msg'>" . $_SESSION['message'] . "</p>";
            }
            unset($_SESSION['message']);
        ?>
        <label>Логін</label>
        <input type="text" placeholder="Введіть свій логін" name="login">
        <label>ПІБ</label>
        <input type="text" placeholder="Введіть своє повне ім'я" name="full_name">
        <label>E-mail</label>
        <input type="text" placeholder="Введіть адресу електронної пошти" name="email">
        <label>Пароль</label>
        <input type="password" placeholder="Введіть пароль" name="password">
        <label>Підтвердження паролю</label>
        <input type="password" placeholder="Введіть пароль ще раз" name="password_confirm">
        <button type="submit">Зареєструватись</button>
        <p>
            Вже є аккаунта? - <a href="auth.php">увійти</a>
        </p>
    </form>
</body>
</html>