<?php

    function getSignature($token){
        $url = "https://www.flickr.com/services/oauth/request_token";
        $data2 ="oauth_callback=https%3A%2F%2Fhunterdemon9x99.herokuapp.com&oauth_consumer_key=dcf344473b57cb724ff2ce419abed51f&oauth_nonce=789576sdff434567&oauth_signature_method=HMAC-SHA1&oauth_timestamp=".time()."&oauth_version=1.0";
        $baseString = "GET&".urlencode($url)."&".urlencode($data2);
        $key = "c3e4ad07039b4b8f&".$token;
        $signature = base64_encode(hash_hmac('sha1',$baseString, $key, true));
        return $signature;   
    }
    function getOauthToken(){
        // $url = "https://www.flickr.com/services/oauth/request_token";
        // $data2 ="oauth_callback=https%3A%2F%2Fhunterdemon9x99.herokuapp.com&oauth_consumer_key=dcf344473b57cb724ff2ce419abed51f&oauth_nonce=789576sdff434567&oauth_signature_method=HMAC-SHA1&oauth_timestamp=".time()."&oauth_version=1.0";
        // $baseString = "GET&".urlencode($url)."&".urlencode($data2);
        // $key = "c3e4ad07039b4b8f&";
        // $signature = base64_encode(hash_hmac('sha1',$baseString, $key, true));
        $signature = getSignature("");
        $uri ="https://www.flickr.com/services/oauth/request_token?oauth_nonce=789576sdff434567&oauth_timestamp=".time()."&oauth_consumer_key=dcf344473b57cb724ff2ce419abed51f&oauth_signature_method=HMAC-SHA1&oauth_version=1.0&oauth_signature=".$signature."&oauth_callback=https://hunterdemon9x99.herokuapp.com";
        $ch = curl_init($uri);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
        //oauth_callback_confirmed=true&oauth_token=72157713195108093-1e64d5589a8d9566&oauth_token_secret=65977f3c8040da34
        //?oauth_token=?oauth_token=72157713195108093-1e64d5589a8d9566&oauth_verifier=40007d44717b1ad5
        $response_string = explode("&",curl_exec($ch));
        $arrayOutPut = array();
        foreach($response_string as $item){
            $itemArr = explode("=",$item);
            $arrayOutPut[$itemArr[0]] = $itemArr[1];
        }
        return $arrayOutPut;
    }
    $signature1 = getSignature("65977f3c8040da34");
    echo $signature1;
    $urrl = "https://www.flickr.com/services/oauth/access_token?oauth_nonce=4498erty6554g41esdtr&oauth_timestamp=".time()."&oauth_verifier=40007d44717b1ad5&oauth_consumer_key=dcf344473b57cb724ff2ce419abed51f&oauth_signature_method=HMAC-SHA1&oauth_version=1.0&oauth_token=72157713195108093-1e64d5589a8d9566&oauth_signature=".$signature1;
    $ch = curl_init($urrl);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
    echo curl_exec($ch);

    
?>
