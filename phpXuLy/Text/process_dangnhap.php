<?php
session_start();
require 'connect.php';
$user = $_POST['user'];
$password = $_POST['password'];
if(isset($_POST['login'])){
    if(!$user || !$password){
        echo "<script>alert ('Ban chua nhap day du thong tin');</script>";
        header('location:dangnhap.php');
    }
    else{
        $_SESSION['user'] = $user;
        $_SESSION['pass'] = $password;
        if($user == "admin" && $password == "admin"){
            header('location:admin.php');
        }
        if($user == "admin1" && $password == "admin1"){
            header('location:admin.php');
        }
        if($user == "admin2" && $password == "admin2"){
            header('location:admin.php');
        }
        if($user == "admin3" && $password == "admin3"){
            header('location:admin.php');
        }
        if($user == "admin4" && $password == "admin4"){
            header('location:admin.php');
        }
        if($user == "admin5" && $password == "admin5"){
            header('location:admin.php');
        }
        else echo "sai roi";
    }
}
?>