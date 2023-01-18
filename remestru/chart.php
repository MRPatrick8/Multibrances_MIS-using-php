<?php
include'connection.php';
$sqlQuery = "SELECT `Number`,`Customer`,`Package` FROM `account` WHERE `Track`='1' ORDER BY `Number` ASC";

$result = mysqli_query($conn, $sqlQuery);

$data = array();
foreach ($result as $row) {
	$data[] = $row;
}

echo json_encode($data);
?>