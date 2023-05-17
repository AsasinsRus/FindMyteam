<?php
session_start();
require_once '../connect.php';

if(!$_SESSION['user'])
{
    header('Location: auth.php');
}

$id = $_GET['id'];
$user = mysqli_query($connect, "SELECT * FROM `users` WHERE `id` = '$id'");
$contacts = mysqli_query($connect, "SELECT * FROM `contacts` WHERE `user_id` = '$id'");

$user = mysqli_fetch_assoc($user);
$contacts = mysqli_fetch_assoc($contacts);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile - Steam Profile</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-tjZu7N3B+uDlPJjEu9M9CeeezWzFKNUD7GBQDy/hoyXJjUDHD84xXjLvnjfaRlU8ovHjQHLLaqHzZl3ohy+0w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./../../assets/css/account/edit-account.css">
</head>
<body>
<div class="profile">
    <div class="profile-header">
        <img class="avatar" src="<?php if($_SESSION['user']['avatar'] != "") {$_SESSION['user']['avatar'];} else ?>./../../assets/pics/avatar.png" alt="Avatar">
        <div class="user-info">
            <h1 class="username">Оновлення профіля</h1>
        </div>
    </div>
    <div class="profile-body">
        <div class="profile-info">
            <form action="processing-editing.php?id=<?=$_SESSION['user']['id']?>" method="post">
                <div class="form-group">
                    <label for="username">Логін</label>
                    <input type="text" id="username" name="username" placeholder="Введіть логін" value="<?=$user['login']?>">
                </div>
                <div class="form-group">
                    <label for="bio">Bio</label>
                    <textarea id="bio" name="Про мене" placeholder="Введіть інформацію про себе"><?=$user['about_me']?></textarea>
                </div>
                <div class="form-group">
                    <label for="steam">Steam</label>
                    <input type="text" id="steam" name="steam" placeholder="Введіть посилання на ваш аккаунт" value="<?=$contacts['steam']?>">
                </div>
                <div class="form-group">
                    <label for="discord">Discord</label>
                    <input type="text" id="discord" name="discord" placeholder="Введіть посилання на ваш аккаунт" value="<?=$contacts['discord']?>">
                </div>
                <div class="form-group">
                    <label for="avatar">Зображення профіля</label>
                    <input type="file" id="avatar" name="avatar">
                </div>
                <button class="save-button" type="submit">Зберегти зміни</button>
                <a class="back-button" href="./../../account.php">Назад</a>
            </form>
        </div>
    </div>
    <div class="profile-footer">
        <p>&copy; 2023 FindMyTeam Profile. All rights reserved.</p>
    </div>
</div>
</body>
</html>
