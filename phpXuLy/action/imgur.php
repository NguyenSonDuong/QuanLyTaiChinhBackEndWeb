<?php
    function getAccesstoken($refresh_token, $client_id, $client_secret){
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
        CURLOPT_POSTFIELDS => 
            array(
                'refresh_token' => $refresh_token,
                'client_id' => $client_id,
                'client_secret' => $client_secret,
                'grant_type' => 'refresh_token'),
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        return $response;
        //refresh_token: 842d665018ef2916d2ed79db52f851296a159ce8
        //client_id:587d957f56ff857
        //client_secret:d2c48defec95fe5837a74a7d1a3b6ca86d87265b
    }

    function getImageOfUser($userid , $accesstoken,$page){
        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.imgur.com/3/account/$userid/images/$page",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
            "Authorization: Bearer $accesstoken"
        ),
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        return $response;
        //e2d9d3817f113fa9744d3d68e1fdbf820bae24ef
    }

    function stringtojson(){
        $st = '{
            "messages": [
              
            ]
          }';
        $jsonarray = json_decode($st,true);
        return $jsonarray;
    }
    function connectDatabase($databaseName){
		$hostname = 'localhost';
		$username = 'root';
		$password = '';
		$database = $databaseName;
		$connect = mysqli_connect($hostname,$username,$password,$database);
		return $connect;
	}
?>