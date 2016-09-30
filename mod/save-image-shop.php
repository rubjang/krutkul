<?
ob_start();
session_start();
header('Content-type: text/html; charset=utf-8');
include('../conf/connect.php');

$id_shop=(int)$_REQUEST[id_shop];
$id_member=(int)$_REQUEST[id_member];
if(!isset($id_member) || !isset($id_shop)){
echo"<script>alert('เซสชั่นหมดอายุหรือไม่พบไอดีนี้ในระบบ');window.parent.SentEr();</script>";
exit();
}
sleep(1);
$im=mysql_fetch_array(mysql_query("select image_shop,bg_shop,logo_shop from shop where id_shop='$id_shop' and id_member='$id_member'"));

$image_shop=trim($_REQUEST[image_shop]);
//image_shop
if($image_shop==1){
$image=$_FILES['image'];
$imagetype=$_FILES['image']['type'];
if($image['name']==""){
echo"<script>alert('กำหนดรูปภาพด้วย');window.parent.SentEr();</script>";
exit();
}
elseif($image['size']!=0 && $imagetype!="image/jpg" && $imagetype!="image/jpeg" && $imagetype!="image/pjpeg" && $imagetype!="image/gif"){
echo"<script>alert('ไม่อนุญาติไฟล์ภาพนี้!!');window.parent.SentEr();</script>";
exit();
}
elseif($image['size'] > 100000){
echo"<script>alert('ขนาดไฟล์ไม่ควรเกิน 100 Kb!!');window.parent.SentEr();</script>";
exit();
}
else{
	$ok=move_uploaded_file($image['tmp_name'],"../images2/image-shop/bg-logo-shop/$im[image_shop]");
	if($ok){
	echo"<script>alert('ดำเนินการเรียบร้อย');window.parent.SentOK();</script>";
	exit();
	}else{
	echo"<script>alert('ไม่สามารถดำเนินการได้');window.parent.SentEr();</script>";
	exit();
	}
}
}
//image_shop

//bg_shop
if($image_shop==2){
$image=$_FILES['image2'];
$imagetype=$_FILES['image2']['type'];
if($image['name']==""){
echo"<script>alert('กำหนดรูปภาพด้วย');window.parent.SentEr();</script>";
exit();
}
elseif($image['size']!=0 && $imagetype!="image/jpg" && $imagetype!="image/jpeg" && $imagetype!="image/pjpeg" && $imagetype!="image/gif"){
echo"<script>alert('ไม่อนุญาติไฟล์ภาพนี้!!');window.parent.SentEr2();</script>";
exit();
}
elseif($image['size'] > 50000){
echo"<script>alert('ขนาดไฟล์ไม่ควรเกิน 50 Kb!!');window.parent.SentEr2();</script>";
exit();
}
else{
	$ok=move_uploaded_file($image['tmp_name'],"../images2/image-shop/bg-logo-shop/$im[bg_shop]");
	if($ok){
	echo"<script>alert('ดำเนินการเรียบร้อย');window.parent.SentOK2();</script>";
	exit();
	}else{
	echo"<script>alert('ไม่สามารถดำเนินการได้');window.parent.SentEr2();</script>";
	exit();
	}
}
}
//bg_shop


//logo_shop
if($image_shop==3){
$image=$_FILES['image3'];
$imagetype=$_FILES['image3']['type'];
if($image['name']==""){
echo"<script>alert('กำหนดรูปภาพด้วย');window.parent.SentEr();</script>";
exit();
}
elseif($image['size']!=0 && $imagetype!="image/jpg" && $imagetype!="image/jpeg" && $imagetype!="image/pjpeg" && $imagetype!="image/gif"){
echo"<script>alert('ไม่อนุญาติไฟล์ภาพนี้!!');window.parent.SentEr3();</script>";
exit();
}
elseif($image['size'] > 100000){
echo"<script>alert('ขนาดไฟล์ไม่ควรเกิน 100 Kb!!');window.parent.SentEr3();</script>";
exit();
}
else{
	$ok=move_uploaded_file($image['tmp_name'],"../images2/image-shop/bg-logo-shop/$im[logo_shop]");
	if($ok){
	echo"<script>alert('ดำเนินการเรียบร้อย');window.parent.SentOK3();</script>";
	exit();
	}else{
	echo"<script>alert('ไม่สามารถดำเนินการได้');window.parent.SentEr3();</script>";
	exit();
	}
}
}
//logo_shop
?>