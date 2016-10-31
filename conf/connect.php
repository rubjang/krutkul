<?php
$ServerName="localhost";
$UserServer="root";
$PassServer="1q2w3e4r";
$DataBase="krutkul_db";

@$conn=mysql_connect($ServerName,$UserServer,$PassServer) or die("No Connect");
@mysql_select_db($DataBase,$conn) or die("No Select DB");
mysql_query("SET NAMES UTF8");
?>
