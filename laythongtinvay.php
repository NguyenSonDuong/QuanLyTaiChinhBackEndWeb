<?php
    include ('ConnectAction.php');
    define("DATABASE","thongtinnguoidung");
    define("DATABASEVAY","thongtinvay");
    if(!isset($_GET['nickname']) or  !isset($_GET['access_token']))
        sendResponse(404,dataError(404,"Error request"));
    $nickname = $_GET['nickname'];
    $access_token = $_GET['access_token'];
    $page = 1;
    $limit = 25;
    if(isset($_GET['page']))
    {
        $page = $_GET['page'];
    }
    if(isset($_GET['limit']))
    {
        $limit = $_GET['limit'];
    }
    
    if(empty($nickname) or empty($access_token)){
        sendResponse(404,dataError(404,"AccessToken Error"));
    }
    $query_user = "SELECT * FROM thongtinnguoidung.logininfor where token = '$access_token'";
    $connect = connectDatabase(DATABASE);
    $connectChiTieu = connectDatabase("thongtinvay");
    $i = -1;
    $resulf_user = mysqli_query($connect,$query_user);
    if($resulf_user)
        if(mysqli_num_rows($resulf_user)==1){
            $re = array(
                'data' => array(),
                'is_next_page' => null
            );
            while($row = mysqli_fetch_assoc($resulf_user)){
                $id = $row['ID'];
                $query_getchitieu = " SELECT * FROM thongtinvay.$id ";
                $resulf_new = mysqli_query($connectChiTieu,$query_getchitieu);
                if(mysqli_num_rows($resulf_user)>0){
                    if(mysqli_num_rows($resulf_new)>($limit*$page)){
                        $re['is_next_page'] = true;
                    }else{
                        $re['is_next_page'] = false;
                    }
                    while($row2 = mysqli_fetch_assoc($resulf_new)){
                        $i= $i+1;
                        if($i<$limit*$page and $i>=($page-1)*$limit){
                            $re['data'][] = $row2;
                        }else{
                            
                            if($i>=$limit*$page){
                                break;
                            }else{
                                continue;
                            }
                        }
                        
                    }
                }
                    
            }
            echo json_encode($re);
        }else{
            sendResponse(404,dataError(404,"AccessToken/Username Error"));
        }
    else 
        sendResponse(404,dataError(404,"AccessToken Error"));

    

?>