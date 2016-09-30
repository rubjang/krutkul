<?
ob_start();
session_start();
header('Content-type: text/html; charset=utf-8');
include('config/connect.php');

$username=trim($_REQUEST[username]);
$password=trim($_REQUEST[password]);
if($username=="" || $password==""){
echo"<script>alert('ป้อนข้อมูลให้ครบด้วย');history.back();</script>";
exit();
}
$qr=mysql_query("select * from shop_member where user_shop='$username' and pass_shop='$password'");
if(mysql_num_rows($qr)>0)
{
  $row=mysql_fetch_array($qr);
    $_SESSION['id_shop_member']=$row[id_shop_member];
    $_SESSION['user_shop']=$row[user_shop];
    echo'<meta http-equiv="refresh" content="0;URL=webboard-post.php" />';
}else{
  echo"<script>alert('ไม่พบชื่อผู้ใช้ในระบบหรือรหัสผ่านผิด');history.back();</script>";
  exit();
}
?>
