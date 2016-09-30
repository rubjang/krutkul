<?php
/* server */

$ServerName="localhost";
$UserServer="krutkul_db";
$PassServer="go9io4kgo9ifuphiphat";
$DataBase="krutkul_user";

/* localhost */
/*
$ServerName="localhost";
$UserServer="root";
$PassServer="go9io4kgo9ifu";
$DataBase="krutkul";
*/

@$conn=mysql_connect($ServerName,$UserServer,$PassServer) or die("No Connect");
@mysql_select_db($DataBase,$conn) or die("No Select DB");
mysql_query("SET NAMES UTF8");
?>
