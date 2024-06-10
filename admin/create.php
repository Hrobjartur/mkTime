<?php
# Access session.
session_start() ;
# Redirect if not logged in.
if ( !isset( $_SESSION[ 'user_id' ] ) ) { require ( 'login_tools.php' ) ; load() ; }
?>

<?php
include('nav.php');
?>

	<h1>Add Item</h1>
		<div class="container" style="text-align: left;">
		<form action="create.php" method="post">
		<!-- input box for item name  -->
		<label for="name">Item Name:</label>
		<input type="text" 
		id="item_name" 
		class="form-control" 
		name="item_name" 
		required 
		value="<?php if (isset($_POST['item_name'])) echo $_POST['item_name']; ?> "><br>

		<!-- input box for item gender -->
		<label for="gender">Gender:</label><br>
   		<input type="radio" id="womens" name="gender" value="womens"
        <?php if (isset($_POST['gender']) && $_POST['gender'] == 'womens') echo 'checked'; ?>>
  		<label for="womens">Womens</label><br>
    	<input type="radio" id="mens" name="gender" value="mens" 
        <?php if (isset($_POST['gender']) && $_POST['gender'] == 'mens') echo 'checked'; ?>>
   		<label for="mens">Mens</label><br><br>
		
		<!-- input box for item description -->  
		<label for="description">Description:</label>
		<textarea id="item_desc"
		class="form-control" 
		name="item_desc" 
		required>
		<?php if (isset($_POST['item_desc'])) echo $_POST['item_desc']; ?>
		</textarea><br>
		
		<!-- input box for image path -->
		<label for="image">Image Path:</label>
	 	<input type="text" 
		id="item_img" 
		class="form-control" 
		name="item_img" 
	 	required 
	 	value="<?php if (isset($_POST['item_img'])) echo $_POST['item_img']; ?>"><br>
		
		<!-- input box for item price -->
		<label for="price">Price:</label>
		<input 
		type="number" 
		id="item_price" 
		class="form-control" 
		name="item_price" 
		min="0" step="0.01" 
		required 
		value="<?php if (isset($_POST['item_price'])) echo $_POST['item_price']; ?>"><br>
		<!-- submit button -->
		<div style="text-align: center;">
			<input type="submit" class="btn btn-dark" value="Submit">
		</div>
		</form>
		</div>
<?php
if ( $_SERVER[ 'REQUEST_METHOD' ] == 'POST' )
{
  # Connect to the database.
  require ('connect_db.php'); 

# Initialize an error array.
$errors = array();

# Check for item name .
if ( empty( $_POST[ 'item_name' ] ) )
{ $errors[] = 'Enter the item name.' ; }
else
{ $n = mysqli_real_escape_string( $link, trim( $_POST[ 'item_name' ] ) ) ; }

# Check for item gender .
if ( empty( $_POST[ 'gender' ] ) )
{ $errors[] = 'Enter the item gender.' ; }
else
{ $g = mysqli_real_escape_string( $link, trim( $_POST[ 'gender' ] ) ) ; }

# Check for an item decription.
if (empty( $_POST[ 'item_desc' ] ) )
{ $errors[] = 'Enter the item decription.' ; }
else
{ $d = mysqli_real_escape_string( $link, trim( $_POST[ 'item_desc' ] ) ) ; }

# Check for an item image.
if (empty( $_POST[ 'item_img' ] ) )
{ $errors[] = 'Enter the item image.' ; }
else
{ $img = mysqli_real_escape_string( $link, trim( $_POST[ 'item_img' ] ) ) ; }

# Check for an item price.
if (empty( $_POST[ 'item_price' ] ) )
{ $errors[] = 'Enter the item image.' ; }
else
{ $p = mysqli_real_escape_string( $link, trim( $_POST[ 'item_price' ] ) ) ; }


# On success data into my_table on database.
if ( empty( $errors ) ) 
{
$q = "INSERT INTO items (item_name, gender, item_desc, item_img, item_price) 
VALUES ('$n','$g','$d', '$img', '$p' )";
$r = @mysqli_query ( $link, $q ) ;
if ($r)
{ echo '<p>New record created successfully</p>'; }

# Close database connection.
mysqli_close($link); 
header('Location: create.php?success=1');
exit();
}

# Or report errors.
else 
{
echo '<p>The following error(s) occurred:</p>' ;
foreach ( $errors as $msg )
{ echo "$msg<br>" ; }
echo '<p>Please try again.</p>';
# Close database connection.
mysqli_close( $link );

}  
}

include('footer.php');
?>