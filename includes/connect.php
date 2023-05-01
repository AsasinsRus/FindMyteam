<?php
    $connect = mysqli_connect('localhost', 'root', '', 'Lab3');

    if(!$connect)
    {
        die("Database connection error");
    }