<?php
# Mandatory connect to the database
require ('connect_db.php');
# Navigation
include ('nav.php');

# Get search text
$search_query = '';
if (isset($_GET['search_query'])) {
    $search_query = mysqli_real_escape_string($link, trim($_GET['search_query']));
}

$search_results = array();

if (!empty($search_query)) {
    # SQL query
    $q = "SELECT * FROM items WHERE item_name LIKE '%$search_query%' OR gender LIKE '%$search_query%' OR item_desc LIKE '%$search_query%'";
    $r = mysqli_query($link, $q);

    if ($r) {
        # Fetch results
        while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
            $search_results[] = $row;
        }
    } else {
        echo '<p>Error: ' . mysqli_error($link) . '</p>';
    }
}

# Close the database connection
mysqli_close($link);
?>

<?php
# Display results
if (!empty($search_results)) {
    echo '<div class="container text-center">';
    echo '<i style="font-size: small;color: black;">This is a fictional website and is used for educational illustration purposes only.</i><hr>';
    echo '<div class="row">';
    foreach ($search_results as $item) {
        echo '<div class="col-sm-4 d-flex justify-content-center">';
        echo '<div class="card bg-light" style="margin-bottom:15px">';
        echo '<div class="card-header">';
        echo '<img src="' . $item['item_img'] . '" class="card-img-top" alt="' . $item['item_name'] . '">';
        echo '</div>';
        echo '<div class="card-body">';
        echo '<h5 class="card-title">' . $item['item_name'] . '</h5>';
        echo '<p class="card-text">' . $item['item_desc'] . '</p>';
        echo '</div>';
        echo '<h5><b>&pound' . $item['item_price'] . '</b></h5>';
        echo '<div class="card-footer bg-success">';
        echo '<a href="added.php?id=' . $item['item_id'] . '" class="card-link text-white cyAddToCard" style="font-weight: bold;">ADD TO CART</a>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
    }
    echo '</div>';  // Close row
    echo '</div>';  // Close container
} else {
    echo '<div class="container text-center bg-dark-subtle" style="padding-top: 20px; padding-bottom: 20px; border-radius: 25px; margin-bottom: 15px;">';
    echo '<div class="row">';
    echo '<div class="col-sm-1"></div>'; // Empty div for better alignment
    echo '<div class="col-sm-10">';
    echo '<p class="text-center">No results found for <b>"' . htmlspecialchars($search_query) . '"</b>.</p>';
    echo '</div>';
    echo '</div>';  // Close row
    echo '</div>';  // Close container
}

# Footer
include('footer.php');
?>