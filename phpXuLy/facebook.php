<?php
    //$accesstoken = "EAAAAZAw4FxQIBALWCQjrarfsLhetIFyroyzJZCZBlGZCJXZAKIC5Cr24lckyDxIJ6GFDbT0BAx4Rs2SlhRyGWfYZBJMPuP5MjkenhHyUtK5WkCAlZA1eM8eldiTRdrh7Q1UenrJZAeqdeyKSEMYxI3sKnVF2ZCA5WFr3Q95IJTiHq5gZDZD";
    $groupID =array(
        "333051693856122"
    );
    $outputData = array();
    $ii=0;
    foreach($groupID as $idItem){
        $url = getUrl("$idItem/feed?fields=id,message,full_picture&limit=50");
        do{
            $curl = curl_init($url);
            curl_setopt($curl,CURLOPT_RETURNTRANSFER,1);
            $reponsive = curl_exec($curl);
            $jsonOut = json_decode($reponsive,true);
            $regexText = '/[-a-zA-Z0-9@:%_\+.~#?&\/\/=]{2,256}\.[a-z]{2,4}\b(\/[-a-zA-Z0-9@:%_\+.~#?&\/\/=]*)?/i';
            for( $i=0;$i< count($jsonOut['data']);$i++)
            {
                $inforPost =$jsonOut['data'][$i];
                if(!isset($inforPost['message']))
                    $inforPost['message'] ="";
                if(!isset($inforPost['full_picture']))
                    continue;
                $data = array(
                    "IDPost"=>$inforPost['id'],
                    "Image"=> $inforPost['full_picture'],
                    "InforLink"=>array()
                );
                if(preg_match($regexText,$inforPost['message'],$mach)){
                    foreach($mach as $item){
                        $data['InforLink'][] = $item;
                    }
                }
                getLinkInPost($inforPost['id'],$data);
                $outputData[] = $data;
            }
            $ii++;
            if($ii>3)
                break;
            if(isset($jsonOut['paging']['next']))
                $url = $jsonOut['paging']['next'];
            else
                break;
        }while(true);
    }
    echo json_encode($outputData);

    function getLinkInPost($id,&$data){
        $linkArr = array();
        $url = getUrl("$id/comments?fields=message,id&limit=50");
        do{
            $curl = curl_init($url);
            curl_setopt($curl,CURLOPT_RETURNTRANSFER,1);
            $reponsive = curl_exec($curl);
            $jsonOut = json_decode($reponsive,true);
            $regexText = '/[-a-zA-Z0-9@:%_\+.~#?&\/\/=]{2,256}\.[a-z]{2,4}\b(\/[-a-zA-Z0-9@:%_\+.~#?&\/\/=]*)?/i';
            for( $i=0;$i< count($jsonOut['data']);$i++)
            {
                $inforPost =$jsonOut['data'][$i];
                if(!isset($inforPost['message']))
                    continue;
                if(preg_match($regexText,$inforPost['message'],$mach)){
                    foreach($mach as $item){
                        $data['InforLink'][] = $item;
                    }
                }else{
                    continue;
                }
            }
            if(isset($jsonOut['paging']['next']))
                $url = $jsonOut['paging']['next'];
            else
                break;
        }while(true);

    }
    function getUrl($truyvan){
        $accesstoken = "EAAAAZAw4FxQIBABnxFiSjVnJQXXWyMHz08Wnv3iGX0ilA3Ihg5RWgvejTM6JZA5eCOR37XErd7UHp1m1RoKsVqcBWPw5pUyX1FTC1q49dlF0c1DDd0P3XxdOqzvM64mtMhkiGcnQWaIKTQC7ZBtNWCFt1frG5ZACh0iKvHevFAZDZD";
        $uri = "https://graph.facebook.com/v6.0/$truyvan&access_token=$accesstoken";
        return $uri;
    }
?>