<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        if(!isset($_GET['page'])){
            exit("Nhập page đi");
        }
        $path = "CosplayGirl";
        $openDir = opendir($path);
        $page = $_GET['page'];

        while($link = readdir($openDir)){
            if($link == "." || $link=="..") continue;
            if($page>1) {
                $page--;
                continue;
            };
            $pa = "$path/$link";
            if(is_dir($pa)){
                $open2 = opendir($pa);
                while($p = readdir($open2)){
                    $p1= "$pa/$p";
                    echo '<img src="'.$p1.'"/>';
                }
                
            }
            break;
        }
    ?>
    <?php
        if(!isset($_GET['page'])){
            exit("Nhập page đi");
        }
        $page2 = $_GET['page'];
        $page2++;
        echo "<a href=\" getGirl.php?page=$page2\" style=\" font-size:100px \">Trang tiếp theo</a>";
    ?>
</body>
</html>
