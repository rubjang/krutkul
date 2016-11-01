<?php
ob_start();
session_start();
 ?>?>
<!DOCTYPE html>
<html lang="th">
  <!-- Top Head -->
  <?php include('incs/header-top.php');
  $limit_product  = "36";
  ?>
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


        <div class="box-wh">
           <div class="container sec-indust">
           		<h2 class="h-sec">ผลงาน และ การให้บริการ<span class="dl">

               </h2>
                 <ul class="row thm-top _cd-col-xs-4-sm-3-md-2 txt-c">
 		                  <?php @include("product-list.php"); ?>
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
