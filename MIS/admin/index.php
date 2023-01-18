<?php include 'header_login.php';?>

  <body class="login">
    <div>
    

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form method = "POST" action = "login.php">
              <center><img src=""></center>
              <h1>T-KAY Admin Login</h1>
              <div>
                <input type="text" name = "username" class="form-control" placeholder="Username" required="true" />
              </div>
              <div>
                <input type="password" name = "password" class="form-control" placeholder="Password" required="true" />
              </div>
              <div>
                <button  class="btn btn-block btn-warning" name = "login"> Log in</button>
              
              </div>
              <div class="dropdown col-xs-6 pull-right">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <select onchange="if (this.value) window.location.href=this.value">
                  <option value="#">Admin</option>
                  <option value="../">User</option>
                  <option value="../finance/">Finance</option>
                  <option value="../ceo/">CEO</option>
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
