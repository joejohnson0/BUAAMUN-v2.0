<?php
header("Content-Type: text/html; charset=utf-8");
require_once("php/functions.php");
$db=db_connect();
?>

<!DOCTYPE html>
  <head>

   	<title>北航模联v2.0</title>
	<meta name="keywords" content="" />
	<meta name="description" content="" />
	<meta charset="utf-8">
	<meta name="viewport" content="initial-scale=1">
 	<link href='http://fonts.useso.com/css?family=Open+Sans:400italic,600italic,700italic,400,600,700,800' rel='stylesheet' type='text/css'> 

   	<link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css"> 
   	<link rel="stylesheet" href="css/templatemo_misc.css">
	  <link rel="stylesheet" href="css/templatemo_style.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/index_php.css">
    <link rel="shortcut icon" href="images/buaamun_logo.JPG" />
    <link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap-select/1.6.3/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300" />
    <link rel="stylesheet" href="countdown/css/styles.css" />
    <link rel="stylesheet" href="countdown/countdown/jquery.countdown.css" />
    
   	<!-- JavaScripts -->   

    <script src="js/jquery-1.11.1.min.js"></script>  <!-- lightbox -->
	  <script src="js/templatemo_custom.js"></script> <!-- lightbox -->    
    <script src="http://cdn.bootcss.com/bootstrap-select/1.6.3/js/bootstrap-select.min.js"></script>
    <script src="js/jquery.lightbox.js"></script>
    <script src="js/bootstrap-collapse.js"></script>
    <script src="http://libs.baidu.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
    <script src="js/index_php.js"></script>
    <script src="js/enroll.js"></script>
    <script src="countdown/countdown/jquery.countdown.js"></script>

</head>
<FONT style="FONT-FAMILY: 微软雅黑;">
  <body>
  <!-- menu start -->
        <div class="menu">
        <div class="container">
    	<div class="row">
			<div class="templatemo_topwrapper shadow">
            	<div class="col-sm-4">
                	<div class="templatemo_webtitle"><FONT style="FONT-FAMILY: 微软雅黑;">北航模联   </FONT><span>BUAA MUN</span></div>
                </div>
                <div class="col-sm-8">
                	<nav class="navbar navbar-default" role="navigation">
          <div class="container-fluid"> 
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"><span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span></button>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div id="top-menu">
              <div class="collapse navbar-collapse main_menu" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                  <li><a class="show-1 templatemo_home" href="#"><span class="fa fa-home"></span>主页</a></li>
                  <li><a class="show-1 templatemo_page2" href="#"><span class="fa fa-picture-o"></span>内部办公应用</a></li>
                  <li><a class="show-1 templatemo_page3" href="#"><span class="fa fa-users"></span>2015北航模联大会</a></li>
                  <li><a class="show-1 templatemo_page4" href="#"><span class="fa fa-envelope"></span>相关资料信息</a></li>
                </ul>
              </div>
            </div>
            <!-- /.navbar-collapse --> 
          </div>
          <!-- /.container-fluid --> 
        </nav>
                </div>
            </div>
   	  </div>
      </div>
      </div>
        <!-- menu end -->
    <div id="menu-container">  
    <div class="content homepage" id="menu-1">  
  	<div class="container">
        <!-- home start -->
        <div class="row">
        <div class="templatemo_homewrapper shadow">
        	<div class="templatemo_hometop_bg">
            <!--左侧logo-->
            	<div class="col-md-6">
                <div class="templatemo_hometop_title">北京航空航天大学模拟联合国协会</div>
                <div class="templatemo_hometop_subtitle">Model United Nations Association</div>
            	<div class="templemo_hometop_img"><img src="images/bhmun.png" /></div>
            </div>
            <!--左侧logo-->
            <!--右侧通知-->
           <div class="col-md-6">             
                <div class="col-md-6 col-md-offset-12"></div><!--占位，右对齐-->
                <div class="templatemo_hometop_title">距离<br /><br />第三届北京航空航天大学<br /><br />模拟联合国大会(BUAAMUN2015)<br /><br />开幕 还有<br /></div>
                <div id="countdown"></div>
                <div class="templatemo_hometop_title"><br />更多精彩 敬请期待……</div>

            </div>

            <div class="clear"></div>
            </div>
        </div>
        </div>
        
        <div class="clear"></div>
        <div class="row">
        	<div class="templatemo_home_bot shadow">            
            	<div class="col-md-12 gradient padd-top20">
                <div class="col-md-12"><div class="templatemo_hometop_title"><FONT style="FONT-FAMILY: 微软雅黑;">通知与公告</FONT></div></div>
                <div class="col-md-12 col-md-offset-12"></div>
                <div class="col-md-12">

<?php
$result = $db->query("SELECT * FROM announcement ORDER BY id DESC");
while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
?>
                  <div class="panel panel-primary">
                     <div class="panel-heading">
                        <h3 class="panel-title">
                           <?php echo $row['title']; ?>
                        </h3>
                     </div>
                     <div class="panel-body">
                        <?php echo $row['title']; ?>
                     </div>
                  </div>
<?php
}
?>
                       <div class="panel panel-primary">
                     <div class="panel-heading">
                        <h3 class="panel-title">
                           关于2015北航模联大会开放注册的公告
                        </h3>
                     </div>
                     <div class="panel-body">
                         <p><i>（我们建议您使用电脑浏览本网站及进行注册，建议您使用Firefox浏览器，强烈不推荐您使用IE。）</i></p>
                        <p>2015北航模联大会代表注册进行中。本届大会注册使用网上注册方式，请在顶部导航条选择“2015北航模联大会”进入注册页面。</p>
            <p>校外代表与校内代表分别注册。</p>
          <p>1.校外代表</p>
            <p>&nbsp;&nbsp;请各高校模联社团指定一名负责人，作为高校代表团管理员。</p>
            <p>&nbsp;&nbsp;管理员请在网页右上角点击“注册”，填写完整信息，注册本校代表团。</p>
            <p>&nbsp;&nbsp;注册完毕后即可在网页右上角点击“登录”进入代表注册页面。在页面左上角“代表注册”处选择“添加新的代表”并填写相应信息，即可添加代表。请注意，一旦确认报名，所有信息均无法更改。</p>
          <p>2.校内代表</p>
            <p>&nbsp;&nbsp;请在右上角点击“北航校内代表报名通道”进入报名，填写完整信息并提交即完成报名。</p>
          <p>3.报名阶段结束后，北航模联组委会将通过您预留的邮箱与您联系，进行缴费与席位分配，请确保您填写的所有联系方式合法有效。</p>
                     </div>
                  </div>
                    
                  <a href="#"><div class="templatemo_hometop_more blue">更多通知</div></a>

                </div>

                </div>
            </div>
        </div>
        <!-- home end -->
   </div>
   <div class="copyrights">Collect from <a href="http://www.cssmoban.com/"  title="网站模板">网站模板</a></div>
   </div>
            <!-- gallery start -->
            <div class="content gallery" id="menu-2">
            <div class="container">
            	<div class="row gradient templatemo_gallery_wrapper">

                <div id="office_panel"><!--替换内容-->

                <div class="templatemo_hometop_title"><center>北航模联办公系统</center></div>
                	
                <div class="clear"></div>

                <div class="row">
                  
                  <div class="templatemo_home_mid shadow">                        
                            <div class="col-xs-6 col-md-offset-12"></div>
                            <div class="col-md-4 templatemo_box gradient">
                                <div class="boxsub1">
                                    <div class="boxsub2"><img src="images/templatemo_icon_watch.png" alt="templatemo watch">
                                 
                                 <div class="templatemo_home_midheader">招新报名</div>
                                 <div class="templatemo_home_midtext">进入填写个人信息</div>
                                 <a href="#"><div class="templatemo_readmore gradient" id="enroll_button">点击进入</div></a>
                                  </div>
                                </div>
                            </div>
                            <div class="col-md-4 templatemo_box gradient">
                                <div class="boxsub1">
                                    <div class="boxsub2">
                                    <img src="images/templatemo_icon_bay.png" alt="templatemo bay">
                                     <div class="templatemo_home_midheader">参会报名</div>
                                     <div class="templatemo_home_midtext">报名参加模联会议</div>
                                     <a href="#"><div class="templatemo_readmore gradient" id="conference_button">点击进入</div></a>
                                  </div>
                                 </div>
                            </div>
                            <div class="col-md-4 templatemo_box_last gradient">
                                <div class="boxsub1">
                                <div class="boxsub2">
                                <img src="images/templatemo_icon_search.png" alt="templatemo search">
                                 <div class="templatemo_home_midheader">后台管理</div>
                                 <div class="templatemo_home_midtext">网站后台管理系统</div>
                                 <a href="backstage/login.php"><div class="templatemo_readmore gradient">点击进入</div></a>
                                 </div>
                                 </div>
                            </div>
                  
                    </div>
                    </div>

                </div><!--替换内容-->
                
              </div>
            </div>
            </div>
            <!-- gallery end -->
            <!-- about start -->
            <div class="clear"></div>
            <div class="content about" id="menu-3">
            <div class="container">
            	<div class="row templatemo_about_wrapper">
                	<div class="col-md-12 gradient">
                    	<div class="templatemo_about">
                    	<div class="templatemo_about_title">欢迎来到2015北京航空航天大学模拟联合国大会!</div>
                        <div class="templatemo_about_subtitle">Welcome to BUAA Model United Nations Conference 2015!</div>
                          <p>注册说明：</p>
                            <p>点击下方按钮进入注册页面后进行如下操作——</p>
          <p>1.校外代表</p>
            <p>&nbsp;&nbsp;请各高校模联社团指定一名负责人，作为高校代表团管理员。</p>
            <p>&nbsp;&nbsp;管理员请在网页右上角点击“注册”，填写完整信息，注册本校代表团。</p>
            <p>&nbsp;&nbsp;注册完毕后即可在网页右上角点击“登录”进入代表注册页面。在页面左上角“代表注册”处选择“添加新的代表”并填写相应信息，即可添加代表。请注意，一旦确认报名，所有信息均无法更改。</p>
          <p>2.校内代表</p>
            <p>&nbsp;&nbsp;请在右上角点击“北航校内代表报名通道”进入报名，填写完整信息并提交即完成报名。</p>
          <p>3.报名阶段结束后，北航模联组委会将通过您预留的邮箱与您联系，进行缴费与席位分配，请确保您填写的所有联系方式合法有效。</p>
                          <p><a class="btn btn-primary btn-lg" role="button" href="conference/">进入2015北航模联大会网页</a></p>
                      </div>
               	  </div>
                </div>
                <div class="row">                
                      <div class="col-md-12 templatemo_who">
                      		<div class="templatemo_about_title">2015北京航空航天大学模拟联合国大会邀请函</div>
                            <div class="templatemo_about_text">
                            	<div class="row">
                                <p align="left">尊敬的贵校模联同仁：</p>
                                <p align="left">您好！</p>
                                <p align="left">第三届北京航空航天大学模拟联合国大会将于2015年4月25日至26日举办。在此，北航模联诚挚邀请您参加本次会议。</p>
                                <p align="left">北京航空航天大学是新中国第一所航空航天高等学府。学校学科繁荣，特色鲜明；开放交融，传承创新。“尚德务实、求真拓新”的办学理念，是学校今后办学和发展的基本理念。“德才兼备、知行合一”的校训，是北航师生广泛认同的道德准则基础。“艰苦朴素、勤奋好学、全面发展、勇于创新”的校风是北航几代人努力培育的结果，是学校精神面貌的具体体现，也是学校综合实力和学校凝聚力的重要组成部分。北航一直是国家重点建设的高校，首批进入“211工程”，2001年进入“985工程”，经过六十年的建设与发展，学校基本形成了研究型大学的核心竞争力，内在凝聚力和国内外影响力得到显著提升，跻身国内高水平大学的第一方阵。</p>
                                <p align="left">模拟联合国于20世纪90年代后期引入中国，近些年来，模联活动更是如火如荼地在全国开展，北航学子也积极活跃于各大高校的模联会场。本次北京航空航天大学模拟联合国大会旨在为大家提供交流与学习平台，开阔国际视野，激发领袖才能，锻炼沟通能力。我们将会议的学术水平和学术质量作为我们的最高追求，为各位代表提供一个学术至上的会议体验，搭建一个展示代表学术风采的舞台。</p>
                                <p align="left">扬帆远方，筑梦北航。在这春和景明的日子里，北航模联将竭力为您呈现一场精彩纷呈的模联盛宴。2015年4月25日至26日，北航第三届模拟联合国大会期待与您相聚！</p>
                                <p align="right">北京航空航天大学模拟联合国协会</p>
                                <p align="right">2015年2月</p>                                
                              </div>
                            </div>
                      </div>
                
                
                </div>
            </div>
            </div>
            <!-- about end -->
            <!-- contact start -->
            <div class="content contact" id="menu-5">
            <div id="menu-4" class="container">
            	<div class="row gradient templatemo_contact_wrapper">

                  <div class="col-md-12 gradient">
                      <div class="templatemo_about">
                      <div class="templatemo_about_title">Webpage Under Construction……</div>
<!--                        <div class="templatemo_about_subtitle">DUIS SEDDIO SIT AMETIONAL NIBOR</div>
                      <p>This is <span class="bluetext">free website template</span> from <span class="redtext">templatemo</span>. Snec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio. Sed non  mauris vitae erat consequat auctor eu in elit. Class aptent taciti sociosqu ad litora torquent per conubia nostra.                       </p>
                      <p> Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit.</p>
                      <p>Sed non  mauris vitae erat consequat auctor eu in elit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Mauris in erat justo. Nullam ac urna eu felis dapibus condimentum sit amet a augue. Sed non neque elit. Sed ut imperdiet nisi. Proin condimentum fermentum nunc. Etiam pharetra, erat sed fermentum feugiat, velit mauris egestas quam, ut aliquam massa nisl quis neque. Suspendisse in orci enim. </p>
                      </div>
                  </div>
                </div>
                <div class="row">                
                      <div class="col-md-12 templatemo_who">
                          <div class="templatemo_about_title">WHO WE ARE?</div>
                            <div class="templatemo_about_text">
                              <p>Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio. Duis sed odio  nec tellus a odio tincidunt asit amet.</p>
                                <div class="templatemo_about_text_image">
                                  <img src="images/templatemo_team01.jpg" alt="templatemo team 1">
                                    <div class="clear"></div>
                                    <div class="name">TRACY</div>
                                    <div class="post">Web Designer</div>
                                </div>
                                <div class="templatemo_about_text_image">
                                  <img src="images/templatemo_team02.jpg" alt="templatemo team 2">
                                    <div class="clear"></div>
                                    <div class="name">JULIA</div>
                                    <div class="post">JS Developer</div>
                                </div>
                                <div class="templatemo_about_text_image">
                                  <img src="images/templatemo_team03.jpg" alt="templatemo team 3">
                                    <div class="clear"></div>
                                    <div class="name">LINDA</div>
                                    <div class="post">Manager</div>
                                </div>
                            </div>
                      </div>
                </div>
                <div class="row gradient">
                  <div class="col-md-4">
                      <div class="templatemo_bot_box">
                          <div class="title">ENENAN SOCITUE</div>
                            <div class="subtitle">SIT AMET NIBH VULPUTATE CURSUS</div>
                            <p>Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet.</p>
              <p>Morbi accumsan ipsum velit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris.</p>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="templatemo_bot_box">
                          <div class="title">TELLUSA ODIO ASIT</div>
                            <div class="subtitle">MORBI ACCUMASN IPSUM VALIT</div>
                            <ul>
                              <li>Aenean sollicitudin</li>
                              <li>Lorem quis bibendum auctor</li>
                              <li>Risi elit consequat ipsum</li>
                              <li>Dnec sagittis sem nibhid</li>
                              <li>Duis sed odio sit amet</li>
                              <li>Morbi accumsan consequat</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-4">
                      <div class="templatemo_bot_box">
                          <div class="title">SAGITTIS SEM NIB</div>
                            <div class="subtitle">DUIS SED ODIO SIT AMET NIBH</div>
                            <ul>
                              <li>Aenean sollicitudin</li>
                              <li>Lorem quis bibendum auctor</li>
                              <li>Risi elit consequat ipsum</li>
                              <li>Dnec sagittis sem nibhid</li>
                              <li>Duis sed odio sit amet</li>
                              <li>Morbi accumsan consequat</li>
                            </ul>
                      </div>
                    -->
            </div>
          
                  
                </div>
            </div>
            </div>
            <!-- contact end -->
			</div>   
                     
        <!-- footer start -->
        <div class="clear"></div>
            
		<div class="container">
        	<div class="row">
            	<div class="templatemo_footer">
                
            		<div class="col-md-12"><center>Model United Nations Association, Beihang University<br />&copy; 2014-2015 All Rights Reserved.</center></div>
                    <div class="clear"></div>
                    
                </div>
            </div>
		</div>
        	<!-- footer end -->
  </body>
</FONT>
</html>