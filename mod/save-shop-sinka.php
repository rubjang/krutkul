<?
ob_start();
session_start();
header('Content-type: text/html; charset=utf-8');
include('../conf/connect.php');

$id_member=(int)$_REQUEST[id_member];
$id_shop=(int)$_REQUEST[id_shop];
$id_category=(int)$_REQUEST[id_category];
if(!isset($id_member) || !isset($id_shop)){
echo"<script>alert('เซสชั่นหมดอายุกรุณาล็อคอินใหม่');window.parent.SentEr();</script>";
exit();
}
sleep(1);
$image=$_FILES['image'];
$typeimage=$_FILES['image']['type'];
$title=trim($_REQUEST[title]);
$price=trim($_REQUEST[price]);
$s1=$_REQUEST[s1];
$message=trim($_REQUEST[editor1]);
if($image['name']==""){
echo"<script>alert('ต้องมีรูปภาพตัวอย่างสินค้าให้ลูกค้าชมด้วย');window.parent.SentEr();</script>";
exit();
}
if($image['size']!=0 && $typeimage!="image/jpg" && $typeimage!="image/jpeg" && $typeimage!="image/pjpeg" && $typeimage!="image/gif"){
echo"<script>alert('ไม่อนุญาติไฟล์ภาพนี้');window.parent.SentEr();</script>";
exit();
}
if($image['size']>100000){
echo"<script>alert('ขนาดไฟล์ภาพไม่ควรเกิน 100 KB');window.parent.SentEr();</script>";
exit();
}
if($title=="" || $price=="" || $message==""){
echo"<script>alert('ป้อนข้อมูลให้ครบ');window.parent.SentEr();</script>";
exit();
}
$nameimage="Sinka_".date("YdmHis").".jpg";
$ok=mysql_query("Insert into shop_sinka values('','$id_member','$id_shop','$id_category','$nameimage','".addslashes($title)."','$price','$s1','$message','')");
if($ok){
move_uploaded_file($image['tmp_name'],"../images2/image-shop/shop/$nameimage");
echo"<script>alert('ดำเนินการเรียบร้อย');window.parent.SentOK($id_shop,$id_category);</script>";
exit();
}else{
echo"<script>alert('ไม่สามารถดำเนินการได้');window.parent.SentEr();</script>";
exit();
}
?>