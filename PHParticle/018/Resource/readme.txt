==========================================================================================================================
1.文件说明
==========================================================================================================================
msyh.ttf          字体文件( 微软雅黑体 )
shuiyin_font.php  添加文字水印程序php文件





==========================================================================================================================
2.所用到的函数
==========================================================================================================================
(1).file_get_contents 
将整个文件读入一个字符串
string file_get_contents ( string $filename [, bool $use_include_path [, resource $context [, int $offset [, int $maxlen]]]] )

和 file() 一样，只除了 file_get_contents() 把文件读入一个字符串。将在参数 offset 所指定的位置开始读取长度为 maxlen 的内容。如果失败，file_get_contents() 将返回 FALSE。 file_get_contents() 函数是用来将文件的内容读入到一个字符串中的首选方法。
(2).imagecreatefromstring
从字符串中的图像流新建一图像
resource imagecreatefromstring ( string $image )
imagecreatefromstring() 返回一个图像标识符，其表达了从给定字符串得来的图像。图像格式将自动检测，只要 PHP 支持：JPEG，PNG，GIF，WBMP 和 GD2。成功则返回图像资源，如果图像格式不支持，数据不是认可的格式，或者图像已损坏则返回 FALSE。


