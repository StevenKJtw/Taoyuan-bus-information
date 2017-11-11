<?php

/*   網站驗證碼程序
 *   運行環境： PHP5.0.18 下調試通過
*   需要 gd2 圖形庫支持（PHP.INI中 php_gd2.dll開啟）
*   
*/

//隨機生成一個4位數的數字驗證碼
$num="";
for($i=0;$i<4;$i++){
	$num .= rand(0,9);
}
//4位驗證碼也可以用rand(1000,9999)直接生成
//將生成的驗證碼寫入session，備驗證頁面使用
Session_start();
$_SESSION["check"] = $num;
//創建圖片，定義顏色值
Header("Content-type: image/PNG");
srand((double)microtime()*1000000);
$im = imagecreate(60,20);
$black = ImageColorAllocate($im, 0,0,0);
$gray = ImageColorAllocate($im, 200,200,200);
imagefill($im,0,0,$gray);

//隨機繪制兩條虛線，起干擾作用
$style = array($black, $black, $black, $black, $black, $gray, $gray, $gray, $gray, $gray);
imagesetstyle($im, $style);
$y1=rand(0,20);
$y2=rand(0,20);
$y3=rand(0,20);
$y4=rand(0,20);
imageline($im, 0, $y1, 60, $y3, IMG_COLOR_STYLED);
imageline($im, 0, $y2, 60, $y4, IMG_COLOR_STYLED);

//在畫布上隨機生成大量黑點，起干擾作用;
for($i=0;$i<80;$i++)
{
imagesetpixel($im, rand(0,60), rand(0,20), $black);
}
//將四個數字隨機顯示在畫布上,字符的水平間距和位置都按一定波動範圍隨機生成
$strx=rand(3,8);
for($i=0;$i<4;$i++){
$strpos=rand(1,6);
	imagestring($im,5,$strx,$strpos, substr($num,$i,1), $black);
	$strx+=rand(8,12);
}
ImagePNG($im);
ImageDestroy($im);
?>

