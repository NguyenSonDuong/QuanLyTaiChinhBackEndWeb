<?php
    
    if (!isset($_GET['name'])){
        exit("Error");
    }
    $name = $_GET['name'];
	$g = array (
        'messages' => 
        array (
         
        ),
    );

    $link = 'https://drugbank.vn/services/drugbank/api/public/thuoc?page=0&size=12&tenThuoc='.$name.'&sort=tenThuoc,asc';
    $ch = curl_init($link);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $resuft = curl_exec($ch) ;
    $converJson = json_decode($resuft, true) or die("Lỗi die");
    curl_close($ch);
    $tongtin = "";
    if(count($converJson)<=0)
    {
        echo "Lỗi 1";
    }else
    foreach( $converJson as $item){
        $gia = "";
        $ch2 = curl_init("https://drugbank.vn/services/drugbank/api/public/gia-ke-khai?sdk=".$item['soDangKy']."&size=10000");
        curl_setopt($ch2, CURLOPT_RETURNTRANSFER, 1);
        $resuft2 = curl_exec($ch2);
        curl_close($ch2);
        $converJson2 = json_decode($resuft2, true);
        foreach($converJson2 as $item2){
          $gia=$gia.$item2['giaBan']. " | ";
        }
        $file = "";
        if(isset($item['meta']['fileName'])){
            $file = $item['meta']['fileName'];
        }
        $tongtin = "Tên thuốc: ". $item['tenThuoc']."\n\n"
        ."Số đăng ký: ". $item['soDangKy'] ."\n\n"
        ."Hoạt chất: ". $item['hoatChat'] ."\n\n"
        ."Tá Dược:  ". $item['taDuoc'] ."\n\n"
        ."Hạn dùng:  ". $item['tuoiTho'] ."\n\n"
        ."Công ty sản xuất: ". $item['congTySx'] ."\n\n"
        ."Nước SX:   ". $item['nuocSx'] ."\n\n"
        ."Giá kê khai:   ". $gia ." / viên"."\n\n"
        ."Thông tin chi tiết: ".$file;
        $g['messages'][] = array(
            "text"=>$tongtin
            );
    }
    echo json_encode($g);
?>