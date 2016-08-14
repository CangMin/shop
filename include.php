<?php
header("content-type:text/html;charset=utf-8");//设置字符编码类型,防止输出乱码
session_start();//要删除其他文件的session_start,否则不绘制验证码
define("ROOT",dirname(__FILE__));//定义当前文件所在目录为根路径
//设置 include_path 配置选项
set_include_path(".".PATH_SEPARATOR.ROOT."/lib".PATH_SEPARATOR.ROOT."/core".PATH_SEPARATOR.ROOT."/configs".PATH_SEPARATOR.get_include_path());
require_once 'string.func.php';
require_once 'image.func.php';
require_once 'configs.php';
require_once 'mysql.func.php';
require_once 'common.func.php';
require_once 'admin.inc.php';