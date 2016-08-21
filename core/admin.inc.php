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

/**
 * 添加管理员
 * @return string
 */
function addAdmin(){
    $arr=$_POST;
    $arr['password']=md5($_POST['password']);//对提交的密码加密
    if(insert("shop_admin",$arr)){
        $mes="添加成功!<br/><a href='addAdmin.php'>继续添加</a>|<a href='listAdmin.php'>查看管理员列表</a>";
    }else{
        $mes="添加失败!<br/><a href='addAdmin.php'>重新添加</a>";
    }
    return $mes;
}

/**
 * 得到所有管理员
 * @return array
 */
function getAllAdmin(){
    $sql="select id,username,email from shop_admin";
    $rows=fetchAll($sql);
    return $rows;
}

/**
 * 编辑管理员
 * @param $id
 * @return string
 */
function editAdmin($id){
    $arr=$_POST;
    $arr['password']=md5($_POST['password']);
    if(update('shop_admin',$arr,"id={$id}")){
        $mes="编辑成功!<br/><a href='listAdmin.php'>查看管理员列表</a>";
    }else{
        $mes="编辑失败!<br/><a href='listAdmin.php'>请重新修改</a>";
    }
    return $mes;
}