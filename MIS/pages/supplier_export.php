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
  $query=mysqli_query($con,"select * from supplier where branch_id='$branch' order by supplier_date desc")or die(mysqli_error($con));
 if(mysqli_num_rows($query) > 0)
 {
  $output .= '
  Suppliers List
  <table class="table"> 
    <tr>
        <th>TIN No.</th>
        <th>Supplier Name</th>
        <th>Company Name</th>
        <th>Email </th>
        <th>Address</th>
        <th>Contact </th>
        <th width="40%">Date</th>
      </tr>
  ';
  while($row = mysqli_fetch_array($query))
  {
   $output .= '
    <tr>  
        <td>'.$row["tin"].'</td>  
        <td>'.$row["supplier_name"].'</td>  
        <td>'.$row["supplier_company"].'</td>    
         <td>'.$row["supplier_email"].'</td>  
         <td>'.$row["supplier_address"].'</td>
         <td>'.$row["supplier_contact"].'</td>
         <td>'.$row["supplier_date"].'</td>
                    </tr>
   ';
  }
  $output .= '</table>';
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=Suppliers_List.xls');
  echo $output;
 }
}
?>