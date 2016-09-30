<?
header('Content-type: text/html; charset=utf-8');
include('../conf/connect.php');
$id_order=(int)$_REQUEST[id_order];
$id_member=(int)$_REQUEST[id_member];

$qr_order2=mysql_query("select * from shop_member_orders where id_order='$id_order' and id_member='$id_member'");
$ROW=mysql_fetch_array($qr_order2);
?>
<div style="margin:0px 0px 15px 0px;">
<table width="740" border="0" cellpadding="0" cellspacing="1" id="boxtable">
  <tr class="text13b">
    <td height="40" colspan="2" align="center" valign="middle" bgcolor="#FFF7D2">รายละเอียดการสั่งซื้อ</td>
  </tr>
  <tr class="text13">
    <td width="124" height="30" align="left" valign="middle" bgcolor="#FFF2F2">สินค้าที่สั่งซื้อ:</td>
    <td width="583" align="left" valign="middle" bgcolor="#FFF2F2"><?=stripslashes($ROW[title])?></td>
  </tr>
  <tr class="text13">
    <td height="30" align="left" valign="middle" bgcolor="#FFF2F2">จำนวนที่สั่งซื้อ:</td>
    <td align="left" valign="middle" bgcolor="#FFF2F2"><?=$ROW[amount]?> รายการ</td>
  </tr>
  <tr class="text13">
    <td height="30" align="left" valign="middle" bgcolor="#FFF2F2">ราคาสินค้า:</td>
    <td align="left" valign="middle" bgcolor="#FFF2F2"><?=number_format($ROW[price])?> บาท</td>
  </tr>
  <tr class="text13">
    <td height="30" align="left" valign="middle" bgcolor="#FFF2F2">รวม:</td>
    <td align="left" valign="middle" bgcolor="#FFF2F2"><?=number_format($ROW[sum_price])?> บาท</td>
  </tr>
  <tr class="text13">
    <td height="30" align="left" valign="middle" bgcolor="#FFF2F2">สั่งซื้อเมื่อ:</td>
    <td align="left" valign="middle" bgcolor="#FFF2F2"><?=$ROW[today]?></td>
  </tr>
  <tr class="text13">
    <td height="30" align="left" valign="middle" bgcolor="#FFF2F2">สถานะโอนเงิน:</td>
    <td align="left" valign="middle" bgcolor="#FFF2F2">
	<?
	if($ROW[confirm]==0){
	echo"<span class='comment'>ยังไม่ได้โอนเงิน</span>";
	}else{
	echo"<span class='text12bb'>ได้รับเงินโอนแล้ว</span>";
	}
	?>	</td>
  </tr>
  <tr class="text13">
    <td height="30" align="left" valign="middle" bgcolor="#FFF2F2">สถานะส่งสินค้า</td>
    <td align="left" valign="middle" bgcolor="#FFF2F2">
	<?
	if($ROW[sinka_ok]==0){
	echo"<span class='comment'>ยังไม่ได้ส่งสินค้า</span>";
	}else{
	echo"<span class='text12bb'>ส่งสินค้าเรียบร้อย</span>";
	}
	?>	</td>
  </tr>
</table>
</div>
