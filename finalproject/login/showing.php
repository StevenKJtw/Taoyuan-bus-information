<?php

/*   �Wվ��C�a����
 *   �\�Эh���� PHP5.0.18 ���{ԇͨ�^
*   ��Ҫ gd2 �D�Ύ�֧�֣�PHP.INI�� php_gd2.dll�_����
*   
*/

//�S�C����һ��4λ���Ĕ�����C�a
$num="";
for($i=0;$i<4;$i++){
	$num .= rand(0,9);
}
//4λ��C�aҲ������rand(1000,9999)ֱ������
//�����ɵ���C�a����session������C���ʹ��
Session_start();
$_SESSION["check"] = $num;
//�����DƬ�����x�ɫֵ
Header("Content-type: image/PNG");
srand((double)microtime()*1000000);
$im = imagecreate(60,20);
$black = ImageColorAllocate($im, 0,0,0);
$gray = ImageColorAllocate($im, 200,200,200);
imagefill($im,0,0,$gray);

//�S�C�L�ƃɗl̓������ɔ_����
$style = array($black, $black, $black, $black, $black, $gray, $gray, $gray, $gray, $gray);
imagesetstyle($im, $style);
$y1=rand(0,20);
$y2=rand(0,20);
$y3=rand(0,20);
$y4=rand(0,20);
imageline($im, 0, $y1, 60, $y3, IMG_COLOR_STYLED);
imageline($im, 0, $y2, 60, $y4, IMG_COLOR_STYLED);

//�ڮ������S�C���ɴ������c����ɔ_����;
for($i=0;$i<80;$i++)
{
imagesetpixel($im, rand(0,60), rand(0,20), $black);
}
//���Ă������S�C�@ʾ�ڮ�����,�ַ���ˮƽ�g���λ�ö���һ�����ӹ����S�C����
$strx=rand(3,8);
for($i=0;$i<4;$i++){
$strpos=rand(1,6);
	imagestring($im,5,$strx,$strpos, substr($num,$i,1), $black);
	$strx+=rand(8,12);
}
ImagePNG($im);
ImageDestroy($im);
?>

