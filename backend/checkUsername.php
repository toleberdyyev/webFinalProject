<?php
if(isset($_GET['username'])){
  $username = $_GET['username'];
  $password = $_GET['password'];
  if(!empty($username)){
    include ("bd.php");
    $result = mysql_query("SELECT * FROM user WHERE username='$username'",$db) or die(mysql_error());
    $myrow = mysql_fetch_array($result);
    if (empty($myrow['password'])){
    exit ("FALSE:this is user unregistr");
    }
    else {
        if ($myrow['password']==$password) {
        echo "TRUE:".$myrow['firstname'].":".$myrow['surname'].":".$myrow['username'].":".$myrow['id'];
        }

     else {
     echo "FALSE: password inccorect";
   }
 }
  }
}
 ?>
