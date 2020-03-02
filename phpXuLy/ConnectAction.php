<?php
	function connectDatabase($databaseName){
		$hostname = 'localhost';
		$username = 'root';
		$password = '';
		$database = $databaseName;
		$connect = mysqli_connect($hostname,$username,$password,$database);
		return $connect;
	}
	function insertDataNguoiDung($connect, $id){
		if(empty($id) || !isset($id))
			exit('Lỗi');
		$query = "INSERT INTO InformationUser(ID) VALUES('$id')";
		return mysqli_query($connect,$query);
	}
	function updateDataNguoiDung($connect, $data){
		if(empty($data))
			exit('Lỗi');
		$jsonData = json_decode($data,true);
		$id = $jsonData['id'];
		$name = $jsonData['name'];
		$gt = (int)$jsonData['gioitinh'];
		$ngaysinh = $jsonData['ngaysinh'];
		$email = $jsonData['email'];
		$sdt = $jsonData['sdt'];
		$diachi = $jsonData['diachi'];
		$query = "UPDATE informationuser SET fullname = N'$name',sex = $gt,birthday = '$ngaysinh',Emailaddress = '$email',phonenumber = '$sdt',Address = '$diachi' where ID = '$id'";
		return mysqli_query($connect,$query);
	}
	function getInforUser($connect, $data){
		
	}
	function updateToken($connect, $token,$id){
		if(empty($token))
			exit('Lỗi');
		$query = "UPDATE logininfor SET token = '$token' where nickname = '$id'";
		return mysqli_query($connect,$query);
	}
	function insertDataUser($connect, $data){
		if(empty($data))
			exit('Lỗi');
		$jsonData = json_decode($data,true);
		$id = $jsonData['id'];
		$pass = $jsonData['pass'];
		$nickname = $jsonData['username'];
		$time = $jsonData['time'];
		$query = "INSERT INTO logininfor(ID,nickname,pass,create_time) VALUES('$id','$nickname','$pass','$time')";
		if(mysqli_query($connect,$query)){
			return true;
		}else{
			return false;
		}
	}
	function dangky($connect, $name, $pass){
		$id = $name."_".time();
		if(!kiemtratontai($connect,$id)){
			$date = date_create("now");
			$data = array(
					"id" => $id,
					"username" => $name,
					"pass" => md5($pass),
					"time" => date_format($date,"Y/m/d H:i:s")
				);
				$json1 = json_encode($data);
				if(insertDataUser($connect,$json1)){
					$conChiTieu = connectDatabase("thongtinchitieu");
					if(!$conChiTieu) 
						exit(dataError(501,"Lỗi kết nối cơ sở dữ liệu"));
					if(createTableChiTieu($conChiTieu,$id) ){
						$conVay = connectDatabase("thongtinvay");
					if(!$conVay) 
						exit(dataError(501,"Lỗi kết nối cơ sở dữ liệu"));
						if(createTableVay($conVay,$id)){
							if(insertDataNguoiDung($connect,$id)){
								return true;	
							}else{
								echo dataError(300,"Lỗi thêm thông tin");
								return false;
							}
						}else{
							return false;
						}
					}else{
						return false;
					}
				}else{
					exit ("Error creat user");
					return false;
				};
		}else{
			exit("Tài khoản đã tồn tại");
		}
	}
	function kiemtratontai($connect, $id){
		$query = "SELECT * FROM logininfor WHERE nickname = '$id'";
        $resulf = selectDatabase($connect,$query);
        if(mysqli_num_rows($resulf) == 0){
            return false;
        }else if(mysqli_num_rows($resulf)==1){
            return true;
        }else{
            sendResponse(500,dataError(500,"Đéo có cừa hack đâu cút mẹ mày đi"));
        }
	}
	function login($connect, $name, $pass){
			$mdPass = md5($pass);
			$query = "SELECT * FROM logininfor WHERE nickname = '$name' AND pass = '$mdPass'";
            $resulf = selectDatabase($connect,$query);
            if(mysqli_num_rows($resulf) == 0){
                return false;
            }else if(mysqli_num_rows($resulf)==1){
                return true;
            }else{
                sendResponse(500,dataError(500,"Đéo có cừa hack đâu cút mẹ mày đi"));
            }
	}
	function createTableChiTieu($connect, $name){
		$sqlQuery = "CREATE TABLE $name(
			ID char(40) ,
			loaigiaodich nvarchar(10),
			sanphamgiaodich nvarchar(50),
			thoigian datetime,
			dongia long,
			soluong int,
			thanhtien long,
			primary key(ID)
		)";
		return mysqli_query($connect,$sqlQuery);
	}
	function createTableVay($connect, $name){
		$sqlQuery = "CREATE TABLE $name(
			ID char(40),
			loaigiaodich nvarchar(10),
			nguoigiaodich nvarchar(50),
			thoigiangiaodich datetime,
			thoigianthoathuan datetime,
			sotienvay long,
			sotiendatra long,
			laixuat float,
			trangthai bool,
			primary key(ID)
		)";
		return mysqli_query($connect,$sqlQuery);
	}
	function selectDatabase($connect, $query){
		if(empty($query))
			exit('Chưa có câu lệnh truy vấn');
		$resulf = mysqli_query($connect,$query);
		return $resulf;
	}
	function getStatusCodeMeeage($status){
		$codes = array(
		100 => 'Continue',
		101 => 'Switching Protocols',
		200 => 'OK',
		201 => 'Created',
		202 => 'Accepted',
		203 => 'Non-Authoritative Information',
		204 => 'No Content',
		205 => 'Reset Content',
		206 => 'Partial Content',
		300 => 'Multiple Choices',
		301 => 'Moved Permanently',
		302 => 'Found',
		303 => 'See Other',
		304 => 'Not Modified',
		305 => 'Use Proxy',
		306 => '(Unused)',
		307 => 'Temporary Redirect',
		400 => 'Bad Request',
		401 => 'Unauthorized',
		402 => 'Payment Required',
		403 => 'Forbidden',
		404 => 'Not Found',
		405 => 'Method Not Allowed',
		406 => 'Not Acceptable',
		407 => 'Proxy Authentication Required',
		408 => 'Request Timeout',
		409 => 'Conflict',
		410 => 'Gone',
		411 => 'Length Required',
		412 => 'Precondition Failed',
		413 => 'Request Entity Too Large',
		414 => 'Request-URI Too Long',
		415 => 'Unsupported Media Type',
		416 => 'Requested Range Not Satisfiable',
		417 => 'Expectation Failed',
		500 => 'Internal Server Error',
		501 => 'Not Implemented',
		502 => 'Bad Gateway',
		503 => 'Service Unavailable',
		504 => 'Gateway Timeout',
		505 => 'HTTP Version Not Supported'
		);
		
		return (isset($codes[$status])) ? $codes[$status] : ”;
	}
	function sendResponse($status = 200, $body, $content_type = "application/json"){

		header($status);
		header('Content-type: ' . $content_type);
		exit($body);
	}
	function dataError($status,$cause){
		$date = date_create("now");
		$arr = array(
			'error' =>"$cause",
			'status' => $status,
			'time' => date_format($date,"Y/m/d H:m:s")
		);
		return json_encode($arr);
	}
	function datalogin($status,$username, $password){
		$date =date_create('now');
		$token = md5($username."|".$password."|".time());
		$body = array(
			'status' => $status,
			'username' => $username,
			'accesstoken' => $token,
			'create_time_login' => date_format($date,"Y/m/d H:m:s")
		);
		return $body;
	}

?>

