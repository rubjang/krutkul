<?
ob_start();
session_start();
header('Content-type: text/html; charset=utf-8');
include('../conf/connect.php');

$id_member=(int)$_REQUEST[id_member];
$id_shop=(int)$_REQUEST[id_shop];
$id_menu=(int)$_REQUEST[id_menu];
$menu=(int)$_REQUEST[menu];
$message=trim($_REQUEST[message]);
if(!isset($id_member) || !isset($id_shop) || !isset($id_menu) || !isset($menu)){
echo"<script>alert('เซสชั่นหมดอายุหรือไม่พบไอดีข้อมูลในระบบ');window.parent.SentEr();</script>";
exit();
}
sleep(1);
if($message==""){
echo"<script>alert('ป้อนข้อมูลด้วย');window.parent.SentEr();</script>";
exit();
}

// menu 1
if($menu==1){
// check menu 1
$qr=mysql_query("select * from shop_menu_message where id_shop='$id_shop' and menu='$menu'");
if(mysql_num_rows($qr)>0){
echo"<script>alert('มีข้อมูลเมนู 1 ในระบบแล้ว');window.parent.SentEr();</script>";
exit();
}
//save
$ok=mysql_query("Insert into shop_menu_message values('','$id_member','$id_shop','$id_menu','$menu','$message')");
if($ok){
echo"<script>alert('ดำเนินการเรียบร้อย');window.parent.SentOK($id_shop,$id_menu,$menu);</script>";
exit();
}else{
echo"<script>alert('ไม่สามารถดำเนินการได้');window.parent.SentEr();</script>";
exit();
}


}// menu 1

// menu 2
elseif($menu==2){
// check menu 2
$qr=mysql_query("select * from shop_menu_message where id_shop='$id_shop' and menu='$menu'");
if(mysql_num_rows($qr)>0){
echo"<script>alert('มีข้อมูลเมนู 1 ในระบบแล้ว');window.parent.SentEr();</script>";
exit();
}
//save
$ok=mysql_query("Insert into shop_menu_message values('','$id_member','$id_shop','$id_menu','$menu','$message')");
if($ok){
echo"<script>alert('ดำเนินการเรียบร้อย');window.parent.SentOK($id_shop,$id_menu,$menu);</script>";
exit();
}else{
echo"<script>alert('ไม่สามารถดำเนินการได้');window.parent.SentEr();</script>";
exit();
}


}// menu 2


// menu 3
elseif($menu==3){
// check menu 3
$qr=mysql_query("select * from shop_menu_message where id_shop='$id_shop' and menu='$menu'");
if(mysql_num_rows($qr)>0){
echo"<script>alert('มีข้อมูลเมนู 1 ในระบบแล้ว');window.parent.SentEr();</script>";
exit();
}
//save
$ok=mysql_query("Insert into shop_menu_message values('','$id_member','$id_shop','$id_menu','$menu','$message')");
if($ok){
echo"<script>alert('ดำเนินการเรียบร้อย');window.parent.SentOK($id_shop,$id_menu,$menu);</script>";
exit();
}else{
echo"<script>alert('ไม่สามารถดำเนินการได้');window.parent.SentEr();</script>";
exit();
}


}// menu 3
else{
echo"<script>alert('เกิดข้อผิดพลาด!!');window.parent.SentEr();</script>";
exit();
}
?>
