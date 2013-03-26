<?php

$mysqlhost="***"; 
$mysqluser="***"; 
$mysqlpwd="***"; 
$mysqldb="***"; 
$mysqlport="***";


$connection=@mysql_connect($mysqlhost.":".$mysqlport, $mysqluser, $mysqlpwd) or die ('fuck');
@mysql_select_db($mysqldb, $connection);
?>