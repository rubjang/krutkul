<?
ob_start();
header('Content-type: text/html; charset=utf-8');
include('config/connect.php');
//$id_shop=(int)$_REQUEST[id_shop];
$email=trim($_REQUEST['email']);

if($email==""){
  echo"<script>alert('ป้อนอีเมล์ด้วย');window.parent.SentEr();</script>";
  exit();
}
sleep(1);
$sql=mysql_query("Select email_shop From shop_member Where email_shop='$email'");
$num=mysql_num_rows($sql);
if($num==0)
{
  echo"<script>alert('ไม่พบอีเมล์นี้ในระบบ');window.parent.SentEr();</script>";
  exit();
}else{
  $result=mysql_fetch_array($sql);
  $to=$result['email_shop'];
  $pass=$result['pass_shop'];
  //ส่งอีเมล์แจ้ง
  $subj="ระบบออโต้ แจ้งรหัสผ่านสำหรับสมาชิก";
  $header="Content-Type: text/html; charset=UTF-8\n";
  $header.="from: ครุฑกุลทรานสปอร์ต.com";
    $msg="<b>นี่คือเมล์จากระบบแจ้งรหัสผ่านอัตโนมัติ</b><br><br>
  <b>รหัสผ่านของท่านขณะนี้คือ : </b>$pass<br>
  <br><br>
  ขอขอบพระคุณที่ใช้บริการ";
  @mail($to,$subj,$msg,$header);
  //ปิดอีเมล์
  echo"<script>alert('ส่งรหัสผ่านให้ทางอีเมล์เรียบร้อย');window.parent.SentOK();</script>";
  exit();
}
?>
