<?php
$ti = $_GET['t'];
$de = $_GET['d'];
$ta = $_GET['ta'];
$dat = $_GET['da'];
$prc = $_GET['pr'];
$id = $_GET['id'];
include("bd.php");
$result2 = mysql_query ("INSERT INTO orders (author_id,title,descrp,tags,deadline,price) VALUES('$id','$ti','$de','$ta','$dat','$prc')");
if ($result2=='TRUE')
{
echo "TRUE:succes";
}

else {
echo "FALSE:error";
     }
 ?>
