<?
ob_start();
session_start();
header('Content-type: text/html; charset=utf-8');
include('config/connect.php');

$id_shop_member=(int)$_REQUEST[id_shop_member];
//$id_shop=(int)$_REQUEST[id_shop];

$del=mysql_query("Delete from shop_member where id_shop_member='$id_shop_member'");
if($del){
mysql_query("Delete from shop_webboard where id_member='$id_shop_member'");
mysql_query("Delete from shop_webboard_reply where id_member='$id_shop_member'");
echo"<script>alert('ลบข้อมูลเรียบร้อย');window.parent.compelete();</script>";
exit();
}else{
echo"<script>alert('ไม่สามารถลบข้อมูลได้');</script>";
exit();
}
?>
