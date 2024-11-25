<?php
    session_start();
    require_once 'inc/connect.php';
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
        <link rel="stylesheet" href="css/questList.css">
        <link rel="stylesheet" href="css/nav.css">    
        <link rel="stylesheet" href="css/footer.css">
    </head>
    <body>
        <?php include 'templates/nav.php';?>
        <div class="content">
            <?php 
                $query = mysqli_query($link, "SELECT * FROM polls");
                if(!$query){
                    echo '
                    <div class="content">
                        
                    </div>';
                } else{
            ?>
            <table>
                <div class="polls">
                    <tr style="border: 1px solid black;">
                        <th style="border: 1px solid black; width: 250px; height:30px; text-align: center">Название опроса</th>
                        <th style="border: 1px solid black; width: 190px; height:30px; text-align: center">Ссылка на опрос</th>
                        <th style="border: 1px solid black; width: 190px; height:30px; text-align: center">Результаты</th>
                    </tr>
                    <?php
                        $polls = mysqli_query($link, "SELECT * FROM polls");
                        if(!$polls){
                            header('Location: main.php');
                        } else{
                            $polls = mysqli_fetch_all($polls);
                            foreach($polls as $poll){
                    ?>
                        <tr style="border: 1px solid black;">
                            <td style="border: 1px solid black; height:30px; text-align: center"><?= $poll[1];?></td>
                            <td style="border: 1px solid black; height:30px; text-align: center"><a href="quest.php?id=<?= $poll[0];?>" style="color: black; text-decoration: none">Перейти к опросу</a></td>
                            <td style="border: 1px solid black; height:30px; text-align: center"><a href="results.php?id=<?= $poll[0];?>" style="color: black; text-decoration: none">Результаты</a></td>
                        </tr>
                        <?php
                                                    }
                                }
                        ?>
                </div>
            </table>
            <?php }?>
        </div>
        <?php include 'templates/footer.php';?>
    </body>
</html>