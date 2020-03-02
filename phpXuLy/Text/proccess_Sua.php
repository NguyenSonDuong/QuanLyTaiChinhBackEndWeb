<?php
require 'connect.php';
connect_db();
if(!empty($_GET['edituser'])){
    $id = $_GET['id'];
    $diemdi = $_GET['diemdi'];
    $diemden = $_GET['diemden'];
    $ngaydi = $_GET['ngaydi'];
    $ngayve = $_GET['ngayve'];
    $thangdi = $_GET['thangdi'];
    $thangve = $_GET['thangve'];
    $nguoilon = $_GET['nguoilon'];
    $treem = $_GET['treem'];
    $embe = $_GET['embe'];
    $tongtien = $_GET['tongtien'];
     $update = UpdateData($id,$diemdi,$diemden,$ngaydi,$ngayve,$thangdi,$thangve,$nguoilon,$treem,$embe,$tongtien);

        header('location:admin.php');
        echo"<script>alert('Thay đổi thông tin thành công !');</script>";

}
disconnect_db();