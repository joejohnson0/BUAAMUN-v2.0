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
      <div class="col-md-1 col-md-offset-10">
        <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#renew-psw"><span class="glyphicon glyphicon-edit"></span>修改密码</button> 
      </div>
    </div>
    <div class="modal fade" id="renew-psw" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
         <div class="modal-dialog">
            <div class="modal-content">

               <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        &times;
                  </button>
                  <h4 class="modal-title" id="myModalLabel">
                     修改密码
                  </h4>
               </div>

               <div class="modal-body" id="modal-body">

                <div class="row">
                  <div class="col-md-10 col-md-offset-1">
                    <div class="row">

                      <div class="form-group has-feedback form-time col-md-12">
                        <label class="control-label">原密码</label>
                        <input type="password" class="form-control old-psw">
                      </div>

                      <div class="form-group has-feedback form-time col-md-12">
                        <label class="control-label">新密码</label>
                        <input type="password" class="form-control new-psw1">
                      </div>

                      <div class="form-group has-feedback form-time col-md-12">
                        <label class="control-label">再次确认新密码</label>
                        <input type="password" class="form-control new-psw2">
                      </div>

                    </div>
                  </div>
                </div>

                 </div>
                 <div class="modal-footer">
                    <button type="button" class="btn btn-default" 
                       data-dismiss="modal">关闭
                    </button>
                    <button id="renew" type="button" class="btn btn-primary">
                       提交更改
                    </button>
                 </div>

              </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->


    <div class="row">
      <div class="col-md-10 col-md-offset-1">
        <div class="page-header">
            <h3>全局参数</h3>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-10 col-md-offset-1">
        <div class="well">
          <p></p>
        </div>
      </div>
    </div>

    <footer><hr />
      <p align="center">Model United Nations Association, Beihang University<br />&copy; 2014-2015 All Rights Reserved.</p>
    </footer>

</body>
</FONT>	
</html>