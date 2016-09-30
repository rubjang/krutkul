<?
ob_start();
session_start();
header('Content-type: text/html; charset=utf-8');
include('../conf/connect.php');

$id_member=(int)$_REQUEST[id_member];
$id_shop=(int)$_REQUEST[id_shop];
if(!isset($id_member) || !isset($id_shop)){
echo"<script>alert('เซสชั่นหมดอายุกรุณาล็อคอินใหม่');window.parent.SentEr();</script>";
exit();
}

sleep(1);
$menu1=trim($_REQUEST[menu1]);
$menu2=trim($_REQUEST[menu2]);
$menu3=trim($_REQUEST[menu3]);
if($menu1=="" || $menu2=="" || $menu3==""){
echo"<script>alert('ป้อนข้อมูลด้วย');window.parent.SentEr();</script>";
exit();
}
$qr=mysql_query("select id_member,id_shop from shop_menu where id_member='$id_member' and id_shop='$id_shop'");
if(mysql_num_rows($qr)>0){
echo"<script>alert('มีเมนูนี้ในระบบแล้วไม่สามารถเพิ่มได้');window.parent.SentEr();</script>";
exit();
}
$ok=mysql_query("Insert into shop_menu values('','$id_shop','$id_member','".trim($_REQUEST[menu1])."','".trim($_REQUEST[menu2])."','".trim($_REQUEST[menu3])."')");
if($ok){
echo"<script>alert('ดำเนินการเรียบร้อย!!');window.parent.SentOK();</script>";
exit();
}else{
echo"<script>alert('ไม่สามารถดำเนินการได้!!');window.parent.SentEr();</script>";
exit();
}
?>
