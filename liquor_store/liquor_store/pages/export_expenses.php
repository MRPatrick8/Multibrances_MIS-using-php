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
  $query=mysqli_query($con,"select * from expenses  where branch_id='$branch' order by expe_date")or die(mysqli_error());
 if(mysqli_num_rows($query) > 0)
 {
  $output .= '
  Products List
  <table class="table"> 
            <tr>
                <th>Date</th>
                <th>Expense Category</th>
                <th>Expense Desc</th>
                <th>Amount</th>
                <th>Payment Mode</th>
                <th>Received By</th>
                <th>Processed By</th>
              </tr>
  ';
  while($row = mysqli_fetch_array($query))
  {
   $output .= '
    <tr>  
        <td>'.$row["expe_date"].'</td>  
        <td>'.$row["expense_cat"].'</td>    
         <td>'.$row["expense_desc"].'</td>  
         <td>'.number_format($row["amount"],2).'</td>
         <td>'.$row["mode"].'</td>
         <td>'.$row["request"].'</td>
         <td>'.$row["receiver"].'</td>
                    </tr>
   ';
  }
  $output .= '</table>';
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=Expenses_report.xls');
  echo $output;
 }
}
?>