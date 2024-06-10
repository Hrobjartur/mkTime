<?php
# Access session.
session_start() ;
# Redirect if not logged in.
if ( !isset( $_SESSION[ 'user_id' ] ) ) { require ( 'login_tools.php' ) ; load() ; }
?>

<?php
include('nav.php');

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
        <div class="col-md-3 d-flex justify-content-center mb-4">
            <div class="card" style="width: 18rem;">
                <img src="' . $row['item_img'] . '" class="card-img-top" alt="Product Image">
                <div class="card-body">
                    <h5 class="card-title text-center">' . $row['item_name'] . '</h5>
                    <p class="card-text">' . $row['item_desc'] . '</p>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><p class="text-center">&pound' . $row['item_price'] . '</p></li>
                    <li class="list-group-item btn btn-dark"><a class="btn btn-success btn-lg btn-block" href="update.php?id=' . $row['item_id'] . '">Update</a></li>
                    <li class="list-group-item"><a class="btn btn-danger" href="delete.php?item_id=' . $row['item_id'] . '">Delete Item</a></li>
                </ul>
            </div>
        </div>';
    }

    echo '</div>';  // Close row
    echo '</div>';  // Close container

    # Close database connection.
    mysqli_close($link);
}

include('footer.php');
?>