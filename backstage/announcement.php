<?php
session_start();
if(!$_SESSION['bkstg_login']) {
    header("HTTP/1.1 403 Forbidden");
    exit;
}
header("Content-Type: text/html; charset=utf-8");
require_once("../php/functions.php");
$db=db_connect();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>北航模联v2.0-后台管理</title>
    <link href="http://cdn.bootcss.com/bootstrap/3.3.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="../images/buaamun_logo.JPG" />
    <link href="http://cdn.bootcss.com/jquery-toggles/2.0.4/toggles.css" rel="stylesheet" >

    <script src="http://cdn.bootcss.com/jquery-toggles/2.0.4/toggles.js"></script>    
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="http://libs.baidu.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
    <script src="../js/bkstg_index.js"></script>

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
          <a class="navbar-brand" href="index.php">北航模联网站后台管理系统</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-left">
            <li class="dropdown active">
              <a href="index.php" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">网站设置<span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="index.php">全局设置</a></li>
                <li><a href="#">通知栏</a></li>
              </ul>
            </li>
            <li><a href="enroll/">招新报名</a></li>
            <li class="dropdown">
              <a href="conf_signup/" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">参会报名<span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="conf_signup/">报名管理</a></li>
                <li><a href="conf_signup/conference.php">会议管理</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="munc/" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">模联大会<span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="munc/index.php">网页内容</a></li>
                <li><a href="munc/add_comm.php">委员会设置</a></li>
                <li><a href="munc/delegation.php">代表团管理</a></li>
                <li><a href="munc/delegate.php">代表管理及席位分配</a></li>
              </ul>
            </li> 
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#" onclick="logout()">注销</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
    <br /><br /><br />

    <div class="row">
      <div class="col-md-10 col-md-offset-1">
        <div class="page-header">
            <h3>通知编辑说明</h3>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-10 col-md-offset-1">
        <div class="well">
          <p>标题示例：   &lt;h3&gt;我是标题&lt;/h3&gt;</p>
          <p>段落示例（每个段落请用&lt;p&gt;&lt;/p&gt;括起来）：&lt;p&gt;我是一个段落，段落结束之后会自动换行&lt;/p&gt;</p>
          <p>强制换行：请在需要换行处使用&lt;br /&gt;</p>
          <p>文字位置调整示例：</p>
          <p align="left">&lt;p align="left"&gt;我在左边&lt;/p&gt;</p>
          <p align="center">&lt;p align="center"&gt;我在中间&lt;/p&gt;</p>
          <p align="right">&lt;p align="right"&gt;我在右边&lt;/p&gt;</p>
          <p>文字强调示例：&lt;b&gt;<b>我被加粗了</b>&lt;/b&gt;   &lt;i&gt;<i>我被斜体了</i>&lt;/i&gt;</p>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-10 col-md-offset-1">
        <div class="page-header">
            <h3>发布新公告</h3>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-10 col-md-offset-1">
        <div class="well row">

          <form>

            <div class="form-group has-feedback form-type col-md-4">
              <label class="control-label">公告标题</label>
              <input type="text" class="form-control title" />
            </div>

            <div class="col-md-6"><br /></div>
          
            <div class="form-group has-feedback form-time col-md-12">
              <label class="control-label">内容</label>
              <textarea class="form-control content" rows="30"></textarea>
            </div>
            <div class="col-md-12">
              <center><button type="button" id="submit" class="btn btn-success btn-lg">发布</button></center>
            </div>

          </form>
        </div>
      </div>
    </div>

    <footer><hr />
      <p align="center">Model United Nations Association, Beihang University<br />&copy; 2014-2015 All Rights Reserved.</p>
    </footer>

</body>
</FONT>	
</html>