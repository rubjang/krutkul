<?
ob_start();
session_start();
header('Content-type: text/html; charset=utf-8');
include('../conf/connect.php');

$id_member=(int)$_REQUEST[id_member];
$id_shop=(int)$_REQUEST[id_shop];
$id_des=(int)$_REQUEST[id_des];
$message=trim($_REQUEST[message]);
if(!isset($id_member)){
echo"<script>alert('เซสชั่นหมดอายุกรุณาล็อคอินใหม่');window.parent.SentEr();</script>";
exit();
}
if(!isset($id_shop) || !isset($id_des)){
echo"<script>alert('ไม่พบไอดีร้านค้าในระบบ');window.parent.SentEr();</script>";
exit();
}
sleep(1);
if($message==""){
echo"<script>alert('ป้อนข้อมูลด้วย');window.parent.SentEr();</script>";
exit();
}

$ok=mysql_query("Update shop_description set message='$message' where id_member='$id_member' and id_des='$id_des'");
if($ok){
echo"<script>alert('ดำเนินการเรียบร้อย');window.parent.SentOK();</script>";
exit();
}else{
echo"<script>alert('ไม่สามารถดำเนินการได้');window.parent.SentEr();</script>";
exit();
}
?>