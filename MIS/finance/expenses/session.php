<?php
include("config.php");
session_set_cookie_params(0);
session_start();


$sql = "SELECT user_id,username, name,status,branch_id FROM user";
$result = $con->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    $userid=$row["user_id"];
    $username = $row["username"];
    $name = $row["name"];
    $username =$row["username"];
    $status=$row["status"];
    $branch_id=$row["branch_id"];
  }
} else {
    $userid="GHX1Y2";
    $username ="Jhon Doe";
    $useremail="mailid@domain.com";
    $userprofile="Uploads/default_profile.png";
}
?>