<?
$qr=mysql_query("select * from shop where id_member='".$_SESSION['id_member']."'");
if(mysql_num_rows($qr)>0){
$re_shop=mysql_fetch_array($qr);

if($_REQUEST[Description]=="Shop"){
$qr_des=mysql_query("select * from shop_description where id_member='".$_SESSION['id_member']."' and id_shop='$re_shop[id_shop]'");
if(mysql_num_rows($qr_des)==0){
?>
<script type="text/javascript">
function check(){
document.getElementById('Showdata').innerHTML="<img src='../images/icon/loading_blue.gif' width='16' height='16' border='0'>";
return true;
}

function SentEr(){
document.getElementById('Showdata').innerHTML="";
return true;
}

function SentOK(){
document.getElementById('Showdata').innerHTML="";
window.open("index.php?Description=Shop","_self");
return true;
}
</script>

<iframe name="Iframs" id="Iframs" src="" class="iframs"></iframe>
<form id="form1" name="form1" method="post" target="Iframs" action="save-description.php" onsubmit="return check();">
<table width="740" border="0" cellpadding="0" cellspacing="1">
  <tr class="text13b">
    <td height="40" align="left" valign="middle">เพิ่มคำอธิบายหน้าร้านค้าออนไลน์</td>
  </tr>
  <tr>
    <td height="50" align="center" valign="middle"><textarea id="editor1" name="message"></textarea></td>
  </tr>
  <tr>
    <td height="50" align="center" valign="middle">
	<input type="submit" name="Submit" value="ดำเนินการ" id="button"/>
	<input type="hidden" name="id_member" value="<?=$_SESSION['id_member']?>" />
	<input type="hidden" name="id_shop" value="<?=$re_shop[id_shop]?>" />
	<span id="Showdata"></span>
	</td>
  </tr>
</table>
</form>
<?
}else{
$qr_des2=mysql_fetch_array(mysql_query("select * from shop_description where id_member='".$_SESSION['id_member']."' and id_shop='$re_shop[id_shop]'"));
?>
<script type="text/javascript">
function check2(){
document.getElementById('Showdata2').innerHTML="<img src='../images/icon/loading_blue.gif' width='16' height='16' border='0'>";
return true;
}

function SentEr(){
document.getElementById('Showdata2').innerHTML="";
return true;
}

function SentOK(){
document.getElementById('Showdata2').innerHTML="";
window.open("index.php?Description=Shop","_self");
return true;
}
</script>

<iframe name="Iframs2" id="Iframs2" src="" class="iframs"></iframe>
<form id="form2" name="form2" method="post" target="Iframs2" action="save-edit-description.php" onsubmit="return check2();">
<table width="740" border="0" cellpadding="0" cellspacing="1">
  <tr class="text13b">
    <td height="40" align="left" valign="middle">เปลี่ยนคำอธิบายหน้าร้านค้าออนไลน์</td>
  </tr>
  <tr>
    <td height="50" align="center" valign="middle"><textarea id="editor1" name="message"><?=$qr_des2[message]?></textarea></td>
  </tr>
  <tr>
    <td height="50" align="center" valign="middle">
	<input type="submit" name="Submit" value="ดำเนินการ" id="button"/>
	<input type="hidden" name="id_member" value="<?=$_SESSION['id_member']?>" />
	<input type="hidden" name="id_shop" value="<?=$re_shop[id_shop]?>" />
	<input type="hidden" name="id_des" value="<?=$qr_des2[id_des]?>" />
	<span id="Showdata2"></span>
	</td>
  </tr>
</table>
</form>
<?
}

} //$_REQUEST[Description]=="Shop"
?>

<?
}//shop
?>