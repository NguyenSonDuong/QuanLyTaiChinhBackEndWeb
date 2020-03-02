<?php
    require 'connect.php';
    $nickname = $_POST['nickname'];
    $password = $_POST['password'];

    if(!$_POST['nickname'] || !$_POST['password']){
        sendReponsive(404,jsonReponsiveError(404));
    }
    $token =insertLoginInfor($nickname, md5($password));
    if(!empty($token)){
        $data = array(
            "status_code"=>200,
            "nickname"=>$nickname,
            "password"=>md5($password),
            "token"=>$token,
            "create_time"=>date_format(new DateTime("now"),"Y/m/d H:m:s")
        );
        sendReponsive(200,$data);
    }else{
        sendReponsive(300,jsonReponsiveError(300));
    }




?>