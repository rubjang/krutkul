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


  <body>

      <!-- Header -->
	  <?php @include('incs/header.php'); ?>
      <!-- /Header -->
      <div class="page bg-wh">
      <div class="container">
		<section class="wp-webboard">
        	<?php @include('incs/toolbar-wb.php'); ?>
			<h2 class="cat-box-title">
            	<a href="#"></a>
            	<!--<div class="fix-r"><a class="ui-btn-mini" href="webboard-post.php" title="ตั้งกระทู้">ตั้งกระทู้</a> <a class="ui-btn-mini" href="webboard-register.php" title="ลงทะเบียนใหม่">ลงทะเบียนใหม่</a></div>-->
            </h2>
			<div class="cat-box-content">

                  <div class="zone-wb">

                    <div class="wb-group-list-topic">
                    	<h2><i class="fa-user-plus"></i> สมาชิก Login เข้าระบบ</h2>

                        <div class="post-box main-box">
                        <!-- form -->
						  <form name="form1" method="post" action="check-login.php">
                        <fieldset>
                        <legend class="hid">ลงทะเบียนใหม่</legend>
                        	<div class="row">
                                <div class="owner _sf-col-xs-12-sm-3 txt-r">
                                    <label for="inputbox1">ชื่อผู้ใช้งาน</label>
                                </div>
                                <div class="post _sf-col-xs-12-sm-8">
									<input type="text" class="txt-box _sf-col-xs-12-sm-6" id="username" name="username">
                                </div>
                            </div>

                            <div class="row">
                                <div class="owner _sf-col-xs-12-sm-3 txt-r">
                                    <label for="password">รหัสผ่าน</label>
                                </div>
                                <div class="post _sf-col-xs-12-sm-8">
									<input type="password" class="txt-box _sf-col-xs-12-sm-6" id="password" name="password">
                                </div>
                            </div>
                                  <div class="row">
                                <div class="owner _sf-col-xs-12-sm-3 txt-r">
                                    &nbsp;
                                </div>
                                <div class="post _sf-col-xs-12-sm-8">
                                    <div class="ctrl-btn pt1">
              										<input type="submit" class="ui-btn btn-post" name="Submit" value="เข้าระบบ" /> | <a href="webboard-register.php">สมัครสมาชิก</a>
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
