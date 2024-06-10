<!-- New Arrivals Cards -->
<div class="container text-center movingBg" style="padding-bottom: 20px; background-color: #133b3b; border-radius: 15px 15px 0 0;">
    <div class="row">
        <div style="border-radius: 30px; padding-top: 10px; padding-bottom: 10px;">
            <h4 class="text-white" style="font-family:Times New Roman,serif"><i class="bi bi-arrow-down-circle"></i> NEW ARRIVALS <i class="bi bi-arrow-down-circle"></i></h4><hr>
        </div>

        <?php
# Open database connection.
require('connect_db.php');
# Retrieve 'items' from database table.
$q = "SELECT * FROM items ORDER BY item_id DESC LIMIT 2";
$r = mysqli_query($link, $q);
if (mysqli_num_rows($r) > 0) {
    echo '<div class="container">';
    echo '<div class="row">';
    echo '<div class="col-sm-1 d-flex justify-content-center"></div>';

    while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
        echo '
        <div class="col-sm-5 d-flex justify-content-center" style="padding-top: 10px;">
            <div class="card bg-light">
                <div class="card-header">
                <img src="' . $row['item_img'] . '" class="card-img-top" alt="' . $row['item_name'] . '">
                </div>
                <div class="card-body">
                    <h5 class="card-title">' . $row['item_name'] . '</h5>
                    <p class="card-text">' . $row['item_desc'] . '</p>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><b>&pound' . $row['item_price'] . '</b></li>
                </ul>
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
# Or display message if no products in DB.
else { echo '<p>There are currently no items to display.</p>
	' ; }
?>

    </div>
</div>