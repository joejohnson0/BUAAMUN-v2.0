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

$result=$db->query("SELECT * FROM committee");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>BUAAMUNC2015-代表信息</title>
    <link href="http://cdn.bootcss.com/bootstrap/3.3.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="../images/buaamun_logo.JPG" />
    <link href="http://cdn.bootcss.com/jquery-toggles/2.0.4/toggles.css" rel="stylesheet" >
    <!--
    <link href="../css/new_delegate.css" rel="stylesheet">
  -->

    
    <script src="http://cdn.bootcss.com/jquery-toggles/2.0.4/toggles.js"></script>    
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="http://libs.baidu.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
    
    <script src="../js/delegate_info.js"></script>
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
            </li>
-->            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">代表注册<span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="delegate_info.php">查看代表信息</a></li>
                <li><a href="new_delegate.php">添加新的代表</a></li>
                <!--<li><a href="pay.php">代表团缴费</a></li>-->
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
            <h3><?php echo $school; ?> 代表信息</h3>
        </div>            
      </div>
    </div>

<?php
while($row = mysqli_fetch_array($delg,MYSQLI_ASSOC)){
  $i=$row['serial'];
?>
<div class="delegate-template">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <div class="well row">
        
        <div class="col-md-10">
          <h4>
            <?php if($row['head']=="1"){ ?>
            <span class="label label-success">领队</span>
            <?php } ?>
            <?php if($row['gender']=="男"){ ?>
            <span class="label label-primary">男</span>
            <?php }else{ ?>
            <span class="label label-danger">女</span>
            <?php } ?>
            <?php if($row['exp']=="是"){ ?>
            <span class="label label-info">有模联经历</span>
            <?php }else{ ?>
            <span class="label label-default">无模联经历</span>
            <?php } ?>
            <?php if($row['alloc']=="是"){ ?>
            <span class="label label-warning">服从调剂</span>
            <?php }else{ ?>
            <span class="label label-default">不服从调剂</span>
            <?php } ?>
            
          </h4>
        </div>
<!--
<form action="../php/munc.php?action=del_delg&serial=<?php echo $i; ?>" method="get">
        <div class="col-md-1">
          <button type="button" class="btn btn-md btn-success edit-btn" data-toggle="modal" data-target="#edit<?php echo $i; ?>"><span class="glyphicon glyphicon-edit"></span>编辑</button>
        </div>
        <div class="col-md-1">
          <button type="submit" class="btn btn-md btn-danger delete" id="delete<?php echo $i; ?>"><span class="glyphicon glyphicon-minus"></span>删除</button>
        </div>
</form>
-->
        <div class="col-md-6">
          姓名：<?php echo $row['name']; ?>
        </div>
        <div class="col-md-6">
          手机号码：<?php echo $row['contact']; ?>
        </div>

        <div class="col-md-6">
          QQ帐号：<?php echo $row['qq']; ?>
        </div>
        <div class="col-md-6">
          邮箱：<?php echo $row['email']; ?>
        </div>

        <div class="col-md-6">
          委员会志愿1：<?php echo $row['comm1']; ?>
        </div>
        <div class="col-md-6">
          委员会志愿2：<?php echo $row['comm2']; ?>
        </div>
<!--
        <div class="col-md-12"><br /></div>
        <div class="col-md-12">
          <span class="glyphicon glyphicon-paperclip"></span><b>申请结果</b>
        </div>
        
        <div class="col-md-6">
          <h4>
          <?php if($row['status']=="1"){ ?>
          <span class="label label-success">注册通过</span>
          <?php }else{ ?>
          <span class="label label-danger">注册未通过</span>
          <?php } ?>
          </h4>
        </div>
        <div class="col-md-6">
          <h4><span class="label label-info">席位分配</span></h4>   委员会：<?php echo $row['committee']; ?>   国家：<?php echo $row['country']; ?>   
        </div>
-->

      </div>
    </div>
  </div>
</div>
 
<!--
  
      <div class="modal fade" id="edit<?php echo $i; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
         <div class="modal-dialog">
            <div class="modal-content">

               <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        &times;
                  </button>
                  <h4 class="modal-title" id="myModalLabel">
                     代表信息编辑
                  </h4>
               </div>

               <div class="modal-body" id="modal-body">

                <div class="row">
                  <div class="col-md-10 col-md-offset-1">
                    <div class="row">

                      <div class="form-group has-feedback form-time col-md-4">
                        <label class="control-label">姓名</label>
                        <input id="name" disabled="disabled" type="text" class="form-control name" value="<?php echo $row['name']; ?>">
                      </div>

                      <div class="form-group has-feedback form-time col-md-4">
                        <label class="control-label">手机号码</label>
                        <input id="contact" type="text" class="form-control contact" required="required" value="<?php echo $row['contact']; ?>">
                      </div>

                      <div class="form-group has-feedback form-type col-md-4">
                        <label class="control-label">性别</label>
                        <select id="gender" class="form-control gender">
                          <option value="男" selected>男</option>
                          <option value="女">女</option>
                        </select>
                      </div>

                      <div class="form-group has-feedback form-time col-md-4">
                        <label class="control-label">邮箱</label>
                        <input id="email" type="email" class="form-control email" value="<?php echo $row['email']; ?>">
                      </div>

                      <div class="form-group has-feedback form-time col-md-4">
                        <label class="control-label">QQ帐号</label>
                        <input id="qq" type="text" class="form-control qq" value="<?php echo $row['qq']; ?>">
                      </div>

                      <div class="form-group has-feedback form-type col-md-4">
                        <label class="control-label">是否有模联经历</label>
                        <select id="exp" class="form-control exp">
                          <option value="是" selected>是</option>
                          <option value="否">否</option>
                        </select>
                      </div>

                      <div class="form-group has-feedback form-type col-md-6">
                        <label class="control-label">委员会志愿1</label>
                        <select id="comm1" class="form-control comm1">
                          <option value="" selected>请选择...</option>
<?php
while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
?>
                <option value="<?php echo $row['name']; ?>"><?php echo $row['name']; ?></option>
<?php
}
?>
                        </select>
                      </div>

                      <div class="form-group has-feedback form-type col-md-6">
                        <label class="control-label">委员会志愿2</label>
                        <select id="comm2" class="form-control comm2">
                          <option value="" selected>请选择...</option>
<?php
while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
?>
                <option value="<?php echo $row['name']; ?>"><?php echo $row['name']; ?></option>
<?php
}
?>
                        </select>
                      </div>

                      <div class="form-group has-feedback form-type col-md-4">
                        <label class="control-label">是否服从调剂</label>
                        <select id="alloc" class="form-control alloc">
                          <option value="是" selected>是</option>
                          <option value="否">否</option>
                        </select>
                      </div>

                      <div class="form-group has-feedback form-type col-md-4">
                        <label class="control-label">设置此人为领队</label><br />
                        <input type="checkbox" class="head" id="head" />
                      </div>

                    </div>
                  </div>
                </div>

                 </div>
                 <div class="modal-footer">
                    <button type="button" class="btn btn-default" 
                       data-dismiss="modal">关闭
                    </button>
                    <button id="renew<?php echo $i; ?>" type="submit" class="btn btn-primary renew">
                       提交更改
                    </button>
                 </div>

              </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
-->
<?php } ?>



    <footer><hr />
      <p align="center">Model United Nations Association, Beihang University<br />&copy; 2014-2015 All Rights Reserved.</p>
    </footer>

</body>
</FONT>	
</html>