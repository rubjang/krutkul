<?
if($_REQUEST[ShowPM]=="PM"){
$qr=mysql_query("select * from tb_pm where id_recipient='".$_SESSION['id_member']."'");
$num=mysql_num_rows($qr);
?>
<script type="text/javascript">
//delete
function Del(data1){
	var dataSend={
		id_pm:data1
	}
	$.post("delete-pm.php",dataSend,function(data){
		$("#ShowDel").html(data);
	});
}
//

function compelete(){
window.open("index.php?ShowPM=PM","_self");
return true;
}
</script>
<div id="ShowDel"></div>
<table width="740" border="0" cellpadding="0" cellspacing="1" id="box-table">
  <tr class="text13b">
    <td height="40" colspan="4" align="left" valign="middle">ระบบ PM [<span class="comment"><?=$num?></span>] ฉบับ </td>
  </tr>
  <tr class="comment">
    <td height="30" colspan="4" align="left" valign="middle">ข้อมูลระบบ PM จะทำการลบทิ้งภายใน 5 วัน</td>
  </tr>
  <tr class="link13">
    <td width="36" height="30" align="center" valign="middle" bgcolor="#DCF3D1">#</td>
    <td width="32" align="center" valign="middle" bgcolor="#DCF3D1">#</td>
    <td width="615" align="center" valign="middle" bgcolor="#DCF3D1">หัวข้อ</td>
    <td width="52" align="center" valign="middle" bgcolor="#DCF3D1">จัดการ</td>
  </tr>
  <?
  $n=1;
  while($row=mysql_fetch_array($qr)){
  if($bg=="#FFF4FF"){
  $bg="#FFFFFF";
  }else{
  $bg="#FFF4FF";
  }
  ?>
  <tr bgcolor="<?=$bg;?>" class="link13">
    <td height="30" align="center" valign="middle"><?=$n++;?></td>
    <td align="center" valign="middle">
	<?
	if($row[open_read]==1){
	?>
	<img src="../images/icon/letter_open.gif" width="16" height="16">
	<?
	}else{
	?>
	<img src="../images/icon/yellow_mail.png" width="16" height="16">
	<?
	}
	?>	</td>
    <td align="center" valign="middle"><a href="?ShowPM2=PM2&id_pm=<?=$row[id_pm]?>"><?=stripslashes($row[subject]);?></a></td>
    <td align="center" valign="middle"><a href="javascript:Del(<?=$row[id_pm]?>);" onClick="return confirm('ต้องการลบจริงหรือไม่');"><img src="../images/icon/001_05.gif" width="24" height="24" border="0"></a></td>
  </tr>
  <?
  }
  if(mysql_num_rows($qr)==0){
  ?>
  <tr class="comment">
    <td height="30" colspan="4" align="center" valign="middle">ไม่พบข้อมูล</td>
  </tr>
  <?
  }
  ?>
</table>
<?
}
?>















<?
// แสดง
if($_REQUEST[ShowPM2]=="PM2"){
$result=mysql_fetch_array(mysql_query("select * from tb_pm where id_pm='".(int)$_REQUEST[id_pm]."' and id_recipient='".$_SESSION['id_member']."'"));
mysql_query("Update tb_pm set open_read='1' where id_pm='".(int)$_REQUEST[id_pm]."' and id_recipient='".$_SESSION['id_member']."'");
?>
<table width="740" border="0" cellpadding="0" cellspacing="0" id="box-table">
  <tr class="text13b">
    <td height="40" colspan="4" align="left" valign="middle" bgcolor="#EBEBEB">หัวข้อ : <span class="comment"><?=stripslashes($result[subject]);?></span></td>
  </tr>
  <tr>
    <td width="61" height="30" align="left" valign="middle" bgcolor="#EBEBEB" class="text13b">ชื่อผู้ส่ง:</td>
    <td width="314" align="left" valign="middle" bgcolor="#EBEBEB" class="text13"><?=$result[user_sent]?></td>
    <td width="64" align="left" valign="middle" bgcolor="#EBEBEB" class="text13b">วันที่ส่ง:</td>
    <td width="301" align="left" valign="middle" bgcolor="#EBEBEB" class="text13"><?=$result[today]?></td>
  </tr>
  <tr>
    <td height="100" colspan="4" align="left" valign="top" class="text13b"><div style="width:730px; margin:5px; overflow:hidden;"><?=$result[message]?></div></td>
  </tr>
</table>
<div style="margin:10px;" class="link13"><a href="index.php?ShowPM=PM">ย้อนกลับ</a></div>
<?
}
?>