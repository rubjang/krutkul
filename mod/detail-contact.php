<?
header('Content-type: text/html; charset=utf-8');
include('../conf/connect.php');
$id_ads=(int)$_REQUEST[id_ads];
$id_member=(int)$_REQUEST[id_member];

$qr_cont=mysql_query("select * from tb_contact_ads where id_ads='$id_ads' and id_member='$id_member'");
$ROW=mysql_fetch_array($qr_cont);
?>
<div style="margin:0px 0px 15px 0px;">
<table width="740" border="0" cellpadding="0" cellspacing="1" id="boxtable">
  <tr class="text13b">
    <td height="40" colspan="2" align="center" valign="middle" bgcolor="#FFF7D2">รายละเอียด</td>
  </tr>
  <tr class="text13">
    <td width="124" height="30" align="left" valign="middle" bgcolor="#FFF2F2">ติดต่อเรื่อง:</td>
    <td width="583" align="left" valign="middle" bgcolor="#FFF2F2"><?=stripslashes($ROW[title])?></td>
  </tr>
  <tr class="text13">
    <td height="30" align="left" valign="top" bgcolor="#FFF2F2">รายละเอียด:</td>
    <td height="150" align="left" valign="top" bgcolor="#FFF2F2"><?=$ROW[message]?> </td>
  </tr>
  <tr class="text13">
    <td height="30" align="left" valign="middle" bgcolor="#FFF2F2">ชื่อผู้ติดต่อ:</td>
    <td align="left" valign="middle" bgcolor="#FFF2F2"><?=$ROW[name]?></td>
  </tr>
  <tr class="text13">
    <td height="30" align="left" valign="middle" bgcolor="#FFF2F2">เบอร์โทรศัพท์:</td>
    <td align="left" valign="middle" bgcolor="#FFF2F2"><?=$ROW[tel]?></td>
  </tr>
  <tr class="text13">
    <td height="30" align="left" valign="middle" bgcolor="#FFF2F2">อีเมล์:</td>
    <td align="left" valign="middle" bgcolor="#FFF2F2"><?=$ROW[email]?></td>
  </tr>
  <tr class="text13">
    <td height="30" align="left" valign="middle" bgcolor="#FFF2F2">วันที่ติดต่อ:</td>
    <td align="left" valign="middle" bgcolor="#FFF2F2"><?=$ROW[today]?></td>
  </tr>
</table>
</div>
