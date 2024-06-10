<?php
include ('session-cart.php');
# W/o buffer New Arrivals card are creating a bug
ob_start();
include 'newArrivals.php';
$newArr = ob_get_clean();

# Check if form has been submitted for update.
if ( $_SERVER['REQUEST_METHOD'] == 'POST' )
{
  # Update changed quantity field values.
  foreach ( $_POST['qty'] as $item_id => $item_qty )
  {
    # Ensure values are integers.
    $id = (int) $item_id;
    $qty = (int) $item_qty;

    # Change quantity or delete if zero.
    if ( $qty == 0 ) { unset ($_SESSION['cart'][$id]); } 
    elseif ( $qty > 0 ) { $_SESSION['cart'][$id]['quantity'] = $qty; }
  }

    # Check if a remove button was clicked.
    if (isset($_POST['remove'])) {
      $remove_id = (int) $_POST['remove'];
      unset($_SESSION['cart'][$remove_id]);
    }
}

# Initialise grand total variable.
$total = 0;

if (!empty($_SESSION['cart']))
{
    require ('connect_db.php');

    $q = "SELECT * FROM items WHERE item_id IN (";
    foreach ($_SESSION['cart'] as $id => $value) { $q .= $id . ','; }
    $q = substr( $q, 0, -1 ) . ') ORDER BY item_id ASC';
    $r = mysqli_query($link, $q);

    # Display body section with a form
  echo '<div class="container text-center bg-dark-subtle" style="padding-bottom: 20px; border-radius: 25px; margin-bottom: 15px;">
          <div class="row">
            <div class="col-sm-1"></div>
            <div class="col-sm-10">
                <div style="padding-top: 10px;">
                  <h1>Shopping Cart</h1><hr>
                </div>
                <form action="cart.php" method="post">';

                while ($row = mysqli_fetch_array ($r, MYSQLI_ASSOC))
                {
                  # Calculate sub-totals and grand total.
                  $subtotal = $_SESSION['cart'][$row['item_id']]['quantity'] * $_SESSION['cart'][$row['item_id']]['price'];
                  $total += $subtotal;

                  # Display the row/s:
                  echo '
                    <div class="row align-items-center border-bottom" style="padding-top: 10px; padding-bottom: 10px;">
                        <div class="col-sm-2">
                            <img class="imgAddedToCart" src="' . $row['item_img'] . '" alt="' . $row['item_name'] . '" width="150px" height="150px">
                        </div>
                        <div class="col-sm-4">
                            <h5>' . $row['item_name'] . '</h5>
                            <p class="descTruncate text-muted">' . $row['item_desc'] . '</p>
                        </div>
                        <div class="col-sm-3 text-sm-right">
                                <div class="form-group mb-2">
                                    Quantity:<br><input type="number" min="0" max="100" name="qty[' . $row['item_id'] . ']" value="' . $_SESSION['cart'][$row['item_id']]['quantity'] . '">
                                </div>
                                <input type="submit" name="submit" class="btn btn-success" value="Update" style="margin-bottom: 5px">
                        </div>
                        <div class="col-sm-3 text-sm-right">
                                <div class="ml-3">
                                    Price: <b>&pound' . number_format($subtotal, 2) . '</b><br>
                                    <small class="text-muted">(unit price &pound' . $row['item_price'] . ')</small>
                                </div>
                                <div class="form-group">
                                    <button type="submit" name="remove" value="' . $row['item_id'] . '" class="btn btn-danger" style="margin-top: 5px"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                                    <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8z"/>
                                    </svg></button>
                                </div>
                        </div>
                    </div>';
}

# Display the total.
echo '<p><h4>Subtotal = &pound' . number_format($total, 2) . '</h4></p>
      <p><input type="submit" name="submit" class="btn btn-success" value="Update Entire Cart"></p>
      <a href="checkout.php?total=' . $total . '" class="btn btn-success cyCheckoutNow">Checkout Now</a>
      </form>
              </div>
          </div>
        </div>';
} 
else 
{
# Or display a message.
echo '<div class="container text-center bg-dark-subtle" style="padding-top: 20px; padding-bottom: 20px; border-radius: 25px; margin-bottom: 15px;">
          <div class="row">
            <div class="col-sm-1"></div>
            <div class="col-sm-10">
              <h4 style="text-align:center">Your bag is currently empty.</h4>
              <p style="text-align:center"><a href="products.php">Continue Shopping</a></p>
            </div>
          </div>
      </div>' . $newArr;
}
?>

<?php
# Footer
include('footer.php');
?>