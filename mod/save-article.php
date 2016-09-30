<?
ob_start();
session_start();
header('Content-type: text/html; charset=utf-8');
include('../conf/connect.php');
date_default_timezone_set('Asia/Bangkok');

$username=$_REQUEST[username];
if(isset($username)){
sleep(1);
$article=trim($_REQUEST[article]);
$title=trim($_REQUEST[title]);
$credit=trim($_REQUEST[credit]);
$editor1=trim($_REQUEST[editor1]);
$image=$_FILES['image'];
$typeimage=$_FILES['image']['type'];

if($article==0){
echo"<script>alert('เลือกหมวดหมู่ด้วย');window.parent.SentEr();</script>";
exit();
}
if($title=="" || $editor1==""){
echo"<script>alert('ป้อนข้อมูลด้วย');window.parent.SentEr();</script>";
exit();
}
if($image['size']!=0 && $typeimage!="image/jpg" && $typeimage!="image/jpeg" && $typeimage!="image/pjpeg" && $typeimage!="image/gif"){
echo"<script>alert('ไฟล์ภาพนี้ไม่อนุญาติ!!');window.parent.SentEr();</script>";
exit();
}
$ip=$_SERVER['REMOTE_ADDR'];
$nameimage="article_".date("YdmHis").".jpg";
$ok=mysql_query("Insert into tb_article value('','$article','".addslashes($title)."','$credit','$nameimage','$editor1',NOW(),'$username','$ip','')");
if($ok){
move_uploaded_file($image['tmp_name'],"../images/article/$nameimage");
echo"<script>alert('ดำเนินการเรียบร้อย');window.parent.SentOK();</script>";
exit();
}else{
echo"<script>alert('ไม่สามารถดำเนินการได้');window.parent.SentEr();</script>";
exit();
}


}//name
else{
echo"<script>alert('เซสชั่นหมดอายุกรุณาล็อกอินใหม่');window.parent.SentEr();</script>";
exit();
}
?>
