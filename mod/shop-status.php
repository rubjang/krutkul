<?
$qr=mysql_query("select * from shop where id_member='".$_SESSION['id_member']."'");
if(mysql_num_rows($qr)>0){

if($_REQUEST[shopOff]=="On"){
$row=mysql_fetch_array($qr);
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
window.open("index.php?shopOff=On","_self");
return true;
}
</script>
<iframe name="Iframs" id="Iframs" src="" class="iframs"></iframe>
<form name="form1" method="post" action="save-shop-status.php" onSubmit="return check();" target="Iframs">
  <table width="700" border="0" cellpadding="0" cellspacing="1" id="box-table">
    <tr class="text13b">
      <td height="40" align="left" valign="middle">จัดการสถานะร้านค้า</td>
    </tr>
    <tr class="text13b">
      <td height="40" align="center" valign="middle">ควบคุมร้านค้า 
      <input name="status_shop" type="radio" value="on" <? if($row[status_shop]=="on"){ echo"checked";}?>>
      เปิดร้านค้า 
      <input name="status_shop" type="radio" value="off" <? if($row[status_shop]=="off"){ echo"checked";}?>>
      ปิดร้านค้า 
      <input type="submit" name="Submit" value="ดำเนินการ">
	  <input type="hidden" name="id_member" value="<?=$_SESSION['id_member']?>">
	  <input type="hidden" name="id_shop" value="<?=$row[id_shop]?>">
	  <span id="Showdata"></span>
	  </td>
    </tr>
  </table>
</form>
<?
}
?>


<?
} //shop
else{
echo"<div class='comment'>ยังไม่พบร้านค้า</div>";
}
?>