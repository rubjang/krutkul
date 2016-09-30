<!DOCTYPE html>
<html lang="th">
  <!-- Top Head -->
  <?php @include('incs/header-top.php'); ?>
  <!-- /Top Head -->
  <script>
     $(document).ready(function(){
  			 $("#nav-drop li a").removeClass("selected");
  			 $('#nav-drop>li:nth-child(1)>a').addClass('selected');
  	});
  </script>
   <script type="text/javascript">
  	  function check(){
  	  var ff=document.form_post;
  	  if(ff.title.value==''){
  	  alert('ป้อนหัวข้อด้วย');
  	  ff.title.focus();
  	  return false;
  	  }else if(ff.message.value==''){
  	  alert('ป้อนรายละเอียดด้วย');
  	  ff.message.focus();
  	  return false;
  	  }else if(ff.name.value==''){
  	  alert('ป้อนชื่อด้วย');
  	  ff.name.focus();
  	  return false;
  	  }
  	  else if(ff.code.value==''){
  	  alert('ป้อนโค้ดที่มองเห็นด้วย');
  	  ff.code.focus();
  	  return false;
  	  }
  	  else{
  	  document.getElementById('Showdata').innerHTML="<img src='image/icon/loading_blue.gif' width='16' height='16' border='0'>";
  	  return true;
  	  }
  	  }

  	  function SentEr(){
  	  document.getElementById('Showdata').innerHTML="";
  	  return true;
  	  }

  	  function SentOK(id){
  	  document.getElementById('Showdata').innerHTML="";
  	  window.open("webboard.php","_self");
  	  return true;
  	  }


  	  function RefreshCap(){
  	  document.getElementById('refresh_cap').src="captcha/captcha_img.php?"+Math.random();

  	  }
	  </script>
  <body>
      <!-- Header -->
	  <?php @include('incs/header.php'); ?>
      <!-- /Header -->
    <div class="page bg-wh">
    <div class="container">
	     <h2 class="h-sec">เพิมข้อมูลผลงาน</h2>
		<section class="wp-webboard">
        	<?php @include('incs/toolbar-wb.php'); ?>
				<div class="cat-box-content">
                  <div class="zone-wb">
                    <div class="wb-group-list-topic">

                        <div class="post-box main-box">
                        <!-- form -->
                        <?php
						if($_SESSION['id_shop_member']=="admin"){
							echo "<br /><center><font size=5 color=red>ขออภัย ! <br />ต้อง Login เข้าระบบก่อนทุกครั้ง ถึงจะตั้งกระทู้สอบถามได้</front><br /><br /> <a href=webboard-login.php>เข้าระบบ</a> | <a href=webboard-register.php>สมัครสมาชิก</a></center><br />";
						}else{
						?>
						<script type="text/javascript">
							function check2(){
							var ff=document.form2;
							var type=/\.(jpg|jpeg|pjpeg|gif)/i
							if(ff.category.value=='0'){
							alert('กรุณาเลือกหมวดหมู่สินค้าด้วย!!');
							return false;
							}
							else if(!ff.image1.value.match(type) && ff.image.value!=""){
							alert('ไม่อนุญาติไฟล์ภาพนี้!!');
							return false;
							}
							else if(ff.title.value==""){
							alert('กรอกหัวข้อ หรือ ชื่อสถานที่ๆ ให้บริการ');
							ff.title.focus();
							return false;
							}
							else{
							document.getElementById('Showdata2').innerHTML="<img src='images/icon/loading_blue.gif' width='16' height='16' border='0'>";
							return true;
							}
							}
							function SentEr2(){
							document.getElementById('Showdata2').innerHTML="";
							return true;
							}
							
							function SentOK2(){
							document.getElementById('Showdata2').innerHTML="";
							window.open("product.php","_self");
							return true;
							}
							</script>

					<iframe name="Iframs2" id="Iframs2" src="" class="iframs"></iframe>
					<form action="save-shop-product.php" method="post" enctype="multipart/form-data" name="form2" target="Iframs2" onSubmit="return check2();">
                        <fieldset>
                        <legend class="hid">ตั้งกระทู้ใหม่</legend>
                            <div class="row">
                                <div class="owner _sf-col-xs-12-sm-3 txt-r">
                                    <label for="inputbox1">หัวข้อ หรือ ชื่อสถานที่ๆ ให้บริการ</label>
                                </div>
                                <div class="post _sf-col-xs-12-sm-8">
									   <input type="text" class="txt-box _sf-col-xs-12" id="title" name="title">
                                </div>
                            </div>

							 <div class="row">
                                <div class="owner _sf-col-xs-12-sm-3 txt-r">
                                    <label for="inputbox1">ภาพประกอบ 1</label>
                                </div>
                                <div class="post _sf-col-xs-12-sm-8">
                                  <input name="image1" type="file" id="image1">
                                </div>
                            </div>
							 <div class="row">
                                <div class="owner _sf-col-xs-12-sm-3 txt-r">
                                    <label for="inputbox1">ภาพประกอบ 2</label>
                                </div>
                                <div class="post _sf-col-xs-12-sm-8">
                                  <input name="image2" type="file" id="image2">
                                </div>
                            </div>
							<div class="row">
                                <div class="owner _sf-col-xs-12-sm-3 txt-r">
                                    <label for="inputbox1">ภาพประกอบ 3</label>
                                </div>
                                <div class="post _sf-col-xs-12-sm-8">
                                  <input name="image3" type="file" id="image3">
                                </div>
                            </div>
							 <div class="row">
                                <div class="owner _sf-col-xs-12-sm-3 txt-r">
                                    <label for="inputbox1">ภาพประกอบ 4</label>
                                </div>
                                <div class="post _sf-col-xs-12-sm-8">
                                  <input name="image4" type="file" id="image4">
                                </div>
                            </div>
							 <div class="row">
                                <div class="owner _sf-col-xs-12-sm-3 txt-r">
                                    <label for="inputbox1">ภาพประกอบ 5</label>
                                </div>
                                <div class="post _sf-col-xs-12-sm-8">
                                  <input name="image5" type="file" id="image5">
                                </div>
                            </div>


                            <div class="row">
                                <div class="owner _sf-col-xs-12-sm-3 txt-r">
                                    <label for="cm-detail">รายละเอียด</label>
                                </div>
                                <div class="post _sf-col-xs-12-sm-8">
                                    <div class="input-wrap">
                                        <textarea name="message" rows="5" class="txt-area" id="message" ></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                            </div>
                            <div class="row">
                                <div class="owner _sf-col-xs-12-sm-3 txt-r">
                                </div>
                                <div class="post _sf-col-xs-12-sm-8">
                                    <div class="ctrl-btn pt1">
										  <input type="submit" name="Submit" class="ui-btn btn-post" value="บันทึกข้อมูล" id="button">
										 <input type="hidden" name="id_member" value="<?=$_SESSION['id_shop_member']?>">
										<span id="Showdata2"></span>	
                                    </div>
                                </div>
                            </div>
                         </fieldset>
                         </form>
                         						<!-- /form -->
                        <?php } ?>
                  		</div>
                    </div>


                  </div>


            </div>
        </section>
      </div>


       </div>

     <!-- footer -->
    <?php @include('incs/footer.php'); ?>
    <!-- /footer -->

	</div>
    <!-- /page -->
	<!-- javascript -->
	<?php @include('incs/js.php'); ?>
    <!-- /javascript -->
  </body>
</html>
