<?php
    session_start();
    require_once 'connect.php';

    $title = $_POST['title'];
    $type = $_POST['type'];
    $countVar = $_POST['count'];

    $showTables = mysqli_query($link, "SHOW TABLES FROM 'queezy' LIKE 'polls'");

    if($showTables == 1){
        mysqli_query($link, "INSERT INTO `polls` (`id`, `title`, `countVar`, `type`) VALUES (NULL, '$title', '$countVar', '$type')");
    } else{
        mysqli_query($link, "CREATE TABLE `queezy`.`polls` (`id` INT NOT NULL AUTO_INCREMENT , 
                                                            `title` VARCHAR(255) NULL , 
                                                            `countVar` varchar(1) NULL ,
                                                            `type` varchar(30) NULL ,
                                                            PRIMARY KEY (`id`)) ENGINE = InnoDB;");
        mysqli_query($link, "INSERT INTO `polls` (`id`, `title`, `countVar`, `type`) VALUES (NULL, '$title', '$countVar', '$type')");
    }
    $pollID = mysqli_fetch_all(mysqli_query($link, "SELECT * FROM polls ORDER BY id DESC LIMIT 1"));
    foreach($pollID as $id){}
    header('Location: ../adminAddPoll.php?id='.$id[0]);