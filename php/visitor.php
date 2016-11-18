<?php
if(!isset($_REQUEST['action'])) {
    header("HTTP/1.1 403 Forbidden");
    exit;
}

require_once("functions.php");
$db=db_connect();
session_start();

switch($_REQUEST['action']) {

	//招新报名
	//done
	case "enroll":
	{
		$name=$_POST['name'];
		$id=$_POST['id'];
		$gender=$_POST['gender'];
		$email=$_POST['email'];
		$contact=$_POST['contact'];
		$qq=$_POST['qq'];
		$dept=$_POST['department'];
		$exp=$_POST['exp'];
		$ps=$_POST['ps'];
		$db->query("delete from enroll where name='$name'");
		$db->query("delete from enroll where id='$id'");
		$ins="insert into enroll (name,id,gender,email,contact,qq,dept,exp,ps) values ('$name','$id','$gender','$email','$contact','$qq','$dept','$exp','$ps')";
		$res=mysqli_query($db, $ins);
		if(!$res) reply(-1,"数据库连接有误！");
		else reply(0,"$name ,恭喜你报名成功！");

		break;
	}

	//获取会议信息
	//done
	case "get_conf":
	{
		$stat="1";
		$result=mysqli_query("SELECT * FROM conference ");
		
		$conf=array();
		while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
			array_push($conf,$row);
		}
		header("Content-Type: application/json;charset=utf8");
		echo json_encode($conf);
    		
		break;
	}

	//参会报名
	//done
	case "conf_signup":
	{
		$name=$_POST['name'];
		$id=$_POST['id'];
		$gender=$_POST['gender'];
		$email=$_POST['email'];
		$contact=$_POST['contact'];
		$qq=$_POST['qq'];
		$exp=$_POST['exp'];
		$password=$_POST['password'];
		$conf=$_POST['conference'];

		$stat=0;

		
		for($i=0;$i<conf.length;$i++)
		{
			$conference=$conf[$i]['conf'];
			$committee=$conf[$i]['committee'];
			$ins="INSERT INTO confreg (name,id,gender,email,contact,qq,exp,password,conference,committee) VALUES ('$name','$id','$gender','$email','$contact','$qq','$exp','$password','$conference','$committee')";
			$res[$i]=$db->query($ins);
			if(!$res[$i]) $stat=0;
			else $stat=1;
		}

		if($stat==1) reply(0,"$name ,恭喜你以上会议报名成功！");
		else reply(-1,"数据库连接有误！");

		break;
	}

	//参会报名查询
	case "conf_inquire":
	{
		$id = $_POST['id'];
		$password = $_POST['password'];

		$res = $db->query("SELECT * FROM confreg WHERE id = '$id' AND password = '$password' ");

		$conf=array();
		while($row = mysqli_fetch_array($res,MYSQLI_ASSOC)){
			array_push($conf,$row);
		}

		if(!$res) reply(-1,"无报名记录或密码错误！");
		else reply(0,$conf);

		break;
	}

	//北航模联大会代表团注册
	//done
	case "munc_signup":
	{
		$school=$_POST['school'];
		$email=$_POST['email'];
		$admin=$_POST['admin'];
		$contact=$_POST['contact'];
		$password=$_POST['password'];
		$pay=0;
		
		$ins="INSERT INTO school (name,email,admin,contact,password,pay) VALUES ('$school','$email','$admin','$contact','$password','$pay')";
		$res=mysqli_query($db,$ins);
		if(!$res) reply(-1,"数据库连接有误！");
		else reply(0,"$school 代表团,恭喜注册成功！");

		break;
	}

	//北航模联大会校内报名
	//done
	case "munc_intramural":
	{
		$school=$_POST['school'];
		$name=$_POST['name'];
		$gender=$_POST['gender'];
		$contact=$_POST['contact'];
		$email=$_POST['email'];
		$qq=$_POST['qq'];
		$exp=$_POST['exp'];
		$comm1=$_POST['comm1'];
		$comm2=$_POST['comm2'];
		$alloc=$_POST['alloc'];
		$password=$_POST['password'];

		$head=0;
		$status=0;

		$pay=0;

		$ins="INSERT INTO school (name,email,admin,contact,password,pay) VALUES ('$school','$email','$name','$contact','$password','$pay')";
		$res=mysqli_query($db,$ins);
		if(!$res) reply(-1,"数据库连接有误！");
		else {
			$sql="INSERT INTO delegate (school,name,gender,contact,email,qq,exp,comm1,comm2,alloc,status) VALUES ('$school','$name','$gender','$contact','$email','$qq','$exp','$comm1','$comm2','$alloc','$status')";
			$result=mysqli_query($db,$sql);
			if(!$result) reply(-1,"数据库连接有误！");
			else reply(0,"$name ,恭喜注册成功！");
		}

		break;
	}

	//调试
	default:
	{

		break;

	}
}