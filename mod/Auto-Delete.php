<?
//date_default_timezone_set('Asia/Bangkok');
$time_today=date("Y-m-d H:i:s");
//Delete PM
$qr_del_pm=@mysql_query("select * from tb_pm where deltoday<='$time_today'");
while($re_del_pm=@mysql_fetch_array($qr_del_pm)){
@mysql_query("Delete From tb_pm Where id_pm='$re_del_pm[id_pm]'");
}
?>