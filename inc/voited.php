<?php
    session_start();
    require_once 'connect.php';

    $pollID = $_GET['id'];

    $userID = $_SESSION['user']['id'];
    $userName = $_SESSION['user']['login'];



    $answer1 = $_POST['answer1'];
    $answer2 = $_POST['answer2'];
    $answer3 = $_POST['answer3'];
    $answer4 = $_POST['answer4'];
    $answer5 = $_POST['answer5'];
    $answer6 = $_POST['answer6'];
    $answer7 = $_POST['answer7'];
    $answer8 = $_POST['answer8'];

    $nameQuestArr = mysqli_fetch_all(mysqli_query($link, "SELECT title FROM polls WHERE id = '$pollID'"));
    foreach($nameQuestArr as $nameQuest){}
    $questName = $nameQuest[0];

    $tableName = $userName . $userID;

    $checkTable = mysqli_query($link, "SHOW TABLES FROM `queezy` LIKE `answer".$tableName."`");

    if($checkTable == 1){
        mysqli_query($link, "INSERT INTO `answer".$tableName."` SET id = NULL,
                                                                            userName = '$userName',
                                                                            nameQuest = '$questName',
                                                                            answer1 = '$answer1',
                                                                            answer2 = '$answer2',
                                                                            answer3 = '$answer3',
                                                                            answer4 = '$answer4',
                                                                            answer5 = '$answer5',
                                                                            answer6 = '$answer6',
                                                                            answer7 = '$answer7',
                                                                            answer8 = '$answer8'");       
    } else {
        mysqli_query($link, "CREATE TABLE `queezy`.`answer".$tableName."` ( `id` INT NOT NULL AUTO_INCREMENT,
                                                                                    `userName` VARCHAR(255) NULL,
                                                                                    `nameQuest` VARCHAR(255) NULL,
                                                                                    `answer1` VARCHAR(255) NULL,
                                                                                    `answer2` VARCHAR(255) NULL,
                                                                                    `answer3` VARCHAR(255) NULL,
                                                                                    `answer4` VARCHAR(255) NULL,
                                                                                    `answer5` VARCHAR(255) NULL,
                                                                                    `answer6` VARCHAR(255) NULL,
                                                                                    `answer7` VARCHAR(255) NULL,
                                                                                    `answer8` VARCHAR(255) NULL,
                                                                                    PRIMARY KEY (`id`)) ENGINE = InnoDB;");
        mysqli_query($link, "INSERT INTO `answer".$tableName."` SET id = NULL,
                                                                            userName = '$userName',
                                                                            nameQuest = '$questName',
                                                                            answer1 = '$answer1',
                                                                            answer2 = '$answer2',
                                                                            answer3 = '$answer3',
                                                                            answer4 = '$answer4',
                                                                            answer5 = '$answer5',
                                                                            answer6 = '$answer6',
                                                                            answer7 = '$answer7',
                                                                            answer8 = '$answer8'");                                                        
    }

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

    
    mysqli_query($link, "INSERT INTO `poll_".$pollID."` SET id = NULL,
                                                                answer1 = '$answer1',
                                                                answer2 = '$answer2',
                                                                answer3 = '$answer3',
                                                                answer4 = '$answer4',
                                                                answer5 = '$answer5',
                                                                answer6 = '$answer6',
                                                                answer7 = '$answer7',
                                                                answer8 = '$answer8'");    


    
    $arrayAnswers = mysqli_fetch_all(mysqli_query($link, "SELECT * FROM `answer".$tableName."` ORDER BY id DESC LIMIT 1"));

    $lenArrayAnswers = sizeof($arrayAnswers[0]) - 3;
    $iArray = 1;
    $iAnswer = 0;
    foreach($arrayAnswers as $answer){}
        $answer = array_slice($answer, 3);
        while($lenArrayAnswers > 0) {
            if(!empty($answer[$iAnswer])){
                        $userAnswer = $answer[$iArray];
                        mysqli_query($link, "UPDATE counterAnswersID".$pollID." SET countAnswer".$iArray." = countAnswer".$iArray." + 1 WHERE id = '1'");
            } 
            $lenArrayAnswers--;
            $iArray++;
            $iAnswer++;
        }       
    
    header('Location: ../myPage.php?id='.$userID);





    // INSERT INTO `answertesttestQuest` SET id = NULL, userName = 'Ivan', nameQuest = 'Fucking Quest', answer1 = '12', answer2 = '13', 
    // answer3 = '14', answer4 = '32', answer5 = '45', answer6 = 'ewr', answer7 = 'dfgh', answer8 = 'huita'





    // if(!empty($isNull)){
    //     $answerArr = mysqli_fetch_all(mysqli_query($link, "SELECT `countAnswer".$counter."` FROM `counterAnswersID".$pollID."`"));
    //     foreach($answerArr as $answer){}
    //     $answer[$counter] = $answer[$counter] + 1;
    //     mysqli_query($link, "UPDATE `counterAnswersID".$pollID."` SET 'countAnswer".$counter."' = ".$answer[$counter]."");
    // } 

    //     SELECT id FROM `answertest2` WHERE nameQuest = 'Сколько вам лет?';
    //     SELECT answer3 FROM `answertest2` WHERE id = '16';
    //     UPDATE `counterAnswersID24` SET `countAnswer3` += '1' WHERE nameQuest = 'Сколько вам лет?'; 
    
    //     SELECT id FROM `answertest2` WHERE nameQuest = 'Сколько вам лет?';
    //     SELECT answer3 FROM `answertest2` WHERE id = '16';
    //     UPDATE `counterAnswersID24` SET `countAnswer3` += '1' WHERE nameQuest = 'Сколько вам лет?';


                    // while($counter <= 1){
    //     $questIDArr = mysqli_fetch_all(mysqli_query($link, "SELECT id FROM 'answertest2' WHERE nameQuest = 'Сколько вам лет?'"));
    //     foreach($questIDArr as $questID){}
    //     $isNullArr = mysqli_fetch_all(mysqli_query($link, "SELECT 'answer3' FROM 'answertest2' WHERE id = '$questID[0]'"));
    //     foreach($isNullArr as $isNull){
    //         if(!empty($isNull)){
    //             $answerArr = mysqli_fetch_all(mysqli_query($link, "SELECT 'countAnswer3' FROM 'counterAnswersID24'"));
    //             foreach($answerArr as $answer){}
    //             $ansCount = $answer[0] + 1;
    //             mysqli_query($link, "UPDATE 'counterAnswersID24' SET 'countAnswer3' = '$ansCount' WHERE `nameQuest` = 'Сколько вам лет?'");
    //         } 
    //     $counter++;
    //     }
    // }