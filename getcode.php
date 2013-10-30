<?php
/* 
$width :图片宽 
$height : 图片高 
$size : 字符大小（1-5） 
$length : 字符串长度 
$sname :SESSION名称（供下一步验证之用） 
*/
session_start();
header("Content-Type:image/gif");
createValidatedCode(70,16,4,4,"code");
function createValidatedCode($width,$height,$size,$length,$sname="code")
{
	$const="ABCDEFGHIJKLMNOPQRSTUVWXYZ";
	$code = ""; //实际的验证码
	$drawcode = ""; //显示在图片中的验证码
	for($i=0;$i<$length;$i++){
		$singlecode = substr($const,rand(0,26),1);
		$code .= $singlecode;
		$drawcode .= $singlecode." "; 
	}
	$drawcode=trim($drawcode);
	$_SESSION[$sname]=$code;
	//echo $code.$drawcode;
	$img = imagecreate($width,$height);
	$red = ImageColorAllocate($img,255,0,0);
	$white = ImageColorAllocate($img,255,255,255);
	$gray = ImageColorAllocate($img,200,200,200);
	imagefill($img,0,0,$white);
    imagestring($img,$size,5,2,$drawcode,ImageColorAllocate($img,rand(0,255),rand(0,255),rand(0,255)));
    for($i=0;$i<100;$i++){
		//imagesetpixel($img,rand(0,$width-1),rand(0,$height-1),$gray);
	}
	ImageGIF($img);
	ImageDestroy($img);
}
?> 
