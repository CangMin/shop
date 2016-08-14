<?php
/**
 * 链接数据库
 * @return mysql
 */
function connect(){
    $link=mysqli_connect(DB_HOST,DB_USER,DB_PWD) or die("数据库链接失败Error:".mysqli_errno().":".mysqli_error());
    mysqli_set_charset($link,DB_CHARSET);
    mysqli_select_db($link,DB_DBNAME) or die("指定数据库打开失败");
    return $link;
}

/**
 * 完成记录插入操作
 * @param $table
 * @param $array
 * @return int
 */
function insert($table,$array){
    $keys=join(",",array_keys($array));
    $vals="'".join(",",array_values($array))."'";
    $sql="insert {$table}($keys) values({$vals})";
    mysqli_query($sql);
    return mysqli_insert_id();
}

/**
 * 记录的更新操作
 * @param $table
 * @param $array
 * @param null $where
 * @return bool|int
 */
function update($table,$array,$where=null){
    foreach($array as $key=>$val){
        if($str==null){
            $sep="";
        }else{
            $sep=",";
        }
        $str.=$sep.$key."='".$val."'";
    }
    $sql="update {$table} set {$str} ".($where==null?null:" where ".$where);
    $result=mysqli_query($sql);
    if($result){
        return mysqli_affected_rows();
    }else{
        return false;
    }
}

/**
 * 删除记录
 * @param $table
 * @param null $where
 * @return int
 */
function delete($table,$where=null){
    $where=$where==null?null:" where ".$where;
    $sql="delete from {$table} {$where}";
    mysqli_query($sql);
    return mysqli_affected_rows();
}

/**
 * 得到指定一条记录
 * @param $sql
 * @param int $result_type
 * @return array
 */
function fetchOne($sql,$result_type=MYSQLI_ASSOC){
    $con=connect();
    $result=mysqli_query($con,$sql);
    $row=mysqli_fetch_array($result,$result_type);
    return $row;
}

/**
 * 得到结果集中所有记录
 * @param $sql
 * @param int $result_type
 * @return array
 */
function fetchAll($sql,$result_type=MYSQLI_ASSOC){
    $sql=mysqli_query($sql);
    while(@$row=mysqli_fetch_array($result,$result_type)){
        $rows[]=$row;
    }
    return $rows;
}

/**
 * 得到结果集中的记录条数
 * @param $sql
 * @return int
 */
function getResultNum($sql){
    $result=mysqli_query($sql);
    return mysqli_num_rows($result);
}