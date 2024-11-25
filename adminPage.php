<?php 
    session_start();
    require_once 'inc/connect.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Панель управления</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" 
                rel="stylesheet" 
                integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" 
                crossorigin="anonymous">
        <link rel="stylesheet" href="css/nav.css">    
        <link rel="stylesheet" href="css/footer.css">
        <link rel="stylesheet" href="css/admin.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" 
                rel="stylesheet" 
                integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" 
                crossorigin="anonymous">
    </head>
    <body>
        <?php include 'templates/navAdmin.php';?>
        <div class="content">
            <form class="addPoll" action="inc/createPoll.php" method="post">
                <div class="mb-3">
                    <b>Добавить новый опрос!</b>
                    <b>Вопрос:</b>
                    <textarea type="text" class="form-control" name="title" id=""></textarea>
                    <select name="type" id="variant" class="option">
                        <option value="multi">Множественный выбор</option>
                        <option value="radio">Один выбор</option>
                    </select>
                    <div>
                        <b>Количество вариантов ответа: </b>
                        <select name="count" id="">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary" name="add_poll">Перейти к добавлению</button>
                </div>
            </form>
            <?php 
                $query = mysqli_query($link, "SELECT * FROM polls");
                if(!$query){
                    echo '
                    <div class="content">
                        
                    </div>';
                } else{
            ?>
            <form class="redPoll" action="" method="post">
                <table >                    
                    <div class="polls">
                        <tr style="border: 1px solid black;">
                            <th style="border: 1px solid black; width: 250px; height:30px; text-align: center">Название</th>
                            <th style="border: 1px solid black; width: 190px; height:30px; text-align: center">Удаление</th>
                        </tr>
                        <?php
                            $polls = mysqli_query($link, "SELECT * FROM polls");                        
                            $polls = mysqli_fetch_all($polls);
                            foreach($polls as $poll){
                        ?>
                            <tr style="border: 1px solid black;">
                                <td style="border: 1px solid black; height:30px; text-align: center">
                                    <?= $poll[1];?>
                                </td>
                                <td style="border: 1px solid black; width: 190px; height:30px; text-align: center">
                                    <a href="inc/deletePoll.php?id=<?= $poll[0];?>&name=<?=$poll[1];?>" style="color: black; text-decoration: none; font-style: italic">Удалить</a>
                                </td>
                            </tr>
                            <?php
                                                        }                                
                            ?>
                    </div>
                </table>
                <?php }?>
            </form>
            <?php include 'templates/footer.php';?>
        </div>        
    </body>
</html>