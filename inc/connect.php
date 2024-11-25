<?php
    $link = mysqli_connect('localhost', 'root', '', 'queezy');

    if(!$link){
        die("Не удалось подключиться к базе данных!");
    }