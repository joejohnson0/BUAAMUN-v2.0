<?php
if(!isset($_REQUEST['action'])) {
    header("HTTP/1.1 403 Forbidden");
    exit;
}

require_once("functions.php");
$db=db_connect();
session_start();

switch($_REQUEST['action']) {

	//超级管理员登录
	//done
	case "admin_login":
	{
        $password = $_POST['password'];
        $result = mysqli_query($db, "SELECT * FROM global WHERE admin = '$password'");
        if(!$result) {
            reply(-1, "Internal error");
        } else if(mysqli_num_rows($result) != 1) {
            reply(-1, "Password error");
        } else {
            $_SESSION['admin_login'] = true;
            reply(0, "登录成功");
        }
		break;
	}

	//网站后台登录
	//done
	case "bkstg_login":
	{
		$password = $_POST['password'];
		$feature = "password";
        $result = mysqli_query($db, "SELECT * FROM global WHERE feature = '$feature' AND content = '$password'");
        if(!$result) {
            reply(-1, "Internal error");
        } else if(mysqli_num_rows($result) != 1) {
            reply(-1, "Password error");
        } else {
            $_SESSION['bkstg_login'] = true;
            reply(0, "登录成功");
        }
		break;
	}

	//模联大会账户登录
	//done
	case "munc_login":
	{
		$school=$_POST['school'];
		$password = $_POST['password'];
        $result = mysqli_query($db, "SELECT * FROM school WHERE name = '$school' AND password = '$password'");
        if(!$result) {
            reply(-1, "Internal error");
        } else if(mysqli_num_rows($result) != 1) {
            reply(-1, "Password error");
        } else {
        	$_SESSION['school'] = $school;
            $_SESSION['munc_login'] = true;
            reply(0, "登录成功");
        }
		break;
	}

	//登出
	case "logout":
	{
		session_destroy();
        reply(0, "logout");
		break;
	}

	//above all done
}