<?php
    session_start();
    require_once '../connect.php';

    $id = $_GET['id'];

    if($_SESSION['user']['role'] != 'admin')
    {
        header('Location: ../../index.php');
    }

    $user = mysqli_fetch_assoc(mysqli_query($connect, "SELECT `login` FROM `users` WHERE `id` = '$id'"));
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../../assets/css/style.css">
    <title>Document</title>
</head>
<body>
    <form action="delete-user.php" method="get">
        <label> Ви впевнені, що хочете видалити користувача <?=$user['login']?>?</label>
        <br>
        <button type="submit" name="id" value="<?=$_GET['id']?>">Підтвердити</button>
        <br>
        <form action="../../index.php">
            <button type="submit">Відхилити</button>
        </form>
    </form>
</body>
</html>
