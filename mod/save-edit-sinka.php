<?
ob_start();
session_start();
header('Content-type: text/html; charset=utf-8');
include('../conf/connect.php');

$id_member=(int)$_REQUEST[id_member];
$id_shop=(int)$_REQUEST[id_shop];
$id_category=(int)$_REQUEST[id_category];
$id_sinka=(int)$_REQUEST[id_sinka];
if(!isset($id_member)){
echo"<script>alert('เซสชั่นหมดอายุกรุณาล็อคอินใหม่');window.parent.SentEr2();</script>";
exit();
}
if(!isset($id_category) || !isset($id_shop) || !isset($id_sinka)){
echo"<script>alert('ไม่พบไอดีสินค้าหรือหมวดหมู่หรือร้านค้าในระบบ');window.parent.SentEr2();</script>";
exit();
}
sleep(1);
$category=trim($_REQUEST[category]);
$image=$_FILES['image'];
$typeimage=$_FILES['image']['type'];
$title=trim($_REQUEST[title]);
$price=trim($_REQUEST[price]);
$s1=$_REQUEST[s1];
$message=trim($_REQUEST[editor1]);

if($image['size']!=0 && $typeimage!="image/jpg" && $typeimage!="image/jpeg" && $typeimage!="image/pjpeg" && $typeimage!="image/gif"){
echo"<script>alert('ไม่อนุญาติไฟล์ภาพนี้');window.parent.SentEr2();</script>";
exit();
}
if($image['size']>100000){
echo"<script>alert('ขนาดไฟล์ภาพไม่ควรเกิน 100 KB');window.parent.SentEr2();</script>";
exit();
}
if($category=='0'){
echo"<script>alert('เลือกหมวดหมู่ด้วยค่ะ');window.parent.SentEr2();</script>";
exit();
}
if($title=="" || $price=="" || $message==""){
echo"<script>alert('ป้อนข้อมูลให้ครบ');window.parent.SentEr2();</script>";
exit();
}
$im=mysql_fetch_array(mysql_query("select image from shop_sinka where id_sinka='$id_sinka' and id_shop='$id_shop'"));

$up=mysql_query("Update shop_sinka set id_category='$category',title='".addslashes($title)."',price='$price',s1='$s1',message='$message' where id_sinka='$id_sinka' and id_member='$id_member'");
if($up){
move_uploaded_file($image['tmp_name'],"../images2/image-shop/shop/$im[image]");
echo"<script>alert('ดำเนินการเรียบร้อย');window.parent.SentOK2($id_shop,$id_category);</script>";
exit();
}else{
echo"<script>alert('ไม่สามารถดำเนินการได้');window.parent.SentEr2();</script>";
exit();
}


?>