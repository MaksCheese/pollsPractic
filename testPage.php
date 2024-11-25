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

    foreach($colNames as $colName){
        $names = array_slice($colName, 2);
        $arrLen = sizeof($names);        
    }
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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

        const names = <?php echo json_encode($names);?>
        const result = <?php echo json_encode($result);?>

        new Chart(ctx, {
            type: 'line',
            data: {
            labels: names,
                
            datasets: [{
                label: '# of Votes',
                data: [{
                    label: "Dataset",
                    backgroundColor:  "rgba(0,0,255,1.0)",
                    borderColor: "rgba(0,0,255,0.1)",
                    data: y,
                }, ],
            }]
            },
            options: {
                responsive: true,
            plugins: {
                legend: {
                    position: "top",
                },
                title: {
                    display: true,
                    text: "Chart.js Line Chart",
                },
            },
        },
    });
    </script>
    </div>
    <?php include 'templates/footer.php';?>
</body>
</html>