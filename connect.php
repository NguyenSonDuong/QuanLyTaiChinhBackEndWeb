<?php
// đây là biến toán cục
global $connect;

function connect_db(){
    // gọi tới biến toàn cục
    global $connect;

    if(!$connect){
        // kết nối
        $connect = mysqli_connect("localhost","root","","thongtinnguoidung") or die("Lỗi kết nối");
        // kiểu mã hóa luồng dữ liệu gửi đi
        mysqli_set_charset($connect,"utf8");
    }

}

function disconnect_db(){
    global $connect;
    // ngắt kết nói với database
    if($connect){
        mysqli_close($connect);
    }
}

function insertLoginInfor($nickname, $password){
    global $connect;
    if(!$connect){
        connect_db();
    }
    $query = "INSERT INTO logininfor(ID,nickname,pass,token,create_time) VALUES (?,?,?,?,?)";
    $stmt = mysqli_prepare($connect,$query);
    mysqli_stmt_bind_param($stmt,"sssss",$var1,$var2, $var3, $var4, $var5);
    $var1 = $nickname."_".time();
    $var2 = $nickname;
    $var3 = $password;
    $var4 = createToken($nickname,$password);
    $date = new DateTime("now");
    $var5 = date_format($date,"Y/m/d H:m:s");
    if(mysqli_stmt_execute($stmt)){
        return $var4;
    }else{
        sendReponsive(300,jsonReponsiveError(300));
        return "";
    }
}

function updateLoginInfor(){

}

function createToken($nickname, $password){
    return encodeStringByMe(md5($nickname)."|".md5($password)."//".md5(time()));
}

function encodeStringByMe($str){
    $arr_str =explode(" ","a b c d e f g h i j k l m n o p q r s t u v w x y z");
    $arr_encode = explode(" ","21 22 23 31 32 33 41 42 43 51 52 53 61 62 63 71 72 73 74 81 82 83 91 92 93 94");
    $a = $str;
    for($i=0;$i<26;$i++){
        $item1= $arr_str[$i];
        $item2 = $arr_encode[$i];
        $a = str_replace($item1,$item2,$a);
    }
    return $a;
}
function getStatusCodeMeeage($status){
    $codes = array(
        100 => 'Continue',
        101 => 'Switching Protocols',
        200 => 'OK',
        201 => 'Created',
        202 => 'Accepted',
        203 => 'Non-Authoritative Information',
        204 => 'No Content',
        205 => 'Reset Content',
        206 => 'Partial Content',
        300 => 'Multiple Choices',
        301 => 'Moved Permanently',
        302 => 'Found',
        303 => 'See Other',
        304 => 'Not Modified',
        305 => 'Use Proxy',
        306 => '(Unused)',
        307 => 'Temporary Redirect',
        400 => 'Bad Request',
        401 => 'Unauthorized',
        402 => 'Payment Required',
        403 => 'Forbidden',
        404 => 'Not Found',
        405 => 'Method Not Allowed',
        406 => 'Not Acceptable',
        407 => 'Proxy Authentication Required',
        408 => 'Request Timeout',
        409 => 'Conflict',
        410 => 'Gone',
        411 => 'Length Required',
        412 => 'Precondition Failed',
        413 => 'Request Entity Too Large',
        414 => 'Request-URI Too Long',
        415 => 'Unsupported Media Type',
        416 => 'Requested Range Not Satisfiable',
        417 => 'Expectation Failed',
        500 => 'Internal Server Error',
        501 => 'Not Implemented',
        502 => 'Bad Gateway',
        503 => 'Service Unavailable',
        504 => 'Gateway Timeout',
        505 => 'HTTP Version Not Supported'
    );
    return (isset($codes[$status])) ? $codes[$status] : ”;
}

function getError($status){
    $mess = array(
        1001=>"Vui lòng nhập đủ dữ liệu",
        1010=>"Tên đăng nhập hoặc tài khoản không đúng",
        1100=>"Tên đăng nhập đã tồn tại"
    );
    return $mess[$status];
}

function sendReponsive($status,$data){
    $status_header = "HTTP/1.1 $status ". getStatusCodeMeeage($status);
    header($status_header);
    exit(json_encode($data));
}

function jsonReponsiveError($status){
    $error = array(
        "status_code"=>$status,
        "message"=>getStatusCodeMeeage($status)
    );
    return $error;
}



?>

