<?
ob_start();
session_start();
header('Content-type: text/html; charset=utf-8');
include('config/connect.php');
//if($_REQUEST[Logout]=="Yes"){
session_destroy();
echo"<script>alert('ออกจากระบบเรียบร้อยแล้ว');</script>";
echo'<meta http-equiv="refresh" content="0;URL=index.php" />';
//}
?>
