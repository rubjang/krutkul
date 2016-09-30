<?
ob_start();
session_start();
header('Content-type: text/html; charset=utf-8');
include('../conf/connect.php');

$id_member=(int)$_REQUEST[id_member];
$id_shop=(int)$_REQUEST[id_shop];
$id_menu=(int)$_REQUEST[id_menu];

if(!isset($id_member) || !isset($id_shop) || !isset($id_menu)){
echo"<script>alert('เซสชั่นหมดอายุหรือไม่พบไอดีข้อมูลในระบบ');window.parent.SentEr2();</script>";
exit();
}

sleep(1);
$menu1=trim($_REQUEST[menu1]);
$menu2=trim($_REQUEST[menu2]);
$menu3=trim($_REQUEST[menu3]);
if($menu1=="" || $menu2=="" || $menu3==""){
echo"<script>alert('ป้อนข้อมูลด้วย');window.parent.SentEr2();</script>";
exit();
}

$ok=mysql_query("Update shop_menu set menu_shop='".trim($_REQUEST[menu1])."',menu_shop2='".trim($_REQUEST[menu2])."',menu_shop3='".trim($_REQUEST[menu3])."' where id_menu='$id_menu' and id_member='$id_member' and id_shop='$id_shop'");

if($ok){
echo"<script>alert('ดำเนินการเรียบร้อย!!');window.parent.SentOK2();</script>";
exit();
}else{
echo"<script>alert('ไม่สามารถดำเนินการได้!!');window.parent.SentEr2();</script>";
exit();
}
?>
