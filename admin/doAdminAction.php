<?php
require_once '../include.php';
$act=$_REQUEST['act'];
if($act=="logout"){
    logout();//注销管理员
}elseif($act=="addAdmin"){
    $mes=addAdmin();//添加管理员
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
