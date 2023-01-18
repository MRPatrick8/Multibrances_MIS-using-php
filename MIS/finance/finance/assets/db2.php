<?php 
    $con = mysqli_connect("localhost","root","","tkayinve_mis");
    define('bankName', 'T-KAY Investment Finance',true);
    $ar = mysqli_query($con,"select * from useraccounts,brnch where useraccounts.branch = brnch.branchId");
    $userData = mysqli_fetch_assoc($ar);
?>
<script type="text/javascript">
	$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
</script>