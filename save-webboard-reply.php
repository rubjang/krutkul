<?
ob_start();
session_start();
header('Content-type: text/html; charset=utf-8');
include('config/connect.php');
date_default_timezone_set('Asia/Bangkok');


$message=trim($_REQUEST[message]);
$name=trim($_REQUEST[name]);
$email=trim($_REQUEST[email]);
$id_member=(int)$_REQUEST[id_member];
//$id_shop=(int)$_REQUEST[id_shop];
$id_webboard=(int)$_REQUEST[id_webboard];
$code=$_REQUEST[code];
sleep(1);
/*
if(!isset($id_shop)){
echo"<script>alert('ไม่พบรหัสร้านค้าออนไลน์');window.parent.SentEr();</script>";
exit();
}
*/
if($message=="" || $name==""){
echo"<script>alert('ป้อนข้อมูลให้ครบด้วย');window.parent.SentEr();</script>";
exit();
}

if($code!=$_SESSION['captcha']){
echo"<script>alert('รหัสลับไม่ตรงกัน');window.parent.SentEr();</script>";
exit();
}

$ok=mysql_query("Insert into shop_webboard_reply values('','$id_webboard','$id_member','$message','$name','$email',NOW())");
if($ok){
echo"<script>alert('ตอบคำถามเรียบร้อย');window.parent.SentOK($id_webboard);</script>";
exit();
}else{
echo"<script>alert('ไม่สามารถตอบคำถามได้');window.parent.SentEr();</script>";
exit();
}
?>
