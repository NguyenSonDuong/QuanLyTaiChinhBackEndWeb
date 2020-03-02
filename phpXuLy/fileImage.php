<?php 
    $dir = "chinegirl";
    $folder = opendir($dir);
    $path = array();
    $infor = array();
    $chat = array(
        'messages' => array()
    );
    while($name = readdir($folder)){
        if($name == "." || $name=="..") continue;
        if(is_file("$dir/$name")){
            $path['name'] = $name;
            $path['path'] = $dir."/".$name;
            $infor[] = $path;
            echo '<img src="'.$path['path'].'"/>';
            
        }
    }
    
    $ran1 = rand(1,count($infor));
    $ran2 = rand(1,9);

    for ($i=$ran1; $i < $ran1+$ran2; $i++) { 
        $link = $infor[$i]['path'];
        
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
        $chat['messages'][] = $additem;
    }
    echo json_encode($chat);
?>