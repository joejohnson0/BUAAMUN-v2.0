
<!DOCTYPE html>
<html lang="en" class="no-js">

    <head>

        <meta charset="utf-8">
        <title>BUAAMUNC2015-登录</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <!-- CSS -->
        <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=PT+Sans:400,700'>
        <link rel="stylesheet" href="assets/css/reset.css">
        <link rel="stylesheet" href="assets/css/supersized.css">
        <link rel="stylesheet" href="assets/css/style.css">

        <script src="../js/sha1-min.js"></script>
        <script src="../js/munc_login.js"></script>


    </head>
<FONT style="FONT-FAMILY: 微软雅黑;">
    <body>

        <div class="page-container">
            <h1>2015北航模联</h1>
            <form onSubmit="return login();" method="post">
                <input type="text" name="username" id="username" class="username" placeholder="登录名：校名(外校) / 学号(本校)">
                <input type="password" name="password" id="password" class="password" placeholder="密码">
                <button type="submit">登录</button>
                <div class="error"><span>+</span></div>
            </form>
            <div class="connect">
                <p><br /></p>
            </div>
        </div>
        <div align="center">还没有注册？<a href="register.php">注册</a></div>



        <!-- Javascript -->
        <script src="assets/js/jquery-1.8.2.min.js"></script>
        <script src="assets/js/supersized.3.2.7.min.js"></script>
        <script src="assets/js/supersized-init.js"></script>
        <script src="assets/js/scripts.js"></script>

    </body>
</FONT>
</html>

