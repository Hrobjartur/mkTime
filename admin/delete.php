<?php
# Access session.
session_start() ;
# Redirect if not logged in.
if ( !isset( $_SESSION[ 'user_id' ] ) ) { require ( 'login_tools.php' ) ; load() ; }
?>

<?php
# Open database connection.
require ( 'connect_db.php' ) ;

if (isset($_GET['item_id'])) {
    $id = $_GET['item_id'];
}

$sql = "DELETE FROM items WHERE item_id='$id'";
if ($link->query($sql) === TRUE) {
    header("Location: read.php?success=1");
} else {
    echo "Error deleting record: " . $link->error;
}