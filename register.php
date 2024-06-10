<?php
include('nav.php');

if ( $_SERVER[ 'REQUEST_METHOD' ] == 'POST' )
{
# Connect to the database.
require ('connect_db.php');

 # Initialize an error array.
 $errors = array();

 # Check for a first name.
 if ( empty( $_POST[ 'first_name' ] ) )
 { $errors[] = 'Enter your first name.' ; }
 else
 { $fn = mysqli_real_escape_string( $link, trim( $_POST[ 'first_name' ] ) ) ; }

  # Check for a last name.
  if ( empty( $_POST[ 'last_name' ] ) )
  { $errors[] = 'Enter your last name.' ; }
  else
  { $ln = mysqli_real_escape_string( $link, trim( $_POST[ 'last_name' ] ) ) ; }

  # Check for email.
  if ( empty( $_POST[ 'email' ] ) )
  { $errors[] = 'Enter your email address.' ; }
  else
  { $e = mysqli_real_escape_string( $link, trim( $_POST[ 'email' ] ) ) ; }

 # Check for a password and matching input passwords.
 if ( !empty($_POST[ 'pass1' ] ) )
 {
   if ( $_POST[ 'pass1' ] != $_POST[ 'pass2' ] )
   { $errors[] = 'Passwords do not match.' ; }
   else
   { $p = mysqli_real_escape_string( $link, trim( $_POST[ 'pass1' ] ) ) ; }
 }
 else { $errors[] = 'Enter your password.' ; }

  # Check if email address already registered.
  if ( empty( $errors ) )
  {
    $q = "SELECT user_ID FROM users WHERE email='$e'" ;
    $r = @mysqli_query ( $link, $q ) ;
    if ( mysqli_num_rows( $r ) != 0 ) 
$errors[] = 
'Email address already registered. 
<a class="alert-link" href="login.php">Sign In Now</a>' ;
  }

# On success register user inserting into 'users' database table.
if ( empty( $errors ) ) 
{
  $q = "INSERT INTO users (first_name, last_name, email, pass, reg_date) 
VALUES ('$fn', '$ln', '$e', '$p', NOW() )";
  $r = @mysqli_query ( $link, $q ) ;
  if ($r)
  { echo '
    <div class="container text-center loginImage" style="padding: 20px;">
      <div class="row">
        <div class="col-md-8" style="padding-top: 10px;padding-bottom: 20px;color: rgb(255, 255, 255);">
        <i style="font-size: small;">This is a fictional website and is used for educational illustration purposes only.</i><br>
        </div>
          <div class="col-md-4 border signInBox">
            <div style="padding-top: 10px;">
              <img src="img/mktimelogo.png" style="height: 150px; width: 150px;" alt="MKTime Logo"><hr>
            </div>
              <p>You are now registered.</p>
              <a class="alert-link" href="login.php">Login</a><br><br>
        </div>
      </div>
    </div>
    '; 
    include 'footer.php'; }
  
# Close database connection.
  mysqli_close($link); 
  exit();
}

 # Or report errors.
 else 
 {
   echo '<h4 class="alert-heading" id="err_msg">The following error(s) occurred:</h4>' ;
   foreach ( $errors as $msg )
   { echo " - $msg<br>" ; }
   echo '<p>or please try again.</p></div>';
   # Close database connection.
   mysqli_close( $link );
 }  
}
?>

<!-- Register -->
<div class="container text-center loginImage" style="padding: 20px;">
      <div class="row">
        <div class="col-md-8" style="padding-top: 10px;padding-bottom: 20px;color: rgb(255, 255, 255);">
        <h2>Create An Account</h2>
        <i style="font-size: small;">This is a fictional website and is used for educational illustration purposes only.</i><br><br>
        <p>Already registered? Login <a href="login.php" style="color: green"><b>here</b></a>.</p>
        </div>
        <div class="col-md-4 border signInBox">
          <form action="register.php" method="post">
              <div style="padding-top: 10px;">
                <img src="img/mktimelogo.png" style="height: 150px; width: 150px;" alt="MKTime Logo"><hr>
              </div>
              <div class="form-group">
                <label for="inputfirst_name">First Name*</label>
                  <input type="text"
                  name="first_name"
                  class="form-control"
                  required 
                  placeholder="Enter your first name." 
                  value="<?php if (isset($_POST['first_name'])) echo $_POST['first_name']; ?>"> 
              </div></p>
              <div class="form-group">
                <label for="inputlast_name">Last Name*</label>
                  <input type="text" 
                  name="last_name" 
                  class="form-control" 
                  required 
                  placeholder="Enter your last name." 
                  value="<?php if (isset($_POST['last_name'])) echo $_POST['last_name']; ?>">
              </div></p>
              <div class="form-group">
                <label for="inputemail">Email*</label>
                  <input type="email" 
                  name="email" 
                  class="form-control" 
                  required 
                  placeholder="email@example.com" 
                  value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>">
              </div></p>
              <div class="form-group">
                <label for="inputpass1">Create New Password*</label>
                  <input type="password"
                  name="pass1" 
                  class="form-control" 
                  required 
                  placeholder="New Password" 
                  value="<?php if (isset($_POST['pass1'])) echo $_POST['pass1']; ?>">
              </div></p>
              <div class="form-group">
                <label for="inputpass2">Confirm Password*</label>
                  <input type="password" 
                  name="pass2" 
                  class="form-control" 
                  required 
                  placeholder="Confirm Password" 
                  value="<?php if (isset($_POST['pass2'])) echo $_POST['pass2']; ?>">
              </div></p>
              <div class="form-group"><br>
                <input class="btn btn-success" type="submit" value="Register">
                <input class="btn btn-success" type="reset" value="Reset">
              </div><br>
              <i>*Mandatory fields.</i>
          </form>
        </div>
      </div>
    </div>

<?php
include('footer.php');
?>