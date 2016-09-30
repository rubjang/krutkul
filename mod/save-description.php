<?
ob_start();
session_start();
header('Content-type: text/html; charset=utf-8');
include('../conf/connect.php');

$id_member=(int)$_REQUEST[id_member];
$id_shop=(int)$_REQUEST[id_shop];
$message=trim($_REQUEST[message]);
if(!isset($id_member)){
echo"<script>alert('เซสชั่นหมดอายุกรุณาล็อคอินใหม่');window.parent.SentEr();</script>";
exit();
}
if(!isset($id_shop)){
echo"<script>alert('ไม่พบไอดีร้านค้าในระบบ');window.parent.SentEr();</script>";
exit();
}
sleep(1);
if($message==""){
echo"<script>alert('ป้อนข้อมูลด้วย');window.parent.SentEr();</script>";
exit();
}
$qr=mysql_query("select id_member,id_shop from shop_description where id_member='$id_member' and id_shop='$id_shop'");
if(mysql_num_rows($qr)>0){
echo"<script>alert('มีข้อมูลในระบบแล้ว');window.parent.SentEr();</script>";
exit();
}

$ok=mysql_query("Insert into shop_description values('','$id_member','$id_shop','$message')");
if($ok){
echo"<script>alert('ดำเนินการเรียบร้อย');window.parent.SentOK();</script>";
exit();
}else{
echo"<script>alert('ไม่สามารถดำเนินการได้');window.parent.SentEr();</script>";
exit();
}
?>