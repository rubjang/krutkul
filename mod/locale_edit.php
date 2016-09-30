<?
header('Content-type: text/html; charset=utf-8');
$data=$_GET['data'];
$val=$_GET['val'];
include('../conf/connect.php');
mysql_connect($ServerName,$UserServer,$PassServer) or die("No Connect");
//mysql_pconnect($host,$username,$password) or die ("Unable to connect to MySQL server");  
     
     if ($data=='province') { 
          echo "<select name='province' onChange=\"dochange('amper', this.value)\">\n";
          echo "<option value='0'>Province</option>\n";
		   $result=mysql_query("select loc_code,loc_abbr from location where loc_name = location_name and loc_code != '000000' and flag_disaster is null order by loc_abbr");
          while(list($id1, $name)=mysql_fetch_array($result)){
		   $select = ($val==$id1)?'selected':''; 
               echo "<option value=\"$id1\" $select>$name</option> \n" ;
          }
     } else if ($data=='amper') {
          echo "<select name='amper' onChange=\"dochange('tumbon', this.value)\">\n";
          echo "<option value='0'>Amper</option>\n";
          $val2=$val;
          $val = substr($val,0,2);       
		  $result=mysql_query("SELECT loc_code, loc_abbr FROM location WHERE loc_code != '000000' and loc_code != '$val' AND loc_code LIKE '$val%'  AND flag_disaster IS NULL ORDER BY loc_code, loc_abbr");
          while(list($id, $name)=mysql_fetch_array($result)){    
			    $select = ($val2==$id)?'selected':'';    
            echo "<option value=\"$id\" $select>$name</option> \n" ;
          }
     } else if ($data=='tumbon') {
          echo "<select  name='tumbon' >\n";
          echo "<option value='0'>Tumbon</option>\n";
          $val2=$val;
          $val = substr($val,0,4);
       		  $result=mysql_query("SELECT  loc_code, loc_abbr, loc_name, location_name FROM location WHERE loc_code != '000000' and loc_code != '$val' AND loc_code LIKE '$val%' AND flag_disaster IS NULL ORDER BY loc_code, loc_abbr");
		  
          while(list($id3, $name)=mysql_fetch_array($result)){
		   $select = ($val2==$id3)?'selected':'';    
               echo "<option value=\"$id3\" $select>$name</option> \n" ;
          }
     }
     echo "</select>\n";  
?>