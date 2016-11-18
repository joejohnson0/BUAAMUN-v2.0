<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>北航模联-参会报名</title>
    <link href="http://cdn.bootcss.com/bootstrap/3.3.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="../images/buaamun_logo.JPG" />
    <link href="http://cdn.bootcss.com/jquery-toggles/2.0.4/toggles.css" rel="stylesheet" >

    
    <script src="http://cdn.bootcss.com/jquery-toggles/2.0.4/toggles.js"></script>    
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="http://libs.baidu.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
    <script src="../js/sha1-min.js"></script>
    <script src="../js/conf_list.js"></script>

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
          <a class="navbar-brand" href="conf_list.php">北航模联办公系统-参会报名</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li><a href="../">回到主页</a></li>
            <li><a href="#" data-toggle="modal" data-target="#query">报名查询</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
    <br /><br /><br />

    <div class="modal fade" id="query" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
         <div class="modal-dialog">
            <div class="modal-content">

               <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        &times;
                  </button>
                  <h4 class="modal-title" id="myModalLabel">
                     报名查询
                  </h4>
               </div>

               <div class="modal-body" id="modal-body">

                <div class="row">
                  <div class="col-md-10 col-md-offset-1">
                    <div class="row" id="query-body">

                      <div class="form-group has-feedback form-time col-md-12">
                        <label class="control-label">学号</label>
                        <input id="id-no" type="text" class="form-control id-no">
                      </div>

                      <div class="form-group has-feedback form-time col-md-12">
                        <label class="control-label">报名密码</label>
                        <input id="psw" type="password" class="form-control psw">
                      </div>

                    </div>
                  </div>
                </div>

                 </div>
                 <div class="modal-footer">
                    <button type="button" class="btn btn-default" 
                       data-dismiss="modal">关闭
                    </button>
                    <button id="inquire" type="button" class="btn btn-primary">
                       查询
                    </button>
                 </div>

              </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

  <form method="post">

  <div id="conf_1">

    <div class="row">
    	<div class="col-md-10 col-md-offset-1">
		    <div class="progress">
		        <div class="progress-bar progress-bar-success" style="width: 33.3333%">
		            一：选择会议及委员会
		        </div>
		        <div class="progress-bar progress-bar-striped" style="width: 33.3333%">
		            二：填写个人信息
		        </div>
		        <div class="progress-bar progress-bar-striped" style="width: 33.3334%">
		            三：报名成功
		        </div>
		    </div>
  		</div>
  	</div>
  
    <div class="row">
      <div class="col-md-10 col-md-offset-1">
        <div class="alert alert-info" role="alert">
        <p>第一步：请从以下会议中选择一个或多个会议（在复选框中打钩），并选报一个委员会；</p>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-10 col-md-offset-1" id="form-body">
<!--
        <div class="panel panel-primary">
          <div class="panel-heading">        
            <h3 class="panel-title"><input class="toggle" data-toggle="toggle" data-on="选中" data-off="未选中" type="checkbox"></h3>
          </div>
          <div class="panel-body row">
            <div class="col-md-10">Panel content</div>
            <div class="col-md-6"><input type="text" class="form-control committee" placeholder="请填报委员会"/></div>
          </div>
        </div>
-->
      </div>
    </div>

    <div class="row">
      <div class="col-md-4 col-md-offset-4">
        <center><a href="#"><button onclick="next()" type="button" class="btn btn-lg btn-success" id="next_btn">下一步</button></a></center>	   
     </div>
   </div>

</div><!--conf_1-->

</form>


    <footer><hr />
      <p align="center">Model United Nations Association, Beihang University<br />&copy; 2014-2015 All Rights Reserved.</p>
    </footer>

</body>
</FONT>	
</html>