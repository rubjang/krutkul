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
		<section class="wp-webboard">
        	<?php @include('incs/toolbar-wb.php'); ?>
			<h2 class="cat-box-title">
            	<a href="webboard.php">เว็บบอร์ด ถาม – ตอบ</a>
            <?php @include('webboard-header.php'); ?>
            </h2>
			<div class="cat-box-content">
                  <div class="zone-wb">
                    <div class="wb-group-list-topic">
                    	<h2><i class="fa-comments-o"></i> ตั้งกระทู้ใหม่</h2>

                        <div class="post-box main-box">
                        <!-- form -->
                        <?
                    if($_SESSION['id_shop_member']==""){
                        echo "<br /><center><font size=5 color=red>ขออภัย ! <br />ต้อง Login เข้าระบบก่อนทุกครั้ง ถึงจะตั้งกระทู้สอบถามได้</front><br /><br /> <a href=webboard-login.php>เข้าระบบ</a> | <a href=webboard-register.php>สมัครสมาชิก</a></center><br />";
                    }else{?>

                        <iframe name="Iframs" id="Iframs" src="" class="iframes"></iframe>
	    <form id="form_post" name="form_post" method="post" action="save-webboard-post.php" target="Iframs" onSubmit="return check();">
                        <fieldset>
                        <legend class="hid">ตั้งกระทู้ใหม่</legend>
                            <div class="row">
                                <div class="owner _sf-col-xs-12-sm-3 txt-r">
                                    <label for="inputbox1">หัวข้อกระทู้</label>
                                </div>
                                <div class="post _sf-col-xs-12-sm-8">
									                          <input type="text" class="txt-box _sf-col-xs-12" id="title" name="title">
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
                                <div class="owner _sf-col-xs-12-sm-3 txt-r">
                                    <label for="inputbox2">ชื่อผู้ตั้งกระทู้</label>
                                </div>
                                <div class="post _sf-col-xs-12-sm-8">
								<?php
								  $user_shop=$_SESSION['user_shop'];
								  $id_member_post=$_SESSION['id_shop_member'];
								  ?>
									<input type="text" value="<?=$user_shop?>" class="txt-box" id="name" name="name">
                                </div>
                            </div>

                            <div class="row">
                                <div class="owner _sf-col-xs-12-sm-3 txt-r">
                                    <label for="inputbox3">อีเมล์ติดต่อ</label>
                                </div>
                                <div class="post _sf-col-xs-12-sm-8">
									<input type="text" class="txt-box" id="email" name="email">
                                </div>
                            </div>
							 <div class="row"> <div class="owner _sf-col-xs-12-sm-3 txt-r"></div>
								<div class="post _sf-col-xs-12-sm-8">
									<img id="refresh_cap" src="captcha/captcha_img.php"><a href="javascript:void(0);" onClick="javascript:RefreshCap();" title="ขอรหัสใหม่"> <img src="image/icon/action_refresh.gif" width="16" height="16" border="0" /></a>
									</div>
								</div>
                            <div class="row">
                                <div class="owner _sf-col-xs-12-sm-3 txt-r">
                                    <label for="inputbox1">รหัสลับ</label>
                                </div>
                                <div class="post _sf-col-xs-12-sm-8">
                                        <input type="text" class="txt-box" maxlength="5" name="code" id="code">
                                        <span class="captcha"><!--<span onClick="refreshCaptcha();" title="คลิกเพื่อเปลี่ยนภาพ" id="imgcaptcha"><img title="คลิกเพื่อเปลี่ยนภาพ" alt="คลิกเพื่อเปลี่ยนภาพ" src="http://member.samartmedia.com/rest/captcha.php?1432357148613"></span>-->
										</span>
                                        <p class="t-red">กรุณาป้อนรหัส ตามที่ท่านเห็นด้านบนให้ถูกต้อง</p>
                                </div>
                            </div>

                            <div class="row">
                                <div class="owner _sf-col-xs-12-sm-3 txt-r">
                                    &nbsp;
                                </div>
                                <div class="post _sf-col-xs-12-sm-8">
                                    <div class="ctrl-btn pt1">
										<input type="submit" class="ui-btn btn-post" name="Submit" value="ตั้งกระทู้" />
										<input type="hidden" name="id_member" value="<?=$id_member_post?>" />
						<span id="Showdata"></span>
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
