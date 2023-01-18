<?php session_set_cookie_params(0);
session_start();
if(empty($_SESSION['id'])):
header('Location:../index.php');
endif;
?>
<?php  
//export.php  
include('../dist/includes/dbcon.php');
$output = '';
if(isset($_POST["export"]))
{
 $branch=$_SESSION['branch'];
  $query=mysqli_query($con,"select * from product natural join supplier where branch_id='$branch' order by prod_name")or die(mysqli_error());
 if(mysqli_num_rows($query) > 0)
 {
  $output .= '
  Inventory List
  <table class="table"> 
    <tr>
      <th>Product Code</th> 
      <th>Product Name</th>
      <th>Supplier</th>                        
      <th>Qty Left</th>

      <th>Price</th>
      <th>Total</th>
    </tr>
  ';
  while($row = mysqli_fetch_array($query))
  {
    $grand=0;
    $total=$row['prod_price']*$row['prod_qty'];
      $grand+=$total;
   $output .= '
    <tr>  
        <td>'.$row["serial"].'</td>  
        <td>'.$row["prod_name"].'</td>  
        <td>'.$row["supplier_name"].'</td>    
        <td>'.$row["prod_qty"].'</td>  
        <td>'.$row["prod_price"].'</td>
        <td>'.number_format($total,2).'</td>
     </tr>
   ';
  }
  $output .= '
  Inventory List
  <table class="table"> 
  <tr></tr>
  <tr></tr>
    <tr>
       <th colspan="5">Total</th>
       <td>'.number_format($grand,2).'</td>
    </tr>
  ';
  $output .= '</table>';
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=Inventory_List.xls');
  echo $output;
 }
}
?>