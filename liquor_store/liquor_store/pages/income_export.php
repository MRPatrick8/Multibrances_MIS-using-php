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
  $query=mysqli_query($con,"select * from payment natural join customer where  branch_id='$branch'")or die(mysqli_error($con));
 if(mysqli_num_rows($query) > 0)
 {
  $output .= '
  Receivables Report List
  <table class="table"> 
    <tr>
      <th>Customer First Name</th>
      <th>Customer Last Name</th>
      <th>Payment Amount</th>
    </tr>
  ';
  while($row = mysqli_fetch_array($query))
  {
    $pay = 0;
    $pay=$pay+$row['payment'];
   $output .= '
    <tr>  
        <td>'.$row["cust_first"].'</td>  
        <td>'.$row["cust_last"].'</td>  
        <td>'.number_format($row["payment"],2).'</td>     
     </tr>
   ';
  }
  $output .= '</table>';
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=Receivables_List.xls');
  echo $output;
 }
}
?>
