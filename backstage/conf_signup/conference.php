<?php
session_start();
if(!$_SESSION['bkstg_login']) {
    header("HTTP/1.1 403 Forbidden");
    exit;
}
header("Content-Type: text/html; charset=utf-8");
require_once("../../php/functions.php");
$db=db_connect();
$stat="1";
$res=$db->query("SELECT * FROM conference WHERE status = '$stat' ");
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
    <link rel="shortcut icon" href="../../images/buaamun_logo.JPG" />
    <link href="http://cdn.bootcss.com/jquery-toggles/2.0.4/toggles.css" rel="stylesheet" >

    <script src="http://cdn.bootcss.com/jquery-toggles/2.0.4/toggles.js"></script>    
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="http://libs.baidu.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
    <script src="../../js/conference_info.js"></script>
    <script type="text/javascript">
      function logout(){
        $.ajax({
          type: "POST",
          url: '../../php/login.php',
          dataType: 'json',
          data: {
            action: "logout"
          },
          success: function(data) {
            if(data['status']==0){
              window.location="../login.php";
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
          <a class="navbar-brand" href="../">北航模联网站后台管理系统</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-left">
            <li class="dropdown active">
              <a href="../index.php" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">网站设置<span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="../index.php">全局设置</a></li>
                <li><a href="../#">通知栏</a></li>
              </ul>
            </li>
            <li><a href="../enroll/">招新报名</a></li>
            <li class="dropdown">
              <a href="index.php" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">参会报名<span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="index.php">报名管理</a></li>
                <li><a href="conference.php">会议管理</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="../munc/" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">模联大会<span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="../munc/index.php">网页内容</a></li>
                <li><a href="../munc/add_comm.php">委员会设置</a></li>
                <li><a href="../munc/delegation.php">代表团管理</a></li>
                <li><a href="../munc/delegate.php">代表管理及席位分配</a></li>
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
            <h3>会议列表 <a role="button" align="right" class="btn btn-success btn-lg" href="add_conf.php"><span class="glyphicon glyphicon-plus"></span>添加新的会议</a></h3>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-10 col-md-offset-1">
<?php
while($row = mysqli_fetch_array($res,MYSQLI_ASSOC)){
?>
        <div class="well row">
          <h3>
            <div class="col-md-10"><?php echo $row['name']; ?></div>
            <div class="col-md-1">
              <button type="button" class="btn btn-md btn-success edit-btn" data-toggle="modal" data-target="#edit"><span class="glyphicon glyphicon-edit"></span>编辑</button>
            </div>
            <div class="col-md-1">
              <button type="button" class="btn btn-md btn-danger delete"><span class="glyphicon glyphicon-minus"></span>删除</button>
            </div>
          </h3>

          <div class="col-md-6">
            会议时间：<?php echo $row['time']; ?>
          </div>
          <div class="col-md-6">
            会议地点：<?php echo $row['venue']; ?>
          </div>

          <div class="col-md-6">
            报名截止时间：<?php echo $row['ddl']; ?>
          </div>
          <div class="col-md-6">
            报名费用：<?php echo $row['fee']; ?>
          </div>

          <div class="col-md-12">
            委员会及议题：<?php echo $row['committee']; ?>
          </div>

        </div>
        <?php } ?>
      </div>
    </div>


      <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
         <div class="modal-dialog">
            <div class="modal-content">

               <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        &times;
                  </button>
                  <h4 class="modal-title" id="myModalLabel">
                     会议信息编辑
                  </h4>
               </div>

               <div class="modal-body" id="modal-body">

                <div class="row">
                  <div class="col-md-10 col-md-offset-1">
                    <div class="row">

                      <div class="form-group has-feedback form-time col-md-12">
                        <label class="control-label">会议名称</label>
                        <input type="text" class="form-control name" disabled="disabled">
                      </div>

                      <div class="form-group has-feedback form-time col-md-12">
                        <label class="control-label">会议地点</label>
                        <input type="date" class="form-control venue">
                      </div>

                      <div class="form-group has-feedback form-time col-md-4">
                        <label class="control-label">会议时间</label>
                        <input type="text" class="form-control time">
                      </div>

                      <div class="form-group has-feedback form-time col-md-4">
                        <label class="control-label">报名截止时间</label>
                        <input type="date" class="form-control ddl">
                      </div>

                      <div class="form-group has-feedback form-time col-md-4">
                        <label class="control-label">报名费用</label>
                        <input type="text" class="form-control fee">
                      </div>

                      <div class="form-group has-feedback form-time col-md-12">
                        <label class="control-label">委员会及议题</label>
                        <textarea class="form-control committee" rows="6"></textarea>
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


    <footer><hr />
      <p align="center">Model United Nations Association, Beihang University<br />&copy; 2014-2015 All Rights Reserved.</p>
    </footer>

</body>
</FONT>	
</html>