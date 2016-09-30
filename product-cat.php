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
      <div class="page bg-web f-top">
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
                    <a class="selected" href="product-cat.php" title="MEDIUM FILTER">
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
          		<h2 class="h-sec">MEDIUM FILTER</h2>      
                <ul class="thm-pd txt-c">
                <? for($i=1;$i<=9;$i++) { ?>
                 <li>
                      <a href="product-detail.php" title="POCKET FILTER">
                      <img alt="OCKET FILTER" src="img/thumb/sub-product-0<? echo $i; ?>.png">
                      <h3>POCKET FILTER</h3>
                      </a>
                </li>
                <? } ?>
                </ul>
          
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
