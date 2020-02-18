<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>


<?php
    include ("imgur.php");
    $connect = connectDatabase("test");
    $list1 = array();
    $dem = 0;
    if(isset($_GET('username')) || isset($_GET('username'))){
        exit("Vui longf")
    }
    function getlistimage(&$dem,$connect,&$list,$ran)
        {
            $date = date_create("now");
            $json = getImageOfUser("me","e2d9d3817f113fa9744d3d68e1fdbf820bae24ef",$ran);
            $jsoncover = json_decode($json,true);
            foreach($jsoncover['data'] as $item){
                $link = $item['link'];
                $time = date_format($date,"Y/m/d H:i:s");
                $list[] = array(
                    'id' => $dem,
                    'link' => $link,
                    'create_time' => $time
                );
                $dem++;
            }
            if(count($jsoncover['data'])>0){
                $ran+=1;
                getlistimage($dem,$connect,$list,$ran);
            }else{
                return;
            }
        } 
    function adddatabase($connect,$list){
        foreach ($list as $key) {
            $dem = $key['id'];
            $link = $key['link'];
            $time = $key['create_time'];
            $query = "INSERT INTO inforimage VALUES ($dem,'$link','$time')";
            if(mysqli_query($connect,$query)){
               echo '<p style="color:green">Cập nhật thành công</p>'; 
            }else{
                echo '<p style="color:red">Cập nhật không thành công</p>'; 
            }    
        }
        
    }
    getlistimage($dem,$connect,$list1,0);
    adddatabase($connect,$list1);
    echo json_encode($list1);
?>