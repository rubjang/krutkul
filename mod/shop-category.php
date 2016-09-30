<?
$qr=mysql_query("select * from shop where id_member='".$_SESSION['id_member']."'");
if(mysql_num_rows($qr)>0){
if($_REQUEST[Addcategory]=="category"){
$row=mysql_fetch_array($qr);
?>
<script type="text/javascript">
function check(){
var ff=document.form1;

if(ff.category.value==""){
alert('ป้อนข้อมูลด้วย');
ff.category.focus();
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
window.open("index.php?Addcategory=category","_self");
return true;
}
</script>

<iframe name="Iframs" id="Iframs" src="" class="iframs"></iframe>
<form name="form1" method="post" action="save-shop-category.php" target="Iframs" onSubmit="return check();">
  <table width="740" border="0" cellpadding="0" cellspacing="1">
    <tr class="text13b">
      <td height="40" colspan="2" align="left" valign="middle">เพิ่มหมวดหมู่สินค้า</td>
    </tr>
    <tr class="text13b">
      <td width="101" height="30" align="left" valign="middle">หมวดหมู่:</td>
      <td width="636" align="left" valign="middle"><input name="category" type="text" id="category" style="width:250px;"></td>
    </tr>
    <tr class="text13b">
      <td height="50" colspan="2" align="center" valign="middle">
	  <input  type="submit" name="Submit" value="ดำเนินการ" id="button">
	  <input type="hidden" name="id_member" value="<?=$_SESSION['id_member']?>">
	  <input type="hidden" name="id_shop" value="<?=$row[id_shop]?>">
	  <span id="Showdata"></span>
	  </td>
    </tr>
  </table>
</form>
<?
$qr_cate=mysql_query("select * from shop_category where id_member='".$_SESSION['id_member']."' and id_shop='$row[id_shop]'");
if(mysql_num_rows($qr_cate)>0){
?>
<br>
<script type="text/javascript">
//delete
function Del(data1,data2){
	var dataSend={
		id_category:data1,
		id_member:data2
	}
	$.post("shop-delete-category.php",dataSend,function(data){
		$("#ShowDel").html(data);
	});
}
//

function compelete(){
window.open("index.php?Addcategory=category","_self");
return true;
}
</script>
<div id="ShowDel"></div>
<table width="643" border="0" cellpadding="0" cellspacing="1" id="box-table">
  <tr class="text13b">
    <td height="40" colspan="4" align="center" valign="middle">รายการหมวดหมู่สินค้า</td>
  </tr>
  <tr class="text13b">
    <td width="59" height="30" align="center" valign="middle" bgcolor="#F2FFE6">#</td>
    <td width="354" align="center" valign="middle" bgcolor="#F2FFE6">หมวดหมู่</td>
    <td width="61" align="center" valign="middle" bgcolor="#F2FFE6">สินค้า</td>
    <td width="164" align="center" valign="middle" bgcolor="#F2FFE6">จัดการ</td>
  </tr>
  <?
  $n=1;
  while($row_cate=mysql_fetch_array($qr_cate)){
  if($bg=="#FFF4F4"){
  $bg="#FFFFFF";
  }else{
  $bg="#FFF4F4";
  }
  ?>
  <tr bgcolor="<?=$bg;?>" class="text13">
    <td height="30" align="center" valign="middle"><?=$n++;?></td>
    <td align="center" valign="middle"><?=stripslashes($row_cate[category])?></td>
    <td align="center" valign="middle"><?=number_format(mysql_num_rows(mysql_query("select id_category from shop_sinka where id_category='$row_cate[id_category]'")));?></td>
    <td align="center" valign="middle">
	<a href="?AddSinka=Sinka&id_shop=<?=$row_cate[id_shop]?>&id_category=<?=$row_cate[id_category]?>"><img src="../images/icon/add.png" width="24" height="24" border="0" title="เพิ่มสินค้า" align="absbottom"></a>&nbsp;&nbsp;
	<a href="?DooSinka=Sinka&id_shop=<?=$row_cate[id_shop]?>&id_category=<?=$row_cate[id_category]?>"><img src="../images/icon/001_38.gif" width="24" height="24" border="0" title="ดูสินค้า" align="absbottom"></a>&nbsp;&nbsp;
	<a href="?Editcate=category&id_category=<?=$row_cate[id_category]?>"><img src="../images/icon/001_45.gif" width="24" height="24" border="0" title="แก้ไขหมวดหมู่" align="absbottom"></a>&nbsp;&nbsp;
	<a href="javascript:Del(<?=$row_cate[id_category]?>,<?=$_SESSION['id_member']?>);" onclick="return confirm('ต้องการลบจริงหรือไม่');"><img src="../images/icon/001_05.gif" width="24" height="24" border="0" title="ลบหมวดหมู่" align="absbottom"></a>	</td>
  </tr>
  <?
  }
  ?>
</table>
<?
}// shop_catdgory

}


//แก้ไข
if($_REQUEST[Editcate]=="category"){
$result=mysql_fetch_array(mysql_query("select * from shop_category where id_category='".$_REQUEST[id_category]."'"));
?>
<script type="text/javascript">
function check2(){
var ff=document.form2;

if(ff.category.value==""){
alert('ป้อนข้อมูลด้วย');
ff.category.focus();
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
window.open("index.php?Addcategory=category","_self");
return true;
}
</script>

<iframe name="Iframs2" id="Iframs2" src="" class="iframs"></iframe>
<form name="form2" method="post" action="save-edit-category.php" target="Iframs2" onSubmit="return check2();">
  <table width="740" border="0" cellpadding="0" cellspacing="1">
    <tr class="text13b">
      <td height="40" colspan="2" align="left" valign="middle">แก้ไขหมวดหมู่สินค้า</td>
    </tr>
    <tr class="text13b">
      <td width="101" height="30" align="left" valign="middle">หมวดหมู่:</td>
      <td width="636" align="left" valign="middle"><input name="category" type="text" id="category" style="width:250px;" value="<?=htmlspecialchars(stripslashes($result[category]));?>"></td>
    </tr>
    <tr class="text13b">
      <td height="50" colspan="2" align="center" valign="middle">
	  <input  type="submit" name="Submit" value="ดำเนินการ" id="button">
	  <input type="hidden" name="id_member" value="<?=$_SESSION['id_member']?>">
	  <input type="hidden" name="id_shop" value="<?=$result[id_shop]?>">
	  <input type="hidden" name="id_category" value="<?=$_REQUEST[id_category]?>">
	  <span id="Showdata2"></span>
	  </td>
    </tr>
  </table>
</form>
<?
}//แก้ไข

} //num
else{
?>
<div style="margin:50px 0px;" class="comment">ยังไม่พบร้านค้า กรุณาสร้างร้านค้าก่อน</div>
<?
}
?>