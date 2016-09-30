<?
$qr=mysql_query("select * from shop where id_member='".$_SESSION['id_member']."'");
if(mysql_num_rows($qr)>0){
$row=mysql_fetch_array($qr);
//เพิ่มเมนู
$qr_menu=mysql_query("select * from shop_menu where id_member='".$_SESSION['id_member']."' and id_shop='$row[id_shop]'");
if(mysql_num_rows($qr_menu)==0){


if($_REQUEST[MenuMain]=="Menu"){
?>
<script type="text/javascript">
function check(){
var ff=document.form1;

if(ff.menu1.value==""){
alert('ป้อนข้อมูลด้วย');
ff.menu1.focus();
return false;
}
else if(ff.menu2.value==""){
alert('ป้อนข้อมูลด้วย');
ff.menu2.focus();
return false;
}
else if(ff.menu3.value==""){
alert('ป้อนข้อมูลด้วย');
ff.menu3.focus();
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
window.open("index.php?MenuMain=Menu","_self");
return true;
}
</script>

<iframe name="Iframs" id="Iframs" src="" class="iframs"></iframe>
<form name="form1" method="post" target="Iframs" action="save-menu.php" onSubmit="return check();">
  <table width="740" border="0" cellpadding="0" cellspacing="1" id="box-table">
    <tr class="text13b">
      <td height="40" colspan="2" align="left" valign="middle">จัดการเพิ่มเมนูร้านค้าออนไลน์</td>
    </tr>
    <tr class="text13b">
      <td width="65" height="30" align="center" valign="middle">ชื่อเมนู:</td>
      <td width="483" align="left" valign="middle"><input name="menu1" type="text" id="menu1" style="width:300px;" value="วิธีการสั่งซื้อและชำระเงิน"></td>
    </tr>
    <tr class="text13b">
      <td width="65" height="30" align="center" valign="middle">ชื่อเมนู:</td>
      <td width="483" align="left" valign="middle"><input name="menu2" type="text" id="menu2" style="width:300px;" value="เกี่ยวกับเรา"></td>
    </tr>
	<tr class="text13b">
      <td width="65" height="30" align="center" valign="middle">ชื่อเมนู:</td>
      <td width="483" align="left" valign="middle"><input name="menu3" type="text" id="menu3" style="width:300px;" value="ติดต่อเรา"></td>
    </tr>
    <tr class="text13b">
      <td height="50" colspan="2" align="center" valign="middle" class="text13">
	  <input type="submit" name="Submit" value="ดำเนินการ" id="button">
	  <input type="hidden" name="id_member" value="<?=$_SESSION['id_member']?>">
	  <input type="hidden" name="id_shop" value="<?=$row[id_shop]?>">
	  <span id="Showdata"></span>	  </td>
    </tr>
  </table>
</form>
<?
}

} //menu ==0

else{
$row_menu=mysql_fetch_array($qr_menu);
?>
<script type="text/javascript">
function check2(){
var ff=document.form2;

if(ff.menu1.value==""){
alert('ป้อนข้อมูลด้วย');
ff.menu1.focus();
return false;
}
else if(ff.menu2.value==""){
alert('ป้อนข้อมูลด้วย');
ff.menu2.focus();
return false;
}
else if(ff.menu3.value==""){
alert('ป้อนข้อมูลด้วย');
ff.menu3.focus();
return false;
}
else{
document.getElementById('Showdata2').innerHTML="<img src='../images/icon/loading_blue.gif' width='16' height='16' border='0'>";
return true;
}
}

function SentEr2(){
document.getElementById('Showdata2').innerHTML="";
return true;
}

function SentOK2(){
document.getElementById('Showdata2').innerHTML="";
window.open("index.php?MenuMain=Menu","_self");
return true;
}
</script>

<iframe name="Iframs2" id="Iframs2" src="" class="iframs"></iframe>
<form name="form2" method="post" target="Iframs2" action="save-edit-menu.php" onSubmit="return check2();">
  <table width="740" border="0" cellpadding="0" cellspacing="1" id="box-table">
    <tr class="text13b">
      <td height="40" colspan="2" align="left" valign="middle">จัดการแก้ไขเมนูร้านค้าออนไลน์</td>
    </tr>
    <tr class="text13b">
      <td width="65" height="30" align="center" valign="middle">ชื่อเมนู:</td>
      <td width="483" align="left" valign="middle"><input name="menu1" type="text" id="menu1" style="width:300px;" value="<?=$row_menu[menu_shop]?>"></td>
    </tr>
    <tr class="text13b">
      <td width="65" height="30" align="center" valign="middle">ชื่อเมนู:</td>
      <td width="483" align="left" valign="middle"><input name="menu2" type="text" id="menu2" style="width:300px;" value="<?=$row_menu[menu_shop2]?>"></td>
    </tr>
	<tr class="text13b">
      <td width="65" height="30" align="center" valign="middle">ชื่อเมนู:</td>
      <td width="483" align="left" valign="middle"><input name="menu3" type="text" id="menu3" style="width:300px;" value="<?=$row_menu[menu_shop3]?>"></td>
    </tr>
    <tr class="text13b">
      <td height="50" colspan="2" align="center" valign="middle" class="text13">
	  <input type="submit" name="Submit" value="ดำเนินการ" id="button">
	  <input type="hidden" name="id_member" value="<?=$_SESSION['id_member']?>">
	  <input type="hidden" name="id_shop" value="<?=$row[id_shop]?>">
	  <input type="hidden" name="id_menu" value="<?=$row_menu[id_menu]?>">
	  <span id="Showdata2"></span>	  </td>
    </tr>
  </table>
</form>
<br />
<table width="451" border="0" cellpadding="0" cellspacing="1" id="box-table">
  <tr class="text13b">
    <td height="40" colspan="3" align="center" valign="middle" bgcolor="#FFF4D2">รายการเมนูในระบบ</td>
  </tr>
  <tr class="text13">
    <td width="50" height="30" align="center" valign="middle">1</td>
    <td width="331" align="center" valign="middle"><?=$row_menu[menu_shop]?></td>
    <td width="66" align="center" valign="middle"><a href="?menuMessage=Message&id_shop=<?=$row_menu[id_shop]?>&id_menu=<?=$row_menu[id_menu]?>&menu=1"><img src="../images/icon/add.png" width="24" height="24" border="0" /></a></td>
  </tr>
  <tr class="text13">
    <td height="30" align="center" valign="middle" bgcolor="#F4F4F4">2</td>
    <td align="center" valign="middle" bgcolor="#F4F4F4"><?=$row_menu[menu_shop2]?></td>
    <td align="center" valign="middle" bgcolor="#F4F4F4"><a href="?menuMessage2=Message2&id_shop=<?=$row_menu[id_shop]?>&id_menu=<?=$row_menu[id_menu]?>&menu=2"><img src="../images/icon/add.png" width="24" height="24" border="0" /></a></td>
  </tr>
  <tr class="text13">
    <td height="30" align="center" valign="middle">3</td>
    <td align="center" valign="middle"><?=$row_menu[menu_shop3]?></td>
    <td align="center" valign="middle"><a href="?menuMessage3=Message3&id_shop=<?=$row_menu[id_shop]?>&id_menu=<?=$row_menu[id_menu]?>&menu=3"><img src="../images/icon/add.png" width="24" height="24" border="0" /></a></td>
  </tr>
</table>
<?
}
// menu ==1
?>



<?
}// num shop
else{
?>
<div style="margin:50px 0px;" class="comment">ยังไม่พบร้านค้า กรุณาสร้างร้านค้าก่อน</div>
<?
}
?>