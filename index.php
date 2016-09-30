<!DOCTYPE html>
<html lang="th">
  <!-- Top Head -->
  <?php @include('incs/header-top.php');
$limit_product  = "18";
  ?>
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
      <div class="page">
	  <!-- Highlight -->

	<!-- Slide main -->
	  <section class="hl-slider">
        <div id="main-slide" class="flexslider">
  		<ul class="slides">

    	  <li data-thumb="img/slider1.jpg">
            <a href="#" title="Valitech Air Filter 01">
              <img src="img/slider1.jpg" alt="">
              <div class="hid">
              	 <div class="container">
                  <h3>Valitech Air Filter 01</h3>
                  <p>How its work on pc.</p>
                  </div>
              </div>
            </a>
          </li>
          <li data-thumb="img/slider2.jpg">
            <a href="#" title="Valitech Air Filter 02">
              <img src="img/slider2.jpg" alt="">
              <div class="hid">
              	<div class="container">
                  <h3>Valitech Air Filter 02</h3>
                  <p>How its work on pc.</p>
                </div>
              </div>
            </a>
          </li>
          <li data-thumb="img/slider3.jpg">
            <a href="#" title="Valitech Air Filter 03">
              <img src="img/slider3.jpg" alt="">
              <div class="hid">
              	<div class="container">
                  <h3>Valitech Air Filter 03</h3>
                  <p>How its work on pc.</p>
                </div>
              </div>
            </a>
          </li>
        </ul>
      </div>
      </section>
	<!-- Slide main -->
      <!-- /Highlight -->

<div class="container pb0">
<h2 class="h-sec">รถบริการของเรา</h2>
            <div class="nav-pd _sf-col-xs-12-lg-10-lg-push-1">
                <ul class="_cd-col-xs-4-sm-2 txt-c">
                 <li>
                      <a href="product-cat.php" title="รถบรรทุก 6 ล้อ คอกสูง">
                      <img alt="รถบรรทุก 6  ล้อ คอกสูง" src="img/car/car1.png" >
                      <h3>รถ 6 ล้อคอกสูง</h3>
                      </a>
                </li>
                <li>
                    <a href="product-cat.php" title="รถ 6 ล้อตู้ทึบ">
                   <img alt="รถ 6 ล้อตู้ทึบ" src="img/car/car2.png" >
                      <h3>รถ 6 ล้อตู้ทึบ</h3>
                      </a>
                </li>
                <li>
                    <a href="product-cat.php" title="รถกระบะ">
                 <img alt="รถ 6 ล้อตู้ทึบ" src="img/car/car3.png" >
                      <h3>รถ 6 ล้อตู้ทึบ</h3>
                      </a>
                </li>
                <li>
                      <a href="product-cat.php" title="HEPA FILTER">
                     <img alt="รถ 6 ล้อตู้ทึบ" src="img/car/car4.png" >
                      <h3>รถ 6 ล้อตู้ทึบ</h3>
                      </a>
                </li>
                <li>
                    <a href="product-cat.php" title="ULAP FILTER">
                      <img alt="รถบรรทุก 6  ล้อ คอกสูง" src="img/car/car5.png" >
                      <h3>รถ 6 ล้อคอกสูง</h3>
                      </a>
                </li>
              <li>
                    <a href="product-cat.php" title="EQUIPMENT">
                  <img alt="รถกระบะ" src="img/car/car6.png" >
                      <h3>รถกระบะ</h3>
                      </a>
                </li>
                </ul>
           </div>
       </div>
       <div class="box-wh">
          <div class="container sec-indust">
          		<h2 class="h-sec">ผลงานและบริการ</h2>
                <ul class="row thm-top _cd-col-xs-4-sm-3-md-2 txt-c">
                <?php @include("product-list.php"); ?>
            	  </ul>
				<h3 class="h-sec"><a href="product.php" style="font-size:20px;">>> ดูผลงานทั้งหมด <<</a></h3>
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
