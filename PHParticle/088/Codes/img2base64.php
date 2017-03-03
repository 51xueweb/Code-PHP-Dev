<?php
$img = './Images/source.jpg';//图片源文件
$base64_img = base64EncodeImage($img);//调用函数

echo "<center>";
echo "<h3>"."要转换的图片："."<h3/>"."<br />";
echo '<img src="' . $base64_img . '" />'.'<br />';
echo "<h3>"."转换为base64数据流结果如下："."<h3/>"."<br />";
echo "<textarea cols='120' rows='20'>$base64_img</textarea>";
echo "</center>";

//转换为base64数据流的函数
function base64EncodeImage ($image_file) {
  $base64_image = '';
  $image_info = getimagesize($image_file);
  $image_data = fread(fopen($image_file, 'r'), filesize($image_file));
  $base64_image = 'data:' . $image_info['mime'] . ';base64,' . chunk_split(base64_encode($image_data));
  return $base64_image;
}
?>
