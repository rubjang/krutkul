<?
if($_REQUEST[CheckC]=="Contact"){
$strSQL = "SELECT * FROM tb_contact_ads where id_member='".$_SESSION['id_member']."'";
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

$strSQL .=" order  by id_ads DESC LIMIT $Page_Start , $Per_Page";
$objQuery  = mysql_query($strSQL);
?>
<script type="text/javascript">
//delete
function Del(data1,data2){
	var dataSend={
		id_ads:data1,
		id_member:data2
	}
	$.post("delete-contact.php",dataSend,function(data){
		$("#ShowDel").html(data);
	});
}
//

function compelete(){
window.open("index.php?CheckC=Contact","_self");
return true;
}

function Shows(data1,data2){
	var dataSend={
		id_ads:data1,
		id_member:data2
	}
	$.post("detail-contact.php",dataSend,function(data){
		$("#ShowData").html(data);
	});
}
</script>
<div id="ShowDel"></div>
<div id="ShowData"></div>
<table width="740" border="0" cellpadding="0" cellspacing="1" id="box-table">
  <tr class="text13b">
    <td height="35" colspan="4" align="center" valign="middle">เช็คผู้ติดต่อ</td>
  </tr>
  <tr class="text13b">
    <td width="47" height="30" align="center" valign="middle" bgcolor="#EEFFCC">#</td>
    <td width="464" align="center" valign="middle" bgcolor="#EEFFCC">รายการ</td>
    <td width="167" align="center" valign="middle" bgcolor="#EEFFCC">วันที่</td>
    <td width="57" align="center" valign="middle" bgcolor="#EEFFCC">จัดการ</td>
  </tr>
  <?
  $n=1;
  while($re_contact=mysql_fetch_array($objQuery)){
  if($bg=="#E8FFFF"){
  $bg="#FFFFFF";
  }else{
  $bg="#E8FFFF";
  }
  ?>
  <tr bgcolor="<?=$bg;?>" class="link12">
    <td height="30" align="center" valign="middle"><?=$n++;?></td>
    <td align="center" valign="middle"><a href="javascript:void(0);" onClick="javascript:Shows(<?=$re_contact[id_ads]?>,<?=$re_contact[id_member]?>);"><?=stripslashes($re_contact[title]);?></a></td>
    <td align="center" valign="middle"><?=$re_contact[today]?></td>
    <td align="center" valign="middle"><a href="javascript:Del(<?=$re_contact[id_ads]?>,<?=$re_contact[id_member]?>);" onClick="return confirm('ต้องการลบจริงหรือไม่');"><img src="../images/icon/001_05.gif" width="24" height="24" border="0"></a></td>
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
	echo " <a href='$_SERVER[SCRIPT_NAME]?CheckC=Contact&Page=$Prev_Page'><< ย้อนกลับ</a> ";
}

for($i=1; $i<=$Num_Pages; $i++){
	if($i != $Page)
	{
		echo "[ <a href='$_SERVER[SCRIPT_NAME]?CheckC=Contact&Page=$i'>$i</a> ]";
	}
	else
	{
		echo "<b> $i </b>";
	}
}
if($Page!=$Num_Pages)
{
	echo " <a href ='$_SERVER[SCRIPT_NAME]?CheckC=Contact&Page=$Next_Page'>หน้าถัดไป>></a> ";
}
?>
</div>

<?
}
?>