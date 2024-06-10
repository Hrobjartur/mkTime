<?php
# Access session.
session_start() ;
# Redirect if not logged in.
if ( !isset( $_SESSION[ 'user_id' ] ) ) { require ( 'login_tools.php' ) ; load() ; }
?>

<?php
# Include navigation 
include('nav.php');

if (isset($_GET['id'])) {
  $item_id = $_GET['id'];
} else {
  echo "No item ID specified.";
}
?>

<div class="container" style="text-align: left;">
    <form action="update.php?id=<?php echo $item_id; ?>" method="post">
      <!-- input box for item name  -->
      <label for="item_name">New Item Name:</label>
      <input type="text" name="item_name" class="form-control" value="<?php if (isset($_POST['item_name'])) echo $_POST['item_name']; ?>">

	  	<!-- input box for item gender -->
		  <label for="gender">New Gender:</label><br>
   		<input type="radio" id="womens" name="gender" value="womens"
      <?php if (isset($_POST['gender']) && $_POST['gender'] == 'womens') echo 'checked'; ?>>
  		<label for="womens">Womens</label><br>
    	<input type="radio" id="mens" name="gender" value="mens" 
      <?php if (isset($_POST['gender']) && $_POST['gender'] == 'mens') echo 'checked'; ?>>
   		<label for="mens">Mens</label><br><br>
      
      <!-- input box for item description -->  
      <label for="item_desc">New Description:</label>
      <textarea type="text" name="item_desc" class="form-control" value="<?php if (isset($_POST['item_desc'])) echo $_POST['item_desc']; ?>">
      </textarea>
      
      <!-- input box for image path -->
      <label for="item_img">New Image:</label>
      <input type="text" name="item_img" class="form-control" value="<?php if (isset($_POST['item_img'])) echo $_POST['item_img']; ?>">
      
      <!-- input box for item price -->
      <label for="item_price">New Price:</label>
      <input type="number" name="item_price" class="form-control" min="0" step="0.01" value="<?php if (isset($_POST['item_price'])) echo $_POST['item_price']; ?>"><br>

      <!-- submit button -->
      <div style="text-align: center;">
        <input type="submit" class="btn btn-dark" value="Submit">
      </div>
    </form>
</div>

<?php
if ( $_SERVER[ 'REQUEST_METHOD' ] == 'POST' ) {
  # Connect to the database.
  require ('connect_db.php'); 

  # Initialize an error array.
  $errors = array();
 
  # Check for an item name.
  if ( empty( $_POST[ 'item_name' ] ) )
  { $errors[] = 'Update item name.' ; }
  else
  { $n = mysqli_real_escape_string( $link, trim( $_POST[ 'item_name' ] ) ) ; }

  # Check for item gender .
  if ( empty( $_POST[ 'gender' ] ) )
  { $errors[] = 'Enter the item gender.' ; }
  else
  { $g = mysqli_real_escape_string( $link, trim( $_POST[ 'gender' ] ) ) ; }

  # Check for an item description.
  if (empty( $_POST[ 'item_desc' ] ) )
  { $errors[] = 'Update item description.' ; }
  else
  { $d = mysqli_real_escape_string( $link, trim( $_POST[ 'item_desc' ] ) ) ; }

  # Check for an item price.
  if (empty( $_POST[ 'item_img' ] ) )
  { $errors[] = 'Update image address.' ; }
  else
  { $img = mysqli_real_escape_string( $link, trim( $_POST[ 'item_img' ] ) ) ; }
  
  # Check for an item price.
  if (empty( $_POST[ 'item_price' ] ) )
  { $errors[] = 'Update item price.' ; }
  else
  { $p = mysqli_real_escape_string( $link, trim( $_POST[ 'item_price' ] ) ) ; }

  if ( empty( $errors ) ) 
  {
    $q = "UPDATE items SET item_name='$n', gender='$g', item_desc='$d', item_img='$img', item_price='$p'  WHERE item_id='$item_id'";
    $r = @mysqli_query ( $link, $q ) ;
    if ($r)
    {
       header("Location: read.php?success=1");

      } else {
        echo "Error updating record: " . $link->error;
    }

     # Close database connection.
     mysqli_close( $link );
    } 
  }

include('footer.php');
?>