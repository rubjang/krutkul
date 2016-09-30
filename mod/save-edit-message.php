<?
ob_start();
session_start();
header('Content-type: text/html; charset=utf-8');
include('../conf/connect.php');

$id_member=(int)$_REQUEST[id_member];
$id_shop=(int)$_REQUEST[id_shop];
$id_menu=(int)$_REQUEST[id_menu];
$menu=(int)$_REQUEST[menu];
$id_message=(int)$_REQUEST[id_message];
$message=trim($_REQUEST[message]);
if(!isset($id_member) || !isset($id_shop) || !isset($id_menu) || !isset($menu) || !isset($id_message)){
echo"<script>alert('เซสชั่นหมดอายุหรือไม่พบไอดีข้อมูลในระบบ');window.parent.SentEr();</script>";
exit();
}
sleep(1);
if($message==""){
echo"<script>alert('ป้อนข้อมูลด้วย');window.parent.SentEr2();</script>";
exit();
}

// menu 1
if($menu==1){

$ok=mysql_query("Update shop_menu_message set message='$message' where id_message='$id_message' and id_member='$id_member' and menu='$menu'");
if($ok){
echo"<script>alert('ดำเนินการเรียบร้อย');window.parent.SentOK2($id_shop,$id_menu,$menu);</script>";
exit();
}else{
echo"<script>alert('ไม่สามารถดำเนินการได้');window.parent.SentEr2();</script>";
exit();
}


}// menu 1

// menu 2
elseif($menu==2){

$ok=mysql_query("Update shop_menu_message set message='$message' where id_message='$id_message' and id_member='$id_member' and menu='$menu'");
if($ok){
echo"<script>alert('ดำเนินการเรียบร้อย');window.parent.SentOK2($id_shop,$id_menu,$menu);</script>";
exit();
}else{
echo"<script>alert('ไม่สามารถดำเนินการได้');window.parent.SentEr2();</script>";
exit();
}


}// menu 2

// menu 3
elseif($menu==3){

$ok=mysql_query("Update shop_menu_message set message='$message' where id_message='$id_message' and id_member='$id_member' and menu='$menu'");
if($ok){
echo"<script>alert('ดำเนินการเรียบร้อย');window.parent.SentOK2($id_shop,$id_menu,$menu);</script>";
exit();
}else{
echo"<script>alert('ไม่สามารถดำเนินการได้');window.parent.SentEr2();</script>";
exit();
}


}// menu 3
else{
echo"<script>alert('เกิดข้อผิดพลาด!!');window.parent.SentEr2();</script>";
exit();
}
?>
