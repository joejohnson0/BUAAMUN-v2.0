	<?php
session_start();
if(!isset($_REQUEST['action']) || !isset($_SESSION['school']) || !$_SESSION['munc_login']) {
    header("HTTP/1.1 403 Forbidden");
    exit;
}

require_once("functions.php");
$db=db_connect();
session_start();

switch($_REQUEST['action']) {

	//添加新的代表
	//done
	case "add_delg":
	{
		$delg = $_POST['delg'];
		$school = $_SESSION['school'];
		$ins="INSERT INTO delegate (school,name,gender,contact,email,qq,exp,comm1,comm2,head,alloc,status) VALUES ";
		$length = count($delg);
        foreach($delg as $key => $value) {
            $ins .= sprintf("('%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s')",$school, $value['name'], $value['gender'], $value['contact'], $value['email'], $value['qq'], $value['exp'], $value['comm1'], $value['comm2'], $value['head'], $value['alloc'], $value['status']);
            if($key < $length-1) $ins .= ",";
        }
        $result=mysqli_query($db,$ins);
        if(!$result) reply(-1,"数据库连接有误！");
		else reply(0,"添加成功");

		break;
	}

	//获取代表信息
	//done
	case "get_delg":
	{
		$school=$_SESSION['school'];
		$result=$db->query("SELECT * FROM delegate WHERE school='$school'");
		
		$delg=array();
		while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
			array_push($delg,$row);
		}
		header("Content-Type: application/json;charset=utf8");
		echo json_encode($delg);
    		
		break;
	}

	//编辑代表信息
	//done
	case "edit_delg":
	{
		$school=$_SESSION['school'];
		
		$delg = $_POST['delegate'];
		$name = $_POST['name'];
        $length = count($delg);
        $sql = "UPDATE delegate SET ";
        foreach ($delg as $key => $value) {
            $sql .= sprintf("%s = '%s', ", $key, $value);
        }
        $sql = substr($sql, 0, strlen($sql) - 2);
        $sql .= " WHERE school = '$school' AND name = '$name'";
		
		$result=$db->query($sql);
		if(!$result) reply(-1,"数据库连接有误！");
		else reply(0,"$name 修改成功");

		break;
	}

	//删除代表
	//done
	case "del_delg":
	{
		$school=$_SESSION['school'];
		$name=$_POST['name'];
		$result=$db->query("delete from delegate where name='$name' and school='$school'");
		if(!$result) reply(-1,"数据库连接有误！");
		else reply(0,"$name 删除成功");

		break;
	}

	//记录缴费凭据路径
	//done with potential problem
	case "pay":
	{
		$store = new SaeStorage();  
		$name =$_FILES['myfile']['name'];
		echo $store->upload('buaamun',$name,$_FILES['myfile']['tmp_name']);//把用户传到SAE的文件转存到名为buaamun的storage  
		$path = $store->getUrl("buaamun",$name);//文件在storage的访问路径

		$school = $_SESSION['school'];
		$result = $db->query("UPDATE school SET pic = '$path' WHERE school = '$school' ");
		if(!$result) 
			reply(-1,"数据库连接有误！");
		else
			reply(0,"缴费凭据提交成功！");

		break;
	}

	//修改密码
	//done
	case "reset_psw":
	{
		$school=$_SESSION['school'];
		$old=$_POST['old'];
		$new=$_POST['new'];
		$res1=$db->query("SELECT * FROM school WHERE school='$school' AND password='$old' ");
		if(!res1){
			reply(-1,"原密码错误！");
		}
		else{
			$res2=$db->query("UPDATE school SET password='$new' WHERE school='$school' ");
			if(!$result) 
				reply(-1,"数据库连接有误！");
			else
				reply(0,"密码修改成功！");
		}		

		break;
	}

}