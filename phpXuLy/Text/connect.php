<?php
// Biến kết nối toàn cục
global $conn;

// Hàm kết nối database
function connect_db()
{
    // Gọi tới biến toàn cục $conn
    global $conn;

    // Nếu chưa kết nối thì thực hiện kết nối
    if (!$conn){
        $conn = mysqli_connect('localhost', 'root', '', 'th') or die ('Can\'t not connect to database');
        // Thiết lập font chữ kết nối
        mysqli_set_charset($conn, 'utf8');

    }
}

// Hàm ngắt kết nối
function disconnect_db()
{
    // Gọi tới biến toàn cục $conn
    global $conn;

    // Nếu đã kêt nối thì thực hiện ngắt kết nối
    if ($conn){
        mysqli_close($conn);
    }
}

function muave($diemdi,$diemden,$ngaydi,$ngayve,$thangdi,$thangve,$nguoilon,$treem,$embe,$tongtien){
// Gọi tới biến toàn cục $conn
global $conn;
// Hàm kết nối
connect_db();
// Câu truy vấn thêm
$sql = "
        INSERT INTO datvemaybay(diemdi,diemden,ngaydi,ngayve,thangdi,thangve,nguoilon,treem,embe,tongtien)
        VALUES
        ('$diemdi','$diemden','$ngaydi','$ngayve','$thangdi','$thangve','$nguoilon','$treem','$embe','$tongtien')";

// Thực hiện câu truy vấn
$query = mysqli_query($conn, $sql);

return $query;
}
//kiem tra dang nhap

function getAllData(){
    global $conn;
    connect_db();
    $sql = "select * from datvemaybay";
    $query = mysqli_query($conn,$sql);
    $result = array();

    // Lặp qua từng record và đưa vào biến kết quả
    if ($query){
        while ($item = mysqli_fetch_assoc($query)){
            $result[] = $item;
        }
    }

    // Trả kết quả về
    return $result;
}
function getAllDataByName($user){
    global $conn;
    connect_db();
    $sql = "select * from datvemaybay where user = '$user'";
    $query = mysqli_query($conn,$sql);
    $result = array();

    // Lặp qua từng record và đưa vào biến kết quả
    if ($query){
        while ($item = mysqli_fetch_assoc($query)){
            $result[] = $item;
        }
    }

    // Trả kết quả về
    return $result;
}
function getdiemdi(){
    global $conn;
    connect_db();
    $sql = "select diemdi from diemdidiemden ";
    $query = mysqli_query($conn,$sql);
    $result = array();

    // Lặp qua từng record và đưa vào biến kết quả
    if ($query){
        while ($item = mysqli_fetch_assoc($query)){
            $result[] = $item;
        }
    }

    // Trả kết quả về
    return $result;
}
function getdiemden(){
    global $conn;
    connect_db();
    $sql = "select diemden from diemdidiemden ";
    $query = mysqli_query($conn,$sql);
    $result = array();

    // Lặp qua từng record và đưa vào biến kết quả
    if ($query){
        while ($item = mysqli_fetch_assoc($query)){
            $result[] = $item;
        }
    }

    // Trả kết quả về
    return $result;
}
function getDataById($id){
    global $conn;
    connect_db();
    $sql = "SELECT * FROM datvemaybay WHERE id = '$id'";
    $query = mysqli_query($conn, $sql);
    $result = array ();
    if(mysqli_num_rows($query) > 0) {
        $row = mysqli_fetch_assoc($query);
        $result = $row;
    }
    return $result;
}
function getUserByName($user){
    global $conn;
    connect_db();
    $sql = "SELECT * FROM user WHERE user = '$user'";
    $query = mysqli_query($conn, $sql);
    $result = array ();
    while ($row = mysqli_fetch_assoc($query)){
        array_push($result,$row);
    }
    return $result;
}
function updateData($id,$diemdi,$diemden,$ngaydi,$ngayve,$thangdi,$thangve,$nguoilon,$treem,$embe,$tongtien){
    global $conn;
    connect_db();
    $sql = "Update datvemaybay set
            diemdi = '$diemdi',
            diemden = '$diemden',
            ngaydi = '$ngaydi',
            ngayve = '$ngayve',
            thangdi = '$thangdi',
            thangve = '$thangve',
            nguoilon = '$nguoilon',
            treem = '$treem',
            embe = '$embe',
            tongtien = '$tongtien'
            where ID = '$id' ";
    $query = mysqli_query($conn,$sql);
    return $query;
}
function deleteData($id){
    global $conn;
    connect_db();

    // Câu truy sửa
    $sql = "
            DELETE FROM datvemaybay
            WHERE id = '$id';
    ";

    // Thực hiện câu truy vấn
    $query = mysqli_query($conn, $sql);

    return $query;
}
?>