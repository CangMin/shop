<?php
require_once '../include.php';
checkLogined();//检测是否有管理员登录
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>后台管理首页</title>
    <link rel="stylesheet" href="styles/backstage.css">
</head>

<body>
<div class="head">
    <div class="logo fl"><a href="#"></a></div>
    <h3 class="head_text fr">电子商务后台管理系统</h3>
</div>
<div class="operation_user clearfix">
    <div class="link fl"><a href="#"></a><span>&gt;&gt;</span><a href="#">商品管理</a><span>&gt;&gt;</span>商品修改</div>
    <div class="link fr">
        <b>
            欢迎您
            <?php
            if(isset($_SESSION['adminName'])){
                echo $_SESSION['adminName'];
            }elseif(isset($_COOKIE['adminName'])){
                echo $_COOKIE['adminName'];
            }
            ?>
        </b>
        <a href="#" class="icon icon_i">首页</a><span></span><a href="#" class="icon icon_j">前进</a><span></span><a href="#" class="icon icon_t">后退</a><span></span><a href="#" class="icon icon_n">刷新</a><span></span><a href="doAdminAction.php?act=logout" class="icon icon_e">退出</a>
    </div>
</div>
<div class="content clearfix">
    <div class="main">
        <!--右侧内容-->
        <div class="cont">
            <div class="title">后台管理</div>
            <!--嵌套网页开始-->
            <iframe src="main.php" frameborder="0" name="mainFrame" width="100%" height="522"></iframe>
            <!--嵌套网页结束-->
        </div>
    </div>
    <!--左侧列表-->
    <div class="menu">
        <div class="cont">
            <div class="title">管理员</div>
            <ul class="mList">
                <li>
                    <h3><span>-</span>商品管理</h3>
                    <dl>
                        <dd><a href="#">商品修改</a></dd>
                        <dd><a href="#">商品分类</a></dd>
                    </dl>
                </li>
                <li>
                    <h3><span>+</span>订单管理</h3>
                    <dl>
                        <dd><a href="#">订单修改</a></dd>
                        <dd><a href="#">订单又修改</a></dd>
                        <dd><a href="#">订单总是修改</a></dd>
                        <dd><a href="#">测试内容你看着改</a></dd>
                    </dl>
                </li>
                <li>
                    <h3><span onclick="show('menu5','change5')" id="change5">+</span>管理员管理</h3>
                    <dl id="menu5" style="display:none;">
                        <dd><a href="addAdmin.php" target="mainFrame">添加管理员</a></dd>
                        <dd><a href="listAdmin.php" target="mainFrame">管理员列表</a></dd>
                    </dl>
                </li>
            </ul>
        </div>
    </div>

</div>
<script type="text/javascript">
    function show(num,change){
        var menu=document.getElementById(num);
        var change=document.getElementById(change);
        if(change.innerHTML=="+"){
            change.innerHTML="-";
        }else{
            change.innerHTML="+";
        }
        if(menu.style.display=='none'){
            menu.style.display='';
        }else{
            menu.style.display='none';
        }
    }
</script>
</body>
</html>