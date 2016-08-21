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
    $con=connect();//获取数据库连接对象
    $keys=join(",",array_keys($array));
    $vals="'".join("','",array_values($array))."'";//注意分隔符为两个单引号加一逗号
    $sql="insert into {$table}($keys) values({$vals})";
    mysqli_query($con,$sql);
    return mysqli_insert_id($con);
}

/**
 * 记录的更新操作
 * @param $table
 * @param $array
 * @param null $where
 * @return bool|int
 */
function update($table,$array,$where=null){
    $con=connect();
    foreach($array as $key=>$val){
        if(@$str==null){
            $sep="";
        }else{
            $sep=",";
        }
        @$str.=$sep.$key."='".$val."'";//@作用是去掉$str未定义Notice
    }
    $sql="update {$table} set {$str} ".($where==null?null:" where ".$where);
    $result=mysqli_query($con,$sql);
    if($result){
        return mysqli_affected_rows($con);
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
    $con=connect();
    $where=$where==null?null:" where ".$where;
    $sql="delete from {$table} {$where}";
    mysqli_query($con,$sql);
    return mysqli_affected_rows($con);
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
    $con=connect();
    $result=mysqli_query($con,$sql);
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