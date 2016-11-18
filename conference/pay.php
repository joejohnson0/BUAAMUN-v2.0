<?php
session_start();
if(!$_SESSION['munc_login']) {
    header("HTTP/1.1 403 Forbidden");
    exit;
}
$school=$_SESSION['school'];
header("Content-Type: text/html; charset=utf-8");
require_once("../php/functions.php");
$db=db_connect();
$sch=$db->query("SELECT * FROM school WHERE name = '$school' ");
$delg=$db->query("SELECT * FROM delegate WHERE school = '$school' ");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>BUAAMUNC2015-代表团缴费</title>
    <link href="http://cdn.bootcss.com/bootstrap/3.3.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="../images/buaamun_logo.JPG" />
    <link href="http://cdn.bootcss.com/jquery-toggles/2.0.4/toggles.css" rel="stylesheet" >
    <link href="../css/jquery.fileupload.css" rel="stylesheet" media="screen">
    <!--
    <link href="../css/new_delegate.css" rel="stylesheet">
  -->

    
    <script src="http://cdn.bootcss.com/jquery-toggles/2.0.4/toggles.js"></script>    
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="http://libs.baidu.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
    <script src="../js/vendor/jquery.ui.widget.js"></script>
    <script src="../js/jquery.fileupload.js"></script>
    <script src="../js/jquery.iframe-transport.js"></script>
    <script src="../js/pay.js"></script>
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
              window.location="index.php";
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
            <li><a href="announcement/index.php?page=9">注册说明</a></li>
            <li class="dropdown">
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
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">代表注册<span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="delegate_info.php">查看代表信息</a></li>
                <li><a href="new_delegate.php">添加新的代表</a></li>
                <li><a href="pay.php">代表团缴费</a></li>
              </ul>
            </li>
            <li class="active"><a href="../">北航模联官网</a></li>           
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
          <h3><?php echo $school; 
                    $row = mysqli_fetch_array($sch,MYSQLI_ASSOC);
                    if($row['pay']=="1"){
          ?>
            <span class="label label-success">缴清</span>
            <?php }else if($row['pic']!=""){ ?>
            <span class="label label-info">审核中</span>
            <?php }else{ ?>
            <span class="label label-danger">未缴</span>
            <?php } ?>
          </h3>
        </div>            
      </div>
    </div>
    <div class="row">
      <div class="col-md-10 col-md-offset-1">
        <div class="well row">
          <form>
          <div class="form-group has-feedback form-photo col-md-4">
            <div class="photo-identifier"></div>
            <label class="control-label">上传缴费凭据</label>
            <span class="btn btn-primary btn-block fileinput-button">
              <i class="glyphicon glyphicon-plus"></i>
              <span>选择照片...</span>                  
              <input type="file" name="files[]" class="photo" accept="image/*">
            </span>              
          </div>
          <div class="col-md-12"><br /></div>
          <div class="col-md-12">
            <img src="" class="preview" alt="" />
            <?php echo "<img src=\"".$row['pic']."\" />"; ?>
            <center><button class="btn btn-lg btn-success"><span class="glyphicon glyphicon-ok"></span>上传</button></center>
          </div>
        </form>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-10 col-md-offset-1">
        <div class="page-header">
            <h3>缴费政策</h3>
        </div>            
      </div>
    </div>
    <div class="row">
      <div class="col-md-10 col-md-offset-1">
        <div class="well">
          <p>缴费方式说明</p>
        </div>
      </div>
    </div>


    <footer><hr />
      <p align="center">Model United Nations Association, Beihang University<br />&copy; 2014-2015 All Rights Reserved.</p>
    </footer>

</body>
</FONT>	
</html>