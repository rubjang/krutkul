<?
$qr=mysql_query("select * from shop where id_member='".$_SESSION['id_member']."'");
if(mysql_num_rows($qr)>0){
if($_REQUEST[Showim]=="Image"){
$re=mysql_fetch_array($qr);
?>
<table width="700" height="30" border="0" cellpadding="0" cellspacing="0">
  <tr class="text13b">
    <td>จัดการรูปต่างๆ</td>
  </tr>
</table>
<br>
<script type="text/javascript">
function check(){
var ff=document.form1;
var type=/\.(jpg|jpeg|pjpeg|gif)/i
if(ff.image.value==""){
alert('กำหนดรูปภาพด้วย!!');
return false;
}
else if(!ff.image.value.match(type)){
alert('ไม่อนุญาติไฟล์ภาพนี้!!');
return false;
}else{
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
window.open("index.php?Showim=Image","_self");
return true;
}
</script>
<iframe name="Iframs" id="Iframs" src="" class="iframs"></iframe>
<form action="save-image-shop.php" target="Iframs" method="post" enctype="multipart/form-data" name="form1" onSubmit="return check();">
<table width="700" border="0" cellpadding="0" cellspacing="1" id="box-table">
  <tr class="text13b">
    <td height="40" colspan="2" align="center" valign="middle">ภาพประจำร้านค้า</td>
  </tr>
  <tr class="comment">
    <td height="150" colspan="2" align="center" valign="middle">
	<?
	$im="../images2/image-shop/bg-logo-shop/{$re[image_shop]}";
	if(is_array(@file($im))){
	?>
	<img src="../images2/image-shop/bg-logo-shop/<?=$re[image_shop]?>" width="130" height="140" id="boximage">
	<?
	}else{
	echo"ยังไม่มีรูปภาพ";
	}
	?>	</td>
  </tr>
  <tr class="text13b">
    <td width="179" height="30">รูปประจำร้านค้า:</td>
    <td width="518" height="30"><input name="image" type="file" id="image"> <span class="comment">100 kb</span></td>
  </tr>
  <tr class="text13b">
    <td height="40" colspan="2" align="center" valign="middle">
	<input type="submit" name="Submit" value="ดำเนินการ" id="button">
	<input type="hidden" name="image_shop" value="1">
	<input type="hidden" name="id_shop" value="<?=$re[id_shop]?>">
	<input type="hidden" name="id_member" value="<?=$_SESSION['id_member']?>">
	<span id="Showdata"></span>
	</td>
  </tr>
</table>
</form>





<br>
<script type="text/javascript">
function check2(){
var ff=document.form2;
var type=/\.(jpg|jpeg|pjpeg|gif)/i
if(ff.image2.value==""){
alert('กำหนดรูปภาพด้วย!!');
return false;
}
else if(!ff.image2.value.match(type)){
alert('ไม่อนุญาติไฟล์ภาพนี้!!');
return false;
}else{
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
window.open("index.php?Showim=Image","_self");
return true;
}
</script>
<iframe name="Iframs2" id="Iframs2" src="" class="iframs"></iframe>
<form action="save-image-shop.php" target="Iframs2" method="post" enctype="multipart/form-data" name="form2" onSubmit="return check2();">
<table width="700" border="0" cellpadding="0" cellspacing="1" id="box-table">
  <tr class="text13b">
    <td height="40" colspan="2" align="center" valign="middle">พื้นหลังร้านค้า</td>
  </tr>
  <tr class="comment">
    <td height="90" colspan="2" align="center" valign="middle">
	<?
	$im="../images2/image-shop/bg-logo-shop/{$re[bg_shop]}";
	if(is_array(@file($im))){
	?>
	<img src="../images2/image-shop/bg-logo-shop/<?=$re[bg_shop]?>" name="boximage" width="80" height="80" id="boximage">
	<?
	}else{
	echo"ยังไม่มีรูปภาพ";
	}
	?>	</td>
  </tr>
  <tr class="text13b">
    <td width="179" height="30">กำหนดภาพ:</td>
    <td width="518" height="30"><input name="image2" type="file" id="image2"> <span class="comment">50 kb</span></td>
  </tr>
  <tr class="text13b">
    <td height="40" colspan="2" align="center" valign="middle">
	<input type="submit" name="Submit" value="ดำเนินการ" id="button">
	<input type="hidden" name="image_shop" value="2">
	<input type="hidden" name="id_shop" value="<?=$re[id_shop]?>">
	<input type="hidden" name="id_member" value="<?=$_SESSION['id_member']?>">
	<span id="Showdata2"></span>
	</td>
  </tr>
</table>
</form>






<br>
<script type="text/javascript">
function check3(){
var ff=document.form3;
var type=/\.(jpg|jpeg|pjpeg|gif)/i
if(ff.image3.value==""){
alert('กำหนดรูปภาพด้วย!!');
return false;
}
else if(!ff.image3.value.match(type)){
alert('ไม่อนุญาติไฟล์ภาพนี้!!');
return false;
}else{
document.getElementById('Showdata3').innerHTML="<img src='../images/icon/loading_blue.gif' width='16' height='16' border='0'>";
return true;
}
}

function SentEr3(){
document.getElementById('Showdata3').innerHTML="";
return true;
}

function SentOK3(){
document.getElementById('Showdata3').innerHTML="";
window.open("index.php?Showim=Image","_self");
return true;
}
</script>
<iframe name="Iframs3" id="Iframs3" src="" class="iframs"></iframe>
<form action="save-image-shop.php" target="Iframs3" method="post" enctype="multipart/form-data" name="form3" onSubmit="return check3();">
<table width="700" border="0" cellpadding="0" cellspacing="1" id="box-table">
  <tr class="text13b">
    <td height="40" colspan="2" align="center" valign="middle">ภาพโลโก้ร้านค้า</td>
  </tr>
  <tr class="comment">
    <td height="150" colspan="2" align="center" valign="middle">
	<?
	$im="../images2/image-shop/bg-logo-shop/{$re[logo_shop]}";
	if(is_array(@file($im))){
	?>
	<img src="../images2/image-shop/bg-logo-shop/<?=$re[logo_shop]?>" name="boximage" width="700" height="140" id="boximage">
	<?
	}else{
	echo"ยังไม่มีรูปภาพ";
	}
	?>	</td>
  </tr>
  <tr class="text13b">
    <td width="179" height="30">กำหนดภาพ:</td>
    <td width="518" height="30"><input name="image3" type="file" id="image3"> 
    <span class="comment">100 kb</span></td>
  </tr>
  <tr class="text13b">
    <td height="40" colspan="2" align="center" valign="middle">
	<input type="submit" name="Submit" value="ดำเนินการ" id="button">
	<input type="hidden" name="image_shop" value="3">
	<input type="hidden" name="id_shop" value="<?=$re[id_shop]?>">
	<input type="hidden" name="id_member" value="<?=$_SESSION['id_member']?>">
	<span id="Showdata3"></span>
	</td>
  </tr>
</table>
</form>
<?
}

}//num
else{
?>
<div style="margin:50px 0px;" class="comment">ยังไม่พบร้านค้า กรุณาสร้างร้านค้าก่อน</div>
<?
}
?>