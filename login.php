<?php
    require 'connect.php';
    $nickname = $_POST['nickname'];
    $password = $_POST['password'];
    if(!$nickname || !$password ){
        sendReponsive(404,jsonReponsiveError(404));
    }
    echo json_encode(loginCheck($nickname,md5($password)));

