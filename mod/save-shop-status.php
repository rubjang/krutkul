<?
ob_start();
session_start();
header('Content-type: text/html; charset=utf-8');
include('../conf/connect.php');

$id_member=(int)$_REQUEST[id_member];
$id_shop=(int)$_REQUEST[id_shop];
$status_shop=$_REQUEST[status_shop];
if(!isset($id_member)){
echo"<script>alert('เซสชั่นหมดอายุกรุณาล็อคอินใหม่');window.parent.SentEr();</script>";
exit();
}
if(!isset($id_shop)){
echo"<script>alert('ไม่พบไอดีนี้ในระบบ!!');window.parent.SentEr();</script>";
exit();
}
sleep(1);
$up=mysql_query("Update shop set status_shop='$status_shop' where id_shop='$id_shop' and id_member='$id_member'");
if($up){
echo"<script>alert('ดำเนินการเรียบร้อย!!');window.parent.SentOK();</script>";
exit();
}else{
echo"<script>alert('ไม่สามารถดำเนินการได้!!');window.parent.SentEr();</script>";
exit();
}
?>