<?php
    session_start();
    require_once 'connect.php';

    $pollID = $_GET['id'];

    $nameArr = mysqli_fetch_all(mysqli_query($link, "SELECT title FROM polls ORDER BY id DESC LIMIT 1"));
    foreach($nameArr as $name){}

    $nameQuest = $name[0];
    $var1 = $_POST['var1'];
    $var2 = $_POST['var2'];
    $var3 = $_POST['var3'];
    $var4 = $_POST['var4'];
    $var5 = $_POST['var5'];
    $var6 = $_POST['var6'];
    $var7 = $_POST['var7'];
    $var8 = $_POST['var8'];

    // Создание счетчиков ответов

    $checkTables = mysqli_query($link, "SHOW TABLE FROM 'queezy' LIKE 'counterAnswersID".$pollID."'");

    mysqli_query($link, "CREATE TABLE IF NOT EXISTS `queezy`.`poll_".$pollID."`
                                                                (`id` INT NOT NULL AUTO_INCREMENT,
                                                                `answer1` VARCHAR(255) NOT NULL,
                                                                `answer2` VARCHAR(255) NOT NULL,
                                                                `answer3` VARCHAR(255) NOT NULL,
                                                                `answer4` VARCHAR(255) NOT NULL,
                                                                `answer5` VARCHAR(255) NOT NULL,
                                                                `answer6` VARCHAR(255) NOT NULL,
                                                                `answer7` VARCHAR(255) NOT NULL,
                                                                `answer8` VARCHAR(255) NOT NULL,
                                                                PRIMARY KEY (`id`)) ENGINE = InnoDB;");
    if($checkTables == 1){
        mysqli_query($link, "INSERT INTO `counterAnswersID".$pollID."` SET id = NULL,
                                                                            nameQuest = '$nameQuest',
                                                                            countAnswer1 = '0',
                                                                            countAnswer2 = '0',
                                                                            countAnswer3 = '0',
                                                                            countAnswer4 = '0',
                                                                            countAnswer5 = '0',
                                                                            countAnswer6 = '0',
                                                                            countAnswer7 = '0',
                                                                            countAnswer8 = '0'");        
    } else{
        mysqli_query($link, "CREATE TABLE `queezy`.`counterAnswersID".$pollID."` (`id` INT NOT NULL AUTO_INCREMENT,
                                                                                `nameQuest` VARCHAR(255) NULL,
                                                                                `countAnswer1` INT(10) NOT NULL,    
                                                                                `countAnswer2` INT(10) NOT NULL,    
                                                                                `countAnswer3` INT(10) NOT NULL,    
                                                                                `countAnswer4` INT(10) NOT NULL,    
                                                                                `countAnswer5` INT(10) NOT NULL,    
                                                                                `countAnswer6` INT(10) NOT NULL,    
                                                                                `countAnswer7` INT(10) NOT NULL,    
                                                                                `countAnswer8` INT(10) NOT NULL,
                                                                                PRIMARY KEY(`id`)) ENGINE = InnoDB;");
        mysqli_query($link, "INSERT INTO `counterAnswersID".$pollID."` SET id = NULL,
                                                                            nameQuest = '$nameQuest',
                                                                            countAnswer1 = '0',
                                                                            countAnswer2 = '0',
                                                                            countAnswer3 = '0',
                                                                            countAnswer4 = '0',
                                                                            countAnswer5 = '0',
                                                                            countAnswer6 = '0',
                                                                            countAnswer7 = '0',
                                                                            countAnswer8 = '0'");    
    }

    // Создание таблицы с вариантами ответов

    $showTables = mysqli_query($link, "SHOW TABLES FROM 'queezy' LIKE 'polls_answer'");

    if($showTables == 1){
        mysqli_query($link, "INSERT INTO `polls_answer` (`id`, `name`, `var1`, `var2`, `var3`, `var4`, `var5`, `var6`, `var7`, `var8`)
                                            VALUES (NULL, '$nameQuest', '$var1', '$var2', '$var3', '$var4', '$var5', '$var6', '$var7', '$var8')");
    } else{
        mysqli_query($link, "CREATE TABLE `queezy`.`polls_answer` (`id` INT NOT NULL AUTO_INCREMENT ,
                                                                    `name` VARCHAR(255) NULL,
                                                                    `var1` VARCHAR(255) NULL,
                                                                    `var2` VARCHAR(255) NULL,
                                                                    `var3` VARCHAR(255) NULL,
                                                                    `var4` VARCHAR(255) NULL,        
                                                                    `var5` VARCHAR(255) NULL,                                                                        
                                                                    `var6` VARCHAR(255) NULL,
                                                                    `var7` VARCHAR(255) NULL,
                                                                    `var8` VARCHAR(255) NULL,
                                                                    PRIMARY KEY (`id`)) ENGINE = InnoDB;");
        mysqli_query($link, "INSERT INTO `polls_answer` (`id`, `name`, `var1`, `var2`, `var3`, `var4`, `var5`, `var6`, `var7`, `var8`)
                                            VALUES (NULL, '$nameQuest', '$var1', '$var2', '$var3', '$var4', '$var5', '$var6', '$var7', '$var8')");    
    }

    header('Location: ../adminPage.php');
