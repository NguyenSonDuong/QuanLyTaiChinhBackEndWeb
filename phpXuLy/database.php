<?php
        include ('ConnectAction.php');
        define("DATABASE","thongtinnguoidung");
        if(!isset($_GET['username']) or  !isset($_GET['password']))
            sendResponse(404,dataError(502,"Lỗi gửi dữ liệu"));
        $username = $_GET['username'];
        $password = $_GET['password'];
        if(empty($username) or empty($password)){
            sendResponse(404,dataError(404,"Tên tài khoản hoặc mật khẩu bị bỏ trống"));
        }
        $connect = connectDatabase(DATABASE);
        if($connect){
            if(login($connect,$username,$password)){
                $data  =datalogin(200,$username,$password);
                updateToken($connect,$data['accesstoken'],$username);
                echo json_encode($data);
            }else{
                sendResponse(404,dataError(404,"Tên tài khoản hoặc mật khẩu không đúng"));
            }
        }else{
            sendResponse(500,dataError(500,"Sever Eror"));
        }

            
?>

    