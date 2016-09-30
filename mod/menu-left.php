<!-- จัดการข้อมูลทั่วไป -->
<div style="margin:0px auto;">
<div id="box-menu-lefts1">
  <div style="padding:12px 0px 0px 0px; text-align:center;" class="text13b">จัดการข้อมูลทั่วไป</div>
</div>
<div id="box-menu-lefts2">
<div id="box-menu-left" class="link11"><img src="../images/icon/edit_business_user.png" width="16" height="16" align="absmiddle"> <a href="?Edit=member">แก้ไขข้อมูลส่วนตัว</a> </div>
<div id="box-menu-left" class="link11"><img src="../images/icon/icon_security.gif" width="16" height="16" align="absmiddle"> <a href="?Repass=Newpass">เปลี่ยนรหัสผ่าน</a> </div>
<div id="box-menu-left" class="link11"><img src="../images/icon/listen.gif" width="16" height="16" align="absmiddle"> <a href="?CheckC=Contact">เช็คผู้ติดต่อ</a> </div>
<div id="box-menu-left" class="link11"><img src="../images/icon/yellow_mail.png" width="16" height="16" align="absmiddle"> <a href="?ShowPM=PM">จดหมาย</a> 
<?
$qr_pm=mysql_query("select open_read from tb_pm where id_recipient='".$_SESSION['id_member']."' and open_read='0'");
if(mysql_num_rows($qr_pm)>0){
?>
<img src="../images/icon/yellow_mail.gif" width="16" height="16" border="0" align="absmiddle" /> [<?=mysql_num_rows($qr_pm);?>]
<?
}
?>
</div>
<div id="box-menu-left" class="link11"><img src="../images/icon/comments.gif" width="16" height="16" align="absmiddle"> <a href="?AddArticle=Article">เขียนบทความ</a> </div>
</div>
<div id="box-menu-lefts3"></div>
</div>
<!-- จัดการข้อมูลทั่วไป -->



<!-- จัดการลงประกาศฟรี -->
<div style="margin:10px auto;">
<div id="box-menu-lefts1">
  <div style="padding:12px 0px 0px 0px; text-align:center;" class="text13b">จัดการลงประกาศฟรี</div>
</div>
<div id="box-menu-lefts2">
<div id="box-menu-left" class="link11"><img src="../images/icon/maximize.gif" width="16" height="16" align="absmiddle"> <a href="?Postads=POSTADS">ลงประกาศฟรี</a> </div>
<div id="box-menu-left" class="link11"><img src="../images/icon/folder_open.gif" width="16" height="16" align="absmiddle"> <a href="?ShowPost=post">ประกาศฟรีทั้งหมด</a> </div>
</div>
<div id="box-menu-lefts3"></div>
</div>
<!-- จัดการลงประกาศฟรี -->







<!-- จัดการร้านค้าออนไลน์ -->
<div style="margin:10px auto;">
<div id="box-menu-lefts1">
  <div style="padding:12px 0px 0px 0px; text-align:center;" class="text13b">จัดการร้านค้าออนไลน์</div>
</div>
<div id="box-menu-lefts2">
<div id="box-menu-left" class="link11"><img src="../images/icon/shoppingcart.gif" width="16" height="16" align="absmiddle"> 
<?
$qr_sp=mysql_query("select id_member,id_shop from shop where id_member='".$_SESSION['id_member']."'");
$num_sp=mysql_num_rows($qr_sp);
$re_sp=mysql_fetch_array($qr_sp);
if($num_sp==0){
?>
<a href="?RegistShop=OpenShop">เปิดร้านค้าออนไลน์ฟรี</a>
<?
}else{
?>
<a href="?EditRegistShop=OpenShop">ปรับปรุงร้านค้าออนไลน์</a>
<?
}
?>
</div>
<div id="box-menu-left" class="link11"><img src="../images/icon/record.gif" width="16" height="16" align="absmiddle"> <a href="?shopOff=On">ควบคุมร้านค้าออนไลน์</a> </div>
<div id="box-menu-left" class="link11"><img src="../images/icon/sale.gif" width="18" height="18" align="absmiddle"> <a href="?Showim=Image">เปลี่ยนรูปประจำร้านค้าออนไลน์</a> </div>
<div id="box-menu-left" class="link11"><img src="../images/icon/sale.gif" width="18" height="18" align="absmiddle"> <a href="?MenuMain=Menu">จัดการเมนูหลักร้านค้า</a> </div>
<div id="box-menu-left" class="link11"><img src="../images/icon/maximize.gif" width="16" height="16" align="absmiddle"> <a href="?Addcategory=category">จัดการหมวดหมู่สินค้า+เพิ่มสินค้า</a> </div>
<div id="box-menu-left" class="link11"><img src="../images/icon/promotion.png" width="16" height="16" align="absmiddle"> <a href="?ShowNews=News">จัดการข่าวประชาสัมพันธ์</a> </div>
<div id="box-menu-left" class="link11"><img src="../images/icon/star.gif" width="16" height="16" align="absmiddle"> <a href="?Description=Shop">จัดคำอธิบายหน้าร้านค้าออนไลน์</a> </div>
<div id="box-menu-left" class="link11"><img src="../images/icon/star.gif" width="16" height="16" align="absmiddle"> <a href="../shop/?SH=<?=$re_sp[id_shop]?>" target="_blank">ดูร้านค้าของตัวเอง</a> </div>
<div id="box-menu-left" class="link11"><img src="../images/icon/group.gif" width="16" height="16" align="absmiddle"> <a href="?ShowMember=Shop">ดูสมาชิกประจำร้านค้า</a> </div>
</div>
<div id="box-menu-lefts3"></div>
</div>
<!-- จัดการร้านค้าออนไลน์ -->
