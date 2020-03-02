<?php
     include ('ConnectAction.php');
     define("DATABASE","thongtinnguoidung");
     if(!isset($_POST['username']) or  !isset($_POST['password']))
         sendResponse(404,dataError(404,"Error request"));
     $username = $_POST['username'];
     $password = $_POST['password'];
     if(empty($username) or empty($password)){
         sendResponse(404,dataError(404,"Không được để tên đăng nhập và mật khẩu trống"));
     }
    if(strlen($password) <8 ||  strlen($username)<8){
        sendResponse(500,dataError(404,"Tên tài khoản và mật khẩu phải lớn hơn 8 ký tự"));
    }   
     $connect = connectDatabase(DATABASE);
     if(dangky($connect, $username, $password)){
        echo json_encode(array(
            "status_code"=> 200,
            "status" => "Successful",
            "messages" => "Đăng ký tài khoản thành công"
        ));
     }else{
        sendResponse(500,dataError(500,"Sever Eror"));
     }

?>