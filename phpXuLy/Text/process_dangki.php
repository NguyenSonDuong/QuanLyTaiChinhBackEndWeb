<?php 
require 'connect.php';
$diemdi = $_POST['diemdi'];
$diemden = $_POST['diemden'];
$ngaydi = $_POST['ngaydi'];
$ngayve = $_POST['ngayve'];
$thangdi = $_POST['thangdi'];
$thangve = $_POST['thangve'];
$nguoilon = $_POST['nguoilon'];
$treem = $_POST['treem'];
$embe = $_POST['embe'];

$tongtien = (2000000*$nguoilon + ((2000000 - 2000000/100*25)*$treem) + ((2000000 - 2000000*80/100)* $embe)) ;

if(isset($_POST['submit'])){

    if(!$diemdi || !$diemden || !$ngaydi || !$ngayve || !$thangdi || !$thangve || !$nguoilon || !$treem || !$embe){
       echo "<script>alert ('Ban chua nhap day du thong tin');</script>";   
   }
    else{

//            muave($diemdi,$diemden,$ngaydi,$ngayve,$thangdi,$thangve,$nguoilon,$treem,$embe);

        if(muave($diemdi,$diemden,$ngaydi,$ngayve,$thangdi,$thangve,$nguoilon,$treem,$embe,$tongtien)) {

            header('location: dangnhap.php');
            echo "<script>alert('success')</script>";
        }
        else echo "sai roi";
    }
}
?>