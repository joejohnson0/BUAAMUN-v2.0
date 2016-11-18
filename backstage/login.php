
<!DOCTYPE html>
<html lang="en" class="no-js">

    <head>

        <meta charset="utf-8">
        <title>北航模联v2.0-后台登录</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <!-- CSS -->
        <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=PT+Sans:400,700'>
        <link rel="stylesheet" href="assets/css/reset.css">
        <link rel="stylesheet" href="assets/css/supersized.css">
        <link rel="stylesheet" href="assets/css/style.css">
        <link rel="shortcut icon" href="../images/buaamun_logo.JPG" />

        <script src="../js/sha1-min.js"></script>
        <script src="../js/bkstg_login.js"></script>


    </head>
<FONT style="FONT-FAMILY: 微软雅黑;">
    <body>

        <div class="page-container">
            <h1>北航模联v2.0 后台登录</h1>
            <form method="post" onSubmit="return login();">
                <input type="password" name="password" id="password" class="password" placeholder="请输入密码">
                <div class="alert alert-warning form-control" style="display: none">密码错误</div>
                <button type="submit">登录</button>
                <div class="error"><span>+</span></div>
            </form>

        <!-- Javascript -->
        <script src="assets/js/jquery-1.8.2.min.js"></script>
        <script src="assets/js/supersized.3.2.7.min.js"></script>
        <script src="assets/js/supersized-init.js"></script>
        <script src="assets/js/scripts.js"></script>

    </body>
</FONT>
</html>

