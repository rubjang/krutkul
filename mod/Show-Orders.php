<?
$qr=mysql_query("select * from shop where id_member='".$_SESSION['id_member']."'");
if(mysql_num_rows($qr)>0){
$re_shop=mysql_fetch_array($qr);

if($_REQUEST[ShowOrders]=="Orders"){
$result_member=mysql_fetch_array(mysql_query("select * from shop_member where id_shop_member='".(int)$_REQUEST[id_shop_member]."'"));
?>

<div style="margin:0px 0px 15px 0px;">
<table width="740" border="0" cellpadding="0" cellspacing="1" id="box-table">
  <tr class="text13b">
    <td height="35" colspan="4" align="center" valign="middle" bgcolor="#FFCCCC">ข้อมูลสมาชิก</td>
  </tr>
  <tr>
    <td width="106" height="30" align="left" valign="middle" bgcolor="#FFF0F0" class="text13b">ชื่อผู้ใช้งาน:</td>
    <td width="241" align="left" valign="middle" bgcolor="#FFF0F0" class="text13"><?=$result_member[user_shop]?></td>
    <td width="71" align="left" valign="middle" bgcolor="#FFF0F0" class="text13b">รหัสผ่าน:</td>
    <td width="317" align="left" valign="middle" bgcolor="#FFF0F0" class="text13"><?=$result_member[pass_shop]?></td>
  </tr>
  <tr>
    <td height="30" align="left" valign="middle" bgcolor="#FFF0F0" class="text13b">ชื่อ-นามสกุล:</td>
    <td align="left" valign="middle" bgcolor="#FFF0F0" class="text13"><?=$result_member[name_shop]?></td>
    <td align="left" valign="middle" bgcolor="#FFF0F0" class="text13b">เพศ:</td>
    <td align="left" valign="middle" bgcolor="#FFF0F0" class="text13"><?=$result_member[sex_shop]?></td>
  </tr>
  <tr>
    <td height="30" align="left" valign="middle" bgcolor="#FFF0F0" class="text13b">เบอร์โทรศัพท์:</td>
    <td align="left" valign="middle" bgcolor="#FFF0F0" class="text13"><?=$result_member[tel_shop]?></td>
    <td align="left" valign="middle" bgcolor="#FFF0F0" class="text13b">อีเมล์:</td>
    <td align="left" valign="middle" bgcolor="#FFF0F0" class="text13"><?=$result_member[email_shop]?></td>
  </tr>
  <tr>
    <td height="30" colspan="4" align="left" valign="middle" bgcolor="#FFF0F0" class="text13b">ที่อยู่</td>
  </tr>
  <tr>
    <td height="30" colspan="4" align="left" valign="middle" bgcolor="#FFF0F0" class="text13"><?=$result_member[address_shop]?></td>
  </tr>
  <tr class="link12">
    <td height="40" colspan="4" align="center" valign="middle" class="text13"><a href="index.php?ShowMember=Shop">ย้อนกลับ</a></td>
  </tr>
</table>
</div>



<?

$strSQL = "SELECT * FROM shop_member_orders where id_member='$result_member[id_shop_member]'";
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

$strSQL .=" order  by id_order DESC LIMIT $Page_Start , $Per_Page";
$objQuery  = mysql_query($strSQL);
?>
<script type="text/javascript">
//delete
function Del(data1,data2){
	var dataSend={
		id_order:data1,
		id_member:data2
	}
	$.post("Delete-Orders.php",dataSend,function(data){
		$("#ShowDel").html(data);
	});
}
//

function conf(data1,data2){
	var dataSend={
		id_order:data1,
		id_member:data2
	}
	$.post("Up-confrim-Order.php",dataSend,function(data){
		$("#ShowDel").html(data);
	});
}

function confK(data1,data2){
	var dataSend={
		id_order:data1,
		id_member:data2
	}
	$.post("Up-confirm-Order2.php",dataSend,function(data){
		$("#ShowDel").html(data);
	});
}

function compelete(id){
window.open("index.php?ShowOrders=Orders&id_shop_member="+id,"_self");
return true;
}

function ShowData(data1,data2){
	var dataSend={
		id_order:data1,
		id_member:data2
	}
	$.post("Show-Orders-detail.php",dataSend,function(data){
		$("#ShowData").html(data);
	});
}
</script>
<div id="ShowDel"></div>
<div id="ShowData"></div>
<table width="740" border="0" cellpadding="0" cellspacing="1" id="box-table">
  <tr class="text13b">
    <td height="35" colspan="5" align="center" valign="middle">รายการสินค้าที่สั่งซื้อ</td>
  </tr>
  <tr class="text13b">
    <td width="39" height="30" align="center" valign="middle" bgcolor="#FFCCCC">#</td>
    <td width="416" align="center" valign="middle" bgcolor="#FFCCCC">ชื่อสินค้า</td>
    <td width="104" align="center" valign="middle" bgcolor="#FFCCCC">สถานะโอนเงิน</td>
    <td width="110" align="center" valign="middle" bgcolor="#FFCCCC">สถานะส่งสินค้า</td>
    <td width="65" align="center" valign="middle" bgcolor="#FFCCCC">จัดการ</td>
  </tr>
  <?
  $n=1;
  while($re_order=mysql_fetch_array($objQuery)){
  if($bg=="#E8FFFF"){
  $bg="#FFFFFF";
  }else{
  $bg="#E8FFFF";
  }
  ?>
  <tr bgcolor="<?=$bg;?>" class="link12">
    <td height="30" align="center" valign="middle"><?=$n++;?></td>
    <td align="center" valign="middle"><div style="width:400px; overflow:hidden;"><a href="javascript:void(0);" onClick="javascript:ShowData(<?=$re_order[id_order]?>,<?=$re_order[id_member]?>)"><?=stripslashes($re_order[title])?></a></div></td>
    <td align="center" valign="middle" class="link12">
	<?
	if($re_order[confirm]==0){
	?>
	<a href="javascript:void(0);" onClick="javascript:conf(<?=$re_order[id_order]?>,<?=$re_order[id_member]?>)"><span class="comment">ยังไม่ได้โอนเงิน</span></a>
	<?
	}else{
	?>
	<span class="text12bb">โอนเงินเรียบร้อย</span>
	<?
	}
	?>
	</td>
    <td align="center" valign="middle">
	<?
	if($re_order[sinka_ok]==0){
	?>
	<a href="javascript:void(0);" onClick="javascript:confK(<?=$re_order[id_order]?>,<?=$re_order[id_member]?>)"><span class="comment">ยังไม่ได้ส่งสินค้า</span></a>
	<?
	}else{
	?>
	<span class="text12bb">ส่งสินค้าเรียบร้อย</span>
	<?
	}
	?>
	</td>
    <td align="center" valign="middle">
	<a href="javascript:Del(<?=$re_order[id_order]?>,<?=$re_order[id_member]?>)" onClick="return confirm('ต้องการลบจริงหรือไม่');"><img src="../images/icon/001_05.gif" width="24" height="24" border="0" align="absbottom"></a>	</td>
  </tr>
  <?
  }
  if($Num_Rows==0){
  ?>
  <tr class="comment">
    <td height="30" colspan="5" align="center" valign="middle">ยังไม่พบข้อมูล</td>
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