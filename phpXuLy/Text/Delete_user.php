<?php
require 'connect.php';
connect_db();
$id = $_GET['id'];
DeleteData($id);
header('location:admin.php');