<?
ob_start();
session_start();
header('Content-type: text/html; charset=utf-8');
include('../conf/connect.php');
date_default_timezone_set('Asia/Bangkok');

$id_member=(int)$_REQUEST[id_member];
$id_shop=(int)$_REQUEST[id_shop];
if(!isset($id_member) || !isset($id_shop)){
echo"<script>alert('เซสชั่นหมดอายุหรือไม่พบรหัสร้านค้า');window.parent.SentEr2();</script>";
exit();
}
sleep(1);

$description_shop=trim($_REQUEST[description_shop]);
$keyword_shop=trim($_REQUEST[keyword_shop]);
if($description_shop=="" || $keyword_shop==""){
echo"<script>alert('ป้อนข้อมูลให้ครบด้วย');window.parent.SentEr2();</script>";
exit();
}


$ok=mysql_query("Update shop set description_shop='".strip_tags($description_shop)."',keyword_shop='$keyword_shop',update_shop=NOW() where id_shop='$id_shop' and id_member='$id_member'");
if($ok){
echo"<script>alert('ดำเนินการเรียบร้อย!!');window.parent.SentOK2();</script>";
exit();
}else{
echo"<script>alert('ไม่สามารถดำเนินการได้!!');window.parent.SentEr2();</script>";
exit();
}
?>