<?php
session_start();
include'connection.php';
$custo = $_GET['term'];

$select =mysqli_query($conn, "SELECT `Customer` FROM `account` WHERE (`nom` LIKE '%$custo%' OR `postnom` LIKE '%$custo%' OR `prenom` LIKE '%$custo%' OR `Code` LIKE '%$custo%' OR `plaque` LIKE '%$custo%' OR `idno` LIKE '%$custo%' OR `permis` LIKE '%$custo%') AND `Status`='0' ORDER BY `Customer` ASC LIMIT 20");
while ($row=mysqli_fetch_array($select)) 
{
 $data[] = $row['Customer'];
}
//return json data
echo json_encode($data);
?>