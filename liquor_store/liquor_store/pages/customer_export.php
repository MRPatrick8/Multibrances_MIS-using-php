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
  $query=mysqli_query($con,"select * from customer where branch_id='$branch'")or die(mysqli_error());
 if(mysqli_num_rows($query) > 0)
 {
  $output .= '
  Customers List
  <table class="table"> 
    <tr>
      <th>Names</th>
      <th>Email</th>
      <th>TIN No</th>
      <th>Address</th>
      <th>Contact </th>
      <th>Orders Count</th>
    </tr>
  ';
  while($row = mysqli_fetch_array($query))
  {
   $output .= '
    <tr>   
        <td>'.$row["names"].'</td>  
        <td>'.$row["email"].'</td>    
        <td>'.$row["tin"].'</td>  
        <td>'.$row["cust_address"].'</td>
        <td>'.$row["cust_contact"].'</td>
        <td>'.$row["count"].'</td>
                    </tr>
   ';
  }
  $output .= '</table>';
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=Customers_List.xls');
  echo $output;
 }
}
?>