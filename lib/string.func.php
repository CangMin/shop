<?php
function buildRandomString($type=1,$length=4){
	if($type == 1){
		$chars = join("",range(0,9));//将随机产生0-9的一个数组的值转化为字符串
	}elseif($type == 2){
		$chars = join("",array_merge(range("a","z"),range("A","Z")));//array_merge()合并一个或多个数组
	}elseif($type == 3){
		$chars = join("",array_merge(range("a","z"),range("A","Z"),range(0,9)));
	}
	if($length > strlen($chars)){
		exit("字符串长度不够");
	}
	$chars = str_shuffle($chars);//随机打乱一个字符串
	return substr($chars,0,$length);
}