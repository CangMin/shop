<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>登陆</title>
<link type="text/css" rel="stylesheet" href="/admin/styles/reset.css">
<link type="text/css" rel="stylesheet" href="/admin/styles/main.css">

</head>

<body>
<div class="loginBox">
	<div class="login_cont">
		<ul class="login">
			<li class="l_tit">管理员帐号</li>
			<li class="mb_10"><input type="text" placeholder="请输入管理员帐号" class="login_input user_icon"></li>
			<li class="l_tit">密码</li>
			<li class="mb_10"><input type="password" class="login_input user_icon"></li>
			<li class="l_tit">验证码</li>
			<li class="mb_10"><input type="text" name="verify" class="login_input user_icon"></li>
			<img src="getVerify.php" alt="">
            <li class="autoLogin"><input type="checkbox" id="a1" class="checked"><label for="a1">自动登陆</label></li>
            <li><input type="submit" value="" class="login_btn"></li>
        </ul>

	</div>
</div>
</body>
</html>
