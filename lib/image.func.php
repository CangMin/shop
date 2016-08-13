<?php
require_once 'string.func.php';
//使用GD库做验证码
function verifyImage($type = 1, $length = 4, $pixel = 0, $line = 0, $sess_name = "verify")
{
    session_start();//开启session功能
//创建画布
    $width = 80;
    $height = 28;
    $image = imagecreatetruecolor($width, $height);//创建新的图像实例
    $white = imagecolorallocate($image, 255, 255, 255);
    $black = imagecolorallocate($image, 0, 0, 0);
//用填充矩形填充画布
    imagefilledrectangle($image, 1, 1, $width - 2, $height - 2, $white);
    $chars = buildRandomString($type, $length);//随机生成验证码
    $_SESSION[$sess_name] = $chars;//将验证码存入session
    $fontfiles = array("simkai.ttf", "simsun.ttc");//设置字体文件名
    for ($i = 0; $i < $length; $i++) {//遍历画出验证码
        $size = mt_rand(14, 18);//随机生成字体大小
        $angle = mt_rand(-15, 15);//随机生成角度
        $x = 5 + $i * $size;//随机生成x轴坐标
        $y = mt_rand(20, 26);//随机生成y轴坐标
        $fontfile = "../fonts/" . $fontfiles[mt_rand(0, count($fontfiles) - 1)];//读取字体文件名
        $color = imagecolorallocate($image, mt_rand(50, 90), mt_rand(80, 200), mt_rand(90, 180));//随机生成字体颜色
        $text = substr($chars, $i, 1);//截取随机生成的验证码
        imagettftext($image, $size, $angle, $x, $y, $color, $fontfile, $text);//画出验证码
    }
//填充干扰元素点
    if ($pixel) {
        for ($i = 0; $i < $pixel; $i++) {
            imagesetpixel($image, mt_rand(0, $width - 1), mt_rand(0, $height - 1), $black);//画点函数
        }
    }
//填充干扰元素线
    if ($line) {
        for ($i = 1; $i < $line; $i++) {
            $color = imagecolorallocate($image, mt_rand(50, 90), mt_rand(80, 200), mt_rand(90, 180));
            imageline($image, mt_rand(0, $width - 1), mt_rand(0, $height - 1), mt_rand(0, $width - 1), mt_rand(0, $height - 1), $color);//划线函数
        }
    }
    header("content-type:image/gif");//发送原生的 HTTP 头,设置输出文件为gif图片
    imagegif($image);//输出图象到浏览器或文件
    imagedestory($image);//销毁一图像
}

verifyImage(1,4,10,5);
?>