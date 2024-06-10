<?php
# Access session.
session_start() ;
?>

<?php
include('nav.php');
?>

  <!-- Main content -->
   <div class="container text-center loginImage" style="padding: 20px;">
      <div class="row">
        <div class="col-md-8" style="padding-top: 10px;padding-bottom: 20px;">
          <i style="font-size: small;">This is a fictional website and is used for educational illustration purposes only.</i>
        </div>
        <?php if (!$isLoggedIn): ?>
        <div class="col-md-4 border signInBox">
          <h4 style="font-family: Verdana,serif;padding-top: 10px;">Welcome!</h4><hr>
          <form action="login_action.php" method="post">
            <div class="form-group">
                <label for="inputemail" class="form-label">Email</label>
                <input type="text" 
                name="email" 
                class="form-control" 
                required 
                placeholder="Enter your email."> 
            </div></p>
            <div class="form-label">
            <label>Password</label>
                <input type="password" 
                name="pass"  
                class="form-control" 
                required 
                placeholder="Enter your password.">
            </div></p> 
          <div class="form-group">
            <input type="checkbox" id="rememberMeCheckbox">
            <label for="rememberMeCheckbox">Remember me</label></p>
            <input type="submit" value="Login" id="signInBtn"></p>
          </div></p>
          </form>
        </div>
        <?php endif; ?>
      </div>
   </div>

<?php
include('footer.php');
?>