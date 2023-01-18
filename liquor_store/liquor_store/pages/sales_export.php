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
  $query=mysqli_query($con,"select * from sales natural join sales_details natural join product natural join customer where branch_id='$branch'")or die(mysqli_error($con));
  $qty=0;$grand=0;$discount=0;
 if(mysqli_num_rows($query) > 0)
 {
  $output .= '
  Sales List
  <table class="table"> 
    <tr>
      <th>Customer Names</th>
      <th>Product</th>
      <th>Product Code</th>
      <th>Qty</th>
      <th>Price</th>
      <th>Discount</th>
      <th>Amount Paid</th>
      <th>Mode of Payment</th>
      <th>Transaction date</th>
    </tr>
  ';
  while($row = mysqli_fetch_array($query))
  {
    $total=$row['qty']*$row['price'];
    $grand=$grand+$total;
    $discount=$discount+$row['discount'];
   $output .= '
    <tr>  
        <td>'.$row["names"].'</td>  
        <td>'.$row["prod_name"].'</td>  
        <td>'.$row["serial"].'</td>    
        <td>'.$row["qty"].'</td>  
        <td>'.$row["price"].'</td>
        <td>'.$row["discount"].'</td>
        <td>'.number_format($row['cash_tendered'],2).'</td>
        <td>'.$row["mode"].'</td>
        <td>'.$row["date_added"].'</td>
     </tr>
   ';
  }
  $output .= '
  <table class="table"> 
  <tr></tr>
  <tr></tr>
    <tr>
       <b><th colspan="5">Total</th>
       <td>'.number_format($grand,2).'</td></b>
    </tr>
    <tr>
       <b><th colspan="5">Less: Total Discount</th>
       <td>'.number_format($discount,2).'</td></b>
    </tr>
    <tr>
      <b> <th colspan="5">Total Cash Sales</th>
       <td>'.number_format(($grand-$discount),2).'</td></b>
    </tr>

  ';
  $output .= '</table>';
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=Sales_List.xls');
  echo $output;
 }
}
?>
