<?php
require_once '../include.php';
$act=$_REQUEST['act'];//获取操作类型
$id=$_REQUEST['id'];//获取id,根据id确定编辑内容
if($act=="logout"){
    logout();//注销管理员
}elseif($act=="addAdmin"){
    $mes=addAdmin();//添加管理员
}elseif($act=="editAdmin"){
    $mes=editAdmin($id);
}elseif($act="delAdmin"){
    $mes=delAdmin($id);
}
?>
<!doctype html>
<html lang="zh">
<head>
    <meta charset="UTF-8">
    <title>数据操作后返回信息</title>
</head>
<body>
<?php
if($mes){
    echo $mes;
}
?>
</body>
</html>
