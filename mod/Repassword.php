<?
if($_REQUEST[Repass]=="Newpass"){
$row=mysql_fetch_array(mysql_query("select * from member where id_member='".$_SESSION['id_member']."'"));
?>
<script type="text/javascript">
function checkform(){
var ff=document.register;


if(ff.password.value==""){
alert('ป้อนรหัสผ่านเดิมด้วย');
ff.password.focus();
return false;
}
else if(ff.newpass.value==""){
alert('กำหนดรหัสผ่านใหม่ด้วย');
ff.newpass.focus();
return false;
}
else if(ff.newpass.value.length < 4){
alert('รหัสผ่านใหม่ต้องมากว่า 4 ตัวอักษรขึ้นไป');
ff.newpass.focus();
return false;
}
else if(ff.confpassword.value==""){
alert('ป้อนยืนยันรหัสด้วย');
ff.confpassword.focus();
return false;
}
else if(ff.confpassword.value != ff.newpass.value){
alert('รหัสยืนยันไม่ตรงกัน');
ff.newpass.focus();
return false;
}
else{
document.getElementById('Showdata').innerHTML="<img src='../images/icon/loading_blue.gif' width='16' height='16' border='0'>";
return true;
}
}

function SentEr(){
document.getElementById('Showdata').innerHTML="";
return true;
}

function SentOK(){
document.getElementById('Showdata').innerHTML="";
window.open("index.php?Repass=Newpass","_self");
return true;
}
</script>
<iframe name="Iframs" id="Iframs" src="" class="iframs"></iframe>
<form name="register" id="register" method="post" target="Iframs" action="save-Repass.php" onsubmit="return checkform();">
<table width="700" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="30" align="left" valign="middle"><div style="margin:0px 0px 0px 10px;" class="text13b">แก้ไขรหัสผ่าน </div></td>
  </tr>
  <tr>
    <td height="30">
	<fieldset class="text13b">
	<legend>ข้อมูลรหัสผ่าน</legend>
    <table width="510" border="0" cellpadding="0" cellspacing="0">
      <tr class="text13b">
        <td height="30" align="left" valign="middle">ชื่อผู้ใช้งาน:</td>
        <td align="left" valign="middle"><input value="<?=$row[username]?>" name="username" type="text" id="username" style="width:150px;" disabled="disabled"></td>
      </tr>
	  <tr class="text13b">
        <td width="147" height="30" align="left" valign="middle">รหัสผ่านเดิม:</td>
        <td width="363" align="left" valign="middle"><input name="password" type="password" id="password" style="width:150px;">
        <span class="comment">*(4 ตัวขึ้นไป)</span></td>
      </tr>
      <tr class="text13b">
        <td height="30" align="left" valign="middle">รหัสผ่านใหม่:</td>
        <td align="left" valign="middle"><input name="newpass" type="password" id="newpass" style="width:150px;">
        <span class="comment">*(ยืนยันรหัส)</span></td>
      </tr>
      <tr class="text13b">
        <td height="30" align="left" valign="middle">ยืนยันรหัสผ่านใหม่:</td>
        <td align="left" valign="middle"><input name="confpassword" type="password" id="confpassword" style="width:150px;"></td>
      </tr>
      <tr class="text13b">
        <td height="40" colspan="2" align="center" valign="middle">
		<input type="submit" name="Submit" value="ดำเนินการ" id="button">
		<input type="hidden" name="id_member" value="<?=$_SESSION['id_member']?>">
		<span id="Showdata"></span>
		</td>
        </tr>
    </table>
	</fieldset>
	</td>
    </tr>
</table>
</form>
<?
}
else{
header('location:./.');
}
?>