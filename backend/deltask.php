<?php
$id = $_GET['id'];
include("bd.php");
$result2 = mysql_query ("DELETE FROM orders WHERE id='$id';",$db);
if ($result2=='TRUE')
{
echo "TRUE";
}

else {
echo "FALSE";
     }
 ?>
