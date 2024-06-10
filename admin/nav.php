<?php
$isLoggedIn = isset($_SESSION['first_name']);
$first_name = $isLoggedIn ? $_SESSION['first_name'] : '';
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" 
   content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>MKTime Admin Panel</title>

    <!-- Bootstrap and custom CSS -->
  <link rel="stylesheet" href="styles.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

  </head>
  <body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid" id="navbarNav">
    <a class="navbar-brand" href="index.php">&nbsp;MKTime Admin Panel</a>
      <button class="navbar-toggler" type="button" 
      data-toggle="collapse" 
      data-target="#navbarNav" 
      aria-controls="navbarNav" 
      aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="create.php">Create</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="read.php">Read</a>
        </li>
      </ul>
      <?php if ($isLoggedIn): ?>
        <span class="navbar-text">
          Welcome, <?php echo htmlspecialchars($first_name); ?>!&nbsp;
        </span>
        <span class="navbar-text logout">
          <a class="nav-link logout" href="logout.php">Logout</a>
        </span>
      <?php endif; ?>
    </div>
  </div>
</nav>