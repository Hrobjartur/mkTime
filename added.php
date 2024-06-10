<?php
#Read session start file.
include ( 'session-cart.php' );

if ( isset( $_GET['id'] ) ) $id = $_GET['id'];
# Mandatory connect to the database
require ( 'connect_db.php');

$q = "SELECT * FROM items WHERE item_id = $id";
$r = mysqli_query( $link, $q );

if ( mysqli_num_rows( $r ) == 1 ) {
    $row = mysqli_fetch_array( $r, MYSQLI_ASSOC );
    // Product details are fetched and stored in $row

# Check if cart already contains one of this product id.
if ( isset( $_SESSION['cart'][$id] ) )
{ 
  # Add one more of this product.
  $_SESSION['cart'][$id]['quantity']++; 
  echo '
    <div class="container text-center">
        <div class="alert bg-dark-subtle" role="alert">
            <p><img class="imgAddedToCart" src="' . $row['item_img'] . '" width="150px" height="150px" alt="' . $row['item_name'] . '"><br><br> 
            Another <b>'.$row["item_name"].'</b> has been added to your bag.</p>
            <a href="products.php" style="font-size: 1.2em;">Continue Shopping</a> <b>|</b> <a href="cart.php" style="font-size: 1.2em;">Proceed to Checkout</a>
        </div>
    </div>';
} 
else
{
  # Or add one of this product to the cart.
  $_SESSION['cart'][$id]= array ( 'quantity' => 1, 'price' => $row['item_price'] ) ;
  echo '<div class="container text-center">
          <div class="alert bg-dark-subtle" role="alert">
              <p><img class="imgAddedToCart" src="' . $row['item_img'] . '" width="150px" height="150px" alt="' . $row['item_name'] . '"><br><br> 
              A <b>'.$row["item_name"].'</b> has been added to your bag.</p>
          <a href="products.php">Continue Shopping</a> | <a class="cyProceedCheckout" href="cart.php">Proceed to Checkout</a>
          </div>
      </div>';
    }
}

# Close database connection.
mysqli_close($link);
?>

<?php
# Footer
include('footer.php');
?>