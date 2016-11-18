<?php
session_start();
header("Content-Type: text/html; charset=utf-8");
require_once("../../php/functions.php");
$id=$_GET['page'];
$db=db_connect();
$res=$db->query("SELECT * FROM page WHERE id = '$id' ");
$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>2015北航模联大会</title>
    <link href="http://cdn.bootcss.com/bootstrap/3.3.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="../images/buaamun_logo.JPG" />
    <link href="http://cdn.bootcss.com/jquery-toggles/2.0.4/toggles.css" rel="stylesheet" >

    
    <script src="http://cdn.bootcss.com/jquery-toggles/2.0.4/toggles.js"></script>    
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="http://libs.baidu.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
    <script type="text/javascript">
      function logout(){
        $.ajax({
          type: "POST",
          url: '../php/login.php',
          dataType: 'json',
          data: {
            action: "logout"
          },
          success: function(data) {
            if(data['status']==0){
              window.location.reload();
            }
            else {
              alert(data['msg']);
            }
          }
        });
      }
    </script>

  </head>
<FONT style="FONT-FAMILY: 微软雅黑;">
  <body>

    <!-- Fixed navbar -->
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="../">2015北航模拟联合国大会</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-left">
            <li><a href="index.php?page=9">注册说明</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">大会通告<span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="index.php?page=8">委员会介绍</a></li>               
                <li><a href="index.php?page=2">大会邀请函</a></li>
                <li><a href="index.php?page=3">第一轮通告</a></li>
                <li><a href="index.php?page=4">第二轮通告</a></li>
                <li class="divider"></li>
                <li class="dropdown-header">会务指南</li>
                <li><a href="index.php?page=5">交通指南</a></li>
                <li><a href="index.php?page=7">饮食指南</a></li>
                <li><a href="index.php?page=6">住宿指南</a></li>
              </ul>
            </li>
<?php
if(isset($_SESSION['munc_login']) && $_SESSION['munc_login']){
?>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">代表注册<span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="../delegate_info.php">查看代表信息</a></li>
                <li><a href="../new_delegate.php">添加新的代表</a></li>
                <li><a href="../pay.php">代表团缴费</a></li>
              </ul>
            </li>
<?php
}
?>
            <li class="active"><a href="../../">北航模联官网</a></li>           
          </ul>
          <ul class="nav navbar-nav navbar-right">
<?php
if(!isset($_SESSION['munc_login'])){
?>
            <li><a href="../register.php">注册</a></li>
            <li><a href="../login.php">登录</a></li>
            <li><a href="../intramural.php">北航校内代表报名通道</a></li>
<?php
}
if(isset($_SESSION['munc_login']) && $_SESSION['munc_login']){
?>
            <li><a href="#" onclick="logout()">注销</a></li>
<?php
}
?>                  
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
    <br /><br /><br />

    <div class="row">
      <div class="col-md-10 col-md-offset-1">
        <div class="page-header">
            <h3><?php echo $row['title']; ?></h3>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-10 col-md-offset-1">
        <div class="well">
          <?php echo $row['content']; ?>
          <!--
          <p>尊敬的贵校模联同仁：</p>
          <p>您好！</p>
          <p>第三届北京航空航天大学模拟联合国大会将于2015年4月25日至26日举办。在此，北航模联诚挚邀请您参加本次会议。</p>
          <p>北京航空航天大学是新中国第一所航空航天高等学府。学校学科繁荣，特色鲜明；开放交融，传承创新。“尚德务实、求真拓新”的办学理念，是学校今后办学和发展的基本理念。“德才兼备、知行合一”的校训，是北航师生广泛认同的道德准则基础。“艰苦朴素、勤奋好学、全面发展、勇于创新”的校风是北航几代人努力培育的结果，是学校精神面貌的具体体现，也是学校综合实力和学校凝聚力的重要组成部分。北航一直是国家重点建设的高校，首批进入“211工程”，2001年进入“985工程”，经过六十年的建设与发展，学校基本形成了研究型大学的核心竞争力，内在凝聚力和国内外影响力得到显著提升，跻身国内高水平大学的第一方阵。</p>
          <p>模拟联合国于20世纪90年代后期引入中国，近些年来，模联活动更是如火如荼地在全国开展，北航学子也积极活跃于各大高校的模联会场。本次北京航空航天大学模拟联合国大会旨在为大家提供交流与学习平台，开阔国际视野，激发领袖才能，锻炼沟通能力。我们将会议的学术水平和学术质量作为我们的最高追求，为各位代表提供一个学术至上的会议体验，搭建一个展示代表学术风采的舞台。</p>
          <p>扬帆远方，筑梦北航。在这春和景明的日子里，北航模联将竭力为您呈现一场精彩纷呈的模联盛宴。2015年4月25日至26日，北航第三届模拟联合国大会期待与您相聚！</p>
          <p align="right">北京航空航天大学模拟联合国协会</p>
          <p align="right">2015年2月</p>
        -->
        </div>
      </div>
    </div>


</body>
</FONT>	
</html>