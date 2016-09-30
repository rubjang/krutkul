<?
$resize_image = "thumbs.php?w=70&h=70&img=";

if($_REQUEST[ShowPost]=="post"){
function page_navigator($before_p,$plus_p,$total,$total_p,$chk_page){   
	global $urlquery_str;
	$pPrev=$chk_page-1;
	$pPrev=($pPrev>=0)?$pPrev:0;
	$pNext=$chk_page+1;
	$pNext=($pNext>=$total_p)?$total_p-1:$pNext;		
	$lt_page=$total_p-4;
	if($chk_page>0){  
		echo "<a  href='?ShowPost=post&s_page=$pPrev&urlquery_str=".$urlquery_str."' class='naviPN'>Prev</a>";
	}
	if($total_p>=11){
		if($chk_page>=4){
			echo "<a $nClass href='?ShowPost=post&s_page=0&urlquery_str=".$urlquery_str."'>1</a><a class='SpaceC'>. . .</a>";   
		}
		if($chk_page<4){
			for($i=0;$i<$total_p;$i++){  
				$nClass=($chk_page==$i)?"class='selectPage'":"";
				if($i<=4){
				echo "<a $nClass href='?ShowPost=post&s_page=$i&urlquery_str=".$urlquery_str."'>".intval($i+1)."</a> ";   
				}
				if($i==$total_p-1 ){ 
				echo "<a class='SpaceC'>. . .</a><a $nClass href='?ShowPost=post&s_page=$i&urlquery_str=".$urlquery_str."'>".intval($i+1)."</a> ";   
				}		
			}
		}
		if($chk_page>=4 && $chk_page<$lt_page){
			$st_page=$chk_page-3;
			for($i=1;$i<=5;$i++){
				$nClass=($chk_page==($st_page+$i))?"class='selectPage'":"";
				echo "<a $nClass href='?ShowPost=post&s_page=".intval($st_page+$i).$_SESSION['ses_qCurProvince']."'>".intval($st_page+$i+1)."</a> ";   	
			}
			for($i=0;$i<$total_p;$i++){  
				if($i==$total_p-1 ){ 
				$nClass=($chk_page==$i)?"class='selectPage'":"";
				echo "<a class='SpaceC'>. . .</a><a $nClass href='?ShowPost=post&s_page=$i&urlquery_str=".$urlquery_str."'>".intval($i+1)."</a> ";   
				}		
			}									
		}	
		if($chk_page>=$lt_page){
			for($i=0;$i<=4;$i++){
				$nClass=($chk_page==($lt_page+$i-1))?"class='selectPage'":"";
				echo "<a $nClass href='?ShowPost=post&s_page=".intval($lt_page+$i-1).$_SESSION['ses_qCurProvince']."'>".intval($lt_page+$i)."</a> ";   
			}
		}		 
	}else{
		for($i=0;$i<$total_p;$i++){  
			$nClass=($chk_page==$i)?"class='selectPage'":"";
			echo "<a href='?ShowPost=post&s_page=$i&urlquery_str=".$urlquery_str."' $nClass  >".intval($i+1)."</a> ";   
		}		
	} 	
	if($chk_page<$total_p-1){
		echo "<a href='?ShowPost=post&s_page=$pNext&urlquery_str=".$urlquery_str."'  class='naviPN'>Next</a>";
	}
}   
$q="select * from post where id_member='".$_SESSION['id_member']."'";
$q.=" ORDER BY update_today DESC ";
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
function Del(data1){
	var dataSend={
		id_post:data1
	}
	$.post("delete-post.php",dataSend,function(data){
		$("#ShowDel").html(data);
	});
}
//

//Up
function Uppost(data1){
	var dataSend={
		id_post:data1
	}
	$.post("up-post.php",dataSend,function(data){
		$("#ShowDel").html(data);
		
	});
}
//

function compelete(){
window.open("index.php?ShowPost=post","_self");
return true;
}
</script>
<style type="text/css">
<!--
.style1 {color: #FFFFFF}
-->
</style>

<div id="ShowDel"></div>
<table width="100%" border="0" cellpadding="2" cellspacing="1" id="box-table">
  <tr class="text13b">
    <td height="40" colspan="6" align="left" valign="middle">รายการประกาศทั้งหมด ค้นพบ <span class="comment"><?=$total?></span> รายการ</td>
  </tr>
  <tr class="text13b">
    <td width="38" height="30" align="center" valign="middle" bgcolor="#009999"><span class="style1">ลำดับ</span></td>
    <td width="114" align="center" valign="middle" bgcolor="#009999"><span class="style1">ภาพประกอบ</span></td>
    <td width="354" align="center" valign="middle" bgcolor="#009999"><span class="style1">หัวข้อ</span></td>
    <td width="87" align="center" valign="middle" bgcolor="#009999"><span class="style1">เลื่อนประกาศ</span></td>
    <td width="48" align="center" valign="middle" bgcolor="#009999"><span class="style1">แก้ไข</span></td>
    <td width="28" align="center" valign="middle" bgcolor="#009999"><span class="style1">ลบ</span></td>
  </tr>
  <?
  $n=1;
  while($row=mysql_fetch_array($qr)){
  if($bg=="#ECECFF"){
  $bg="#FFFFFF";
  }else{
  $bg="#ECECFF";
  }
  ?>
  <tr bgcolor="<?=$bg;?>" class="link13">
    <td height="30" align="center" valign="middle"><?=$n++?></td>
    <td height="30" align="center" valign="middle">  <div style="margin:2px;">
		  <?
		  
		  $im_post="../images2/image-post/{$row[image]}";
		  if(is_array(@file($im_post))){
		  ?>
		  <img src="<?=$resize_image?>../images2/image-post/<?=$row[image]?>" width="70" id="box-image2"  border="0" />
		  <?
		  }else{
		  ?>
		  <img src="../images2/image-post/noimage.gif" width="70"  id="box-image2" border="0" />
		  <?
		  }
		  ?>
		  </div></td>
    <td align="left" valign="middle"><a href="#" target="_blank"><?=stripslashes($row[title]);?></a><br />เมื่อ</td>
    <td align="center" valign="middle">
	<a href="javascript:void(0);" onClick="javascript:Uppost(<?=$row[id_post]?>);"><img src="../images/icon/001_24.gif" alt="เลื่อนประกาศ" width="24" height="24" border="0" align="absbottom" title="เลื่อนประกาศ"></a></td>
    <td align="center" valign="middle"><a href="?EditPost=Post&id_post=<?=$row[id_post]?>"><img src="../images/icon/001_45.gif" alt="แก้ไขประกาศ" width="24" height="24" border="0" align="absbottom" title="แก้ไขประกาศ" /></a></td>
    <td align="center" valign="middle"><a href="javascript:Del(<?=$row[id_post]?>);" onclick="return confirm('ต้องการลบจริงหรือไม่');"><img src="../images/icon/001_05.gif" alt="ลบประกาศ" width="24" height="24" border="0" align="absbottom" title="ลบประกาศ" /></a></td>
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
page_navigator($before_p,$plus_p,$total,$total_p,$chk_page);
}  
?> 
</div>
<?
}

} //
?>
















<?
// แก้ไข
if($_REQUEST[EditPost]=="Post"){
$re=mysql_fetch_array(mysql_query("select * from post where id_post='".(int)$_REQUEST[id_post]."'"));

if($re[image]!=""){ $img="<img src=".$resize_image."../images2/image-post/".$re[image]." width=100/>";
}else{ $img="<img src=../images/noimage.png >"; }

if($re[image1]!=""){ $img1="<img src=".$resize_image."../images2/image-post1/".$re[image1]." width=100/>";
}else{ $img1="<img src=../images/noimage.png >"; }

if($re[image2]!=""){ $img2="<img src=".$resize_image."../images2/image-post2/".$re[image2]." width=100/>";
}else{ $img2="<img src=../images/noimage.png >"; }

if($re[image3]!=""){ $img3="<img src=".$resize_image."../images2/image-post3/".$re[image3]." width=100/>";
}else{ $img3="<img src=../images/noimage.png >"; }

if($re[image4]!=""){ $img4="<img src=".$resize_image."../images2/image-post4/".$re[image4]." width=100/>";
}else{ $img4="<img src=../images/noimage.png >"; }

if($re[image5]!=""){ $img5="<img src=".$resize_image."../images2/image-post5/".$re[image5]." width=100/>";
}else{ $img5="<img src=../images/noimage.png >"; }

if($re[image6]!=""){ $img6="<img src=".$resize_image."../images2/image-post6/".$re[image6]." width=100/>";
}else{ $img6="<img src=../images/noimage.png >"; }

?>
<script type="text/javascript">
//select ajax
function changeType(val){
	if(val!=''){
		var param ='id_category='+val
		new Ajax.Request('ajax-select-subcategory.php',{
			method:'post',
			parameters:param,
			onSuccess:function(t){
			var text =t.responseText;
			//alert(t.responseText)
				var arr =new Array();
				//alert(arr.length)
				arr =text.split('|')
				//alert(t.responseText+"->"+arr.length);
				var element =document.getElementById('sel-type')
				element.innerHTML='';
				element.options[0]=new Option( ("--กรุณาเลือกหมวดหมู่หลักก่อน--"),(0),true,true);
				len=0;
				if(arr.length==1)return;
				for(i=0;i<arr.length;i++){		
					element.options[len]=new Option( (arr[i+1]),(arr[i++]),false,false);
					len++;
				}
			}
		});
	}
}

//checkform
function check(){
var ff=document.form1;
var type=/\.(jpg|jpeg|pjpeg|gif)/i
if(ff.category.value=='0'){
alert('กรุณาเลือกหมวดหมู่หลักด้วย');
return false;
}
else if(ff.subcategory.value=='0'){
alert('กรุณาเลือกหมวดหมู่ย่อยด้วย');
return false;
}
else if(ff.title.value==''){
alert('ป้อนหัวข้อประกาศด้วย');
ff.title.focus();
return false;
}
else if(ff.subtitle.value==''){
alert('ป้อนหัวข้อย่อยประกาศด้วย');
ff.subtitle.focus();
return false;
}
else if(ff.price.value==''){
alert('กำหนดราคาสินค้าด้วย');
ff.price.focus();
return false;
}
else if(ff.s1.value=='0'){
alert('กรุณาเลือกความต้องการด้วย');
return false;
}
else if(ff.s2.value==''){
alert('กรุณาเลือกสภาพสินค้าด้วย');
return false;
}
else if(ff.s3.value=='0'){
alert('กรุณาเลือกการจัดส่งสินค้าด้วย');
return false;
}
else if(!ff.image.value.match(type) &&  ff.image.value!=''){
alert('ไม่อนุญาติไฟล์ภาพนี้!!');
return false;
}
else if(ff.keyword1.value==''){
alert('กรุณากำหนดอยากน้อย 1 Keyword');
ff.keyword1.focus();
return false;
}
else if(ff.tags1.value==''){
alert('กรุณากำหนด Tags การค้นหา 1 Tags');
ff.tags1.focus();
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

function SentOK(id){
document.getElementById('Showdata').innerHTML="";
window.open("index.php?EditPost=Post&id_post="+id,"_self");
return true;
}
</script>
<iframe name="Iframs" id="Iframs" src="" class="iframs"></iframe>
<?
$id_category=$re[category];
$id_subcategory=$re[subcategory];
?>
<form action="save-edit-post.php" method="post" enctype="multipart/form-data" name="form1" target="Iframs" onSubmit="return check();">
    <table width="700" border="0" cellpadding="4" cellspacing="2" id="box-table">
      <tr class="text13b">
        <td height="40" colspan="3" align="center" valign="middle"><strong>แก้ไขประกาศ</strong></td>
      </tr>
      <tr class="text13b">
        <td height="30" align="left" valign="middle">หัวข้อประกาศ</td>
        <td align="left" valign="middle">:</td>
        <td width="559" align="left" valign="middle"><input name="title" type="text" id="title" style="width:500px;" value="<?=htmlspecialchars(stripslashes($re[title]));?>" /></td>
      </tr>
      <tr class="text13b">
        <td width="121" height="30" align="left" valign="middle">หมวดบริการ</td>
        <td width="9" height="30" align="left" valign="middle">:</td>
        <td align="left" valign="middle">
		<select name="category" id="id_category" onChange="changeType(this.value)" style="width:200px;">
        <?
		echo"<option value='0'>เลือกหมวดบริการ</option>";
		$resule=mysql_query("Select * From category Order By id_category ASC");
		while($row=mysql_fetch_array($resule)){
		if($id_category==$row['id_category']){
		echo"<option value=\"$row[id_category]\" selected=\"selected\">".stripslashes($row[category])."</option>";
		}else{
		echo"<option value=\"$row[id_category]\">".stripslashes($row[category])."</option>";
		}
		}
		?>
        </select></td>
      </tr>
      <tr class="text13b">
        <td height="30" align="left" valign="middle">หมวดย่อย</td>
        <td height="30" align="left" valign="middle">:</td>
        <td align="left" valign="middle">
		<select id="sel-type" name="subcategory" style="width:200px;">
	  	<option value="0">เลือกหมวดย่อย</option>
		<?
		$re_subcate=mysql_query("Select * From subcategory Where id_category='$id_category' ");
		while($r_subcate=mysql_fetch_array($re_subcate)){
		if($id_subcategory==$r_subcate['id_subcategory']){
		echo"<option value=\"$r_subcate[id_subcategory]\" selected=\"selected\">".stripslashes($r_subcate[subcategory])."</option>";
		}else{
		echo"<option value=\"$r_subcate[id_subcategory]\">".stripslashes($r_subcate[subcategory])."</option>";
		}
		}
		?>
	  	</select></td>
      </tr>
      <tr class="text13b">
        <td height="50" colspan="3" align="center" valign="middle"><textarea id="editor1" name="editor1"><?=$re[message]?></textarea></td>
      </tr>
      <tr class="text13b">
        <td height="30" align="left" valign="middle">ราคาสินค้า</td>
        <td height="30" align="left" valign="middle">:</td>
        <td align="left" valign="middle"><input name="price" type="text" id="price" style="width:100px;" value="<?=$re[price]?>" />
บาท <span class="comment">ห้ามมี , (comma)</span></td>
      </tr>
      <tr class="text13b">
        <td height="30" align="left" valign="middle">ความต้องการ</td>
        <td height="30" align="left" valign="middle">:</td>
        <td align="left" valign="middle"><table width="100%" border="0" cellspacing="0" cellpadding="0" class="linkaddform">
          <tr>
            <td width="20%" height="30" valign="middle" >
			<input name="service" type="radio" value="1" <? if($re[service]=="1"){ echo"checked";}?> />
              รับจ้าง</td>
            <td width="17%" valign="middle" ><input type="radio" name="service" value="2" <? if($re[service]=="2"){ echo"checked";}?>/>
              ประกาศ <br /></td>
            <td width="19%" valign="middle" ><input type="radio" name="service" value="3" <? if($re[service]=="3"){ echo"checked";}?>/>
              ให้เช่า </td>
            <td width="44%" valign="middle" ><input type="radio" name="service" value="4" <? if($re[service]=="4"){ echo"checked";}?>/>
              อื่น ๆ </td>
          </tr>
        </table></td>
      </tr>
      <tr class="text13b">
        <td height="30" align="left" valign="middle">วิธีติดต่อ</td>
        <td height="30" align="left" valign="middle">:</td>
        <td align="left" valign="middle"><table width="100%" border="0" cellspacing="0" cellpadding="1" class="linkaddform">
          <tr>
            <td width="20%" ><input name="send" type="radio" value="1" <? if($re[send]=="1"){ echo"checked";}?> />
              ทางโทรศัพท์<br /></td>
            <td width="80%" ><input type="radio" name="send" value="2" <? if($re[send]=="2"){ echo"checked";}?>/>
              อีเมล์</td>
          </tr>
        </table></td>
      </tr>
	 
	  <tr class="text13b">
        <td colspan="3" align="center" valign="top"><table width="100%" border="0" cellspacing="2" cellpadding="0">
          <tr>
            <td colspan="3"><hr size="1" /></td>
          </tr>
          <tr>
		 
            <td width="110">รูปภาพตัวอย่าง</td>
            <td width="111"><?=$img?></td>
            <td width="466"><input name="image" type="file" id="image" />
			<input type="hidden" name="oldimage" value="<?=$re[image]?>">
			</td>
			
          </tr>
          <tr>
            <td colspan="3"><hr size="1" /></td>
          </tr>
          <tr>
		  
            <td>ภาพประกอบ 1 </td>
            <td><?=$img1?></td>
            <td><input name="image1" type="file" id="image1" /><input type="hidden" name="oldimage1" value="<?=$re[image1]?>"></td>
          </tr>
          <tr>
            <td colspan="3"><hr size="1" /></td>
          </tr>
          <tr>
            <td>ภาพประกอบ 2 </td>
            <td><?=$img2?></td>
            <td><input name="image2" type="file" id="image2" /><input type="hidden" name="oldimage2" value="<?=$re[image2]?>"></td>
          </tr>
          <tr>
            <td colspan="3"><hr size="1" /></td>
          </tr>
          <tr>
		   
            <td>ภาพประกอบ 3 </td>
            <td><?=$img3?></td>
            <td><input name="image3" type="file" id="image3" /><input type="hidden" name="oldimage3" value="<?=$re[image3]?>"></td>
          </tr>
          <tr>
            <td colspan="3"><hr size="1" /></td>
          </tr>
          <tr> 
            <td>ภาพประกอบ 4 </td>
            <td><?=$img4?></td>
            <td><input name="image4" type="file" id="image4" /><input type="hidden" name="oldimage4" value="<?=$re[image4]?>"></td>
          </tr>
          <tr>
            <td colspan="3"><hr size="1" /></td>
          </tr>
          <tr> 
            <td>ภาพประกอบ 5 </td>
            <td><?=$img5?></td>
            <td><input name="image5" type="file" id="image5" /><input type="hidden" name="oldimage5" value="<?=$re[image5]?>"></td>
          </tr>
          <tr>
            <td colspan="3"><hr size="1" /></td>
          </tr>
          <tr> 
            <td>ภาพประกอบ 6 </td>
            <td><?=$img6?></td>
            <td><input name="image6" type="file" id="image6" /><input type="hidden" name="oldimage6" value="<?=$re[image6]?>"></td>
          </tr>
          <tr>
            <td colspan="3"><hr size="1" /></td>
          </tr>
        </table>        </td>
      </tr>
	  <tr class="text13b">
        <td height="30" align="left" valign="middle" bgcolor="#E5E5E5">คำค้นใน Google</td>
        <td height="30" align="left" valign="middle" bgcolor="#E5E5E5">:</td>
        <td align="left" valign="middle" bgcolor="#E5E5E5"><input name="keyword1" type="text" id="keyword1" style="width:100px;" value="<?=$re[keyword1]?>">
          ,
          <input name="keyword2" type="text" id="keyword2" style="width:100px;" value="<?=$re[keyword2]?>">
          ,
          <input name="keyword3" type="text" id="keyword3" style="width:100px;" value="<?=$re[keyword3]?>">
          ,
          <input name="keyword4" type="text" id="keyword4" style="width:100px;" value="<?=$re[keyword4]?>">
          ,
          <input name="keyword5" type="text" id="keyword5" style="width:100px;" value="<?=$re[keyword5]?>"></td>
	  </tr>
	  <tr class="text13b">
        <td height="30" align="left" valign="middle" bgcolor="#E5E5E5">Tags</td>
        <td height="30" align="left" valign="middle" bgcolor="#E5E5E5">:</td>
        <td align="left" valign="middle" bgcolor="#E5E5E5"><input name="tags1" type="text" id="tags1" style="width:100px;" value="<?=$re[tags1]?>">
          ,
          <input name="tags2" type="text" id="tags2" style="width:100px;" value="<?=$re[tags2]?>">
          ,
          <input name="tags3" type="text" id="tags3" style="width:100px;" value="<?=$re[tags3]?>"></td>
	  </tr>
      <tr class="text13b">
        <td height="50" colspan="3" align="center" valign="middle">
		<input type="submit" name="Submit" value="ดำเนินการ" id="button">
		<input type="hidden" name="id_member" value="<?=$_SESSION['id_member']?>">
		<input type="hidden" name="id_post" value="<?=$_REQUEST[id_post]?>">
		<span id="Showdata"></span>		</td>
      </tr>
      <tr class="link12">
        <td height="50" colspan="3" align="center" valign="middle"><a href="?ShowPost=post">ย้อนกลับ</a></td>
      </tr>
  </table>
</form>
<?
}
?>