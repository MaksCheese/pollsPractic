<?php
    session_start();
    require_once 'connect.php';

    $login = $_POST['login'];
    $password = sha1($_POST['password']);
    $adminPas = sha1('admin');

    $check_user = mysqli_query($link, "SELECT * FROM users WHERE login = '$login' AND password = '$password'");

    if($login === 'admin' && $password === $adminPas){
        header('Location: ../adminPage.php');
    }
    if(mysqli_num_rows($check_user) > 0){
        $user = mysqli_fetch_assoc($check_user);
        $_SESSION['user'] =[
            "id" => $user['id'],
            "userName" => $user['userName'],
            "login" => $user['login'],
        ];
        $userID = $_SESSION['user']['id'];
        header('Location: ../myPage.php?id='.$userID);
        
    }
