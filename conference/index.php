<?php
session_start();
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
    <title>2015北航模联大会</title>
    <link href="http://cdn.bootcss.com/bootstrap/3.3.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="../images/buaamun_logo.JPG" />
    <link href="http://cdn.bootcss.com/jquery-toggles/2.0.4/toggles.css" rel="stylesheet" >

    
    <script src="http://cdn.bootcss.com/jquery-toggles/2.0.4/toggles.js"></script>    
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="http://libs.baidu.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
    <script src="../js/sha1-min.js"></script>
    <script src="../js/munc_index.js"></script>
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
          <a class="navbar-brand" href="index.php">2015北航模拟联合国大会</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-left">
            <li><a href="index.php">注册说明</a></li>
<!--            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">大会通告<span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="announcement/index.php?page=8">委员会介绍</a></li>               
                <li><a href="announcement/index.php?page=2">大会邀请函</a></li>
                <li><a href="announcement/index.php?page=3">第一轮通告</a></li>
                <li><a href="announcement/index.php?page=4">第二轮通告</a></li>
                <li class="divider"></li>
                <li class="dropdown-header">会务指南</li>
                <li><a href="announcement/index.php?page=5">交通指南</a></li>
                <li><a href="announcement/index.php?page=7">饮食指南</a></li>
                <li><a href="announcement/index.php?page=6">住宿指南</a></li>
              </ul>
            </li>-->
<?php
if(isset($_SESSION['munc_login']) && $_SESSION['munc_login']){
?>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">代表注册<span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="delegate_info.php">查看代表信息</a></li>
                <li><a href="new_delegate.php">添加新的代表</a></li>
                <!--<li><a href="pay.php">代表团缴费</a></li>-->
              </ul>
            </li>
<?php
}
?>
            <li class="active"><a href="../">北航模联官网</a></li>           
          </ul>
          <ul class="nav navbar-nav navbar-right">
<?php
if(!isset($_SESSION['munc_login'])){
?>
            <li><a href="register.php">注册</a></li>
            <li><a href="login.php">登录</a></li>
            <li><a href="intramural.php">北航校内代表报名通道</a></li>
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
<!--
<?php
if(isset($_SESSION['munc_login']) && $_SESSION['munc_login']){
?>
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
<?php
}
?>
-->
    <div class="row">
      <div class="col-md-10 col-md-offset-1">
        <div class="page-header">
            <h3>注册说明</h3>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-10 col-md-offset-1">
        <div class="well">
          <p>2015北航模联大会代表注册进行中。校外代表与校内代表分别注册。</p>
          <p>1.校外代表</p>
            <p>&nbsp;&nbsp;请各高校模联社团指定一名负责人，作为高校代表团管理员。</p>
            <p>&nbsp;&nbsp;管理员请在网页右上角点击“注册”，填写完整信息，注册本校代表团。</p>
            <p>&nbsp;&nbsp;注册完毕后即可在网页右上角点击“登录”进入代表注册页面。在页面左上角“代表注册”处选择“添加新的代表”并填写相应信息，即可添加代表。请注意，一旦确认报名，所有信息均无法更改。</p>
          <p>2.校内代表</p>
            <p>&nbsp;&nbsp;请在右上角点击“北航校内代表报名通道”进入报名，填写完整信息并提交即完成报名。</p>
          <p>3.报名阶段结束后，北航模联组委会将通过您预留的邮箱与您联系，进行缴费与席位分配，请确保您填写的所有联系方式合法有效。</p>
        </div>
      </div>
    </div>
<!--
    <div class="row">
      <div class="col-md-10 col-md-offset-1">
        <div class="page-header">
            <h3>关于大会</h3>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-10 col-md-offset-1">
        <div class="well">
          <p>高校代表团注册：请参阅顶部导航条<button type="button" class="btn btn-link">注册说明</button></p>
          <p>本校代表报名：请参阅顶部导航条<button type="button" class="btn btn-link">注册说明</button></p>
          <p>关于交通、食宿：请参阅顶部导航条<button type="button" class="btn btn-link">大会通告-会务指南</button></p>
        </div>
      </div>
    </div>
-->

    <footer><hr />
      <p align="center">Model United Nations Association, Beihang University<br />&copy; 2014-2015 All Rights Reserved.</p>
    </footer>

</body>
</FONT>	
</html>