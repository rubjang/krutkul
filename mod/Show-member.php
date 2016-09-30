<?
$qr=mysql_query("select * from shop where id_member='".$_SESSION['id_member']."'");
if(mysql_num_rows($qr)>0){
$re_shop=mysql_fetch_array($qr);

if($_REQUEST[ShowMember]=="Shop"){

$strSQL = "SELECT * FROM shop_member where id_shop='$re_shop[id_shop]'";
$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
$Num_Rows = mysql_num_rows($objQuery);

$Per_Page = 20;   // Per Page

$Page = $_GET["Page"];
if(!$_GET["Page"])
{
	$Page=1;
}

$Prev_Page = $Page-1;
$Next_Page = $Page+1;

$Page_Start = (($Per_Page*$Page)-$Per_Page);
if($Num_Rows<=$Per_Page)
{
	$Num_Pages =1;
}
else if(($Num_Rows % $Per_Page)==0)
{
	$Num_Pages =($Num_Rows/$Per_Page) ;
}
else
{
	$Num_Pages =($Num_Rows/$Per_Page)+1;
	$Num_Pages = (int)$Num_Pages;
}

$strSQL .=" order  by id_shop_member DESC LIMIT $Page_Start , $Per_Page";
$objQuery  = mysql_query($strSQL);
?>
<script type="text/javascript">
//delete
function Del(data1,data2){
	var dataSend={
		id_shop_member:data1,
		id_shop:data2
	}
	$.post("delete-member-shop.php",dataSend,function(data){
		$("#ShowDel").html(data);
	});
}
//

function compelete(){
window.open("index.php?ShowMember=Shop","_self");
return true;
}
</script>
<div id="ShowDel"></div>
<table width="740" border="0" cellpadding="0" cellspacing="1" id="box-table">
  <tr class="text13b">
    <td height="35" colspan="6" align="center" valign="middle">รายชื่อสมาชิกประจำร้านค้า</td>
  </tr>
  <tr class="text13b">
    <td width="34" height="30" align="center" valign="middle" bgcolor="#FFCCCC">#</td>
    <td width="165" align="center" valign="middle" bgcolor="#FFCCCC">ชื่อผู้ใช้งาน</td>
    <td width="222" align="center" valign="middle" bgcolor="#FFCCCC">ชื่อ-นามสกุล</td>
    <td width="149" align="center" valign="middle" bgcolor="#FFCCCC">เบอร์โทร</td>
    <td width="84" align="center" valign="middle" bgcolor="#FFCCCC">สั่งสินค้า</td>
    <td width="79" align="center" valign="middle" bgcolor="#FFCCCC">จัดการ</td>
  </tr>
  <?
  $n=1;
  while($result_m=mysql_fetch_array($objQuery)){
  if($bg=="#E8FFFF"){
  $bg="#FFFFFF";
  }else{
  $bg="#E8FFFF";
  }
  ?>
  <tr bgcolor="<?=$bg;?>" class="link12">
    <td height="30" align="center" valign="middle"><?=$n++;?></td>
    <td align="center" valign="middle"><a href="?ShowOrders=Orders&id_shop_member=<?=$result_m[id_shop_member]?>"><?=$result_m[user_shop]?></a></td>
    <td align="center" valign="middle"><?=$result_m[name_shop]?></td>
    <td align="center" valign="middle"><?=$result_m[tel_shop]?></td>
    <td align="center" valign="middle">
	<?
	$qr_order=mysql_num_rows(mysql_query("select * from shop_member_orders where id_shop='$result_m[id_shop]' and id_member='$result_m[id_shop_member]'"));
	if($qr_order==0){
	?>
	<img src="../images/icon/action_delete.gif" width="16" height="16">
	<?
	}else{
	echo"$qr_order รายการ";
	}
	?>
	</td>
    <td align="center" valign="middle">
	<a href="javascript:Del(<?=$result_m[id_shop_member]?>,<?=$result_m[id_shop]?>)" onClick="return confirm('ต้องการลบจริงหรือไม่');"><img src="../images/icon/001_05.gif" width="24" height="24" border="0" align="absbottom"></a>
	</td>
  </tr>
  <?
  }
  ?>
</table>
<div class="link12" style="margin:15px 0px;">
มีทั้งหมด : <?=$Num_Pages;?> หน้า :
<?
if($Prev_Page)
{
	echo " <a href='$_SERVER[SCRIPT_NAME]?ShowMember=Shop&Page=$Prev_Page'><< ย้อนกลับ</a> ";
}

for($i=1; $i<=$Num_Pages; $i++){
	if($i != $Page)
	{
		echo "[ <a href='$_SERVER[SCRIPT_NAME]?ShowMember=Shop&Page=$i'>$i</a> ]";
	}
	else
	{
		echo "<b> $i </b>";
	}
}
if($Page!=$Num_Pages)
{
	echo " <a href ='$_SERVER[SCRIPT_NAME]?ShowMember=Shop&Page=$Next_Page'>หน้าถัดไป>></a> ";
}
?>
</div>
<?

}
}//shop
?>