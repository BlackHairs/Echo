<?php 
header('Content-type:text/html;charset=utf-8');
if(isset($_POST["urls"])){
	$base64_image_content = $_POST["urls"];
}else{
	$base64_image_content= '';
}

//匹配出图片的格式
if (preg_match('/^(data:\s*image\/(\w+);base64,)/', $base64_image_content, $result)){
$type = $result[2];
$new_file = "img/".date('Ymd',time())."/";
if(!file_exists($new_file))
{
//检查是否有该文件夹，如果没有就创建，并给予最高权限
mkdir($new_file, 0700);
}

$img = str_replace('data:image/png;base64,', '', $base64_image_content);
$img = str_replace(' ', '+', $img);
$new_file = $new_file.time().".{$type}";
// img/20180424/1524551275.png
if (file_put_contents($new_file, base64_decode($img))){
echo $new_file;
}else{
echo '新文件保存失败';
}

}
?>