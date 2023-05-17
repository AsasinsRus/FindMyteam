<?php
session_start();
require_once 'includes/connect.php';

if(!$_SESSION['user'])
{
    header('Location: auth.php');
}
$id = $_SESSION['user']['id'];
$contacts = mysqli_query($connect, "SELECT * FROM `contacts` WHERE `user_id` = '$id'");
$contacts = mysqli_fetch_assoc($contacts);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Профіль</title>
    <link rel="stylesheet" href="assets/css/account/account.css">
</head>
<body>
<?php require_once './includes/header.php' ?>
<div class="profile">
    <div class="profile">
        <div class="profile-header">
            <img class="avatar" src="<?php
                if($_SESSION['user']['avatar'] != "")
                {
                    echo $_SESSION['user']['avatar'];
                } else echo './../../assets/pics/avatar.png'?>" alt="Avatar">
            <div class="user-info">
                <h1 class="username"><?= $_SESSION['user']['login']?></h1>
                <div class="social-icons">
                    <?php
                        if($contacts['steam'] != '')
                        {
                            echo '<a href="'. 'https://steamcommunity.com/id/' . $contacts['steam'] .'"><img src="assets/pics/icons/steam.png" height="25" width="25"></a>';
                        }
                        if($contacts['discord'] != '')
                        {
                            echo '<a href="'. 'https://discordapp.com/users/' . $contacts['discord'] .'"><img src="assets/pics/icons/discord.png" height="25" width="25"></a>';
                        }
                    ?>
                </div>
            </div>
        </div>
        <div class="profile-body">
            <div class="profile-info">
                <h2>Про мене</h2>
                <?php if($_SESSION['user']['about_me'] != "")
                {
                    echo '<p>' . $_SESSION['user']['about_me'] . '</p>';
                }
                else echo '<p>На жаль тут нічного не має<br><br>Додайте щось про себе, щоб інші гравці краще Вас розуміли</p>'?>
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
        <a class="edit-button" href="./includes/account/edit-account.php?id=<?=$_SESSION['user']['id']?>">Змінити профіль</a>
        <a class="edit-button" href="#">Додати гру</a>
</div>
</div>
<?php require_once './includes/footer.php' ?>
</body>
</html>