<?php
header("Content-Type: text/html; charset=utf-8");
	//echo '没有乱码';
//$mjlist=array('院系非法','材料科学与工程学院','电子信息工程学院','自动化科学与电气工程学院','能源与动力工程学院','航空科学与工程学院','计算机学院','机械工程及自动化学院','经济管理学院','理学院','生物与医学工程学院','人文社会科学学院','外国语学院','交通科学与工程学院','工程系统工程系','宇航学院','飞行学院','仪器科学与光电工程学院','院系非法','物理科学与核能工程学院','法学院','软件学院','院系非法','高等工程学院','中法工程师学院','院系非法','新媒体艺术与设计学院','化学与环境学院','院系非法','人文与社会科学高等研究院');
function db_connect()
{
	//$conn=new mysqli('localhost','root','root','buaamun2');
	$conn=new mysqli(SAE_MYSQL_HOST_M.':'.SAE_MYSQL_PORT,SAE_MYSQL_USER,SAE_MYSQL_PASS,SAE_MYSQL_DB);
	mysqli_set_charset( $conn , "utf8" ); 
	if(!$conn)
		throw new Exception("无法连接到数据库");
	else 
		return $conn;
}

function reply($status, $msg) {
    $res = Array(
        "status"=>$status,
        "msg"=>$msg
    );
    header("Content-Type: application/json;charset=utf8");
    echo json_encode($res);
}