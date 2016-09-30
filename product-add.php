<?
$qr=mysql_query("select * from shop where id_member='".$_SESSION['id_member']."'");
if(mysql_num_rows($qr)>0){
?>
<table width="740" border="0" cellpadding="0" cellspacing="1">
  <tr class="link13">
    <td height="40" align="right" valign="middle">
	<img src="../images/icon/folder_open.gif" width="16" height="16" align="absmiddle" /> <a href="?Addcategory=category">หน้าหมวดหมู่สินค้า</a></td>
  </tr>
</table>
<?
$qr_c=mysql_query("select * from shop_category where id_member='".$_SESSION['id_member']."' and id_category='".(int)$_REQUEST[id_category]."'");
$row=mysql_fetch_array($qr_c);
if($_REQUEST[AddSinka]=="Sinka"){
?>
<script type="text/javascript">
function check(){
var ff=document.form1;
var type=/\.(jpg|jpeg|pjpeg|gif)/i
if(ff.image.value==""){
alert('ต้องมีรูปภาพตัวอย่างสินค้าให้ลูกค้าชมด้วย');
return false;
}
else if(!ff.image.value.match(type)){
alert('ไม่อนุญาติไฟล์ภาพนี้!!');
return false;
}
else if(ff.title.value==""){
alert('ป้อนชื่อสินค้าด้วย');
ff.title.focus();
return false;
}
else if(ff.price.value==""){
alert('ป้อนราคาสินค้าด้วย');
ff.price.focus();
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

function SentOK(id,id2){
document.getElementById('Showdata').innerHTML="";
window.open("index.php?AddSinka=Sinka&id_shop="+id+"&id_category="+id2,"_self");
return true;
}
</script>

<iframe name="Iframs" id="Iframs" src="" class="iframs"></iframe>
<form action="save-shop-sinka.php" method="post" enctype="multipart/form-data" name="form1" target="Iframs" onSubmit="return check();">
  <table width="740" border="0" cellpadding="0" cellspacing="1">
    <tr class="text13b">
      <td height="40" colspan="4" align="left" valign="middle">เพิ่มสินค้า</td>
    </tr>
    <tr class="text13b">
      <td width="78" height="30" align="left" valign="middle">หมวดหมู่:</td>
      <td colspan="3" align="left" valign="middle" class="comment"><b><?=stripslashes($row[category])?></b></td>
    </tr>
	<tr class="text13b">
      <td height="30" align="left" valign="middle">รูปสินค้า:</td>
      <td colspan="3" align="left" valign="middle"><input name="image" type="file" id="image"></td>
	</tr>
    <tr class="text13b">
      <td height="30" align="left" valign="middle">ชื่อสินค้า:</td>
      <td colspan="3" align="left" valign="middle"><input name="title" type="text" id="title" style="width:250px;"></td>
    </tr>
    <tr class="text13b">
      <td height="30" align="left" valign="middle">ราคาสินค้า:</td>
      <td width="367" align="left" valign="middle"><input name="price" type="text" id="price" style="width:100px;">
      <span class="comment">ห้ามมี , (comma) ให้ใส่จำนวนเต็ม</span></td>
      <td width="89" align="left" valign="middle">สินค้าแนะนำ:</td>
      <td width="201" align="left" valign="middle"><input name="s1" type="checkbox" id="s1" value="1"></td>
    </tr>
    <tr class="text13b">
      <td height="30" colspan="4" align="center" valign="middle"><textarea id="editor1" name="editor1"></textarea></td>
    </tr>
    <tr class="text13b">
      <td height="50" colspan="4" align="center" valign="middle">
	  <input type="submit" name="Submit" value="ดำเนินการ" id="button">
	  <input type="hidden" name="id_member" value="<?=$_SESSION['id_member']?>">
	  <input type="hidden" name="id_shop" value="<?=$_REQUEST[id_shop]?>">
	  <input type="hidden" name="id_category" value="<?=$_REQUEST[id_category]?>">
	  <span id="Showdata"></span>
	  </td>
    </tr>
  </table>
</form>
<?
}



//ดูสินค้า
if($_REQUEST[DooSinka]=="Sinka"){

function page_navigator($before_p,$plus_p,$total,$total_p,$chk_page,$id_shop,$id_category){   
	global $urlquery_str;
	$pPrev=$chk_page-1;
	$pPrev=($pPrev>=0)?$pPrev:0;
	$pNext=$chk_page+1;
	$pNext=($pNext>=$total_p)?$total_p-1:$pNext;		
	$lt_page=$total_p-4;
	if($chk_page>0){  
		echo "<a  href='?DooSinka=Sinka&id_shop=$id_shop&id_category=$id_category&s_page=$pPrev&urlquery_str=".$urlquery_str."' class='naviPN'>Prev</a>";
	}
	if($total_p>=11){
		if($chk_page>=4){
			echo "<a $nClass href='?DooSinka=Sinka&id_shop=$id_shop&id_category=$id_category&s_page=0&urlquery_str=".$urlquery_str."'>1</a><a class='SpaceC'>. . .</a>";   
		}
		if($chk_page<4){
			for($i=0;$i<$total_p;$i++){  
				$nClass=($chk_page==$i)?"class='selectPage'":"";
				if($i<=4){
				echo "<a $nClass href='?DooSinka=Sinka&id_shop=$id_shop&id_category=$id_category&s_page=$i&urlquery_str=".$urlquery_str."'>".intval($i+1)."</a> ";   
				}
				if($i==$total_p-1 ){ 
				echo "<a class='SpaceC'>. . .</a><a $nClass href='?DooSinka=Sinka&id_shop=$id_shop&id_category=$id_category&s_page=$i&urlquery_str=".$urlquery_str."'>".intval($i+1)."</a> ";   
				}		
			}
		}
		if($chk_page>=4 && $chk_page<$lt_page){
			$st_page=$chk_page-3;
			for($i=1;$i<=5;$i++){
				$nClass=($chk_page==($st_page+$i))?"class='selectPage'":"";
				echo "<a $nClass href='?DooSinka=Sinka&id_shop=$id_shop&id_category=$id_category&s_page=".intval($st_page+$i).$_SESSION['ses_qCurProvince']."'>".intval($st_page+$i+1)."</a> ";   	
			}
			for($i=0;$i<$total_p;$i++){  
				if($i==$total_p-1 ){ 
				$nClass=($chk_page==$i)?"class='selectPage'":"";
				echo "<a class='SpaceC'>. . .</a><a $nClass href='?DooSinka=Sinka&id_shop=$id_shop&id_category=$id_category&s_page=$i&urlquery_str=".$urlquery_str."'>".intval($i+1)."</a> ";   
				}		
			}									
		}	
		if($chk_page>=$lt_page){
			for($i=0;$i<=4;$i++){
				$nClass=($chk_page==($lt_page+$i-1))?"class='selectPage'":"";
				echo "<a $nClass href='?DooSinka=Sinka&id_shop=$id_shop&id_category=$id_category&s_page=".intval($lt_page+$i-1).$_SESSION['ses_qCurProvince']."'>".intval($lt_page+$i)."</a> ";   
			}
		}		 
	}else{
		for($i=0;$i<$total_p;$i++){  
			$nClass=($chk_page==$i)?"class='selectPage'":"";
			echo "<a href='?DooSinka=Sinka&id_shop=$id_shop&id_category=$id_category&s_page=$i&urlquery_str=".$urlquery_str."' $nClass  >".intval($i+1)."</a> ";   
		}		
	} 	
	if($chk_page<$total_p-1){
		echo "<a href='?DooSinka=Sinka&id_shop=$id_shop&id_category=$id_category&s_page=$pNext&urlquery_str=".$urlquery_str."'  class='naviPN'>Next</a>";
	}
}   
$q="select * from shop_sinka where id_shop='".(int)$_REQUEST[id_shop]."' and id_category='".(int)$_REQUEST[id_category]."'";
$q.=" ORDER BY id_sinka DESC ";
$qr=mysql_query($q);
$total=mysql_num_rows($qr);
$e_page=50; // กำหนด จำนวนรายการที่แสดงในแต่ละหน้า   
if(!isset($s_page)){   
	$s_page=0;   
}else{   


	$chk_page=$s_page;     
	$s_page=$s_page*$e_page;   
}   
$q.=" LIMIT $s_page,$e_page";
$qr=mysql_query($q);
if(mysql_num_rows($qr)>=1){   
	$plus_p=($chk_page*$e_page)+mysql_num_rows($qr);   
}else{   
	$plus_p=($chk_page*$e_page);       
}   
$total_p=ceil($total/$e_page);   
$before_p=($chk_page*$e_page)+1;
?>
<script type="text/javascript">
//delete
function Del(data1,data2,data3){
	var dataSend={
		id_shop:data1,
		id_category:data2,
		id_sinka:data3
	}
	$.post("shop-delete-sinka.php",dataSend,function(data){
		$("#ShowDel").html(data);
	});
}
//

function compelete(id,id2){
window.open("index.php?DooSinka=Sinka&id_shop="+id+"&id_category="+id2,"_self");
return true;
}
</script>
<div id="ShowDel"></div>
<table width="740" border="0" cellpadding="0" cellspacing="1" id="box-table">
  <tr class="text13b">
    <td height="40" colspan="3" align="left" valign="middle">รายการสินค้าในหมวดหมู่ <?=stripslashes($row[category])?> ค้นพบ [<span class="comment"><?=$total?></span>] รายการ</td>
  </tr>
  <tr class="text13">
    <td width="67" height="30" align="center" valign="middle" bgcolor="#D5FFE2">#</td>
    <td width="563" align="center" valign="middle" bgcolor="#D5FFE2">สินค้า</td>
    <td width="106" align="center" valign="middle" bgcolor="#D5FFE2">จัดการ</td>
  </tr>
  <?
  $n=1;
  while($row2=mysql_fetch_array($qr)){
  if($bg=="#ECECFF"){
  $bg="#FFFFFF";
  }else{
  $bg="#ECECFF";
  }
  ?>
  <tr bgcolor="<?=$bg?>" class="link13">
    <td height="30" align="center" valign="middle"><?=$n++;?></td>
    <td align="center" valign="middle"><a href="../shop/sinka-detail.php?SH=<?=$row2[id_shop]?>&id_sinka=<?=$row2[id_sinka]?>" target="_blank"><?=stripslashes($row2[title]);?></a></td>
    <td align="center" valign="middle">
	<a href="?EditSinka=ESinka&id_shop=<?=$_REQUEST[id_shop]?>&id_category=<?=$_REQUEST[id_category]?>&id_sinka=<?=$row2[id_sinka]?>"><img src="../images/icon/001_45.gif" width="24" height="24" border="0" title="แก้ไขสินค้า" align="absbottom"></a>&nbsp;&nbsp;
	<a href="javascript:Del(<?=$row2[id_shop]?>,<?=$row2[id_category]?>,<?=$row2[id_sinka]?>);" onclick="return confirm('ต้องการลบจริงหรือไม่');"><img src="../images/icon/001_05.gif" width="24" height="24" border="0" title="ลบสินค้า" align="absbottom"></a> </td>
  </tr>
  <?
  }
  ?>
</table>
<?
if($total==0){
echo"<div class='comment' style='margin-top:10px;'>ไม่พบข้อมูล</div>";
}else{
if($total>0){ ?>
<div class="browse_page">
<?php   
// เรียกใช้งานฟังก์ชั่น สำหรับแสดงการแบ่งหน้า   
page_navigator($before_p,$plus_p,$total,$total_p,$chk_page,$id_shop,$id_category);
}  
?> 
</div>
<?
}

}//ดูสินค้า


//แก้ไขสินค้า
if($_REQUEST[EditSinka]=="ESinka"){
$row3=mysql_fetch_array(mysql_query("select * from shop_sinka where id_shop='".(int)$_REQUEST[id_shop]."' and id_category='".(int)$_REQUEST[id_category]."' and id_sinka='".(int)$_REQUEST[id_sinka]."'"));
?>
<script type="text/javascript">
function check2(){
var ff=document.form2;
var type=/\.(jpg|jpeg|pjpeg|gif)/i
if(ff.category.value=='0'){
alert('กรุณาเลือกหมวดหมู่สินค้าด้วย!!');
return false;
}
else if(!ff.image.value.match(type) && ff.image.value!=""){
alert('ไม่อนุญาติไฟล์ภาพนี้!!');
return false;
}
else if(ff.title.value==""){
alert('ป้อนชื่อสินค้าด้วย');
ff.title.focus();
return false;
}
else if(ff.price.value==""){
alert('ป้อนราคาสินค้าด้วย');
ff.price.focus();
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

function SentOK2(id,id2){
document.getElementById('Showdata2').innerHTML="";
window.open("index.php?DooSinka=Sinka&id_shop="+id+"&id_category="+id2,"_self");
return true;
}
</script>

<iframe name="Iframs2" id="Iframs2" src="" class="iframs"></iframe>
<form action="save-edit-sinka.php" method="post" enctype="multipart/form-data" name="form2" target="Iframs2" onSubmit="return check2();">
  <table width="740" border="0" cellpadding="0" cellspacing="1">
    <tr class="text13b">
      <td height="40" colspan="4" align="left" valign="middle">แก้ไขสินค้าสินค้า</td>
    </tr>
    <tr class="text13b">
      <td width="78" height="30" align="left" valign="middle">หมวดหมู่:</td>
      <td colspan="3" align="left" valign="middle" class="comment">
	  <select name="category" id="category">
	    <option value="0">--กรุณาเลือกหมวดหมู่--</option>
		<?
		$qr_c2=mysql_query("select * from shop_category Order By id_category DESC");
		while($row_c2=mysql_fetch_array($qr_c2)){
		?>
	    <option value="<?=$row_c2[id_category]?>" <? if($row_c2[id_category]==$row3[id_category]){ echo"selected";}?>><?=stripslashes($row_c2[category])?></option>
		<?
		}
		?>
      </select>      </td>
    </tr>
	<?
	$im="../images2/image-shop/shop/{$row3[image]}";
	if(is_array(@file($im))){
	?>
	<tr class="text13b">
      <td height="150" colspan="4" align="center" valign="middle"><img src="../images2/image-shop/shop/<?=$row3[image]?>" border="0" height="136" width="181" /></td>
    </tr>
	<?
	}
	?>
	<tr class="text13b">
      <td height="30" align="left" valign="middle">รูปสินค้า:</td>
      <td colspan="3" align="left" valign="middle"><input name="image" type="file" id="image"></td>
	</tr>
    <tr class="text13b">
      <td height="30" align="left" valign="middle">ชื่อสินค้า:</td>
      <td colspan="3" align="left" valign="middle"><input name="title" type="text" id="title" style="width:250px;" value="<?=htmlspecialchars(stripslashes($row3[title]));?>"></td>
    </tr>
    <tr class="text13b">
      <td height="30" align="left" valign="middle">ราคาสินค้า:</td>
      <td width="367" align="left" valign="middle"><input name="price" type="text" id="price" style="width:100px;" value="<?=$row3[price]?>">
      <span class="comment">ห้ามมี , (comma) ให้ใส่จำนวนเต็ม</span></td>
      <td width="89" align="left" valign="middle">สินค้าแนะนำ:</td>
      <td width="201" align="left" valign="middle"><input name="s1" type="checkbox" id="s1" value="1" <? if($row3[s1]==1){ echo"checked";} ?>></td>
    </tr>
    <tr class="text13b">
      <td height="30" colspan="4" align="center" valign="middle"><textarea id="editor1" name="editor1"><?=$row3[message]?></textarea></td>
    </tr>
    <tr class="text13b">
      <td height="50" colspan="4" align="center" valign="middle">
	  <input type="submit" name="Submit" value="ดำเนินการ" id="button">
	  <input type="hidden" name="id_member" value="<?=$_SESSION['id_member']?>">
	  <input type="hidden" name="id_shop" value="<?=$_REQUEST[id_shop]?>">
	  <input type="hidden" name="id_category" value="<?=$_REQUEST[id_category]?>">
	  <input type="hidden" name="id_sinka" value="<?=$_REQUEST[id_sinka]?>">
	  <span id="Showdata2"></span>	  </td>
    </tr>
    <tr class="link13">
      <td height="50" colspan="4" align="center" valign="middle"><a href="index.php?DooSinka=Sinka&id_shop=<?=$_REQUEST[id_shop]?>&id_category=<?=$_REQUEST[id_category]?>">ย้อนกลับ</a></td>
    </tr>
  </table>
</form>
<?
}
//แก้ไข
?>



<?
} // shop
?>