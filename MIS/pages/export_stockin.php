<?php session_set_cookie_params(0);
session_start();
if(empty($_SESSION['id'])):
header('Location:../index.php');
endif;
if(empty($_SESSION['branch'])):
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
    $query=mysqli_query($con,"select * from stockin natural join product natural join supplier where branch_id='$branch'")or die(mysqli_error());
 if(mysqli_num_rows($query) > 0)
 {
  $output .= '
  Products Stockin List
  <table class="table"> 
            <tr>
                <th>Product Name</th>
                <th>Quantity</th>
                <th>Amount</th>
                <th>Supplier</th>
                <th>Date Delivered</th>
                <th>Payment Mode</th>
                <th>Due Date</th>
                <th>Received By</th>
                      </tr>
  ';
  while($row = mysqli_fetch_array($query))
  {
   $output .= '
    <tr>  
        <td>'.$row["prod_name"].'</td>  
        <td>'.$row["qty"].'</td>  
        <td>'.$row["amount"].'</td>  
       <td>'.$row["supplier_name"].'</td>  
       <td>'.$row["date"].'</td>
       <td>'.$row["mode"].'</td>
       <td>'.$row["due"].'</td>
       <td>'.$row["receiver"].'</td>
                    </tr>
   ';
  }
  $output .= '</table>';
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=Stockin_report.xls');
  echo $output;
 }
}
?>