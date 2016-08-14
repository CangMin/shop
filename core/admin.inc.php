<?php
/**
 * 检查管理员是否存在
 * @param $sql
 * @return array
 */
function checkAdmin($sql){
    return fetchOne($sql);
}