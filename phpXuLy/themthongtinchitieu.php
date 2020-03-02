<?php
    //https://m.weibo.cn/api/container/getIndex?type=uid&value=5255978153&containerid=1076035255978153&page=1
    include ('ConnectAction.php');
    define("DATABASE","thongtinnguoidung");
    define("DATABASECHITIEU","thongtinchitieu");
    if(!isset($_GET['nickname']) or  !isset($_GET['access_token']))
        sendResponse(404,dataError(404,"Error request"));
    $nickname = $_GET['nickname'];
    $access_token = $_GET['access_token'];
    $data = '{"ID":"1","loaigiaodich":"2","sanphamgiaodich":"3","thoigian":"0000-00-00 00:00:00","dongia":"5","soluong":"6","thanhtien":"7"}';
    

?>