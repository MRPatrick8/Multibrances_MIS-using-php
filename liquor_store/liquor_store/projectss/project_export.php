<?php session_set_cookie_params(0);
session_start();
if(empty($_SESSION['id'])):
header('Location:../index.php');
endif;
?>
<?php  
//export.php  
include('connection.php');
$output = '';
if(isset($_POST["export"]))
{
 $branch=$_SESSION['branch'];
  $query = "SELECT * FROM project where branch_id='$branch'";
  $result = mysqli_query($db, $query) or die (mysqli_error($db));
 if(mysqli_num_rows($result) > 0)
 {
  $output .= '
  Projects List
  <table class="table"> 
    <tr>
        <th>Project Name</th>
        <th>Client Name</th>
        <th>Contact</th>
        <th>Address</th>
        <th>Amount Paid</th>
        <th>Amount Due</th>
        <th>Assigned to</th>
        <th>Status</th>
        <th>Due Date</th>
      </tr>
  ';
  while($row = mysqli_fetch_array($result))
  {
   $output .= '
    <tr>  
        <td>'.$row["project_name"].'</td>  
        <td>'.$row["client_name"].'</td>    
         <td>'.$row["contact"].'</td>  
         <td>'.$row["address"].'</td>
         <td>'.number_format($row["amount_paid"],2).'</td>
         <td>'.number_format($row["amount_due"],2).'</td>
         <td>'.$row["assign"].'</td>
         <td>'.$row["status"].'</td>
         <td>'.$row["due_date"].'</td>
                    </tr>
   ';
  }
  $output .= '</table>';
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=Projects_report.xls');
  echo $output;
 }
}
?>