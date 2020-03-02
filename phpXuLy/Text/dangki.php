<?php
require 'connect.php';
$diemdi = getdiemdi();
$diemden = getdiemden();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="Public/bootstrap-3.3.7-dist/css/bootstrap.css">
    <title>Đăng kí</title>
</head>
<body>
<div id="myModal-register">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h3 class="modal-title" align="center">Đặt mua vé máy bay</h3>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" role="form" method="post" action="process_dangki.php" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="diemdi" class="col-sm-3 control-label">Điểm đi</label>
                        <div class="col-sm-8">
                            <select name="diemdi" id="diemdi">
                                <?php
                                    foreach ($diemdi as $itemdd){
                                ?>
                                <option value="<?php echo $itemdd['diemdi'] ?>"><?php echo $itemdd['diemdi'] ?></option>
                                <?php
                                }
                                ?>
                            </select>
                            
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="diemden" class="col-sm-3 control-label">Điểm đến</label>
                        <div class="col-sm-8">
                            <select name="diemden" id="diemden">
                                <?php
                                foreach ($diemden as $itemdden){
                                ?>
                                <option value="<?php echo $itemdden['diemden'] ?>"><?php echo $itemdden['diemden'] ?></option>
                                    <?php
                                }
                                ?>
                            </select>

                        </div>
                    </div>
                    <div class="form-group">
                        <label for="ngaydi" class="col-sm-3 control-label">Ngày đi</label>
                        <div class="col-sm-8">
                            <select name="ngaydi" id="ngaydi">
                                <?php for( $i = 1 ; $i <= 31 ; $i ++) {?>
                                    <option value=" <?php echo $i ?>"><?php echo $i ?></option>
                                <?php }?>
                            </select>
                            <input type="month" name="thangdi">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="ngayve" class="col-sm-3 control-label">Ngày về</label>
                        <div class="col-sm-8">
                            <select name="ngayve" id="ngayve">
                                <?php for( $i = 1 ; $i <= 31 ; $i ++) {?>
                                    <option value=" <?php echo $i ?>"><?php echo $i ?></option>
                                <?php }?>
                            </select>
                            <input type="month" name="thangve">
                        </div>
                    </div>
                    <div class="form-group">
                        <hr>
                    </div>
                    <div class="form-group">
                        <label for="nguoilon" class="col-sm-3 control-label">Người lớn:</label>
                        <div class="col-sm-8">
                            <select name="nguoilon" id="nguoilon">
                                <?php for( $i = 1 ; $i <= 10 ; $i ++) {?>
                                    <option value=" <?php echo $i ?>"><?php echo $i ?></option>
                                <?php }?>
                            </select>
                            <span>(Từ 12 tuổi trở lên)</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="treem" class="col-sm-3 control-label">Trẻ em</label>
                        <div class="col-sm-8">
                            <select name="treem" id="treem">
                                <?php for( $i = 1 ; $i <= 10 ; $i ++) {?>
                                    <option value=" <?php echo $i ?>"><?php echo $i ?></option>
                                <?php }?>
                            </select>
                            <span>Từ 2 đến dưới 12 tuổi</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="embe" class="col-sm-3 control-label">Em bé</label>
                        <div class="col-sm-8">
                            <select name="embe" id="embe">
                                <?php for( $i = 1 ; $i <= 10 ; $i ++) {?>
                                    <option value=" <?php echo $i ?>"><?php echo $i ?></option>
                                <?php }?>
                            </select>
                            <span>Dưới 2 tuổi</span>
                        </div>
                    </div>
                    <div>
                        <hr>
                    </div>
                    <div class="form-group">
                        <a href="#">Xem video hướng dẫn</a>
                        <div align="center">
                            <button id="btn-register" type="submit" class="btn btn-success" name="submit">Mua ngay</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>