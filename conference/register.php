
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>BUAAMUNC2015-注册</title>
    <link href="http://cdn.bootcss.com/bootstrap/3.3.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="../images/buaamun_logo.JPG" />
    <link href="http://cdn.bootcss.com/jquery-toggles/2.0.4/toggles.css" rel="stylesheet" >
    <link href="../css/new_delegate.css" rel="stylesheet">

    
    <script src="http://cdn.bootcss.com/jquery-toggles/2.0.4/toggles.js"></script>    
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="http://libs.baidu.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
    <script src="../js/sha1-min.js"></script>
    <script src="../js/register.js"></script>

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
            <li class="active"><a href="../">北航模联官网</a></li>           
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="register.php">注册</a></li>
            <li><a href="login.php">登录</a></li>
            <li><a href="intramural.php">北航校内代表报名通道</a></li>      
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
    <br /><br /><br />

    <div class="row">
      <div class="col-md-10 col-md-offset-1">
        <div class="page-header">
            <h3>高校代表团管理员注册</h3>
        </div>            
      </div>
    </div>

    <form onsubmit="return signup(this);">
      <div id="form-body"><div class="row">
        <div class="col-md-10 col-md-offset-1">
          <div class="well row">

            <div class="form-group has-feedback form-time col-md-6">
              <label class="control-label">学校名称</label>
              <input type="text" id="school" class="form-control content" required="required">
            </div>

            <div class="form-group has-feedback form-time col-md-6">
              <label class="control-label">社团邮箱</label>
              <input type="email" id="email" class="form-control content" required="required">
            </div>

            <div class="form-group has-feedback form-time col-md-6">
              <label class="control-label">管理员姓名</label>
              <input type="text" id="name" class="form-control content" required="required">
            </div>

            <div class="form-group has-feedback form-time col-md-6">
              <label class="control-label">管理员手机号码</label>
              <input type="text" id="contact" class="form-control content" required="required">
            </div>

            <div class="form-group has-feedback form-time col-md-6">
              <label class="control-label">设置密码</label>
              <input type="password" id="psw1" class="form-control password" required="required">
            </div>
            <div class="form-group has-feedback form-time col-md-6">
              <label class="control-label">确认密码</label>
              <input type="password" id="psw2" class="form-control password" required="required">
            </div>

          </div>
              

          <div class="row">
            <div class="col-md-10 col-md-offset-1">
              <center><button type="submit" id="submit" class="btn btn-success btn-lg">注册</button></center>
            </div>
          </div>

        </div>
      </div></div>
    </form>

    
    <footer><hr />
      <p align="center">Model United Nations Association, Beihang University<br />&copy; 2014-2015 All Rights Reserved.</p>
    </footer>

</body>
</FONT> 
</html>