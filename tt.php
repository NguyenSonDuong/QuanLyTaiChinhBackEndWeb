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
    $link = 'https://www.drugbank.vn/services/drugbank/api/public/thuoc?page=0&size=12&tenThuoc='.$name.'&sort=tenThuoc,asc';
    $ch = curl_init($link);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $resuft = curl_exec($ch);
    $converJson = json_decode($resuft, true);
    curl_close($ch);
    $tongtin = "";
    foreach( $converJson as $item){
        $gia = "";
        $ch2 = curl_init("https://www.drugbank.vn/services/drugbank/api/public/gia-ke-khai?sdk=".$item['soDangKy']."&size=10000");
        curl_setopt($ch2, CURLOPT_RETURNTRANSFER, 1);
        $resuft2 = curl_exec($ch2);
        $converJson2 = json_decode($resuft2, true);
        foreach($converJson2 as $item2){
          $gia=$gia.$item2['giaBan']. " | ";
        }
        $tongtin = "Tên thuốc: ". $item['tenThuoc']."\n\n"
        ."Số đăng ký: ". $item['soDangKy'] ."\n\n"
        ."Hoạt chất: ". $item['hoatChat'] ."\n\n"
        ."Tá Dược:  ". $item['taDuoc'] ."\n\n"
        ."Hạn dùng:  ". $item['tuoiTho'] ."\n\n"
        ."Công ty sản xuất: ". $item['congTySx'] ."\n\n"
        ."Nước SX:   ". $item['nuocSx'] ."\n\n"
        ."Giá kê khai:   ". $gia ." / viên"."\n\n"
        ."Hướng dẫn sử dụng:  https://cdn.drugbank.vn/". $item['meta']['fileName'] ;
        $g['messages'][] = array(
            "text"=>$tongtin
            );
    }
    echo json_encode($g);
?>