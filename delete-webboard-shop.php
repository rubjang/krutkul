<?
ob_start();
session_start();
header('Content-type: text/html; charset=utf-8');
include('config/connect.php');

$id_webboard=(int)$_REQUEST[id_webboard];
$del=mysql_query("Delete from shop_webboard where id_webboard='$id_webboard'");
if($del){
  mysql_query("Delete from shop_webboard where id_webboard='$id_webboard'");
  mysql_query("Delete from shop_webboard_reply where id_webboard='$id_webboard'");
  echo"<script>alert('ลบข้อมูลเรียบร้อย');window.parent.compelete();</script>";
  exit();
}else{
  echo"<script>alert('ไม่สามารถลบข้อมูลได้');</script>";
  exit();
}
?>
