<?
if($_REQUEST[Edit]=="member"){
$row=mysql_fetch_array(mysql_query("select * from member where id_member='".$_SESSION['id_member']."'"));
$province=$row['province'];
$amper=$row['amper'];
$tumbon=$row['tumbon'];
?>
<script type="text/javascript">
function checkform(){
var ff=document.register;


if(ff.email.value==""){
alert('ป้อนอีเมล์ด้วย');
ff.email.focus();
return false;
}
else if(ff.name.value==""){
alert('ป้อนชื่อ-นามสกุลด้วย');
ff.name.focus();
return false;
}
else if(ff.address.value==""){
alert('ป้อนที่อยู่ด้วย');
ff.address.focus();
return false;
}
else if(ff.tel.value==""){
alert('ป้อนเบอร์โทรศัพท์ด้วย');
ff.tel.focus();
return false;
}

else if(ff.province.value=="0"){
alert('เลือกจังหวัด ด้วยค่ะ');
ff.province.focus();
return false;
}
else if(ff.amper.value=="0"){
alert('เลือกเขต/อำเภอ ด้วยค่ะ');
ff.amper.focus();
return false;
}
else if(ff.tumbon.value=="0"){
alert('เลือกตำบล ด้วยค่ะ');
ff.tumbon.focus();
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
window.open("index.php?Edit=member","_self");
return true;
}
</script>
<iframe name="Iframs" id="Iframs" src="" class="iframs"></iframe>
<form name="register" id="register" method="post" target="Iframs" action="save-editmember.php" onsubmit="return checkform();">
<table width="700" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="30" align="left" valign="middle"><div style="margin:0px 0px 0px 10px;" class="text13b">แก้ไข สมัครสมาชิก (Edit Member) </div></td>
  </tr>
  <tr>
    <td height="30">
	<fieldset class="text13b"><legend>ข้อมูลผู้ใช้งาน</legend>
    <table width="510" border="0" cellpadding="2" cellspacing="1">
      <tr class="text13b">
        <td width="125" height="30" align="left" valign="middle">ชื่อผู้ใช้งาน:</td>
        <td width="385" align="left" valign="middle"><input value="<?=$row[username]?>" name="username" type="text" id="username" style="width:150px;" disabled="disabled"></td>
      </tr>
      <tr class="text13b">
        <td height="30" align="left" valign="middle">อีเมล์:</td>
        <td align="left" valign="middle"><input name="email" type="text" id="email" style="width:200px;" value="<?=$row[email]?>"><span class="comment">*</span></td>
      </tr>
    </table>
	</fieldset>
	
	<fieldset class="text13b">
	<legend>ข้อมูลส่วนตัว</legend>
    <table width="510" border="0" cellpadding="2" cellspacing="1">
      <tr class="text13b">
        <td width="125" height="30" align="right" valign="middle">ชื่อ-นามสกุล:</td>
        <td width="385" align="left" valign="middle"><input name="name" type="text" id="name" style="width:300px;" value="<?=$row[name]?>"><span class="comment">*</span></td>
      </tr>
      <tr class="text13b">
        <td height="26" align="right" valign="middle">ที่อยู่:  </td>
        <td align="left" valign="middle"><input name="address" type="text" id="address" value="<?=$row[address]?>" size="40" />
        <span class="comment">*</span></td>
      </tr>
	  <tr class="text13b">
        <td height="30" align="right" valign="middle">เบอร์โทรศัพท์:</td>
        <td align="left" valign="middle"><input name="tel" type="text" id="tel" style="width:200px;" value="<?=$row[tel]?>" maxlength="10"><span class="comment">*</span></td>
      </tr>
	  <tr class="text13b">
	    <td height="30" align="right" valign="middle">จังหวัด: : </td>
	    <td align="left" valign="middle"> <?     
     //echo "<form name=sel>\n";
 echo "<font id=province><select name=province>\n";
     echo "<option value='0'>============</option> \n" ;
     echo "</select></font>\n"; 
	 ?></td>
	    </tr>
	  <tr class="text13b">
	    <td height="30" align="right" valign="middle">เขต/อำเภอ:</td>
	    <td align="left" valign="middle"><?     
     
     echo "<font id=amper><select name=amper>\n";
     echo "<option value='0'>==== ไม่มี====</option> \n" ;
     echo "</select></font>\n";
	 ?></td>
	    </tr>
	  <tr class="text13b">
	    <td height="30" align="right" valign="middle">ตำบล:</td>
	    <td align="left" valign="middle"><?     
	echo "<font id=tumbon><select name=tumbon>\n";
     echo "<option value='0'>==== ไม่มี ====</option> \n" ;
     echo "</select></font>\n"; 
				?></td>
	    </tr>
	  <tr class="text13b">
        <td height="30" align="right" valign="middle">รู้จักเว็บไซต์ที่ไหน:</td>
        <td align="left" valign="middle"><input name="web" type="text" id="web" style="width:200px;" value="<?=$row[web]?>"></td>
      </tr>
	  <tr class="text13b">
	    <td height="40" colspan="2" align="center" valign="middle">
		<input type="submit" name="Submit" value="ดำเนินการ" id="button">
		<input type="hidden" name="id_member" value="<?=$_SESSION['id_member']?>">
		<span id="Showdata"></span>		</td>
	    </tr>
    </table>
	</fieldset>
	</td>
    </tr>
</table>
</form>
<script language=Javascript>
function Inint_AJAX() {
   try { return new ActiveXObject("Msxml2.XMLHTTP");  } catch(e) {} //IE
   try { return new ActiveXObject("Microsoft.XMLHTTP"); } catch(e) {} //IE
   try { return new XMLHttpRequest();          } catch(e) {} //Native Javascript
   alert("XMLHttpRequest not supported");
   return null;
};

function dochange(src, val) {
     var req = Inint_AJAX();
     req.onreadystatechange = function () { 
          if (req.readyState==4) {
               if (req.status==200) {
                    document.getElementById(src).innerHTML=req.responseText; //รับค่ากลับมา
               } 
          }
     };
     req.open("GET", "locale_edit.php?data="+src+"&val="+val); //สร้าง connection
     req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded;charset=tis-620"); // set Header
     req.send(null); //ส่งค่า
}

//window.onLoad=dochange('province', -1);     
window.onLoad=dochange('province', <?=$province?>);     
window.onLoad=dochange('amper', <?=$amper?>);     
window.onLoad=dochange('tumbon', <?=$tumbon?>);     
</script>
<?
}
else{
header('location:./.');
}
?>