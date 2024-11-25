<?php
    session_start();
    require_once 'inc/connect.php';

    $pollID = $_GET['id'];

    $pollsTitleID = mysqli_fetch_all(mysqli_query($link, "SELECT id, title FROM polls WHERE id = '$pollID'"));
    foreach($pollsTitleID as $pollTitleID){
        $titlePoll = $pollTitleID[1];

        $query = mysqli_query($link, "SELECT * FROM counterAnswersID".$pollID."");
        $result = mysqli_fetch_all($query);
        $result = array_slice($result[0], 2);
    }

    $colNames = mysqli_fetch_all(mysqli_query($link, "SELECT * FROM polls_answer WHERE name = '$titlePoll'"));

    $arrNamesForGraph = [];
    foreach($colNames as $colName){
        $names = array_slice($colName, 2);
        $names = array_filter($names, 'trim');
        $arrNamesForGraph[] = $names; 
    
    }
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Результаты</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" 
            rel="stylesheet" 
            integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" 
            crossorigin="anonymous">
    <link rel="stylesheet" href="css/results.css">
    <link rel="stylesheet" href="css/nav.css">    
    <link rel="stylesheet" href="css/footer.css">
</head>
<body>
    <?php include 'templates/nav.php';?>
    <div class="content">
        <div style="width: 1200px;">
            <canvas id="myChart"></canvas>
        </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        const ctx = document.getElementById('myChart');

        new Chart(ctx, {
            type: 'bar',
            data: {
            labels: <?php echo json_encode($arrNamesForGraph[0]);?>,
                
            datasets: [{
                label: '# of Votes',
                data: [
                    <?=$result[0];?>, 
                    <?=$result[1];?>, 
                    <?=$result[2];?>, 
                    <?=$result[3];?>, 
                    <?=$result[4];?>,
                    <?=$result[5];?>,
                    <?=$result[6];?>,
                    <?=$result[7];?>],
                borderWidth: 1
            }]
            },
            options: {
            scales: {
                y: {
                beginAtZero: true
                }
            }
            }
        });
    </script>
    </div>
    <?php include 'templates/footer.php';?>
</body>
</html>