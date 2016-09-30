<table width="950" height="100" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="204" align="center" valign="middle">
	<?
	//logo
	$qr_logo=mysql_query("select * from logo_web where status_logo='1'");
	$re_logo=mysql_fetch_array($qr_logo);
	if($re_logo[image]!=""){
	$im_logo="../images2/logo/{$re_logo[image]}";
	if(is_array(@file($im_logo))){
	$type=@getimagesize($im_logo);
	if($type[2]==1){
	?>
	<img src="../images2/logo/<?=$re_logo[image]?>" border="0" width="200" height="100">
	<?
	}elseif($type[2]==2){
	?>
	<img src="../images2/logo/<?=$re_logo[image]?>" border="0" width="200" height="100">
	<?
	}else{
	?>
	<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="200" height="100">
      <param name="movie" value="../images2/logo/<?=$re_logo[image]?>" />
      <param name="quality" value="high" />
      <embed src="../images2/logo/<?=$re_logo[image]?>" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="200" height="100"></embed>
	  </object>
	<?
	}
	
	} //is_array
	else{
	//ไม่พบรูปภาพ
	?>
	<img src="../images2/logo/noimage.gif" width="200" height="100" id="border-image">
	<?
	}
	
	}else{
	?>
	<img src="../images2/logo/noimage.gif" width="200" height="100" id="border-image">
	<?
	}
	?>
	</td>
    <td width="730" align="center" valign="middle">
	<?
	//banner top
	$time_top=date("Y-m-d H:i:s");
	$qr_top=mysql_query("select * from banner_top Order by id_top Limit 0,1");
	$re_top=mysql_fetch_array($qr_top);
	if($re_top[image]!=""){
	if($re_top[endbanner]>=$time_top){
	$im_top="../images2/banner-top/{$re_top[image]}";
	if(is_array(@file($im_top))){
	$type=@getimagesize($im_top);
	if($type[2]==1){
	?>
	<a href="<?=$re_top[url]?>" title="<?=$re_top[message ]?>" target="_black"><img src="../images2/banner-top/<?=$re_top[image]?>" border="0" width="730" height="100"></a>
	<?
	}elseif($type[2]==2){
	?>
	<a href="<?=$re_top[url]?>" title="<?=$re_top[message ]?>" target="_black"><img src="../images2/banner-top/<?=$re_top[image]?>" border="0" width="730" height="100"></a>
	<?
	}else{
	?>
	<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="730" height="100">
      <param name="movie" value="../images2/banner-top/<?=$re_logo[image]?>" />
      <param name="quality" value="high" />
      <embed src="../images2/banner-top/<?=$re_logo[image]?>" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="730" height="100"></embed>
	  </object>
	<?
	}
	
	} //is_array
	else{
	//ไม่พบรูปภาพ
	?>
	<img src="../images2/banner-top/noimage.gif" width="730" height="100" id="border-image">
	<?
	}
	
	} //กรณีหมดเวลา
	else{
	?>
	<img src="../images2/banner-top/noimage.gif" width="730" height="100" id="border-image">
	<?
	}
	
	}else{
	?>
	<img src="../images2/banner-top/noimage.gif" width="730" height="100" id="border-image">
	<?
	}
	?>
	</td>
  </tr>
</table>