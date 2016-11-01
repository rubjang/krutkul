<!DOCTYPE html>
<html lang="th">
  <!-- Top Head -->
  <?php
  @include('config/connect.php');
  @include('incs/header-top.php');
  //include('config/connect.php');
    $strSQL = "SELECT * FROM shop_webboard ";

    $objQuery = mysql_query($strSQL) or die ("Error Query");
    $Num_Rows = mysql_num_rows($objQuery);

    $Per_Page = 10;   // Per Page

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

    $strSQL .=" order by id_webboard desc LIMIT $Page_Start , $Per_Page";
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
	  <?php @include('incs/header.php'); ?>
      <!-- /Header -->
      <div class="page bg-wh">
      <div class="container">
		<section class="wp-webboard">
        	<?php @include('incs/toolbar-wb.php'); ?>
			       <div class="cat-box-content">
                  <div class="zone-wb">
                    <div class="wb-group-list-topic">
                    	<h2><i class="fa-truck"></i> เว็บบอร์ด ถาม – ตอบ : สอบถามบริการ ราคา การขนส่ง เกี่ยวกับรถรับจ้าง
                      <?php @include('webboard-header.php'); ?>
                        </h2>
                        <ul>
                        	<?php
		                        while($row = mysql_fetch_array($objQuery)){
                            ?>
                        	   <li>
                            	<a target="_blank" href="webboard-read.php?ID=<?php echo $row[id_webboard]; ?>">
                                <i class="fa-question-circle"></i>
                            	   <h3><?=stripslashes($row[title])?></h3>
                                </a>
                                <div class="ft">
                                	<span class="by-name">
                                  <?php if($_SESSION['user_shop']=="admin"){?>
                                    <a href="javascript:Del(<?=$row[id_webboard]?>)" onClick="return confirm('ต้องการลบจริงหรือไม่');"><img src="image/icon/delete.png" width="24" height="24" border="0" align="absbottom"> ลบกระทู้นี้</a>
                                    <? } ?><div id="ShowDel"></div>
                                  </span>
                                    <small><i class="fa-user"></i> <?php echo $row[name];?> ,  เมื่อ <?php $today=explode("-",$row[today]); echo $today['2']."-".$today['1']."-".$today['0']; ?></small>
                                	<span><i class="fa-comments-o"></i> <?=mysql_num_rows(mysql_query("select id_webboard from shop_webboard_reply where id_webboard='$row[id_webboard]'"));?></span>
                                    <span><i class="fa-eye"></i> <?php echo $row[view];?></span>
                                </div>

                            </li>
                            <? } ?>
                        </ul>
                          <div class="pagination">
                            <ul>
                            มีทั้งหมด : <?=$Num_Pages;?> หน้า :
                            <?php
                            if($Prev_Page)
                            {
                            	echo " <a href='$_SERVER[SCRIPT_NAME]?Page=$Prev_Page'><< ย้อนกลับ</a> ";
                            }

                            for($i=1; $i<=$Num_Pages; $i++){
                            	if($i != $Page)
                            	{
                            		echo "[ <a href='$_SERVER[SCRIPT_NAME]?Page=$i'>$i</a> ]";
                            	}
                            	else
                            	{
                            		echo "<b> $i </b>";
                            	}
                            }
                            if($Page!=$Num_Pages)
                            {
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
