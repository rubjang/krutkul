<?
ob_start();
session_start();
header('Content-type: text/html; charset=utf-8');
include('../conf/connect.php');

$id_ads=(int)$_REQUEST[id_ads];
$id_member=(int)$_REQUEST[id_member];

$del=mysql_query("Delete from tb_contact_ads where id_ads='$id_ads' and id_member='$id_member'");
if($del){
echo"<script>alert('ลบข้อมูลเรียบร้อย');window.parent.compelete();</script>";
exit();
}else{
echo"<script>alert('ไม่สามารถลบข้อมูลได้');</script>";
exit();
}
?>