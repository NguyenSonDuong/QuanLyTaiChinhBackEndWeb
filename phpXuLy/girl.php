<?php
    function connectDatabase($databaseName){
		$hostname = 'localhost';
		$username = 'root';
		$password = '';
		$database = $databaseName;
		$connect = mysqli_connect($hostname,$username,$password,$database);
		return $connect;
    }
    function insertDataInforGirl($connect, $data){
        $timeID = time();
        $fullname = $data['fullname'];
        $avatar_url = $data['avatar_url'];
        $birthday = $data['birthday'];
        $address = $data['address'];
        $life_story_url = $data['life_story_url'];
        $twitter = $data['twitter'];
        $facebook = $data['facebook'];
        $instagram = $data['instagram'];
        $weibo = $data['weibo'];
        $zalo = $data['zalo'];
        $another = $data['another'];
        $query =  "INSERT INTO InforGirl VALUES ('$timeID',N'$fullname', '$avatar_url','$birthday','$address','$life_story_url','$twitter', '$facebook', '$instagram', '$weibo', '$zalo', '$another') ";
        return mysqli_query($connect,$query);
    }
    function updateDataInforGirlTwitter($connect, $id,$twitter){
        $query = "UPDATE InforGirl SET twitter='$twitter' where id = '$id'";
        return mysqli_query($connect,$query);
    }
    function updateDataInforGirlFacebook($connect, $id,$facebook){
        $query = "UPDATE InforGirl SET facebook='$twitter' where id = '$id'";
        return mysqli_query($connect,$query);
    }
    function updateDataInforGirlInstagram($connect, $id,$instagram){
        $query = "UPDATE InforGirl SET instagram='$instagram' where id = '$id'";
        return mysqli_query($connect,$query);
    }
    function updateDataInforGirlWeibo($connect, $id,$weibo){
        $query = "UPDATE InforGirl SET weibo='$weibo' where id = '$id'";
        return mysqli_query($connect,$query);
    }
    function updateDataInforGirlAnother($connect, $id,$another){
        $query = "UPDATE InforGirl SET another='$another' where id = '$id'";
        return mysqli_query($connect,$query);
    }
    function updateDataInforGirlFullName($connect, $id,$fullname){
        $query = "UPDATE InforGirl SET fullname='$fullname' where id = '$id'";
        return mysqli_query($connect,$query);
    }
    function updateDataInforGirlAddress($connect, $id,$address){
        $query = "UPDATE InforGirl SET address ='$address' where id = '$id'";
        return mysqli_query($connect,$query);
    }
    function updateDataInforGirlBirthday($connect, $id,$birthday){
        $query = "UPDATE InforGirl SET birthday ='$birthday' where id = '$id'";
        return mysqli_query($connect,$query);
    }
    function updateDataInforGirlZalo($connect, $id,$zalo){
        $query = "UPDATE InforGirl SET zalo='$zalo' where id = '$id'";
        return mysqli_query($connect,$query);
    }
    

?>