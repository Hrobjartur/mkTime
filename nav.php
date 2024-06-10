<?php
# Get 1st name
$isLoggedIn = isset($_SESSION['first_name']);
$first_name = $isLoggedIn ? $_SESSION['first_name'] : '';
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MK Time</title>
    <link rel="icon" type="image/png" href="img/favicon.png">
	  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Protest+Guerrilla&display=swap" rel="stylesheet">
</head>
<body>
<!-- Wrapper and content are needed for Footer -->
<div class="wrapper">
  <div class="content">
<!-- Menu -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
        <div class="container-fluid">
          <!-- Logo -->
          <a class="navbar-brand" href="index.php"><img src="img/mktimelogo.png" style="width:46px;height:46px;" alt="MKTime"> MK TIME</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    OUR COLLECTION
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="ladies.php">LADIES</a></li>
                  <li><a class="dropdown-item" href="gents.php">GENTS</a></li>
                </ul>
              </li>
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="about.php">OUR BRAND</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="contact.php">CONTACT US</a>
              </li>
            </ul>
            <!-- If user is not logged-in -->
            <?php if (!$isLoggedIn): ?>
            <span class="navbar-text">
               <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                 <a class="nav-link cySignIn" href="login.php">SIGN IN</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="register.php">REGISTER</a>
                </li>
              </ul>
            </span>
            <?php endif; ?>
            <!-- If user is logged-in -->
            <?php if ($isLoggedIn): ?>
              <span class="navbar-text">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="navbar-text">
                    Welcome, <?php echo htmlspecialchars($first_name); ?>!&nbsp;
                  </li>
                  <li class="nav-item">
                    <a class="nav-link bi bi-cart" href="cart.php"> CART</a>
                  </li>
                  <li class="nav-item logout">
                    <a class="nav-link logout cyLogout" href="logout.php">LOGOUT</a>
                  </li>
                </ul>
              </span>
            <?php endif; ?>
          </div>
        </div>
      </nav>
<!-- Search bar form -->
      <form action="search.php" method="get">
        <div class="container input-group" style="padding-top: 10px; padding-bottom: 10px;">
          <input type="text" class="form-control mr-sm-2 cySearch" name="search_query" placeholder="֍ Search MK Time" required>
          <input type="submit" class="btn btn-success cySearchSubmit" value="Search">      
        </div>
      </form>