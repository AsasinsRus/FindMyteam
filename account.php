<?php
session_start();

if(!$_SESSION['user'])
{
    header('Location: auth.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Steam Profile</title>
    <link rel="stylesheet" href="assets/css/account/account.css">
</head>
<body>
<div class="profile">
    <div class="profile">
        <div class="profile-header">
            <img class="avatar" src="assets/pics/avatar.png" alt="Avatar">
            <div class="user-info">
                <h1 class="username"><?= $_SESSION['user']['login']?></h1>
                <div class="social-icons">
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
        <div class="profile-body">
            <div class="profile-info">
                <h2>Про мене</h2>
                <?php if($_SESSION['user']['about_me'] != ""){?>
                    <p><?= $_SESSION['user']['about_me']?></p>
                <?php }else ?> <p> На жаль тут нічного не має</p>

            </div>
        <div class="game-list">
            <h2>Мої ігри</h2>
            <ul>
                <li>Game 1</li>
                <li>Game 2</li>
                <li>Game 3</li>
                <li>Game 4</li>
            </ul>

        </div>
    </div>
        <a class="edit-button" href="#">Змінити профіль</a>
        <a class="edit-button" href="#">Додати гру</a>
    <div class="profile-footer">
        <p>&copy; 2023 FindMyTeam. All rights reserved.</p>
    </div>
</div>
</body>
</html>