<?
ob_start();
session_start();
header('Content-type: text/html; charset=utf-8');
include('../conf/connect.php');
date_default_timezone_set('Asia/Bangkok');

$id_member=(int)$_REQUEST[id_member];
if(!isset($id_member)){
echo"<script>alert('เซสชั่นหมดอายุกรุณาล็อคอินใหม่');window.parent.SentEr();</script>";
exit();
}
sleep(1);
$name_shop=trim($_REQUEST[name_shop]);
$description_shop=trim($_REQUEST[description_shop]);
$keyword_shop=trim($_REQUEST[keyword_shop]);
if($name_shop=="" || $description_shop=="" || $keyword_shop==""){
echo"<script>alert('ป้อนข้อมูลให้ครบด้วย');window.parent.SentEr();</script>";
exit();
}
$ck=mysql_query("select * from shop where name_shop='".addslashes($name_shop)."'");
if(mysql_num_rows($ck)>0){
echo"<script>alert('มีชื่อร้านค้านี้ในระบบแล้ว!!');window.parent.SentEr();</script>";
exit();
}
$nameimage_bg="ShopBG_".date("YdmHis").".jpg";
$nameimage_shop="Shop_".date("YdmHis").".jpg";
$nameimage_logo="ShopLogo_".date("YdmHis").".jpg";
$ok=mysql_query("Insert into shop values('','$id_member','".addslashes($name_shop)."','".strip_tags($description_shop)."','$keyword_shop','$nameimage_shop','$nameimage_bg','$nameimage_logo',NOW(),NOW(),'','on')");
if($ok){
echo"<script>alert('สมัครเปิดร้านค้าเรียบร้อย!!');window.parent.SentOK();</script>";
exit();
}else{
echo"<script>alert('ไม่สามารถเปิดร้านค้าได้!!');window.parent.SentEr();</script>";
exit();
}
?>