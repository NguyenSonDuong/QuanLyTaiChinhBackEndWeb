<?php
    include ("imgur.php");
    $max = 5;
    $jsonarray = stringtojson();
    $ran = rand(0,$max);
    $json = getImageOfUser("me","e2d9d3817f113fa9744d3d68e1fdbf820bae24ef",$ran);
    $jsoncover = json_decode($json,true);
    $dem = 0;
    $posision = rand(0,count($jsoncover['data']));
    foreach($jsoncover['data'] as $item){
        if($dem >= $posision){
            $link = $item['link'];
            $additem = array( 
                "attachment" =>
                    array( 
                        "type" => "image",
                        "payload" =>
                            array( 
                                "url" => "$link"
                            )
                    )
            );
            $jsonarray['messages'][] = $additem;
        }
        if($dem >= $posision+9)
            break;
        $dem++;
    }
    
?>