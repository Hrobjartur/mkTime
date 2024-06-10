<?php
# Kill
session_start();
session_unset();
session_destroy();
# Redirect
header('Location: index.php');
exit;
?>