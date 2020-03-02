<?php
session_start();
require 'connect.php';
connect_db();
$user = $_SESSION['user'];
$data = getAllDataByName($user);
//$result= getUserByName($user);
if(!isset($user)){
    header('location:dangnhap.php');
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="Public/bootstrap-3.3.7-dist/css/bootstrap.css">
    <title>Admin</title>
</head>
<style>
    .total{
        margin-top: 100px;
    }
</style>
<body>

    <h2 style="text-align: center;">Chào mừng Admin</h2>
        <h2 style="text-align: center"><a href="logout.php">Thoát</a></h2>


<div class="total" style="width: 740px;height: auto; border: 1px solid darkgray; margin-left: 300px">
    <form action="#" method="get">
        <table class="table table-hover">

            <tr>
                <td>ID</td>
                <td>Điểm đi</td>
                <td>Điểm đến</td>
                <td>Ngày đi</td>
                <td>Tháng đi</td>
                <td>Ngày về</td>
                <td>Tháng về</td>
                <td>Người lớn</td>
                <td>Trẻ em</td>
                <td>Em bé</td>
                <td>Tổng tiền</td>
                <td >Action</td>
            </tr>
            <?php
            foreach($data as $item) {
                ?>

                <tr>
                    <td><?php echo $item['id']; ?></td>
                    <td><?php echo $item['diemdi']; ?></td>
                    <td><?php echo $item['diemden']; ?></td>
                    <td><?php echo $item['ngaydi']; ?></td>
                    <td><?php echo $item['thangdi'];?></td>
                    <td><?php echo $item['ngayve'];?></td>
                    <td><?php echo $item['thangve']; ?>
                    <td><?php echo $item['nguoilon']; ?></td>
                    <td><?php echo $item['treem']; ?></td>
                    <td><?php echo $item['embe']; ?></td>
                    <td><?php echo $item['tongtien']; ?></td>
                    <td><a href="Sua.php?id=<?php echo $item['id'];?>">Sửa</a>
                        <a href="Delete_user.php?id=<?php echo $item['id'];?>">Xóa</a></td>
                </tr>
            <?php
            }
            ?>
        </table>
    </form>
</div>
</body>
</html>

