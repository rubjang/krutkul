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
  var ff=document.Regi;
  if(ff.user_shop.value==''){
  alert('ป้อนชื่อผู้ใช้งานด้วย');
  ff.user_shop.focus();
  return false;
  }
  else if(ff.user_shop.value.length < 4){
  alert('ชื่อผู้ใช้งานห้ามน้อยกว่า 4 ตัว');
  ff.user_shop.focus();
  return false;
  }
  else if(ff.pass_shop.value==''){
  alert('ป้อนรหัสผ่านด้วย');
  ff.pass_shop.focus();
  return false;
  }
  else if(ff.pass_shop.value.length < 4){
  alert('รหัสผ่านต้องมากกว่า 3 ตัวขึ้นไป');
  ff.pass_shop.focus();
  return false;
  }
  else if(ff.name_shop.value==''){
  alert('ป้อนชื่อด้วย');
  ff.name_shop.focus();
  return false;
  }
  else if(ff.address_shop.value==''){
  alert('ป้อนที่อยู่ด้วย');
  ff.address_shop.focus();
  return false;
  }
  else if(ff.tel_shop.value==''){
  alert('ป้อนเบอร์โทรติดต่อด้วย');
  ff.tel_shop.focus();
  return false;
  }
  else if(ff.email_shop.value==''){
  alert('ป้อนอีเมล์ติดต่อด้วย');
  ff.email_shop.focus();
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
  window.open("webboard-login.php","_self");
  return true;
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
                    	<h2><i class="fa-user-plus"></i> ลงทะเบียนประจำร้านค้าออนไลน์</h2>

                        <div class="post-box main-box">
                        <!-- form -->
                          <iframe name="Iframs" id="Iframs" src="" class="iframes"></iframe>
                          <form id="Regi" name="Regi" method="post" action="save-register.php" target="Iframs" onSubmit="return check();">
                        <fieldset>
                        <legend class="hid">ลงทะเบียนใหม่</legend>
                        	<div class="row">
                                <div class="owner _sf-col-xs-12-sm-3 txt-r">
                                    <label for="inputbox1">ชื่อผู้ใช้งาน</label>
                                </div>
                                <div class="post _sf-col-xs-12-sm-8">
									<input type="text" class="txt-box _sf-col-xs-12-sm-6" id="user_shop" name="user_shop">
                                </div>
                            </div>

                            <div class="row">
                                <div class="owner _sf-col-xs-12-sm-3 txt-r">
                                    <label for="password">รหัสผ่าน</label>
                                </div>
                                <div class="post _sf-col-xs-12-sm-8">
									<input type="password" class="txt-box _sf-col-xs-12-sm-6" id="pass_shop" name="pass_shop">
                                </div>
                            </div>
                            <!--<div class="row">
                                <div class="owner _sf-col-xs-12-sm-3 txt-r">
                                    <label for="cpassword">ยืนยันรหัสผ่าน</label>
                                </div>
                                <div class="post _sf-col-xs-12-sm-8">
									<input type="password" class="txt-box _sf-col-xs-12-sm-6" id="cpassword" name="cpassword">
                                </div>
                            </div>-->

                            <div class="row">
                                <div class="owner _sf-col-xs-12-sm-3 txt-r">
                                    <label for="inputbox2">ชื่อ-นามสกุล</label>
                                </div>
                                <div class="post _sf-col-xs-12-sm-8">
									<input type="text" class="txt-box _sf-col-xs-12-sm-6" id="name_shop" name="name_shop">
                                </div>
                            </div>

                            <div class="row">
                                <div class="owner _sf-col-xs-12-sm-3 txt-r">
                                    <label for="inputbox1">เพศ</label>
                                </div>
                                <div class="post _sf-col-xs-12-sm-8">
									                         <span class="ic-boy active">
                                    	<input type="radio"  id="sex_shop" name="sex_shop">
                                        <label for="sex1">ชาย</label></span>
                            		<span class="ic-girl">
                                    	<input type="radio" id="sex_shop" name="sex_shop">
                                        <label for="sex2">หญิง</label></span>
                                </div>
                            </div>

                            <div class="row">
                                <div class="owner _sf-col-xs-12-sm-3 txt-r">
                                    <label for="cm-detail">ที่อยู่</label>
                                </div>
                                <div class="post _sf-col-xs-12-sm-8">
                                    <div class="input-wrap">
                                        <textarea class="txt-area" id="address_shop" name="address_shop" placeholder=""></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="owner _sf-col-xs-12-sm-3 txt-r">
                                    <label for="inputbox3">เบอร์ติดต่อ</label>
                                </div>
                                <div class="post _sf-col-xs-12-sm-8">
									<input type="text" class="txt-box" id="tel_shop" name="tel_shop">
                                </div>
                            </div>

                            <div class="row">
                                <div class="owner _sf-col-xs-12-sm-3 txt-r">
                                    <label for="inputbox4">อีเมล์ติดต่อ</label>
                                </div>
                                <div class="post _sf-col-xs-12-sm-8">
									<input type="text" class="txt-box" id="email_shop" name="email_shop">
                                </div>
                            </div>

                            <div class="row">
                                <div class="owner _sf-col-xs-12-sm-3 txt-r">
                                    &nbsp;
                                </div>
                                <div class="post _sf-col-xs-12-sm-8">
                                    <div class="ctrl-btn pt1">
                                       <!-- <input type="submit" class="ui-btn btn-post" id="post-topic" name="post-topic" value="ลงทะเบียน">-->
              										<input type="submit" class="ui-btn btn-post" name="Submit" value="ลงทะเบียน" /> | <a href="webboard-login.php">เข้าระบบ</a>
              										<span id="Showdata"></span>
                                    </div>
                                </div>
                            </div>
                         </fieldset>
                         </form>
						<!-- /form -->
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
