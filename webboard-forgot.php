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
  function SentEmail()
  {
    var ff=document.fr_email;
    if(ff.email.value=="")
    {
      alert('ป้อนอีเมล์ด้วย');
      ff.email.focus();
      return false;
    }
    else
    {
      document.getElementById('Showdata').innerHTML="<img src='image/icon/loading_blue.gif' width='16' height='16' border='0'>";
      return true;
    }
  }

  function SentEr()
  {
    document.getElementById('Showdata').innerHTML="";
    return true;
  }

  function SentOK(id){
  document.getElementById('Showdata').innerHTML="";
  window.open("index.php","_self");
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
            	<a href="#"></a>
            	<!--<div class="fix-r"><a class="ui-btn-mini" href="webboard-post.php" title="ตั้งกระทู้">ตั้งกระทู้</a> <a class="ui-btn-mini" href="webboard-register.php" title="ลงทะเบียนใหม่">ลงทะเบียนใหม่</a></div>-->
            </h2>
			<div class="cat-box-content">

                  <div class="zone-wb">

                    <div class="wb-group-list-topic">
                    	<h2><i class="fa-user-plus"></i> สมาชิกลืมรหัสผ่าน</h2>

                        <div class="post-box main-box">
                        <!-- form -->
                        <iframe name="Iframs" id="Iframs" src="" class="iframes"></iframe>
                          <form name="fr_email" id="fr_email" method="post" target="Iframs" action="save-forgot.php" onSubmit="return SentEmail();">
                        <fieldset>
                          <div class="row">
                              <div class="owner _sf-col-xs-12-sm-3 txt-r">

                              </div>
                              <div class="post _sf-col-xs-12-sm-8">
                                         <span class="ic-boy active">

                                      <label for="sex1">กรอกอีเมล์ที่ได้ลงทะเบียนไว้ ระบบจะส่งรหัสผ่านไปให้ที่อีเมล์ของท่าน</label></span>
                              </div>
                          </div>
                        	<div class="row">
                                <div class="owner _sf-col-xs-12-sm-3 txt-r">
                                    <label for="inputbox1">กรอกอีเมล์</label>
                                </div>
                                <div class="post _sf-col-xs-12-sm-8">
									<input type="text" class="txt-box _sf-col-xs-12-sm-6" id="email" name="email">
                                </div>
                            </div>

                                  <div class="row">
                                <div class="owner _sf-col-xs-12-sm-3 txt-r">
                                    &nbsp;
                                </div>
                                <div class="post _sf-col-xs-12-sm-8">
                                    <div class="ctrl-btn pt1">
              										<input type="submit" class="ui-btn btn-post" name="Submit" value="ดำเนินการ" />
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
