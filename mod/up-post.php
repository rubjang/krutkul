<?
ob_start();
session_start();
header('Content-type: text/html; charset=utf-8');
include('../conf/connect.php');
date_default_timezone_set('Asia/Bangkok');


sleep(1);
$id_post=(int)$_REQUEST[id_post];
if(isset($id_post)){
$ok=mysql_query("Update post set update_today=NOW() where id_post='$id_post'");
if($ok){
echo"<script>alert('เลื่อนประกาศเรียบร้อย');window.parent.compelete();</script>";
exit();
}else{
echo"<script>alert('ไม่สามารถเลื่อนประกาศได้');</script>";
exit();
}
}
else{
echo"<script>alert('ไม่พบไอดีนี้ในระบบ!!');</script>";
exit();
}

?>