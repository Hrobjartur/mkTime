<?php
include ('session-cart.php');
# W/o buffer New Arrivals card are creating a bug
ob_start();
include 'newArrivals.php';
$newArr = ob_get_clean();

if ( isset( $_GET['total'] ) && ( $_GET['total'] > 0 ) && (!empty($_SESSION['cart']) ) ) {
# Mandatory connect to the database
require ('connect_db.php');

$q = "INSERT INTO orders ( user_id, total, order_date ) VALUES (". $_SESSION['user_id'].",".$_GET['total'].", NOW() ) ";
$r = mysqli_query ($link, $q);

$order_id = mysqli_insert_id($link) ;

$q = "SELECT * FROM items WHERE item_id IN (";
foreach ($_SESSION['cart'] as $id => $value) { $q .= $id . ','; }
$q = substr( $q, 0, -1 ) . ') ORDER BY item_id ASC';
$r = mysqli_query ($link, $q);

while ($row = mysqli_fetch_array ($r, MYSQLI_ASSOC))
{
  $query = "INSERT INTO order_contents ( order_id, item_id, quantity, price )
  VALUES ( $order_id, 
         ".$row['item_id'].",
         ".$_SESSION['cart'][$row['item_id']]['quantity'].",
         ".$_SESSION['cart'][$row['item_id']]['price'].")" ;
  $result = mysqli_query($link,$query);
}

mysqli_close($link);
# Success and order number
echo '<div class="container text-center bg-dark-subtle" style="padding-top: 20px; padding-bottom: 20px; border-radius: 25px; margin-bottom: 15px;">
          <div class="row">
            <div class="col-sm-1"></div>
            <div class="col-sm-10">
              <h4 style="text-align:center">Thanks for your order!<br>Your Order Number Is #'.$order_id.'.</h4>
              <p style="text-align:center"><a href="products.php">Continue Shopping</a></p>
            </div>
          </div>
      </div>';
# Clear cart
$_SESSION['cart'] = NULL ;

} else {
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