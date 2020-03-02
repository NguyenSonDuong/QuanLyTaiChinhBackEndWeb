<?php
    $curl = curl_init();
    
    curl_setopt_array($curl, 
    array(
      CURLOPT_URL => "https://api.imgur.com/oauth2/token",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "POST",
      CURLOPT_POSTFIELDS => array('refresh_token' => '842d665018ef2916d2ed79db52f851296a159ce8','client_id' => '587d957f56ff857','client_secret' => 'd2c48defec95fe5837a74a7d1a3b6ca86d87265b','grant_type' => 'refresh_token'),
    ));
    
    $response = curl_exec($curl);
    
    curl_close($curl);
    echo $response;
    //https://api.imgur.com/oauth2/authorize?client_id=587d957f56ff857&response_type=token&state=abbs
    //https://hunterdemon9x99.herokuapp.com/?state=abbs#access_token=0f76f978290ce171399c13531fe149876a0ed772&expires_in=315360000&token_type=bearer&refresh_token=842d665018ef2916d2ed79db52f851296a159ce8&account_username=Hunternguyen1999&account_id=101583597
?>