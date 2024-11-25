<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Главная</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" 
            rel="stylesheet" 
            integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" 
            crossorigin="anonymous">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/nav.css">    
    <link rel="stylesheet" href="css/footer.css">
</head>
<body>
    <?php include 'templates/nav.php';?>
    <div class="aboutCol">
        <div class="colLeft">
            <div class="aboutBlock1">
                <h1>Всегда важные темы!</h1>
                <p>Только актуальные вопросы по волнующим проблемам, на которые стоит обратить внимание.</p>
                <img src="imgs/icons/person.svg">
            </div>
            <div class="aboutBlock2">
                <h1>Проверенные заказчики</h1>
                <p>Мы работаем только с надежными заказчиками и тщательно отбираем опросы.
                    Все анкеты проходят проверку в несколько этапов, чтобы вопросы в них были понятными.</p>
                <img src="imgs/icons/shield.svg">
            </div>
        </div>
        <div class="colRight">
            <div class="aboutBlock3">
                <h1>Сохранность ваших данных</h1>
                <p>Мы не храним и не передаем ваши данные третьим лицам в соответствии с политикой конфиденциальности.
                Ваши ответы абсолютно анонимны.</p>
                <img src="imgs/icons/lock.svg">
            </div>
        </div>
    </div>
    <?php include 'templates/footer.php';?>
</body>
</html>