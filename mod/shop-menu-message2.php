<?
$qr=mysql_query("select * from shop where id_member='".$_SESSION['id_member']."'");
if(mysql_num_rows($qr)>0){

if($_REQUEST[menu]==2){
$qr_menu=mysql_query("select * from shop_menu where id_menu='".(int)$_REQUEST[id_menu]."' and id_member='".$_SESSION['id_member']."'");
$r_menu=mysql_fetch_array($qr_menu);

$mess=mysql_query("select * from shop_menu_message where id_member='".$_SESSION['id_member']."' and menu='".(int)$_REQUEST[menu]."'");
$num=mysql_num_rows($mess);
//num menu message
if($num==0){

if($_REQUEST[menuMessage2]=="Message2"){
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

function SentOK(id,id2,id3){
document.getElementById('Showdata').innerHTML="";
window.open("index.php?menuMessage2=Message2&id_shop="+id+"&id_menu="+id2+"&menu="+id3,"_self");
return true;
}
</script>

<iframe name="Iframs" id="Iframs" src="" class="iframs"></iframe>
<form name="form1" method="post" action="save-menu-message.php" target="Iframs" onSubmit="return check();">
  <table width="740" border="0" cellpadding="0" cellspacing="1">
    <tr class="text13b">
      <td height="40" colspan="2" align="left" valign="middle">เพิ่มรายละเอียดเมนู</td>
    </tr>
    <tr class="text13b">
      <td width="52" height="30" align="center" valign="middle">เมนู:</td>
      <td width="685" align="left" valign="middle" class="comment"><b><?=$r_menu[menu_shop2]?></b></td>
    </tr>
    <tr>
      <td height="30" colspan="2" align="center" valign="middle"><textarea id="editor1" name="message"></textarea></td>
    </tr>
    <tr>
      <td height="50" colspan="2" align="center" valign="middle">
	  <input type="submit" name="Submit" value="ดำเนินการ" id="button">
	  <input type="hidden" name="id_member" value="<?=$_SESSION['id_member']?>">
	  <input type="hidden" name="id_shop" value="<?=$_REQUEST[id_shop]?>">
	  <input type="hidden" name="id_menu" value="<?=$_REQUEST[id_menu]?>">
	  <input type="hidden" name="menu" value="<?=$_REQUEST[menu]?>">
	  <span id="Showdata"></span>
	  </td>
    </tr>
    <tr class="link13">
      <td height="50" colspan="2" align="center" valign="middle"><a href="index.php?MenuMain=Menu">ย้อนกลับ</a></td>
    </tr>
  </table>
</form>
<?
}

} //num menu message
else{
$result_mess=mysql_fetch_array($mess);
?>
<script type="text/javascript">
function check2(){
document.getElementById('Showdata2').innerHTML="<img src='../images/icon/loading_blue.gif' width='16' height='16' border='0'>";
return true;
}

function SentEr2(){
document.getElementById('Showdata2').innerHTML="";
return true;
}

function SentOK2(id,id2,id3){
document.getElementById('Showdata2').innerHTML="";
window.open("index.php?menuMessage2=Message2&id_shop="+id+"&id_menu="+id2+"&menu="+id3,"_self");
return true;
}
</script>

<iframe name="Iframs2" id="Iframs2" src="" class="iframs"></iframe>
<form name="form2" method="post" action="save-edit-message.php" target="Iframs2" onSubmit="return check2();">
  <table width="740" border="0" cellpadding="0" cellspacing="1">
    <tr class="text13b">
      <td height="40" colspan="2" align="left" valign="middle">แก้ไขรายละเอียดเมนู</td>
    </tr>
    <tr class="text13b">
      <td width="52" height="30" align="center" valign="middle">เมนู:</td>
      <td width="685" align="left" valign="middle" class="comment"><b><?=$r_menu[menu_shop2]?></b></td>
    </tr>
    <tr>
      <td height="30" colspan="2" align="center" valign="middle"><textarea id="editor1" name="message"><?=$result_mess[message]?></textarea></td>
    </tr>
    <tr>
      <td height="50" colspan="2" align="center" valign="middle">
	  <input type="submit" name="Submit" value="ดำเนินการ" id="button">
	  <input type="hidden" name="id_member" value="<?=$_SESSION['id_member']?>">
	  <input type="hidden" name="id_shop" value="<?=$_REQUEST[id_shop]?>">
	  <input type="hidden" name="id_menu" value="<?=$_REQUEST[id_menu]?>">
	  <input type="hidden" name="menu" value="<?=$_REQUEST[menu]?>">
	  <input type="hidden" name="id_message" value="<?=$result_mess[id_message]?>">
	  <span id="Showdata2"></span>
	  </td>
    </tr>
    <tr class="link13">
      <td height="50" colspan="2" align="center" valign="middle"><a href="index.php?MenuMain=Menu">ย้อนกลับ</a></td>
    </tr>
  </table>
</form>
<?
}

}// menu
?>


<?
} //shop
else{
?>
<div style="margin:50px 0px;" class="comment">ยังไม่พบร้านค้า กรุณาสร้างร้านค้าก่อน</div>
<?
}
?>