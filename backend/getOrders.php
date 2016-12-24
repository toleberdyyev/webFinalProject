<?php
header("Content-Type: application/json;charset=utf-8");
header('Content-type: text/javascript');
header('Content-Type: application/json');
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "klever";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$data = array();
$sql1 = "SELECT * FROM orders";
$sql2 = "SELECT * FROM user";
$result1 = $conn->query($sql1);
$result2 = $conn->query($sql2);
include 'bd.php';

// ORDERS
$orders_list =array();
if ($result1->num_rows > 0) {
    while($row = $result1->fetch_assoc()) {
      $tags = array();
      $t =  explode(",",$row['tags']);
      for($i=0;$i<sizeof($t);$i++){
        $tags[$i]=$t[$i];
      }
      $orders_list[] = array('id' => $row['id'],'author_id'=>$row['author_id'],"freelancer_id"=>$row['freelancer_id'],'title'=>$row['title'],'descrp'=>$row['descrp'],'tags'=>$tags,'deadline'=>$row['deadline'],'price'=>$row['price']);
    }
    // echo json_encode($data);
} else {
    echo "0 results";
}

// USERS
$users_list = array();
if ($result2->num_rows > 0) {
  $user =  array();
    while($row = $result2->fetch_assoc()) {
      // $users[] = array('id' => $row['id'],'firstname'=>$row['firstname'],'surname'=>$row['surname'],'username'=>$row['username'],'password'=>$row['password']);
      $users_list[] =  array('id' => $row['id'],'firstname'=>$row['firstname'],'surname'=>$row['surname'],'username'=>$row['username'],'password'=>$row['password']) ;
    }
} else {
    echo "0 results";
}

$data[] = array('users' => $users_list );
$data[] = array('orders'=> $orders_list);
// echo "string";
echo json_encode($data);

$conn->close();
?>
