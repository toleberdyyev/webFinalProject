<?php
$user_id = $_GET['user_id'];
$task_id = $_GET['task_id'];
include("bd.php");
$result2 = mysql_query("UPDATE orders SET freelancer_id = '$user_id' WHERE id = '$task_id';",$db);
if ($result2=='TRUE')
{
echo "TRUE";
}

else {
echo "FALSE";
     }
 ?>
