<?
ob_start();
session_start();
header('Content-type: text/html; charset=utf-8');
include('../conf/connect.php');

$id_shop=(int)$_REQUEST[id_shop];
$id_category=(int)$_REQUEST[id_category];
$id_sinka=(int)$_REQUEST[id_sinka];

if(!isset($id_shop) || !isset($id_category) || !isset($id_sinka)){
echo"<script>alert('ไม่พบไอดีนี้ในระบบ!!');</script>";
exit();
}

$im=mysql_fetch_array(mysql_query("select image from shop_sinka where id_sinka='$id_sinka' and id_shop='$id_shop'"));
$del=mysql_query("Delete From shop_sinka where id_sinka='$id_sinka' and id_shop='$id_shop'");
if($del){
@unlink("../images2/image-shop/shop/$im[image]");
echo"<script>alert('ลบข้อมูลเรียบร้อย');window.parent.compelete($id_shop,$id_category)</script>";
exit();
}else{
echo"<script>alert('ไม่สามารถลบข้อมูลได้!!');</script>";
exit();
}
?>
