<!DOCTYPE html>
<html lang="th">
  <!-- Top Head -->
  <?php @include('incs/header-top.php'); ?>
  <!-- /Top Head -->
  <script>
   $(document).ready(function(){
			 $("#nav-drop li a").removeClass("selected");
			 $('#nav-drop>li:nth-child(3)>b>a').addClass('selected');
	}); 
  
  </script>
  <body>


      <!-- Header -->
	  <?php @include('incs/header.php'); ?>
      <!-- /Header -->
      <div class="page">
      	<div class="container pb0">
            <div class="nav-pd _sf-col-xs-12-lg-10-lg-push-1">              
                <ul class="_cd-col-xs-4-sm-2 txt-c">
                 <li>
                      <a href="product-cat.php" title="PRE FILTER">
                      <img alt="PRE FILTER" src="img/product-01.png">
                      <h3>PRE FILTER</h3>
                      </a>
                </li>
                <li>
                    <a href="product-cat.php" title="MEDIUM FILTER">
                      <img alt="MEDIUM FILTER" src="img/product-02.png">
                      <h3>MEDIUM FILTER</h3>
                      </a>
                </li>
                <li>
                    <a href="product-cat.php" title="EPA FILTER">
                      <img alt="EPA FILTER" src="img/product-03.png">
                      <h3>EPA FILTER</h3>
                      </a>
                </li>
                <li>
                      <a href="product-cat.php" title="HEPA FILTER">
                      <img alt="HEPA FILTER" src="img/product-04.png">
                      <h3>HEPA FILTER</h3>
                      </a>
                </li>
                <li>
                    <a href="product-cat.php" title="ULAP FILTER">
                      <img alt="ULAP FILTER" src="img/product-05.png">
                      <h3>ULAP FILTER</h3>
                      </a>
                </li>
                <li>
                    <a href="product-cat.php" title="EQUIPMENT">
                      <img alt="EQUIPMENT" src="img/product-06.png">
                      <h3>EQUIPMENT</h3>
                      </a>
                </li>
                </ul>
           </div>
       </div>
       <div class="box-wh">
          <div class="container sec-product">
          		<div class="thumb _sf-col-xs-12-sm-5 pd0">
                	<a href="http://vali-tech.net/images/exhibition_05.jpg" title="Pleat Filter" class="fancybox"  rel="gallery1"><img class="mb0" src="http://vali-tech.net/images/exhibition_05.jpg" alt="Commercial & Office Buildings"></a>
                    <a href="http://vali-tech.net/images/exhibition_09.jpg" title="Pleat Filter" class="fancybox"  rel="gallery1"><img class="mb0" src="http://vali-tech.net/images/exhibition_09.jpg" alt="Commercial & Office Buildings"></a>
                    <a href="http://vali-tech.net/images/exhibition_13.jpg" title="Pleat Filter" class="fancybox"  rel="gallery1"><img src="http://vali-tech.net/images/exhibition_13.jpg" alt="Commercial & Office Buildings"></a>
                </div>
                <div class="detail _sf-col-xs-12-sm-7 pd0">
                	<h2 class="h-sec">Commercial & Office Buildings</h2>  
                    <div class="list">
                    <h3>Highlight :</h3>
                    <p>Water-proof cardboard Moisture resistance frame natural wood pulp madeby tooling lightness in weight and convenience in installation
                    Media characterized Mixture Cotton with Synthetic fiber with high loftiness resistance and high dust holding capacity
                    Recommended resistance up to100% RH ,Temperature up to 100 °C
                    Downstream side of the synthetic media is specially finished smooth to refrain seconded pollution from shedding fibers</p>
                    <p>Initial Pressure Drop ±15 pa
                   Filter class :G1-G4 UL 900 Class 2
                    High performance dust loading for a longer life than standard pleated filter
                    Waste is disposable and can be incensed conveniently meeting the requirement of environmental protection
                    Material frame is also available for option</p>
                    </ul>
                    
                    <h3>Video :</h3>
                    <div class="vdo">
                    	<iframe width="640" height="380" src="//www.youtube.com/embed/IIaTUdL2BQk" frameborder="0" allowfullscreen="allowfullscreen"></iframe>
                    </div>
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
