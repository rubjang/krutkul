<?
ob_start();
session_start();
header('Content-type: text/html; charset=utf-8');
include('../conf/connect.php');

$id_order=(int)$_REQUEST[id_order];
$id_member2=(int)$_REQUEST[id_member];

$up=mysql_query("Update shop_member_orders set confirm='1' where id_order='$id_order' and id_member='$id_member2'");
if($up){
echo"<script>alert('ยืนยันเรียบร้อย');window.parent.compelete($id_member2);</script>";
exit();
}else{
echo"<script>alert('ไม่สามารถยืนยันได้');</script>";
exit();
}
?>