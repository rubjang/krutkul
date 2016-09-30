<!DOCTYPE html>
<html lang="th">
    <?php @include('incs/header-top.php');
if($_SESSION['user_shop']!="admin"){
  header('location:index.php');
  exit();
}

    $strSQL = "SELECT * FROM shop_member WHERE `user_shop` not in ('admin','webmaster','administrator')";
    $objQuery = mysql_query($strSQL) or die ("Error Query");
    $Num_Rows = mysql_num_rows($objQuery);
    $Per_Page = 20;   // Per Page
    $Page = $_GET["Page"];
    if(!$_GET["Page"])
    {
      $Page=1;
    }
    $Prev_Page = $Page-1;
    $Next_Page = $Page+1;
    $Page_Start = (($Per_Page*$Page)-$Per_Page);
    if($Num_Rows<=$Per_Page)
    {
      $Num_Pages =1;
    }
    else if(($Num_Rows % $Per_Page)==0)
    {
      $Num_Pages =($Num_Rows/$Per_Page) ;
    }
    else
    {
      $Num_Pages =($Num_Rows/$Per_Page)+1;
      $Num_Pages = (int)$Num_Pages;
    }
    $strSQL .=" order by id_shop_member desc LIMIT $Page_Start , $Per_Page";
    $objQuery  = mysql_query($strSQL);
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
		id_shop_member:data1
	}
	$.post("delete-member-shop.php",dataSend,function(data){
		$("#ShowDel").html(data);
	});
}
//

function compelete(){
window.open("check-member.php","_self");
return true;
}
</script>
  <body>
      <!-- Header -->
	  <?php @include('incs/header.php'); ?>
      <!-- /Header -->
      <div class="page bg-wh">
      <div class="container">
		<section class="wp-webboard">
        	<?php @include('incs/toolbar-wb.php'); ?>
			       <div class="cat-box-content">
                  <div class="zone-wb">
                    <div class="wb-group-list-topic">
                    	<h2><i class="fa-truck"></i> รายชื่อสมาชิกเว็บบอร์ดทั้งหมด
                      <?php @include('webboard-header.php'); ?>
                        </h2>
                        <ul>
                         	<?php $count = 0;
		                        while($row = mysql_fetch_array($objQuery)){ $counts = $count+1;?>
                        	   <li>
                               <h3><?php echo $counts;?>. <?=stripslashes($row[name_shop])?> </h3>
                                <div class="ft" >
                              	 	<small style="color:#0099CC;margin-left:20px;">ที่อยู่ : <?php echo $row[address_shop];?> , อีเมล์ : <?php echo $row[email_shop];?> , โทรศัพท์ : <?php echo $row[tel_shop];?></small>
								                </div>
								<div class="ft" style="margin-left:20px;"><a href="javascript:Del(<?=$row[id_shop_member]?>)" onClick="return confirm('ต้องการลบจริงหรือไม่');"><img src="image/icon/delete.png" width="24" height="24" border="0" align="absbottom"> ลบสมาชิก</a>
								</div>
                            </li>
                            <? $count++;} ?>
                        </ul><div id="ShowDel"></div>
                        <div class="pagination">
                          <ul>
                          มีทั้งหมด : <?=$Num_Pages;?> หน้า :
                          <?php
                          if($Prev_Page){
                          	echo " <a href='$_SERVER[SCRIPT_NAME]?Page=$Prev_Page'><< ย้อนกลับ</a> ";
                          }

                          for($i=1; $i<=$Num_Pages; $i++){
                          	if($i != $Page){
                          		echo "[ <a href='$_SERVER[SCRIPT_NAME]?Page=$i'>$i</a> ]";
                          	}else{
                          		echo "<b> $i </b>";
                          	}
                          }
                          if($Page!=$Num_Pages){
                          	echo " <a href ='$_SERVER[SCRIPT_NAME]?Page=$Next_Page'>หน้าถัดไป>></a> ";
                          }
                          ?>
                          </ul>
                        </div>
                      </div>
                  </div>
            </div>
        </section>
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
