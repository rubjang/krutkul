<?
include('../conf/connect.php');
$i=0;
$result2=mysql_query("Select * From subcategory Where id_category='$_POST[id_category]'");
$num=mysql_num_rows($result2);
	$i=0;
	while($row2=mysql_fetch_array($result2)){
		if($i==0){
			echo $row2[id_subcategory]."|".stripslashes($row2[subcategory]) ;
		}else{
			echo "|".$row2[id_subcategory]."|".stripslashes($row2[subcategory]) ;
		}
		$i++;
	}
?>
