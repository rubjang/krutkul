<?
ob_start();
session_start();
header('Content-type: text/html; charset=utf-8');
include('../conf/connect.php');

$id_order=(int)$_REQUEST[id_order];
$id_member=(int)$_REQUEST[id_member];

$ok=mysql_query("Delete from shop_member_orders where id_order='$id_order' and id_member='$id_member'");
if($ok){
echo"<script>alert('ลบข้อมูลเรียบร้อย');window.parent.compelete($id_member);</script>";
exit();
}else{
echo"<script>alert('ไม่สามารถลบข้อมูลได้');</script>";
exit();
}
?>