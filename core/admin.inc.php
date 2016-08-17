<?php
/**
 * 检查管理员是否存在
 * @param $sql
 * @return array
 */
function checkAdmin($sql){
    return fetchOne($sql);
}

/**
 * 检测是否有管理员登录
 */
function checkLogined(){
    if($_SESSION['adminId']==""&&$_COOKIE['adminId']==""){
        alertMes("请先登录","login.php");
    }
}

/**
 * 注销管理员
 */
function logout(){
    $_SESSION=array();
    if(isset($_COOKIE[session_name()])){
    	setcookie(session_name(),"",time()-1);
    }
    if(isset($_COOKIE['adminId'])){
    	setcookie("adminId","",time()-1);
    }
    if(isset($_COOKIE['adminName'])){
    	setcookie("adminName","",time()-1);
    }
    session_destroy();//销毁会话记录
    header("location:login.php");//跳转至登录页
}