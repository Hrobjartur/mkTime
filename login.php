<?php
include('nav.php');
# Display any error messages if present.
if ( isset( $errors ) && !empty( $errors ) )
{
 echo '<div class="container text-center bg-warning-subtle" style="padding-top: 10px; border-radius:10px 10px 0 0;">
        <div class="row">
          <div class="col-md-8"">
      <p id="err_msg">Oops! There was a problem.<br>' ;
 foreach ( $errors as $msg ) { echo "$msg<br>" ; }
 echo 'Please try again or <a href="register.php">register here</a>.</p>
          </div>
        </div>
       </div>' ;
}
?>

<!-- Main content -->
    <div class="container text-center loginImage" style="padding: 20px;">
      <div class="row">
        <div class="col-md-8" style="padding-top: 10px;padding-bottom: 20px;color: rgb(255, 255, 255);">
          <h4 class="cyH4">MK Time</h4>
          Lorem ipsum dolor sit amet consectetur adipisicing elit.<br>Quos sit totam doloremque. Eos fugiat fugit recusandae ut repellat distinctio iure!<br>
          <i style="font-size: small;color: azure;">This is a fictional website and is used for educational illustration purposes only.</i>
        </div>
        <div class="col-md-4 border signInBox">
          <h4 style="font-family: Verdana,serif;padding-top: 10px;">Welcome back!</h4><hr>
          <img src="img/mktimelogo.png" style="height: 150px; width: 150px;" alt="MKTime Logo">
          <form action="login_action.php" method="post">
          <div class="form-group"><p>
              <label for="inputemail" class="form-label">Email</label>
              <input type="text" 
              name="email" 
              class="form-control cyEmail" 
              required 
              placeholder="Enter your email."> </p>
          </div>
          <div class="form-label">
			        <label>Password</label>
              <input type="password" 
              name="pass"  
              class="form-control cyPass" 
              required 
              placeholder="Enter your password.">
          </div>
              <p></p>
              <p><div class="form-group">
            <input type="checkbox" id="rememberMeCheckbox">
              <p><label for="rememberMeCheckbox">Remember me</label></p>
              <p><input type="submit" value="Login" class="btn cyLogin" id="signInBtn">
              <a href="index.php" class="btn" id="cancelBtn">Cancel</a></p>
            <a href="#" style="color:white;"><i>Forgot your password?</i></a>.
          </div></p>
          </form>
          <div class="container" style="background-color: white;color: black;padding-top: 10px;padding-bottom: 10px;">
            Don't have an account? Register <b><a href="register.php" style="color:rgb(75, 124, 108);">here</a></b>.
          </div>
        </div>
      </div>
    </div>

<?php
include('footer.php');
?>