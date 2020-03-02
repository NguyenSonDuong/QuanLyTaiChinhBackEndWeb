<?php
    include ('ConnectAction.php');
    define("DATABASE","thongtinnguoidung");
    
    if( !isset($_POST['nickname'])  or  !isset($_POST['access_token']) or !isset($_POST['senddata']) ){
        echo $_POST['nickname'];
        sendResponse(404,dataError(404,"null request ")); 
    }
    
    $nickname = $_POST['nickname'];
    $access_token = $_POST['access_token'];
    $data = $_POST['senddata'];
    if(empty($nickname) or empty($access_token) or empty($data)){
        sendResponse(404,dataError(404,"Empty data"));
    }
    $connect = connectDatabase(DATABASE);
    $query = "SELECT informationuser.* FROM informationuser , logininfor where logininfor.token = '$access_token' and logininfor.ID = informationuser.ID and logininfor.nickname = '$nickname'";
    $resulf = mysqli_query($connect,$query);
    if($resulf)
        if(mysqli_num_rows($resulf)==1){
            while($row = mysqli_fetch_assoc($resulf)){
                if(updateDataNguoiDung($connect,$data)){
                    sendResponse(404,array("status"=>"Cập nhật thành công", 'status_code'=>200));        
                };   
            }
        }else{
            sendResponse(404,dataError(404,"AccessToken/Username Error"));
        }
    else 
        sendResponse(404,dataError(404,"AccessToken Error"));
?>