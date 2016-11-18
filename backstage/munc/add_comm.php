<?php
session_start();
if(!$_SESSION['bkstg_login']) {
    header("HTTP/1.1 403 Forbidden");
    exit;
}
header("Content-Type: text/html; charset=utf-8");
require_once("../../php/functions.php");
$db=db_connect();
$res1=mysqli_query($db,"SELECT * FROM committee");
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
    <link href="../../css/add_comm.css" rel="stylesheet" >

    
    <script src="http://cdn.bootcss.com/jquery-toggles/2.0.4/toggles.js"></script>    
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="http://libs.baidu.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
    <script src="../../js/add_comm.js"></script>
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
              <a href="../conf_signup/" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">参会报名<span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="../conf_signup/">报名管理</a></li>
                <li><a href="../conf_signup/conference.php">会议管理</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="../munc/" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">模联大会<span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="index.php">网页内容</a></li>
                <li><a href="add_comm.php">委员会设置</a></li>
                <li><a href="delegation.php">代表团管理</a></li>
                <li><a href="delegate.php">代表管理及席位分配</a></li>
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
            <h3>委员会设置</h3>
        </div>            
      </div>
    </div>

    <div class="row">
      <div class="col-md-10 col-md-offset-1">
        <div class="well row">
<?php
while($row1 = mysqli_fetch_array($res1,MYSQLI_ASSOC)){  
?>
        <div class="col-md-10 col-md-offset-1">
          <table class="table table-striped">
            <thead>
              <tr>
                <th colspan="3"><?php echo $row1['name']; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button committee-id="<?php echo $row1['serial']; ?>" class="btn btn-sm btn-danger del_comm">删除该委员会</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button committee-id="" data-toggle="modal" data-target="#append" class="btn btn-sm btn-success add_country">添加国家</button> <input type="number" class="append-num"/>个数</th>
              </tr>
            </thead>
            <tbody>
<?php
$comm=$row1['name'];
$res2=mysqli_query($db,"SELECT * FROM country WHERE committee = '$comm' ");
$counter = 0;
while($row2 = mysqli_fetch_array($res2,MYSQLI_ASSOC)){
?>
<?php if($counter%3==0){ ?><tr><?php } ?>
                <td><?php echo $row2['name']; ?> <button country-id="<?php echo $row2['id']; ?>" type="button" class="btn btn-sm btn-warning del_country">删除</button></td>
<?php if($counter%3==2){ ?></tr><?php } ?>
<?php $counter++; ?>
<?php } ?>
            </tbody>
          </table>
        </div>
<?php
}
?>

        </div>
      </div>
    </div>

    <div class="modal fade" id="append" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
         <div class="modal-dialog">
            <div class="modal-content">

               <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        &times;
                  </button>
                  <h4 class="modal-title" id="myModalLabel">
                     添加国家
                  </h4>
               </div>

              <div class="modal-body" id="modal-body">

                <div class="row">
                  <div class="col-md-10 col-md-offset-1">
                    <div class="row">
                      <div id="form-country"></div>
                    </div>
                  </div>
                </div>

              </div>

                 <div class="modal-footer">
                    <button type="button" class="btn btn-default" 
                       data-dismiss="modal">关闭
                    </button>
                    <button id="submit_append" type="button" class="btn btn-primary">
                       提交
                    </button>
                 </div>

              </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->







    <div class="row">
      <div class="col-md-10 col-md-offset-1">
        <div class="page-header">
            <h3>添加委员会</h3>
        </div>            
      </div>
    </div>

      <div class="row">
        <div class="col-md-10 col-md-offset-1">
          <div class="well row" id="committee">

            <div class="form-group has-feedback form-time col-md-8">
              <label class="control-label">委员会名称</label>
              <input type="text" class="form-control name">
            </div>

            <div class="form-group has-feedback form-time col-md-2">
              <label class="control-label">国家数量</label>
              <input type="number" class="form-control" id="number">
            </div>

            <div class="form-group has-feedback form-time col-md-2">
              <br />
              <button id="enter" class="btn btn-primary" data-toggle="modal" data-target="#add">输入国家<span class="glyphicon glyphicon-arrow-right"></span></button>
            </div>

          </div>
        </div>
      </div>    

      <div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
         <div class="modal-dialog">
            <div class="modal-content">

               <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        &times;
                  </button>
                  <h4 class="modal-title" id="myModalLabel">
                     输入国家
                  </h4>
               </div>

              <div class="modal-body" id="modal-body">

                <div class="row">
                  <div class="col-md-10 col-md-offset-1">
                    <div class="row">
                      <div id="country"></div>
                    </div>
                  </div>
                </div>

              </div>

                 <div class="modal-footer">
                    <button type="button" class="btn btn-default" 
                       data-dismiss="modal">关闭
                    </button>
                    <button id="submit_country" type="button" class="btn btn-primary">
                       提交
                    </button>
                 </div>

              </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

               
<div id="cn_template" class="form-group has-feedback col-md-4"><label class="control-label"></label><input class="form-control country" type="text" /></div>
    

    <footer><hr />
      <p align="center">Model United Nations Association, Beihang University<br />&copy; 2014-2015 All Rights Reserved.</p>
    </footer>

</body>
</FONT>	
</html>