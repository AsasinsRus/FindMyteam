<?php
    $connect = mysqli_connect('localhost', 'root', '', 'FindMyTeamDB');

    if(!$connect)
    {
        die("Database connection error");
    }