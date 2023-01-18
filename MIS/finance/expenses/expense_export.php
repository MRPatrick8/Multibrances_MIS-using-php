<?php 
include("session.php");
?>
<?php  
//export.php  
$output = '';
if(isset($_POST["export"]))
{
 $exp_fetched = mysqli_query($con, "SELECT * FROM expenses WHERE user_id = '$userid'");
 if(mysqli_num_rows($exp_fetched) > 0)
 {
  $output .= '
  Expenses List
  <table class="table"> 
    <tr>
      <th>Date</th>
      <th>Amount</th>
      <th>Purpose</th>
      <th>Department</th>
      <th>Requested by</th>
      <th>Mode of Payment</th>
    </tr>
  ';
  while($row = mysqli_fetch_array($exp_fetched))
  {
   $output .= '
    <tr>  
        <td>'.$row["expensedate"].'</td>      
         <td>'.number_format($row["expense"],2).'</td>  
         <td>'.$row["expensecategory"].'</td>
         <td>'.$row["expensesource"].'</td>
         <td>'.$row["request"].'</td>
         <td>'.$row["mode"].'</td>
                    </tr>
   ';
  }
  $output .= '</table>';
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=Expense_report.xls');
  echo $output;
 }
}
?>