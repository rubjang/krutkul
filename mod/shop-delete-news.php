<?
ob_start();
session_start();
header('Content-type: text/html; charset=utf-8');
include('../conf/connect.php');

$id_news=(int)$_REQUEST[id_news];
$id_member=(int)$_REQUEST[id_member];

if(!isset($id_member)){
echo"<script>alert('เซสชั่นหมดอายุกรุณาล็อคอินใหม่');</script>";
exit();
}
if(!isset($id_news)){
echo"<script>alert('ไม่พบไอดีร้านค้าในระบบ');</script>";
exit();
}

$del=mysql_query("Delete From shop_news where id_news='$id_news' and id_member='$id_member'");
if($del){
echo"<script>alert('ลบข้อมูลเรียบร้อย');window.parent.compelete();</script>";
exit();
}else{
echo"<script>alert('ไม่สามารถลบข้อมูลได้');</script>";
exit();
}
?>