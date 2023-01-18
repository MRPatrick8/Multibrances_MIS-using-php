<?php include 'header_login.php';?>

  <body class="login"  style="background-color: #9c487a;">
    <div>
    

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form method = "POST" action = "login.php">
              <center><img  src="images/footer.png"></center>
              <h1>Rwangabwoba Management Login</h1>
              <div>
                <input type="text" name = "username" class="form-control" placeholder="Username" required="true" />
              </div>
              <div>
                <input type="password" name = "password" class="form-control" placeholder="Password" required="true" />
              </div>
              <div class="dropdown col-xs-6 pull-left">
                <button  class="btn btn-block btn-warning" name = "login"> Log in</button>
              
              </div>
              <div class="dropdown col-xs-6 pull-right">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <select onchange="if (this.value) window.location.href=this.value">
                  <option value="#">Management</option>
                  <option value="../">User</option>

              </select>

             </div>

              <div class="clearfix"></div>

              <div class="separator">
               

                <div class="clearfix"></div>
                <br />

              </div>
            </form>
        <div  style="text-align:center">
          <strong>Copyright &copy; 2021 <a href="">T-KAY IT</a>.</strong> All rights reserved.
        
        </div>
          </section>
        </div>

    
      </div>
    </div>

  </body>
</html>
