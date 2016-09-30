<!DOCTYPE html>
<html lang="th">
  <!-- Top Head -->
  <?php @include('incs/header-top.php');
  $id_webboard  = $_REQUEST['ID'];
    $q_p=mysql_query("select a.*,b.name_shop,b.email_shop from shop_webboard a left join shop_member b on b.id_shop_member=a.id_member where a.id_webboard='$id_webboard'");
    if(mysql_num_rows($q_p)==0)
    {
      echo'<meta http-equiv="refresh" content="0;URL=index.php?SH='.$id_shop.'" />';
      exit();
    }
    $qr_post=mysql_fetch_array($q_p);
    $view=$qr_post[view]+1;
    mysql_query("Update shop_webboard set view='$view' where id_webboard='$id_webboard' ");
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
      <div class="page bg-wh">
      <div class="container">
		<section class="wp-webboard">
			<h2 class="cat-box-title"><a href="webboard.php">เว็บบอร์ด ถาม – ตอบ</a>
          <?php @include('webboard-header.php'); ?>
      </h2>
			<div class="cat-box-content">
                <section class="zone-wb">
                  <!-- คนโพส -->
                    <!--<div class="cm-reply-first">-->
                    <div class="cm-reply">
                    	<h1 style="font-size:27px;color:#0073b6;"><?=stripslashes($qr_post[title]);?></h1>
                        <div class="post _sf-col-sm-9-sm-push-3-xs-12">
                        <!-- Editor -->
                          <div class="msg">
                            <div>
                                <?=nl2br($qr_post[message]);?>
  						              </div>
                          </div>
                        <!-- /Editor -->
                        <!--
                        	<div class="function">
                            	<a class="btn-reply" href="#" title="ตอบกลับ"><i class="fa-mail-reply"></i> ตอบกลับ</a>
                                <a class="btn-vote" href="#" title="ถูกใจ"><i class="fa-heart"></i> 99 ถูกใจ</a>
                                <a class="btn-del" href="#" title="แจ้งลบกระทู้นี้"><i class="fa-trash-o"></i></a>
                            </div>
                          -->
                        </div>
                        <div class="owner _sf-col-sm-3-sm-pull-9-xs-12">
                        	<a href="#profile/596660" target="_blank" id="596660" class="by-name">
                            <img width="65" height="65" alt="" src="image/avatar.gif" class="avatar"><?php echo $qr_post[name_shop];?></a>
                        	<span style="display:block" class="display-post-timestamp">
            								<abbr class="timeago" data-utime="<?php $today=explode("-",$qr_post[today]); echo $today['2']."-".$today['1']."-".$today['0']; ?>" title="<?php $today=explode("-",$qr_post[today]); echo $today['2']."-".$today['1']."-".$today['0']; ?>"> เมื่อ : <?php $today=explode("-",$qr_post[today]); echo $today['2']."-".$today['1']."-".$today['0']; ?></abbr>
            							</span>
                        </div>
                        <!-- <div class="vote-user">-->
                        <div class="vote-user _sf-col-xs-12">
                            จำนวนเข้าชม : <?php echo $qr_post[view];?> ครั้ง
                        </div>

                    </div>
                    <!-- /คนโพส -->


                <div id="comment-counter" class="post-counter">
                    <span class="title"><i class="fa-comments-o"></i> ความคิดเห็นกระทู้นี้</span>
                    <div class="line"></div>
                </div>


                    <div class="list-reply">
                      <?php
                  		$qr_reply=mysql_query("select * from shop_webboard_reply where id_webboard='$qr_post[id_webboard]'  order by id_webboard ASC");
                  		if(mysql_num_rows($qr_reply)>0){
                        $count = 0;
                  		while($re_reply=mysql_fetch_array($qr_reply)){
                        $counts = $count+1;
                  		?>
                    	                        <div class="cm-reply">
                            <span id="comment1" class="post-number">ความคิดเห็นที่ <? echo $counts; ?></span>
                            <div class="post _sf-col-sm-9-sm-push-3-xs-12">
                            <!-- Editor -->
                            <div id="msg_83816-0<? echo $counts; ?>" class="msg">
                            	<?=nl2br($re_reply[message]);?>   </div>
                            <!-- /Editor -->
							<!--
                                <div class="function">
                                    <a class="btn-reply" href="#" title="ตอบกลับ"><i class="fa-mail-reply"></i> ตอบกลับ</a>
                                    <a class="btn-vote" href="#" title="ถูกใจ"><i class="fa-heart"></i> 99 ถูกใจ</a>
                                    <a class="btn-del" href="#" title="แจ้งลบกระทู้นี้"><i class="fa-trash-o"></i></a>
                                </div>
								-->
                            </div>

                            <div class="owner _sf-col-sm-3-sm-pull-9-xs-12">
                                <a href="#profile/596660" target="_blank" id="596660" class="by-name">
                                  <img width="65" height="65" alt="" src="image/avatar_reply.jpg" class="avatar"><?=$re_reply[name]?></a>
                                <span style="display:block" class="display-post-timestamp">
                                    <abbr class="timeago" data-utime="<?=$re_reply[today]?>" title="<?=$re_reply[today]?>">ตอบเมื่อ : <?=$re_reply[today]?></abbr>
                                </span>
                                <div class="ft">
                                  <!--  <p><i class="fa-pencil-square-o"></i> 20 กระทู้</p>-->
                                    <!--<p><a href="#" title="ถูกใจ กระทู้นี้"><i class="fa-heart"></i> 5 ถูกใจ</a></p>-->
                                </div>

                            </div>

                            <div class="vote-user _sf-col-xs-12">
                                   ชื่อผู้ตอบ : <b><?=$re_reply[name]?></b>  วันที่ตอบ :  <b><?=$re_reply[today]?></b>
                                </div>

                        </div>
                        <?php $count++; }
                        }else{
                        echo"<div class='comment'>ยังไม่มีผู้ตอบ</div>";
                        }?>
                    </div>
                    <!--
                    <div class="pagination">
                          <ul>
                            <li class="disabled"><a href="#">«</a></li>
                            <li class="active"><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#">5</a></li>
                            <li><a href="#">»</a></li>
                          </ul>
                        </div>
                      -->

                   <div id="comment-counter" class="post-counter">
                      <span class="title"><i class="fa-comments-o"></i>  แสดงความคิดเห็น</span>
                      <div class="line"></div>
                  </div>
          	<script type="text/javascript">
          	  function check(){
          	  var ff=document.form_reply;
          	  if(ff.message.value==''){
          	  alert('ป้อนรายละเอียดด้วย');
          	  ff.message.focus();
          	  return false;
          	  }else if(ff.name.value==''){
          	  alert('ป้อนชื่อด้วย');
          	  ff.name.focus();
          	  return false;
          	  }
          	  else if(ff.code.value==''){
          	  alert('ป้อนโค้ดที่มองเห็นด้วย');
          	  ff.code.focus();
          	  return false;
          	  }
          	  else{
          	  document.getElementById('Showdata').innerHTML="<img src='image/icon/loading_blue.gif' width='16' height='16' border='0'>";
          	  return true;
          	  }
          	  }

          	  function SentEr(){
          	  document.getElementById('Showdata').innerHTML="";
          	  return true;
          	  }

          	  function SentOK(id){
          	  document.getElementById('Showdata').innerHTML="";
          	  window.open("webboard-read.php?ID="+id,"_self");
          	  return true;
          	  }


          	  function RefreshCap(){
          	  document.getElementById('refresh_cap').src="captcha/captcha_img.php?"+Math.random();

          	  }
          	  </script>
                  <div class="post-box">
                  <!-- form -->
                <iframe name="Iframs" id="Iframs" src="" class="iframes"></iframe>
	    <form id="form_reply" name="form_reply" method="post" action="save-webboard-reply.php" target="Iframs" onSubmit="return check();">
                  <fieldset>
                  <legend class="hid">ตอบกระทู้</legend>
                  		<div class="row">
                            <div class="owner _sf-col-xs-12-sm-3 txt-r">
                                <label for="inputbox1">หัวข้อกระทู้</label>
                            </div>
                            <div class="post _sf-col-xs-12-sm-8">
                            	<h3><?=stripslashes($qr_post[title]);?></h3>
                                <!--<input type="text" class="txt-box _sf-col-xs-12" id="inputbox1" name="inputbox1" value="หัวข้อ: เหมารถรับจ้างรายเดือนไว้เป็นเวลา 3 เดือนค่ะ รบกวนปรึกษาหน่อยค่ะ" readonly>-->
                            </div>
                        </div>
                  		<div class="row">
                            <div class="owner _sf-col-xs-12-sm-3 txt-r">
                                <label for="cm-detail">รายละเอียด</label>
                            </div>
                            <div class="post _sf-col-xs-12-sm-8">
                                <div class="input-wrap">
                                    <textarea class="txt-area" id="message" name="message" placeholder="แสดงความคิดเห็นของคุณ"></textarea>
                                </div>
                            </div>
                        </div>

                        <?php
                          if($_SESSION['user_shop']!=""){
                          $user_shop=$_SESSION['user_shop'];
                          $id_member_post=$_SESSION['id_shop_member'];
                        ?>

                        <div class="row">
                            <div class="owner _sf-col-xs-12-sm-3 txt-r">
                                <label for="inputbox2">ชื่อผู้ตั้งกระทู้</label>
                            </div>
                            <div class="post _sf-col-xs-12-sm-8">
                                <input type="text" class="txt-box" id="name" name="name" value="<?=$user_shop?>">
                            </div>
                        </div>

                        <div class="row">
                            <div class="owner _sf-col-xs-12-sm-3 txt-r">
                                <label for="inputbox3">อีเมล์ติดต่อ</label>
                            </div>
                            <div class="post _sf-col-xs-12-sm-8">
                                <input type="text" class="txt-box" id="email" name="email" value="ไม่ระบุอีเมล์">
                            </div>
                        </div>
                    <? }else{?>

                        <div class="row">
                            <div class="owner _sf-col-xs-12-sm-3 txt-r">
                                <label for="inputbox2">ชื่อผู้ตั้งกระทู้</label>
                            </div>
                            <div class="post _sf-col-xs-12-sm-8">
                                <input type="text" class="txt-box" id="name" name="name" value="ไม่ระบุตัวตน">
                            </div>
                        </div>

                        <div class="row">
                            <div class="owner _sf-col-xs-12-sm-3 txt-r">
                                <label for="inputbox3">อีเมล์ติดต่อ</label>
                            </div>
                            <div class="post _sf-col-xs-12-sm-8">
                                <input type="text" class="txt-box" id="email" name="email">
                            </div>
                        </div>
            <? } ?>
                  		<div class="row">
        						<div class="row">
                      <div class="owner _sf-col-xs-12-sm-3 txt-r"></div>
        								<div class="post _sf-col-xs-12-sm-8">
        									<img id="refresh_cap" src="captcha/captcha_img.php"><a href="javascript:void(0);" onClick="javascript:RefreshCap();" title="ขอรหัสใหม่"> <img src="image/icon/action_refresh.gif" width="16" height="16" border="0" /></a>
        									</div>
        								</div>

                            <div class="owner _sf-col-xs-12-sm-3 txt-r">
                                <label for="inputbox1">รหัสลับ</label>
                            </div>
                            <div class="post _sf-col-xs-12-sm-8" style="margin-top:8px;">
                                    <input type="text" class="txt-box" maxlength="5" name="code" id="code">
                                    <p class="t-red">กรุณาป้อนรหัส ตามที่ท่านเห็นด้านบนให้ถูกต้อง</p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="owner _sf-col-xs-12-sm-3 txt-r" >
                                &nbsp;
                            </div>
                            <div class="post _sf-col-xs-12-sm-8">
                                <div class="ctrl-btn pt1">
                                  <?php   if($_SESSION['user_shop']!=""){?>
									<input class="ui-btn btn-post" type="submit" name="Submit" value="ตอบกระทู้" />
                    									<input type="hidden" name="id_webboard" value="<?=$qr_post[id_webboard]?>" />
                    									<input type="hidden" name="id_member" value="<?=$id_member_post?>" />
                    									<span id="Showdata"></span>
                                    <? }else{ echo "<font size=4 color=red>ต้องเข้าระบบก่อน ถึงจะตอบกระทู้ได้</font>"; }?>
                                </div>
                            </div>
                        </div>
                   </fieldset>
                   </form>
                   <!-- /form -->
                  </div>
                  </section>
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
