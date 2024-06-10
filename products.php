<?php
#Read session start file.
include ( 'session-cart.php' );
?>

<!-- Products -->
<div class="container text-center" style="padding-bottom: 10px;">
  <i style="font-size: small;color: black;">This is a fictional website and is used for educational illustration purposes only.</i><hr>
    <div class="row">
<?php
# Open database connection.
require('connect_db.php');
# Retrieve 'items' from database table.
$q = "SELECT * FROM items";
$r = mysqli_query($link, $q);
if (mysqli_num_rows($r) > 0) {
    echo '<div class="container">';
    echo '<div class="row">';

    while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
        echo '
        <div class="col-sm-4 d-flex justify-content-center">
          <div class="card bg-light" style="margin-bottom:15px">
            <div class="card-header">
              <img src="' . $row['item_img'] . '" class="card-img-top" alt="' . $row['item_name'] . '">
            </div>
            <div class="card-body">
              <h5 class="card-title">' . $row['item_name'] . '</h5>
              <p class="card-text">' . $row['item_desc'] . '</p>
            </div>
            <h5><b>&pound' . $row['item_price'] . '</b></h5>
            <div class="card-footer bg-success">
            <a href="added.php?id=' . $row['item_id'] . '" class="card-link text-white" style="font-weight: bold;">ADD TO CART</a>
            </div>
            </div>
        </div>';
    }

    echo '</div>';  // Close row
    echo '</div>';  // Close container

    # Close database connection.
    mysqli_close($link);
}
# Or display message.
else { echo '<p>There are currently no items in the table to display.</p>
	' ; }
?>
    </div>
</div>

<?php
include('footer.php');
?>