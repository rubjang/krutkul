<?
if($_REQUEST[AddArticle]=="Article"){
?>
<script type="text/javascript">
function check(){
var ff=document.form1;
var type=/\.(jpg|jpeg|pjpeg|gif)/i

if(ff.article.value=="0"){
alert('กรุณาเลือกหมวดหมู่ด้วย');
ff.article.focus();
return false;
}
else if(ff.title.value==""){
alert('ป้อนข้อมูลด้วย');
ff.title.focus();
return false;
}
else if(!ff.image.value.match(type) && ff.image.value!=""){
alert('ไม่อนุญาติไฟล์นี้!!');
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
window.open("index.php?AddArticle=Article","_self");
return true;
}
</script>

<iframe name="Iframs" id="Iframs" src="" class="iframs"></iframe>
<form action="save-article.php"  method="post" enctype="multipart/form-data" name="form1" target="Iframs" id="form1" onSubmit="return check();">
  <table width="700" border="0" cellpadding="0" cellspacing="1">
    <tr class="text13b">
      <td height="40" colspan="2" align="left" valign="middle">เพิ่มบทความ</td>
    </tr>
    <tr class="text13b">
      <td width="139" height="30" align="left" valign="middle">หมวดหมู่บทความ:</td>
      <td width="558" align="left" valign="middle" class="comment">
	  <select name="article" id="article">
	    <option value="0">--กรุณาเลือกหมวดหมู่--</option>
	  <?
	  $qr=mysql_query("select * from category_article Order By id_article DESC");
	  while($row=mysql_fetch_array($qr)){
	  ?>
	    <option value="<?=$row[id_article]?>"><?=$row[article]?></option>
	  <?
	  }
	  ?>
	  </select>      </td>
    </tr>
    <tr class="text13b">
      <td height="30" align="left" valign="middle">ชื่อเรื่องบทความ:</td>
      <td align="left" valign="middle"><input name="title" type="text" id="title" style="width:400px;"></td>
    </tr>
    <tr class="text13b">
      <td height="30" align="left" valign="middle">แหล่งที่มา:</td>
      <td align="left" valign="middle"><input name="credit" type="text" id="credit" value="no" style="width:250px;"></td>
    </tr>
	<tr class="text13b">
      <td height="30" align="left" valign="middle">ภาพประกอบ:</td>
      <td align="left" valign="middle"><input name="image" type="file" id="image" /></td>
	</tr>
    <tr class="text13b">
      <td height="30" colspan="2" align="center" valign="middle"><textarea id="editor1" name="editor1"></textarea></td>
    </tr>
    <tr class="text13b">
      <td height="50" colspan="2" align="center" valign="middle">
	  <input type="submit" name="Submit" value="ดำเนินการ" id="button">
	  <input type="hidden" name="id_article" value="<?=$_REQUEST[id_article]?>">
	  <input type="hidden" name="username" value="<?=$_SESSION['username']?>" />
	  <span id="Showdata"></span>	  </td>
    </tr>
  </table>
</form>
<?
}
?>