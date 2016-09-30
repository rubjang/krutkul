<!DOCTYPE html>
<html lang="th">
  <!-- Top Head -->
  <?php @include('incs/header-top.php'); ?>
  <!-- /Top Head -->
  <script>
   $(document).ready(function(){
			 $("#nav-drop li a").removeClass("selected");
			 $('#nav-drop>li:nth-child(5)>b>a').addClass('selected');
	}); 
  </script>
  <body>


      <!-- Header -->
	  <?php @include('incs/header.php'); ?>
      <!-- /Header -->
      <div class="page bg-web f-top">
       <div class="box-wh">
          <div class="container sec-product">
          		<div class="thumb _sf-col-xs-12-sm-5 pd0">
                	<a href="img/map-big.png" title="แผนที่ขยาย" target="_blank"  class="fancybox"  rel="gallery1"><img src="img/map-small.png" alt="แผนที่บริษัท"></a>
                </div>
                <div class="detail _sf-col-xs-12-sm-7 pd0">
                	<h2 class="h-sec">ติดต่อเรา</h2>  
                    <div class="list">
                    <h3>บริษัท ครุฑกุลทรานสปอร์ต จำกัด</h3>
                    <ul>
                    <li>เลขทะเบียน : 0115555016483</li>
                    <li>99/193 หมู่ที่ 6 ต.บางเมือง </li>
                    <li>อ.เมืองสมุทรปราการ </li>
                    <li>จ.สมุทรปราการ 10270</li>
                    <li>Mobile : <a href="tel:081611951">081-611-9516</a></li>
                    <li>Email : <a href="matilto:sale@xn--12cf3brjmo3ddcr7dyb4d7dc36a.com">sale@ครุฑกุลทรานสปอร์ต.com</a></li>
                    <li>Line ID : 709446</li>
                    </ul>
                    </div>
                </div>    
          
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
