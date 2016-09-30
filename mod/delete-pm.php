<?
ob_start();
session_start();
header('Content-type: text/html; charset=utf-8');
include('../conf/connect.php');

$id_pm=(int)$_REQUEST[id_pm];
if(isset($id_pm)){
$del=mysql_query("Delete From tb_pm where id_pm='$id_pm'");
if($del){
echo"<script>alert('ลบข้อมูลเรียบร้อย');window.parent.compelete();</script>";
exit();
}else{
echo"<script>alert('ไม่สามารถลบข้อมูลได้');</script>";
exit();
}
}
else{
echo"<script>alert('ไม่พบไอดีนี้ในระบบ');</script>";
exit();
}
?>