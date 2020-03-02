<?php
    require 'connect.php';
    $nickname = $_POST['nickname'];
    $password = $_POST['password'];
    if(!$nickname || !$password ){
        exit("<script>alert(\"Đăng nhập thất bại vui lòng điền đầy đủ thông tin\")</script>");
    }

