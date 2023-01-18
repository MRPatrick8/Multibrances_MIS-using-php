
<?php
    session_set_cookie_params(0); 
    session_start();
       include('connection.php');
       //include('header.php');
       
        ?>   
<body>

    <div id="wrapper">

        <div id="page-wrapper">

            <div class="container-fluid">


             <div class="col-lg-12">
                <?php
                        $branch=$_SESSION['branch'];
						$pname = $_POST['project_name'];
                        $cname = $_POST['client_name'];
                        $contact = $_POST['contact'];
                        $address = $_POST['address'];
                        $amt_paid = $_POST['amount_paid'];
                        $amt_due = $_POST['amount_due'];
                        $assign = $_POST['assign'];
                        $status = $_POST['status'];
                        $due_date = $_POST['due_date'];
				
					switch($_GET['action']){
						case 'add':			
								$query = "INSERT INTO project
								(project_id,project_name, client_name, contact, address,amount_paid,amount_due,assign, status,due_date,branch_id)
								VALUES ('Null','".$pname."','".$cname."','".$contact."','".$address."','".$amt_paid."','".$amt_due."','".$assign."','".$status."','".$due_date."','".$branch."')";
								mysqli_query($db,$query)or die ('Error in updating Database');
                                $id=$_SESSION['id'];
                                $remarks="added a new project pname";  
                                
                                    mysqli_query($con,"INSERT INTO history_log(user_id,action,date) VALUES('$id','$remarks','$date')")or die(mysqli_error($con));
							
						break;
									
						}
				?>
    	<script type="text/javascript">
			alert("Successfully added.");
			window.location = "manage_projects.php";
		</script>
                    </div>
                </div>
                
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="js/plugins/morris/raphael.min.js"></script>
    <script src="js/plugins/morris/morris.min.js"></script>
    <script src="js/plugins/morris/morris-data.js"></script>

</body>

</html>

