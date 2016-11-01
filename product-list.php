<?php
include('config/connect.php');
$strSQL = "SELECT * FROM shop_product ";



$objQuery = mysql_query($strSQL) or die ("Error Query");
$Num_Rows = mysql_num_rows($objQuery);

var_dump($Num_Rows);
die();

$Per_Page = $limit_product;   // Per Page

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

$strSQL .=" order by id_product desc LIMIT $Page_Start , $Per_Page";
$objQuery  = mysql_query($strSQL);
?>
<?php
  while($row = mysql_fetch_array($objQuery)){
  ?>
  <li>
      <a target="_blank" href="product-read.php?ID=<?php echo $row[id_product]; ?>">
         <img alt="ขนสินค้าขนาดใหญ๋" src="img/product/img1/<?php echo $row[image1]; ?>" width="280">
         <h3><?php echo $row[title]; ?></h3>
       </a>
  </li>
  <? } ?>
