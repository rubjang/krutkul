<!DOCTYPE html>
<html lang="th">
  <!-- Top Head -->
  <?php @include('incs/header-top.php'); ?>
  <!-- /Top Head -->
  <script>
   $(document).ready(function(){
			 $("#nav-drop li a").removeClass("selected");
			 $('#nav-drop>li:nth-child(2)>a').addClass('selected');
	}); 
  
  </script>
  <body>

    
      <!-- Header -->
	  <?php @include('incs/header.php'); ?>
      <!-- /Header -->
      <div class="page bg-web">
      <div class="container">
           <div class="sw-lang">
                <a href="aboutus.php" title="Thai" onClick="$('.sw-lang>a').removeClass('hid');$(this).addClass('hid');"><img src="img/ic-th.png" alt="thai"></a>
                <a class="hid" href="javascript:void(EN);" title="English" onClick="$('.sw-lang>a').removeClass('hid');$(this).addClass('hid');"><img src="img/ic-en.png" alt="English"></a>
           </div>
           <div class="nav-about">              
                <ul class="_cd-col-xs-4 txt-c">
                 <li>
                      <img alt="" src="img/about-01.png">
                </li>
                <li>
                    <img alt="" src="img/about-02.png">
                </li>
                <li>
                    <img alt="" src="img/about-03.png">
                </li>
                </ul>
           </div>
           <div class="vision">
           		<h2 class="hid">วิสัยทัศน์</h2>
                <p>Valitech established for Air Filter Solutions in order to meet customers’ satisfaction as<br>
well as quality requirements, we have been intensely focused on prociding customers<br>
with air filtration product in HVAC (Heatin, Ventilation and Air Conditioning)
                </p>
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
