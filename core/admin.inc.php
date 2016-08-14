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
    if($_SESSION['adminId']==""){
        alertMes("请先登录","login.php");
    }
}