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
    <link rel="stylesheet" href="assets/css/account.css">
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
                <h2>About Me</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla eu eleifend ligula. Morbi auctor dapibus tempor. Sed consequat felis id metus rhoncus, ac feugiat nisl iaculis. In a arcu sed nunc semper aliquet.</p>
                <a class="edit-button" href="#">Змінити профіль</a>
            </div>
        <div class="game-list">
            <h2>Мої ігри</h2>
            <ul>
                <li>Game 1</li>
                <li>Game 2</li>
                <li>Game 3</li>
                <li>Game 4</li>
            </ul>
            <a class="edit-button" href="#">Додати гру</a>
        </div>
    </div>
    <div class="profile-footer">
        <p>&copy; 2023 FindMyTeam. All rights reserved.</p>
    </div>
</div>
</body>
</html>