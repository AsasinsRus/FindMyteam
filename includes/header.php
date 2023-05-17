<?php
session_start();
?>

<link rel="stylesheet" href="../assets/css/header.css">
    <header>
        <div class="header-title">
            <h1><a href="../mainpage.php">FindMyTeam</a></h1>
        </div>
        <nav>
            <div class="menu-wrapper">
                <ul class="left-menu">
                    <li><a href="../mainpage.php">Пошук товариша</a></li>
                    <li><a href="#">Контакти</a></li>
                    <li><a href="../aboutus.php">Про нас</a></li>
                </ul>
                <ul class="right-menu">
                    <li class="auth-button"><?php if($_SESSION['user']) {?><a href="../account.php.php">Профіль</a></li><?php } else?> <a href="../auth.php">Увійти</a></li>
                    <li class="auth-button"><?php if($_SESSION['user']) {?><a href="../includes/logout.php">Вихід</a></li><?php } else?> <a href="../register.php">Зареєструватися</a></li>
                </ul>
            </div>
        </nav>
    </header>