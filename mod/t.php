<?
echo"<script>alert('อออ');</script>";
?>

<?
ob_start();
session_start();
header('Content-type: text/html; charset=utf-8');
include('../config/connect.php');

$id_member=(int)$_REQUEST[id_member];
$id_shop=(int)$_REQUEST[id_shop];
$id_menu=(int)$_REQUEST[id_menu];

if(!isset($id_member)){
echo"<script>alert('เซสชั่นหมดอายุ');window.parent.checkmessageEr();</script>";
exit();
}
if(!isset($id_shop)){
echo"<script>alert('ไม่พบไอดีร้านค้าในระบบ');window.parent.checkmessageEr();</script>";
exit();
}
if(!isset($id_menu)){
echo"<script>alert('ไม่พบไอดีเมนูร้านค้าในระบบ');window.parent.checkmessageEr();</script>";
exit();
}
sleep(1);
$menu_num=$_REQUEST[menu_num];
//1
if($menu_num==1){
$editor1=trim($_REQUEST[editor1]);
if($editor1==""){
echo"<script>alert('ป้อนรายละเอียดด้วย');window.parent.checkmessageEr();</script>";
exit();
}
$ok=mysql_query("Insert into shop_menu_message values('','$id_shop','$id_member','$id_member','$editor1')");
if($ok){
echo"<script>alert('ดำเนินการเรียบร้อย');window.parent.checkmessageOK();</script>";
exit();
}else{
echo"<script>alert('ไม่สามารถดำเนินการได้');window.parent.checkmessageEr();</script>";
exit();
}
}
// 1
?>