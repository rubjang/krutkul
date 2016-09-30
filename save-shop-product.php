<?
ob_start();
session_start();
header('Content-type: text/html; charset=utf-8');
include('config/connect.php');

$id_member=(int)$_REQUEST[id_member];
if(!isset($id_member))
{
  echo"<script>alert('เซสชั่นหมดอายุกรุณาล็อคอินใหม่');window.parent.SentEr();</script>";
  exit();
}
sleep(1);
$title=trim($_REQUEST[title]);
$message=trim($_REQUEST[message]);

$image1=$_FILES['image1'];
$image2=$_FILES['image2'];
$image3=$_FILES['image3'];
$image4=$_FILES['image4'];
$image5=$_FILES['image5'];

$typeimage=$_FILES['image']['type'];

if($image1['size'] > 2000000){echo"<script>alert('ภาพประกอบ 1 ขนาดไฟล์ห้ามเกิน 200 Kb');window.parent.SentEr();</script>";exit();}
if($image2['size'] > 2000000){echo"<script>alert('ภาพประกอบ 2 ขนาดไฟล์ห้ามเกิน 200 Kb');window.parent.SentEr();</script>";exit();}
if($image3['size'] > 2000000){echo"<script>alert('ภาพประกอบ 3 ขนาดไฟล์ห้ามเกิน 200 Kb');window.parent.SentEr();</script>";exit();}
if($image4['size'] > 2000000){echo"<script>alert('ภาพประกอบ 4 ขนาดไฟล์ห้ามเกิน 200 Kb');window.parent.SentEr();</script>";exit();}
if($image5['size'] > 2000000){echo"<script>alert('ภาพประกอบ 5 ขนาดไฟล์ห้ามเกิน 200 Kb');window.parent.SentEr();</script>";exit();}

$nameimage1="Post_C1_".date("dmYHis").".jpg"; if($image1['size']!=""){$img1=$nameimage1;}
$nameimage2="Post_C2_".date("dmYHis").".jpg"; if($image2['size']!=""){$img2=$nameimage2;}
$nameimage3="Post_C3_".date("dmYHis").".jpg"; if($image3['size']!=""){$img3=$nameimage3;}
$nameimage4="Post_C4_".date("dmYHis").".jpg"; if($image4['size']!=""){$img4=$nameimage4;}
$nameimage5="Post_C5_".date("dmYHis").".jpg"; if($image5['size']!=""){$img5=$nameimage5;}

$ok=mysql_query("Insert into shop_product values('','$id_member','".addslashes($title)."','$img1','$img2','$img3','$img4','$img5','$message','NOW()')");
if($ok)
{
  move_uploaded_file($image1['tmp_name'],"img/product/img1/$img1");
  move_uploaded_file($image2['tmp_name'],"img/product/img2/$img2");
  move_uploaded_file($image3['tmp_name'],"img/product/img3/$img3");
  move_uploaded_file($image4['tmp_name'],"img/product/img4/$img4");
  move_uploaded_file($image5['tmp_name'],"img/product/img5/$img5");

  echo"<script>alert('ดำเนินการเรียบร้อย');window.parent.SentOK2();</script>";
  exit();
}else{
  echo"<script>alert('ไม่สามารถดำเนินการได้');window.parent.SentEr2();</script>";
  exit();
}
?>
