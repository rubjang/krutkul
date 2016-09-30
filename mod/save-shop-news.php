<?
ob_start();
session_start();
header('Content-type: text/html; charset=utf-8');
include('../conf/connect.php');
date_default_timezone_set('Asia/Bangkok');

$id_member=(int)$_REQUEST[id_member];
$id_shop=(int)$_REQUEST[id_shop];
$title=trim($_REQUEST[title]);
$message=trim($_REQUEST[message]);
if(!isset($id_member)){
echo"<script>alert('เซสชั่นหมดอายุกรุณาล็อคอินใหม่');window.parent.SentEr();</script>";
exit();
}
if(!isset($id_shop)){
echo"<script>alert('ไม่พบไอดีร้านค้าในระบบ');window.parent.SentEr();</script>";
exit();
}
sleep(1);
if($title=="" || $message==""){
echo"<script>alert('ป้อนข้อมูลให้ครบด้วย');window.parent.SentEr();</script>";
exit();
}

$ok=mysql_query("Insert into shop_news values('','$id_member','$id_shop','".addslashes($title)."','$message',NOW())");
if($ok){
echo"<script>alert('ดำเนินการเรียบร้อย');window.parent.SentOK();</script>";
exit();
}else{
echo"<script>alert('ไม่สามารถดำเนินการได้');window.parent.SentEr();</script>";
exit();
}
?>