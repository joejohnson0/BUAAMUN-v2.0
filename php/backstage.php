<?php
session_start();
if(!isset($_REQUEST['action']) || !$_SESSION['bkstg_login']) {
    header("HTTP/1.1 403 Forbidden");
    exit;
}

require_once("functions.php");
$db=db_connect();
session_start();

switch($_REQUEST['action']) {

	//首页通知栏
	//done
	case "add_ann":
	{
		$title=$_POST['title'];
		$content=$_POST['content'];
		$ins="INSERT INTO announcement (title,content) VALUES ('$title','$content')";
		$res=$db->query($ins);
		if(!$res) reply(-1,"数据库连接有误！");
		else reply(0,"通知添加成功！");

		break;
	}

	//大会页面内容设置
	//done
	case "munc_page":
	{
		$id=$_POST['id'];
		$content=$_POST['content'];
		$sql="UPDATE page SET content = '$content' WHERE id = '$id' ";
		$res=$db->query($sql);
		if(!$res) reply(-1,"数据库连接有误！");
		else reply(0,"页面设置成功！");

		break;
	}

	//设置当前年度
	//suspended
	case "year":
	{

		break;
	}

	//大会网站开关
	//suspended
	case "munc_switch":
	{

		break;
	}

	//添加会议
	//done
	case "add_conf":
	{
		$conference = $_POST['conf'];
		$ins="INSERT INTO conference (name,venue,time,ddl,fee,committee,status) VALUES ";
		$length = count($conference);
        foreach($conference as $key => $value) {
            $sql .= sprintf("('%s', '%s', '%s', '%s', '%s', '%s', '%s')", $value['name'], $value['venue'], $value['time'], $value['ddl'], $value['fee'], $value['committee'], $value['status']);
            if($key < $length-1) $sql .= ",";
        }
        $result=$db->query($ins);
        if(!$result) reply(-1,"数据库连接有误！");
		else reply(0,"添加成功");
		break;
	}

	//获取会议信息
	//done
	case "get_conf":
	{
		$stat="1";
		$result=$db->query("SELECT * FROM conference WHERE status = '$stat' ");
		
		$conf=array();
		while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
			array_push($conf,$row);
		}
		header("Content-Type: application/json;charset=utf8");
		echo json_encode($conf);
    		
		break;
	}

	//编辑会议
	//done
	case "edit_conf":
	{
		$conf = $_POST['conference'];
		$name = $_POST['name'];
        $length = count($conf);
        $sql = "UPDATE delegate SET ";
        foreach ($conf as $key => $value) {
            $sql .= sprintf("%s = '%s', ", $key, $value);
        }
        $sql = substr($sql, 0, strlen($sql) - 2);
        $sql .= " WHERE name = '$name'";
		
		$result=$db->query($sql);
		if(!$result) reply(-1,"数据库连接有误！");
		else reply(0,"$name 修改成功");
		
		break;
	}

	//删除会议
	//done
	case "del_conf":
	{
		$name=$_POST['name'];
		$stat="0";
		$result=$db->query("UPDATE conference SET status = '$stat' WHERE name = '$name' ");
		if(!$result) reply(-1,"数据库连接有误！");
		else reply(0,"$name 删除成功");

		break;
	}

	//编辑网页内容
	//suspended
	case "edit_page":
	{

		break;
	}

	//添加委员会
	//done
	case "add_comm":
	{
		$comm = $_POST['comm'];
		$country = $_POST['country'];

		$res1 = $db->query("INSERT INTO committee (name) VALUES ('$comm')");

		$ins="INSERT INTO country (committee,name) VALUES ";
		$length = count($country);
        foreach($country as $key => $value) {
            $sql .= sprintf("('%s', '%s')", $comm, $value);
            if($key < $length-1) $sql .= ",";
        }
        $res2=$db->query($ins);

        if(!$res1 || !$res2) reply(-1,"数据库连接有误！");
		else reply(0,"添加成功");
		break;
	}

	//增加国家
	//done
	case "add_country":
	{
		$id = $_POST['id'];
		$country = $_POST['country'];

		$res1 = $db->query("SELECT * FROM committee WHERE serial = '$id' ");
		$row = mysqli_fetch_array($res1,MYSQLI_ASSOC);
		$comm = $row['name'];

		$ins="INSERT INTO country (committee,name) VALUES ";
		$length = count($country);
        foreach($country as $key => $value) {
            $sql .= sprintf("('%s', '%s')", $comm, $value);
            if($key < $length-1) $sql .= ",";
        }
        $res2=$db->query($ins);

        if(!$res1 || !$res2) reply(-1,"数据库连接有误！");
		else reply(0,"添加成功");
		break;
	}

	//删除国家
	//done
	case "del_country":
	{
		$id = $_POST['id'];
		$result = $db->query("DELETE FROM country WHERE id = '$id' ");
		if(!$result) reply(-1,"数据库连接有误！");
		else reply(0,"删除成功");
		break;
	}

	//删除委员会
	//done
	case "del_comm":
	{
		$serial=$_POST['id'];
		$res1=$db->query("SELECT * FROM committee WHERE serial = '$serial' ");

		while($row = mysqli_fetch_array($res1,MYSQLI_ASSOC)){
			$committee = $row['name'];
			$db->query("DELETE FROM country WHERE committee = '$committee' ");
		}

		$res2=$db->query("DELETE FROM committee WHERE serial = '$serial' ");
		if(!$res1 || !$res2) reply(-1,"数据库连接有误！");
		else reply(0,"删除成功");

		break;
	}

	//获取代表信息
	//done
	case "get_delg":
	{
		$result=$db->query("SELECT * FROM delegate ORDER BY school");
		
		$delegate = array();
		while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
			$tmp = $row['serial'];
			$delegate["$tmp"] = $row;
		}
		header("Content-Type: application/json;charset=utf8");
		echo json_encode($delegate);
    		
		break;
	}

	//获取委员会
	//done
	case "get_comm":
	{
		$comm = array();

		$res1 = $db->query("SELECT * FROM committee");
		while($row = mysqli_fetch_array($res1,MYSQLI_ASSOC)){
			array_push($comm, $row['name']);
		}

		header("Content-Type: application/json;charset=utf8");
		echo json_encode($comm);
    		
		break;
	}

	//获取国家信息
	//done
	case "get_country":
	{
		$country = array();

		$res1 = $db->query("SELECT * FROM committee");
		while($row = mysqli_fetch_array($res1,MYSQLI_ASSOC)){
			$committee = $row['name'];
			$country["$committee"] = array();
		}

		$res2 = $db->query("SELECT * FROM country");
		while($row = mysqli_fetch_array($res1,MYSQLI_ASSOC)){
			$committee = $row['committee'];
			array_push($country["$committee"], $row['name']);
		}

		header("Content-Type: application/json;charset=utf8");
		echo json_encode($country);
    		
		break;
	}

	//分配席位
	//done
	case "alloc":
	{
		$serial = $_POST['serial'];
		$committee = $_POST['committee'];
		$country = $_POST['country'];

		$sql = "UPDATE delegate SET committee = '$committee', country = '$country' WHERE serial = '$serial' ";
		$result=$db->query($sql);
		if(!$result) 
			reply(-1,"数据库连接有误！");
		else
			reply(0,"分配成功！");

		break;
	}

	//修改代表状态
	//done
	case "delg_stat":
	{
		$serial = $_POST['serial'];
		$status = $_POST['status'];

		$result=$db->query("UPDATE delegate SET status = '$status' WHERE serial = '$serial' ");
		if(!$result) 
			reply(-1,"数据库连接有误！");
		else
			reply(0,"操作成功！");

		break;
	}

	//确认收钱
	//done
	case "confirm_pay":
	{
		$school = $_POST['school'];
		$pay = "1";
		$result = $db->query("UPDATE school SET pay = '$pay' WHERE school = '$school' ");
		if(!$result) 
			reply(-1,"数据库连接有误！");
		else
			reply(0,"操作成功！");

		break;
	}

	//修改密码
	//done
	case "reset_psw":
	{
		$old=$_POST['old'];
		$new=$_POST['new'];
		$name="password";
		$res1=$db->query("SELECT * FROM global WHERE feature = '$name' AND content = '$old' ");
		if(!res1){
			reply(-1,"原密码错误！");
		}
		else{
			$res2=$db->query("UPDATE global SET content = '$new' WHERE feature = '$name' ");
			if(!$result) 
				reply(-1,"数据库连接有误！");
			else
				reply(0,"密码修改成功！");
		}		

		break;
	}
}

?>