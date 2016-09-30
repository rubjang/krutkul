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
                <a class="hid" href="javascript:void(TH);" title="Thai" onClick="$('.sw-lang>a').removeClass('hid');$(this).addClass('hid');"><img src="img/ic-th.png" alt="thai"></a>
                <a href="aboutus-en.php" title="English" onClick="$('.sw-lang>a').removeClass('hid');$(this).addClass('hid');"><img src="img/ic-en.png" alt="English"></a>
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
                <p>บริษัท ครุฑกุลทรานสปอร์ต จำกัด เราเป็นผู้ให้บริการด้านรถรับจ้าง ซึ่งมี รถรับจ้างขนของ รถรับจ้างทั่วไป รถกระบะรับจ้าง รถกระบะขนของ รถ 6 ล้อรับจ้าง รถเฮียบรับจ้างและอื่นๆ ทุกชนิด ทุกขนาดที่จะให้บริการตามความต้องการของลูกค้าและเนื่องจากในปัจจุบัน การหาข้อมูล ราคาการว่าจ้าง ซึ่งท่านอาจจะใช้คำว่า รถรับจ้าง รถรับจ้างขนของ รถกระบะรับจ้าง รถกระบะขนของ รถ 6 ล้อรับจ้าง รถเฮียบรับจ้าง รถเครนรับจ้าง รถเทรลเลอร์รับจ้าง รถสิบล้อรับจ้าง รถบรรทุก 4 ล้อและรถรับจ้างทั่วไปนั่นก็หมายรวมถึง รถรับจ้างโดยทั่วๆไปนั่นเอง ที่จะให้บริการขนย้าย ด้วยราคาตามสถานที่ ระยะทาง งานยากง่าย สำหรับเราแล้วไม่ว่าท่านจะ ย้ายบ้าน ขนของ  ขนส่งสินค้าอุปโภค-บริโภค  เราก็รับบริการ ขนย้ายบ้าน รับย้ายบ้าน ขนย้ายสินค้าทุกอย่าง ให้ท่านตามความต้องการ ด้วยราคาที่ถูก จนท่านพึงพอใจ และการบริการที่ดี ตรงต่อเวลา นั่นคือสิ่งที่เราดำเนินงานมาโดยตลอดระยะเวลาที่เริ่มทำ รถรับจ้าง พร้อมกับประสบการณ์ที่ทีมากว่า 20 ปี ความชำนาญในเส้นทาง สนในติดต่อเราที่เบอร์
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
