<?php
session_start();
require_once 'includes/connect.php';

$users = mysqli_query($connect, "SELECT * FROM `game`");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Пошук товариша для гри в онлайн-ігри</title>
    <link rel="stylesheet" href="/assets/css/allgames.css">
</head>
<body>

<?php require_once 'includes/header.php' ?>
<div class="body-wrapper">
    <div class="body-head">
        <h1>Наші ігри</h1>
        <p>Тут ви можете переглянути ігри що вже присутні на сайті. У вас є можливість запропонувати на додання на сайт мультипплеєрні ігри які вам подобаються, і після їх перевірки, вони з'являться у списку нижче.</p>
    </div>
    <div class="body-content">
        <?php require 'includes/game_block.php' ?>
        <?php require 'includes/game_block.php' ?>
        <?php require 'includes/game_block.php' ?>
        <?php require 'includes/game_block.php' ?>
        <?php require 'includes/game_block.php' ?>
        <?php require 'includes/game_block.php' ?>
        <?php require 'includes/game_block.php' ?>
        <?php require 'includes/game_block.php' ?>
    </div>
</div>
<?php require_once 'includes/footer.php' ?>

</body>
</html>