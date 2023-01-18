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
  $query=mysqli_query($con,"select * from product natural join supplier natural join category where branch_id='$branch' order by prod_name")or die(mysqli_error());
 if(mysqli_num_rows($query) > 0)
 {
  $output .= '
  Products List
  <table class="table"> 
            <tr>
                <th>Product Code</th>
                <th>Product Name</th>
                <th>Description</th>
                <th>Supplier</th>
                <th>Qty</th>
                <th>Price</th>
                <th>Category</th>
              </tr>
  ';
  while($row = mysqli_fetch_array($query))
  {
   $output .= '
    <tr>  
        <td>'.$row["serial"].'</td>  
        <td>'.$row["prod_name"].'</td>    
         <td>'.$row["prod_desc"].'</td>  
         <td>'.$row["supplier_name"].'</td>
         <td>'.$row["prod_qty"].'</td>
         <td>'.number_format($row["prod_price"],2).'</td>
         <td>'.$row["cat_name"].'</td>
                    </tr>
   ';
  }
  $output .= '</table>';
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=Products_report.xls');
  echo $output;
 }
}
?>