<?
$qr=mysql_query("select * from shop where id_member='".$_SESSION['id_member']."'");
$num=mysql_num_rows($qr);
if($num==0){
if($_REQUEST[RegistShop]=="OpenShop"){
?>
<script type="text/javascript">
function check(){
var ff=document.form1;
if(ff.name_shop.value==""){
alert('ตั้งชื่อร้านค้าด้วย');
ff.name_shop.focus();
return false;
}
else if(ff.description_shop.value==""){
alert('ป้อนรายละเอียดร้านค้าด้วย');
ff.description_shop.focus();
return false;
}
else if(ff.keyword_shop.value==""){
alert('กำหนดคำค้นด้วย');
ff.keyword_shop.focus();
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
window.open("index.php?EditRegistShop=OpenShop","_self");
return true;
}
</script>
<iframe name="Iframs" id="Iframs" src="" class="iframs"></iframe>
<form name="form1" method="post" target="Iframs" action="save-shop.php" onSubmit="return check();">
<table width="740" border="0" cellpadding="0" cellspacing="1" id="box-table">
  <tr class="text13b">
    <td height="40" colspan="2" align="left" valign="middle">สมัครเปิดร้านค้าออนไลน์</td>
    </tr>
  <tr class="text13b">
    <td width="112" height="30" align="left" valign="middle">ชื่อร้านค้า:</td>
    <td width="625" align="left" valign="middle"><input name="name_shop" type="text" id="name_shop" style="width:300px;"></td>
  </tr>
  <tr class="text13b">
    <td height="90" align="left" valign="middle">คำอธิบายร้านค้า:</td>
    <td align="left" valign="middle"><textarea name="description_shop" rows="5" id="description_shop" style="width:300px;"></textarea></td>
  </tr>
  <tr class="text13b">
    <td height="30" align="left" valign="middle">คำค้น Google: </td>
    <td align="left" valign="middle"><input name="keyword_shop" type="text" id="keyword_shop" style="width:300px;"> <span class="comment">หากมีหลายคำค้น ให้ใส่ , (comma) คั่น ด้วย เช่น shop,shop2</span></td>
  </tr>
  <tr class="text13b">
    <td height="50" colspan="2" align="center" valign="middle">
	<input type="submit" name="Submit" value="ดำเนินการ" id="button">
	<input type="hidden" name="id_member" value="<?=$_SESSION['id_member']?>">
	<span id="Showdata"></span>
	</td>
    </tr>
</table>
</form>
<?
}









//แก้ไข
}elseif($num>0){
if($_REQUEST[EditRegistShop]=="OpenShop"){
$row=mysql_fetch_array($qr);
?>
<script type="text/javascript">
function check2(){
var ff=document.form2;
if(ff.description_shop.value==""){
alert('ป้อนรายละเอียดร้านค้าด้วย');
ff.description_shop.focus();
return false;
}
else if(ff.keyword_shop.value==""){
alert('กำหนดคำค้นด้วย');
ff.keyword_shop.focus();
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
window.open("index.php?EditRegistShop=OpenShop","_self");
return true;
}
</script>
<iframe name="Iframs2" id="Iframs2" src="" class="iframs"></iframe>
<form name="form2" method="post" target="Iframs2" action="save-edit-shop.php" onSubmit="return check2();">
<table width="740" border="0" cellpadding="0" cellspacing="1" id="box-table">
  <tr class="text13b">
    <td height="40" colspan="2" align="left" valign="middle">แก้ไขร้านค้าออนไลน์</td>
    </tr>
  <tr class="text13b">
    <td width="112" height="30" align="left" valign="middle">ชื่อร้านค้า:</td>
    <td width="625" align="left" valign="middle"><input value="<?=stripslashes($row[name_shop])?>" name="name_shop" type="text" id="name_shop" style="width:300px;" disabled="disabled"></td>
  </tr>
  <tr class="text13b">
    <td height="90" align="left" valign="middle">คำอธิบายร้านค้า:</td>
    <td align="left" valign="middle"><textarea name="description_shop" rows="5" id="description_shop" style="width:300px;"><?=$row[description_shop]?></textarea></td>
  </tr>
  <tr class="text13b">
    <td height="30" align="left" valign="middle">คำค้น Google: </td>
    <td align="left" valign="middle"><input value="<?=$row[keyword_shop]?>" name="keyword_shop" type="text" id="keyword_shop" style="width:300px;"> <span class="comment">หากมีหลายคำค้น ให้ใส่ , (comma) คั่น ด้วย เช่น shop,shop2</span></td>
  </tr>
  <tr class="text13b">
    <td height="50" colspan="2" align="center" valign="middle">
	<input type="submit" name="Submit" value="ดำเนินการ" id="button">
	<input type="hidden" name="id_shop" value="<?=$row[id_shop]?>">
	<input type="hidden" name="id_member" value="<?=$_SESSION['id_member']?>">
	<span id="Showdata2"></span>
	</td>
    </tr>
</table>
</form>
<?
}

}
?>