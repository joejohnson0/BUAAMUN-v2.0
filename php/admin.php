<?php
session_start();
if(!isset($_REQUEST['action']) || !$_SESSION['admin_login']) {
    header("HTTP/1.1 403 Forbidden");
    exit;
}

require_once("functions.php");
$db=db_connect();
session_start();

switch($_REQUEST['action']) {

	//修改后台密码
	case "reset_admin":
	{
		$new1=$_POST['new1'];
		$new2=$_POST['new2'];
		if($new1!=$new2)
			reply(-1,"两次输入密码不一致！")；
		else if($new1=="")
		    reply(-1,"密码不能为空！");
		else {
			$result=$db->query("update global set content='$new1' where feature='admin' ");
			if(!$result) 
				reply(-1,"数据库连接有误！");
			else
				reply(0,"密码修改成功！");
		}

		break;
	}

	//修改密码
	case "reset_psw":
	{
		$new1=$_POST['new1'];
		$new2=$_POST['new2'];
		if($new1!=$new2)
			reply(-1,"两次输入密码不一致！")；
		else if($new1=="")
		    reply(-1,"密码不能为空！");
		else {
			$result=$db->query("update global set content='$new1' where feature='password' ");
			if(!$result) 
				reply(-1,"数据库连接有误！");
			else
				reply(0,"密码修改成功！");
		}

		break;
	}

	//清空数据表
	// case "empty":
	// {
		
	// }

}