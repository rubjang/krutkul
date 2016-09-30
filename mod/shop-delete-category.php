<?
ob_start();
session_start();
header('Content-type: text/html; charset=utf-8');
include('../conf/connect.php');

$id_category=(int)$_REQUEST[id_category];
$id_member=(int)$_REQUEST[id_member];

if(!isset($id_member)){
echo"<script>alert('เซสชั่นหมดอายุกรุณาล็อคอินใหม่!!');</script>";
exit();
}
sleep(1);
if(!isset($id_category)){
echo"<script>alert('ไม่พบไอดีนี้ในระบบ!!');</script>";
exit();
}

$del=mysql_query("Delete From shop_category where id_category='$id_category' and id_member='$id_member'");
if($del){
$qr=mysql_query("select * from shop_sinka where id_category='$id_category' and id_member='$id_member'");
while($row=mysql_fetch_array($qr)){
mysql_query("Delete From shop_sinka where id_category='$id_category' and id_member='$id_member'");
@unlink("../images2/image-shop/shop/$row[image]");
}
echo"<script>alert('ลบข้อมูลเรียบร้อย!!');window.parent.compelete();</script>";
exit();
}else{
echo"<script>alert('ไม่สามารถลบข้อมูลได้!!');</script>";
exit();
}
?>