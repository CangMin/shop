<?php
require_once '../include.php';
$username=$_POST['username'];
$password=md5($_POST['password']);
$verify=$_POST['verify'];//获取用户输入验证码
$verify1=$_SESSION['verify'];//获取session保存中的验证码
$autoFlag=$_POST['autoFlag'];//获取是否自动登录
if($verify==$verify1){
    $sql="select * from shop_admin where username='{$username}' and password='{$password}'";
    $row=checkAdmin($sql);
    if($row){
        //如果选了一周内自动登录
        if($autoFlag){
            setcookie("adminId",$row['id'],time()+7*24*3600);//将登录id保存在cookie一周
            setcookie("adminName",$row['username'],time()+7*24*3600);
        }
        $_SESSION['adminName']=$row['username'];
        $_SESSION['adminId']=$row['id'];
        alertMes("登录成功","index.php");
    }else{
        alertMes("登录失败,重新登录","login.php");
    }
}else{
    alertMes("验证码错误","login.php");
}