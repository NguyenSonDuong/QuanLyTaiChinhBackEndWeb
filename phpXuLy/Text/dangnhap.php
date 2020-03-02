<?php
    session_start();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="Public/bootstrap-3.3.7-dist/css/bootstrap.css">
    <title>Đăng nhập</title>
</head>
<body>
<div id="myModal-login">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h3 class="modal-title" align="center">ĐĂNG NHẬP</h3>
            </div>
            <div class="modal-body">
                <form action="process_dangnhap.php" method="post" class="form-horizontal" role="form">
                    <div class="form-group">
                        <label for="inputAccount1" class="col-sm-3 control-label">Tài khoản:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="user"  placeholder="Nhập tài khoản...">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword1" class="col-sm-3 control-label">Mật khẩu:</label>
                        <div class="col-sm-8">
                            <input type="password" class="form-control" name="password"  placeholder="Nhập mật khẩu...">
                        </div>
                    </div>
                    <div class="form-group">
                        <div align="center">
                            <a href="process.php?id=<?php echo $_SESSION['user'] ?>"><input name="login" type="submit" class="btn btn-primary" value="Đăng Nhập"></a>
                            <span id="resultLogin"></span>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <p>Bạn chưa có tài khoản? <a href="dangki.php" data-toggle="modal" data-target="#myModal-register" data-dismiss="modal">Đăng ký tại đây</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>