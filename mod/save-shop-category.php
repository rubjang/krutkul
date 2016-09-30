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
$category=trim($_REQUEST[category]);
if($category==""){
echo"<script>alert('ป้อนข้อมูลด้วยค่ะ');window.parent.SentEr();</script>";
exit();
}
$ck=mysql_num_rows(mysql_query("select * from shop_category where id_member='$id_member' and id_shop='$id_shop'"));
if($ck<10){
$ok=mysql_query("Insert into shop_category values('','$id_member','$id_shop','".addslashes($category)."')");
if($ok){
echo"<script>alert('ดำเนินการเีรียบร้อย!!');window.parent.SentOK();</script>";
exit();
}else{
echo"<script>alert('ไม่สามารถดำเนินการได้!!');window.parent.SentEr();</script>";
exit();
}

}else{
echo"<script>alert('ไม่สามารถเพิ่มเมนูได้ เต็ม!!');window.parent.SentEr();</script>";
exit();
}
?>
