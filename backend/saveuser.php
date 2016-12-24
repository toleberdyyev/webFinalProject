<?php
$firstname = $_GET['fn'];
$surname = $_GET['sn'];
$username = $_GET['un'];
$password = $_GET['pw'];
include("bd.php");
$result = mysql_query("SELECT id FROM user WHERE username='$username'",$db);
$myrow = mysql_fetch_array($result);
if (!empty($myrow['id'])) {
exit ("FALSE:user taken");
}
$result2 = mysql_query ("INSERT INTO user (firstname,surname,username,password) VALUES('$firstname','$surname','$username','$password')");
if ($result2=='TRUE')
{
echo "TRUE";
}

else {
echo "FALSE";
     }
 ?>
