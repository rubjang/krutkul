<?
ob_start();
session_start();
header('Content-type: text/html; charset=utf-8');
include('config/connect.php');
date_default_timezone_set('Asia/Bangkok');

$user_shop=trim($_REQUEST[user_shop]);
$pass_shop=trim($_REQUEST[pass_shop]);
$name_shop=trim($_REQUEST[name_shop]);
$sex_shop=trim($_REQUEST[sex_shop]);
$address_shop=trim($_REQUEST[address_shop]);
$tel_shop=trim($_REQUEST[tel_shop]);
$email_shop=trim($_REQUEST[email_shop]);
$id_shop=(int)$_REQUEST[id_shop];
/*
if(!isset($id_shop)){
echo"<script>alert('ไม่พบไอดีร้านค้านี้ในระบบ');window.parent.SentEr();</script>";
exit();
}
*/
if($user_shop=="" || $pass_shop=="" || $name_shop=="" || $sex_shop=="" || $address_shop=="" || $tel_shop=="")
{
  echo"<script>alert('ป้อนข้อมูลให้ครบด้วย');window.parent.SentEr();</script>";
  exit();
}

$qr=mysql_query("select user_shop from shop_member where user_shop='$user_shop'");
if(mysql_num_rows($qr)>0){
echo"<script>alert('มีชื่อนี้ในระบบแล้ว');window.parent.SentEr();</script>";
exit();
}

sleep(1);
$Ok=mysql_query("Insert into shop_member values('','$user_shop','$pass_shop','$name_shop','$sex_shop','$address_shop','$tel_shop','$email_shop')");
if($Ok){
  echo"<script>alert('ลงทะเบียนเรียบร้อย');window.parent.SentOK();</script>";
  exit();
}else{
  echo"<script>alert('ไม่สามารถดำเนินการได้');window.parent.SentEr();</script>";
  exit();
}
?>
