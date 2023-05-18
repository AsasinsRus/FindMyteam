<?php
session_start();
?>
<link rel="stylesheet" href="/assets/css/game_block.css">
<div class="game-block">
    <img class="game-img" src="<?php
    if($_SESSION['']['avatar'] != "")
    {
        echo $_SESSION['user']['avatar'];
    } else echo '/assets/pics/avatar.png'?>" alt="Изображение игры">
    <img class="avatar" src="<?php
    if($_SESSION['user']['avatar'] != "")
    {
        echo $_SESSION['user']['avatar'];
    } else echo '/assets/pics/avatar.png'?>" alt="Avatar">
    <div class="game-info">
        <h2>Название игры</h2>
        <p>Описание игры</p>
    </div>
    <a href="other-page.html" class="btn">Перейти</a>
</div>