<?
ob_start();
session_start();
header('Content-type: text/html; charset=utf-8');
include('../conf/connect.php');

$id_member=(int)$_REQUEST[id_member];
$id_shop=(int)$_REQUEST[id_shop];
$id_category=(int)$_REQUEST[id_category];
if(!isset($id_member) || !isset($id_shop) || !isset($id_category)){
echo"<script>alert('เซสชั่นหมดอายุกรุณาล็อคอินใหม่');window.parent.SentEr2();</script>";
exit();
}
sleep(1);
$category=trim($_REQUEST[category]);
if($category==""){
echo"<script>alert('ป้อนข้อมูลด้วยค่ะ');window.parent.SentEr2();</script>";
exit();
}

$ok=mysql_query("Update portfolio set category='".addslashes($category)."' where id_category='$id_category'");
if($ok){
echo"<script>alert('แก้ไขรายชื่อเรียบร้อยแล้ว!!');window.parent.SentOK2();</script>";
exit();
}else{
echo"<script>alert('ไม่สามารถดำเนินการได้!!');window.parent.SentEr2();</script>";
exit();
}
?>
