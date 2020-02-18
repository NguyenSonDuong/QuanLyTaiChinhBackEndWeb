<?php
    include ('ConnectAction.php');
    define("DATABASE","thongtinnguoidung");
    if(!isset($_GET['nickname']) or  !isset($_GET['access_token']))
        sendResponse(404,dataError(404,"Error request"));
    $nickname = $_GET['nickname'];
    $access_token = $_GET['access_token'];
    if(empty($nickname) or empty($access_token)){
        sendResponse(404,dataError(404,"AccessToken Error"));
    }
    $connect = connectDatabase(DATABASE);
    $query = "SELECT informationuser.* FROM informationuser , logininfor where logininfor.token = '$access_token' and logininfor.ID = informationuser.ID and logininfor.nickname = '$nickname'";
    $resulf = mysqli_query($connect,$query);
    if($resulf)
        if(mysqli_num_rows($resulf)==1){
            while($row = mysqli_fetch_assoc($resulf)){
                echo json_encode($row);
            }
        }else{
            sendResponse(404,dataError(404,"AccessToken/Username Error"));
        }
    else 
        sendResponse(404,dataError(404,"AccessToken Error"));


?>