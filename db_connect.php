<?php

$mysqlhost="localhost"; 
$mysqluser="twitter"; 
$mysqlpwd="twitter"; 
$mysqldb="tweets"; 
$mysqlport="8889";


$connection=@mysql_connect($mysqlhost.":".$mysqlport, $mysqluser, $mysqlpwd) or die ('fuck');
@mysql_select_db($mysqldb, $connection);
?>