<?php
    require_once 'inc/connect.php';
    session_start();

    $pollID = $_GET['id'];
    $userLogin = $_SESSION['user']['login'];

    $nameQuestArr = mysqli_fetch_all(mysqli_query($link, "SELECT title, type FROM polls WHERE id = '$pollID'"));
    foreach($nameQuestArr as $nameQuest){}
    $name = $nameQuest[0];
    $type = $nameQuest[1];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Опросы</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" 
            rel="stylesheet" 
            integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" 
            crossorigin="anonymous">
    <link rel="stylesheet" href="css/quest.css">
    <link rel="stylesheet" href="css/nav.css">    
    <link rel="stylesheet" href="css/footer.css">
</head>
<body>
    <?php include 'templates/nav.php';?>
    <form class="content" method="post" action="inc/voited.php?id=<?=$pollID;?>">
        <h1><?= $name;?></h1>
        <ul class="ul">
        <?php
            $query = mysqli_query($link, "SELECT * FROM polls_answer WHERE name = '$name'");
            $arrayData = mysqli_fetch_all($query);
            foreach($arrayData as $answer){} 
            $answer = array_filter($answer, 'trim');
            $arrLen = sizeof($answer);
            $i = 2;
            $iName = 1;
            if($type == 'radio'){
                while($arrLen - 2> 0){                
                    ?>
                        <li class="li"><input class="answer" name="answer<?=$iName;?>" type="radio" value = "<?= $answer[$i];?>"><b ><?= $answer[$i];?></b></li>
                    <?php
                        $arrLen--;
                        $i++;
                        $iName++;
                }    
            } else{
                while($arrLen - 2> 0){                
                    ?>
                        <li class="li"><input class="answer" name="answer<?=$iName;?>" type="checkbox" value = "<?= $answer[$i];?>"><b ><?= $answer[$i];?></b></li>
                    <?php
                            $arrLen--;
                            $i++;
                            $iName++;
                    } 
            }
            ?>
        </ul>
        <button type="submit" class="btn btn-primary">Отправить</button>
    </form>
    <?php include 'templates/footer.php';?>
</body>
</html>