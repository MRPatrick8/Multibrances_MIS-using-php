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
  $query=mysqli_query($con,"select * from tenders where branch_id='$branch' order by company")or die(mysqli_error());
 if(mysqli_num_rows($query) > 0)
 {
  $output .= '
  Tenders List
  <table class="table"> 
    <tr>
        <th>Date</th>
        <th>Company</th>
        <th>Tender Requirements</th>
        <th>Submission Deadline</th>
        <th>Tender Ref</th>
        <th>Other Requirements</th>
        <th>Tender Fees</th>
        <th>Comment</th>
      </tr>
  ';
  while($row = mysqli_fetch_array($query))
  {
   $output .= '
    <tr>  
        <td>'.$row["date"].'</td>  
        <td>'.$row["company"].'</td>    
         <td>'.$row["requirements"].'</td>  
         <td>'.$row["deadline"].'</td>
         <td>'.$row["reference"].'</td>
         <td>'.$row["other"].'</td>
         <td>'.number_format($row["fees"],2).'</td>
         <td>'.$row["comment"].'</td>
                    </tr>
   ';
  }
  $output .= '</table>';
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=Tenders_report.xls');
  echo $output;
 }
}
?>