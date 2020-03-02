<?php
//session_start();
//$_SESSION['user'] = $user;
require 'connect.php';
$id = $_GET['id'];
$item = getDataById($id);

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="Public/bootstrap-3.3.7-dist/css/bootstrap.css">
    <link rel="stylesheet" href="Public/CSS/add-user.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="Public/bootstrap-3.3.7-dist/js/jquery-3.2.1.js"></script>
    <script src="Public/bootstrap-3.3.7-dist/js/bootstrap.js"></script>
    <script src="Public/JS.js"></script>
    <title>SỬA THÔNG TIN</title>
</head>
<body>
<div class="container">
    <div class="col-xs-12 col-sm-3 col-sm-offset-3">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="get" action="proccess_Sua.php?id=<?php echo $item['id']?>">
                    <div class="modal-header">
                        <h4 class="modal-title">Edit user</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>ID</label>
                            <input type="text" class="form-control" name="id" value="<?php echo $item['id']?>" />
                        </div>
                        <div class="form-group">
                            <label>Điểm đi</label>
                            <input type="text" class="form-control" name="diemdi" value="<?php echo $item['diemdi']?>" required>
                        </div>
                        <div class="form-group">
                            <label>Điểm đến</label>
                            <input type="text" class="form-control" name="diemden" value="<?php echo $item['diemden']?>" required>
                        </div>
                        <div class="form-group">
                            <label>Ngày đi</label>
                            <input type="text" class="form-control" name="ngaydi" value="<?php echo $item['ngaydi']?>" required>
                        </div>
                        <div class="form-group">
                            <label>Tháng đi</label>
                            <input type="text" class="form-control" name="thangdi" value="<?php echo $item['thangdi']?>" required>
                        </div>
                        <div class="form-group">
                            <label>Ngày về</label>
                            <input type="text" class="form-control" name="ngayve" value="<?php echo $item['ngayve']?>" required>
                        </div>
                        <div class="form-group">
                            <label>Tháng về</label>
                            <input type="text" class="form-control" name="thangve" value="<?php echo $item['thangve']?>" required>
                        </div>
                        <div class="form-group">
                            <label>Người lớn</label>
                            <input type="text" class="form-control" name="nguoilon" value="<?php echo $item['nguoilon']?>" required>
                        </div>
                        <div class="form-group">
                            <label>Trẻ em</label>
                            <input type="text" class="form-control" name="treem" value="<?php echo $item['treem']?>" required>
                        </div>
                        <div class="form-group">
                            <label>Em bé</label>
                            <input type="text" class="form-control" name="embe" value="<?php echo $item['embe']?>" required>
                        </div>
                        <div class="form-group">
                            <label>Tổng tiền</label>
                            <input type="text" class="form-control" name="tongtien" value="<?php echo $item['tongtien']?>" required>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                        <a href="proccess_Sua.php?id=<?php echo $item['id']?>"><input type="submit" class="btn btn-success" name="edituser" value="Sua"></a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>