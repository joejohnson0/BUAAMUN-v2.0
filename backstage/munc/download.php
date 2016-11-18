<?php
session_start();
if(!$_SESSION['bkstg_login']) {
    header("HTTP/1.1 403 Forbidden");
    exit;
}
header("Content-Type: text/html; charset=utf-8");
header("Content-Type: application/vnd.ms-excel; charset=utf-8");
header("Content-Disposition:attachment; filename=代表信息.xls; charset=utf-8");
require_once("../../php/functions.php");
$db=db_connect();
$result=mysqli_query($db,"SELECT * FROM delegate");
?>
<html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<table  frame="border" rules="all" cellpadding="10%" cellspacing="%10">
    <tr>
		<th><b>学校</b></th>
		<th><b>姓名</b></th>
        <th><b>性别</b></th>
        <th><b>手机</b></th>
		<th><b>邮箱</b></th>
		<th><b>QQ</b></th>
        <th><b>模联经历</b></th>
        <th><b>委员会志愿1</b></th>
        <th><b>委员会志愿2</b></th>
        <th><b>服从调剂</b></th>
        <th><b>分配委员会</b></th>
        <th><b>分配国家</b></th>
        <th><b>是否领队</b></th>
        <th><b>注册状态</b></th>
	</tr>
<?php
while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){  
?>
	<tr>
		<td><?php echo $row['school'] ?> </td>
		<td><?php echo $row['name'] ?> </td>
		<td><?php echo $row['gender'] ?> </td>
		<td><?php echo $row['contact'] ?> </td>
        <td><?php echo $row['email'] ?> </td>
		<td><?php echo $row['qq'] ?> </td>
		<td><?php echo $row['exp'] ?> </td>
		<td><?php echo $row['comm1'] ?> </td>
		<td><?php echo $row['comm2'] ?> </td>
		<td><?php echo $row['alloc'] ?> </td>
		<td><?php echo $row['committee'] ?> </td>
		<td><?php echo $row['country'] ?> </td>
		<td><?php echo $row['head'] ?> </td>
		<td><?php echo $row['status'] ?> </td>
	</tr>
<?php
	}
?>
</table>
</html>