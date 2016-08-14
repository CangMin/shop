<?php
/**
 * 弹窗信息函数
 * @param $mes
 * @param $url
 */
function alertMes($mes,$url){
    echo "<script>alert('{$mes}');</script>";
    echo "<script>window.location='{$url}';</script>";
}