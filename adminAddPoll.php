<?php 
    session_start();
    require_once 'inc/connect.php';

    $pollID = $_GET['id'];
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
    <script src="js/forChoise.js" defer></script>
</head>
<body>
    <?php include 'templates/nav.php';?>
    <div class="content">
        <form class="addPoll" action="inc/addPoll.php?id=<?= $pollID;?>" method="post" enctype="multipart/form-data">
            <?php
                $query = mysqli_query($link, "SELECT title FROM polls WHERE id = $pollID");
                $names = mysqli_fetch_all($query);
                foreach($names as $name){}
                $nameQuest = $name[0];
            ?>
            <div class="nameQuest">
                <h1 name="name">
                    <?php echo $nameQuest;?>
                </h1>
            </div>
                <div class="fields">
                    <?php
                        $counts = mysqli_fetch_all(mysqli_query($link, "SELECT countVar, type FROM polls ORDER BY id DESC LIMIT 1"));
                        foreach($counts as $count){}
                        $countAnswers = $count[0];
                        $type = $count[1];
                        $index = 1;
                        if($type == 'radio'){
                            while($countAnswers > 0){
                    ?>
                                <div class="radio" id="radio">
                                    <input class="inpVarAnswer" name= "var<?= $index;?>" type="text">
                                </div>
                    <?php
                                $index++;
                                $countAnswers--;
                            }
                        } else{
                            while($countAnswers > 0){
                    ?>
                                <div class="radio" id="radio">
                                    <input class="inpVarAnswer" name= "var<?= $index;?>" type="text">
                                </div>
                    <?php
                                $index++;
                                $countAnswers--;
                            }

                        }
                    ?>
                </div>
            <button type="submit" class="btn btn-primary">Создать</button>
        </form>
    </div>
    <?php include 'templates/footer.php';?>
</body>
</html>