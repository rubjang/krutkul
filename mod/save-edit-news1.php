<?
ob_start();
session_start();
header('Content-type: text/html; charset=utf-8');
include('../conf/connect.php');
date_default_timezone_set('Asia/Bangkok');

$id_member=(int)$_REQUEST[id_member];
$id_post=(int)$_REQUEST[id_post];
if(!isset($id_member) || !isset($id_post)){
echo"<script>alert('ไม่พบไอดีนี้ในระบบ');window.parent.SentEr();</script>";
exit();
}
sleep(1);
$category=trim($_REQUEST[category]);
$subcategory=trim($_REQUEST[subcategory]);
$title=trim($_REQUEST[title]);
//$subtitle=trim($_REQUEST[subtitle]);
$message=trim($_REQUEST[editor1]);
$price=trim($_REQUEST[price]);
$service=trim($_REQUEST[service]);
$send=trim($_REQUEST[send]);
//$s3=trim($_REQUEST[s3]);
$image=$_FILES['image'];
$image1=$_FILES['image1'];
$image2=$_FILES['image2'];
$image3=$_FILES['image3'];
$image4=$_FILES['image4'];
$image5=$_FILES['image5'];
$image6=$_FILES['image6'];

$typeimage=$_FILES['image']['type'];
$keyword1=trim($_REQUEST[keyword1]);
$keyword2=trim($_REQUEST[keyword2]);
$keyword3=trim($_REQUEST[keyword3]);
$keyword4=trim($_REQUEST[keyword4]);
$keyword5=trim($_REQUEST[keyword5]);
$tags1=trim($_REQUEST[tags1]);
$tags2=trim($_REQUEST[tags2]);
$tags3=trim($_REQUEST[tags3]);

if($image['size'] > 200000){echo"<script>alert('รูปภาพตัวอย่าง ขนาดไฟล์ห้ามเกิน 200 Kb');window.parent.SentEr();</script>";exit();}
if($image1['size'] > 200000){echo"<script>alert('ภาพประกอบ 1 ขนาดไฟล์ห้ามเกิน 200 Kb');window.parent.SentEr();</script>";exit();}
if($image2['size'] > 200000){echo"<script>alert('ภาพประกอบ 2 ขนาดไฟล์ห้ามเกิน 200 Kb');window.parent.SentEr();</script>";exit();}
if($image3['size'] > 200000){echo"<script>alert('ภาพประกอบ 3 ขนาดไฟล์ห้ามเกิน 200 Kb');window.parent.SentEr();</script>";exit();}
if($image4['size'] > 200000){echo"<script>alert('ภาพประกอบ 4 ขนาดไฟล์ห้ามเกิน 200 Kb');window.parent.SentEr();</script>";exit();}
if($image5['size'] > 200000){echo"<script>alert('ภาพประกอบ 5 ขนาดไฟล์ห้ามเกิน 200 Kb');window.parent.SentEr();</script>";exit();}
if($image6['size'] > 200000){echo"<script>alert('ภาพประกอบ 6 ขนาดไฟล์ห้ามเกิน 200 Kb');window.parent.SentEr();</script>";exit();}

$nameimage="Post_C0_".date("dmYHis").".jpg"; if($image['size']!=""){$nameimagex=$nameimage;}else{ $nameimagex = $oldimage;}
$nameimage1="Post_C1_".date("dmYHis").".jpg"; if($image1['size']!=""){$nameimagex1=$nameimage1;}else{ $nameimagex1 = $oldimage1;}
$nameimage2="Post_C2_".date("dmYHis").".jpg"; if($image2['size']!=""){$nameimagex2=$nameimage2;}else{ $nameimagex2 = $oldimage2;}
$nameimage3="Post_C3_".date("dmYHis").".jpg"; if($image3['size']!=""){$nameimagex3=$nameimage3;}else{ $nameimagex3 = $oldimage3;}
$nameimage4="Post_C4_".date("dmYHis").".jpg"; if($image4['size']!=""){$nameimagex4=$nameimage4;}else{ $nameimagex4 = $oldimage4;}
$nameimage5="Post_C5_".date("dmYHis").".jpg"; if($image5['size']!=""){$nameimagex5=$nameimage5;}else{ $nameimagex5 = $oldimage5;}
$nameimage6="Post_C6_".date("dmYHis").".jpg"; if($image6['size']!=""){$nameimagex6=$nameimage6;}else{ $nameimagex6 = $oldimage6;}

$today=mktime(date("H"),date("i"),date("s"),date("m"),date("d"),date("Y"));
$new_today=date("Y-m-d H:i:s",$today);


//$im=mysql_fetch_array(mysql_query("select image from post where id_post='$id_post'"));
$im=mysql_fetch_array(mysql_query("select * from post where id_post='$id_post'"));

$ok=mysql_query("Update shop_news1 set title='".addslashes($title)."',message='$message',price='$price',service='$service',send='$send',image='$nameimagex',image1='$nameimagex1',image2='$nameimagex2',image3='$nameimagex3',image4='$nameimagex4',image5='$nameimagex5',image6='$nameimagex6',keyword1='$keyword1',keyword2='$keyword2',keyword3='$keyword3',keyword4='$keyword4',keyword5='$keyword5',tags1='$tags1',tags2='$tags2',tags3='$tags3',image_new='$new_today' where id_post='$id_post'");
if($ok){

move_uploaded_file($image['tmp_name'],"../images/fileupload/img/$nameimagex"); // image
move_uploaded_file($image1['tmp_name'],"../images/fileupload/img1/$nameimagex1"); // image1
move_uploaded_file($image2['tmp_name'],"../images/fileupload/img2/$nameimagex2"); // image2
move_uploaded_file($image3['tmp_name'],"../images/fileupload/img3/$nameimagex3"); // image3
move_uploaded_file($image4['tmp_name'],"../images/fileupload/img4/$nameimagex4"); // image4
move_uploaded_file($image5['tmp_name'],"../images/fileupload/img5/$nameimagex5"); // image5
move_uploaded_file($image6['tmp_name'],"../images/fileupload/img6/$nameimagex6"); // image6


echo"<script>alert('ดำเนินการเรียบร้อย');
parent.location.href='index.php?ShowNews=News';	
</script>";
exit();
}else{
echo"<script>alert('ไม่สามารถดำเนินการได้');window.parent.SentEr();</script>";
exit();
}
?>