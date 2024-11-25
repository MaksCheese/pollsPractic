<?php
    session_start();
    require_once 'connect.php';

    $pollId = $_GET['id'];
    $pollName = $_GET['name'];

    mysqli_query($link, "DELETE FROM polls WHERE `polls`.`id` = '$pollId'");

    $nameQusetArr =mysqli_fetch_all(mysqli_query($link, "SELECT title FROM polls WHERE id = '$pollId'"));
    foreach($nameQusetArr as $nameQuest){}
    $questName = $nameQuest[0];

    mysqli_query($link, "DELETE FROM polls_answer WHERE `polls_answer`.`name` = '$pollName'");
    mysqli_query($link, "DROP TABLE `queezy`.`counterAnswersID".$pollID."`");

    header('Location: ../adminPage.php');