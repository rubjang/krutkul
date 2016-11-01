<?php
$ServerName="localhost";
$UserServer="root";
$PassServer="";
$DataBase="";
// database



@$conn=mysql_connect($ServerName,$UserServer,$PassServer) or die("No Connect");
@mysql_select_db($DataBase,$conn) or die("No Select DB");
mysql_query("SET NAMES UTF8");
?>
