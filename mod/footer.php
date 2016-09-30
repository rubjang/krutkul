<table width="980" border="0" cellpadding="0" cellspacing="0">
  <tr class="link13">
    <td align="center" valign="middle">
	
<div style="margin:10px 0px 0px 0px;">
<table width="980" border="0" cellpadding="0" cellspacing="1">
  <tr class="link13">
    <td align="center" valign="top"><?=$footer?></td>
  </tr>
</table>
</div>
<?
$qr_stiti=mysql_fetch_array(mysql_query("select * from tb_stitiweb"));
if($qr_stiti[code]){
?>
<div style="margin:10px 0px 0px 0px;">
<table width="980" border="0" cellpadding="0" cellspacing="1">
  <tr class="link13">
    <td align="center" valign="middle"><?=$qr_stiti[code]?></td>
  </tr>
</table>
</div>
<?
}
?>
	
	</td>
  </tr>
</table>