  <?php
  ob_start();
  session_start();
   ?>
  <!DOCTYPE html>
  <html lang="th">
    <!-- Top Head -->
    <?php
    @include('config/connect.php');
    @include('incs/header-top.php');
    //include('config/connect.php');

    ?>
    <!-- /Top Head -->
    <script>
     $(document).ready(function(){
  			 $("#nav-drop li a").removeClass("selected");
  			 $('#nav-drop>li:nth-child(1)>a').addClass('selected');
  	});
    </script>
    <script type="text/javascript">
  //delete
  function Del(data1){
  	var dataSend={
  		id_webboard:data1
  	}
  	$.post("delete-webboard-shop.php",dataSend,function(data){
  		$("#ShowDel").html(data);
  	});
  }
  //

  function compelete(){
  window.open("webboard.php","_self");
  return true;
  }
  </script>
    <body>
        <!-- Header -->
  	
    </body>
  </html>
