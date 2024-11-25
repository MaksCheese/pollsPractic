<?php 
  session_start();
  $userID = $_SESSION['user']['id'];
?> 

<nav class="navbar navbar-expand-lg bg-body-tertiary navStyle">
  <div class="container-fluid">
    <a class="navbar-brand" href="../main.php">Главная</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse menu" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="../myPage.php?id=<?= $userID;?>">Моя страница</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../questList.php">Опросы</a>
        </li>
      </ul>
    </div>
    <div class="auhtoriz p-2">
        <a class="nav-link" href="../inc/logout.php">Выход</a>
    </div>
  </div>
</nav>