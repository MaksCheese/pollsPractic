<?php
    require_once 'inc/connect.php';
    session_start();

    $userID = $_GET['id'];

    $userName = $_SESSION['user']['login'];
    $tableName = 'answer' . $userName . $userID;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Моя страница</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" 
            rel="stylesheet" 
            integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" 
            crossorigin="anonymous">
    <link rel="stylesheet" href="css/myPage.css">
    <link rel="stylesheet" href="css/nav.css">    
    <link rel="stylesheet" href="css/footer.css">
</head>
<body>
    <?php include 'templates/nav.php';?>
    <div class="content">
        <div class="listAnswers"> 
        <?php 
            $queryArray = mysqli_fetch_all(mysqli_query($link, "SELECT * FROM `$tableName`"));
            if(!$queryArray){
                echo '<h3>Вы еще не прошли опросов!</h3>';
            } else{
                foreach($queryArray as $data){
                    $arrLen = sizeof($data);
                    $data = array_filter($data, 'trim');
                    
                    $index = 3;
                    echo '<h3 class="questName">Выбранные ответы на опрос '.$data[2].'</h3>';
                    while($arrLen > 0){                                    
        ?>
                      
            <p class="answer">
                
                <?=$data[$index];?>
            </p>  
                              
        <?php
                        $index++;
                        $arrLen--;
                        }
                    }
                }
        ?>
        </div>
    </div>
        
    <?php include 'templates/footer.php';?>
</body>
</html>