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
      <div class="container">
	  <!-- Highlight -->
      <section class="hl-slider">
        
        <div id="main-slide" class="flexslider">
  		<ul class="slides">
    	  <li data-thumb="img/bg.jpg">
            <a href="#" title="Factory Engine 01">
              <img src="img/bg.jpg" alt="">
              <div>
              	 <div class="container">
                  <h3>Factory Engine 01</h3>
                  <p>How its work on pc.</p>
                  </div>
              </div>
            </a>
          </li>
          <li data-thumb="img/bg1.jpg">
            <a href="#" title="Factory Engine 02">
              <img src="img/bg2.jpg" alt="">
              <div>
              	<div class="container">
                  <h3>Factory Engine 02</h3>
                  <p>How its work on pc.</p>
                </div>
              </div>
            </a>
          </li>
          <li data-thumb="img/bg-demo.jpg">
            <a href="#" title="Factory Engine 03">
              <img src="img/bg.jpg" alt="">
              <div>
              	<div class="container">
                  <h3>Factory Engine 03</h3>
                  <p>How its work on pc.</p>
                </div>
              </div>
            </a>
          </li>
          <li data-thumb="img/bg1.jpg">
            <a href="#" title="Factory Engine 04">
              <img src="img/bg2.jpg" alt="">
              <div>
              	<div class="container">
                  <h3>Factory Engine 04</h3>
                  <p>How its work on pc.</p>
                </div>
              </div>
            </a>
          </li>
        </ul>
      </div>
        
      </section>
      <!-- /Highlight -->   
      
       <article class="page-detail nav-home">
            <div class="top">
                <div class="welcome">
                    <div id="crumbs" class="h-cat"><span>CUSTOMER SERVICE</span></div>
                </div>
                
                <div class="follow">
                    <ul class="social ">
                        <li class="fb"><a href="#" target="_blank" title="facebook">facebook</a></li>
                        <li class="gg"><a href="#" target="_blank" title="google+">google plus</a></li>
                        <li class="tw"><a href="#" target="_blank" title="twitter">twitter</a></li>
                    </ul>
                    <b>Follow X Source Engine Tech</b>
                </div>
            
            </div>
            
            <div class="pt1 page-gallery">
            	
                <ul class="thm-gallery _cd-col-xs-6-sm-3">
                	<? for($i=1;$i<=6;$i++) { ?>
                	<li>
                        <a href="img/thumb/lightbox-01.jpg" title="Existed since ancient" class="fancybox"  rel="gallery1">
                        <img src="img/thumb/267x200-01.jpg" alt="Existed since ancient">
                        <h2>Existed since ancient</h2>
                        </a>
                    </li>
                    <li>
                        <a href="img/thumb/lightbox-02.jpg" title="Since ancient" class="fancybox"  rel="gallery1">
                        <img src="img/thumb/267x200-02.jpg" alt="Since ancient">
                        <h2>Since ancient</h2>
                        </a>
                    </li>
                    <? } ?>
                </ul>
                
                <div class="pagination">
                    <ul>
                      <li>
                        <a title="Previous" href="#">«</a>
                      </li>
                      <li>
                        <a title="Previous" href="#" class="active">1</a>
                      </li>
                      <li>
                        <a title="2" href="#">2</a>
                      </li>
                      <li>
                        <a title="3" href="#">3</a>
                      </li>
                      <li>
                        <a title="4" href="#">4</a>
                      </li>
                      <li>
                        <a title="Next" href="#">»</a>
                      </li>
                    </ul>
                </div>
            </div>
                
                
                  
                

       </article>  
       
     <!-- footer -->
    <footer id="footer">
    <?php @include('incs/footer.php'); ?>
    </footer>
    <!-- /footer --> 
      
	</div>
    <!-- /container -->
	<!-- javascript -->
	<?php @include('incs/js.php'); ?>
    <!-- /javascript -->
  </body>
</html>
