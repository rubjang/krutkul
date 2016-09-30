<?
ob_start();
session_start();
header('Content-type: text/html; charset=utf-8');
include('../conf/connect.php');
date_default_timezone_set('Asia/Bangkok');
sleep(1);
$id_member=(int)$_REQUEST[id_member];
$password=trim($_REQUEST[password]);
$newpass=trim($_REQUEST[newpass]);
$confpassword=trim($_REQUEST[confpassword]);
sleep(1);
if($id_member==""){
echo"<script>window.parent.SentEr();</script>";
exit();
}
if(empty($newpass)){
echo"<script>alert('รหัสผ่านใหม่ห้ามมีช่องว่าง');window.parent.SentEr();</script>";
exit();
}
if($confpassword!=$newpass){
echo"<script>alert('รหัสยืนยันไม่ตรงกัน');window.parent.SentEr();</script>";
exit();
}

$qr=mysql_fetch_array(mysql_query("select password from member where id_member='$id_member'"));
if($qr[password]!=$password){
echo"<script>alert('รหัสเก่าไม่ตรงกับในระบบ');window.parent.SentEr();</script>";
exit();
}

$Ok=mysql_query("Update member set password='$newpass' where id_member='$id_member'");
if($Ok){
echo"<script>alert('ดำเนินการเรียบร้อย');window.parent.SentOK();</script>";
exit();
}else{
echo"<script>alert('ไม่สามารถดำเนินการได้');window.parent.SentEr();</script>";
exit();
}
?>