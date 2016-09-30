<?
ob_start();
session_start();
header('Content-type: text/html; charset=utf-8');
include('../conf/connect.php');
date_default_timezone_set('Asia/Bangkok');


sleep(1);
$id_post=(int)$_REQUEST[id_post];
if(isset($id_post)){
$im=mysql_fetch_array(mysql_query("select image from post where id_post='$id_post'"));
$del=mysql_query("Delete From post where id_post='$id_post'");
if($del){
@unlink("../images2/image-post/$im[image]");
echo"<script>alert('ลบข้อมูลเรียบร้อย');window.parent.compelete();</script>";
exit();
}else{
echo"<script>alert('ไม่สามารถลบข้อมูลได้');</script>";
exit();
}
}
else{
echo"<script>alert('ไม่พบไอดีนี้ในระบบ!!');</script>";
exit();
}

?>