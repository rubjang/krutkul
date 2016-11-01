<!DOCTYPE html>
<html lang="th">
  <!-- Top Head -->
  <?php @include('incs/header-top.php');
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


	</div>
    <!-- /page -->
	<!-- javascript -->
	<?php @include('incs/js.php'); ?>
    <!-- /javascript -->
  </body>
</html>
