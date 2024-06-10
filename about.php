<?php
# Access session.
session_start() ;
?>

<?php
# Navigation
include('nav.php');
?>

<!-- Content -->
<div class="container" style="padding-top: 10px; padding-bottom: 30px;">
  <div class="row">
    <div class="col-md-3">
      <!-- Left moving image -->
      <marquee direction="right" scrollamount="8" class="hhcards">
        <img src="img/newWatch7.png" alt="Black watch with metal strap">
      </marquee>
    </div>
      <!-- Text in the middle -->
    <div class="col-md-6" style="padding-top: 30px;">
      <article style="text-align: left;">
        <i style="font-size: small;color: black;">This is a fictional website and is used for educational illustration
          purposes only.</i><br><br><br>
        At <b>MK Time</b>, we're a growing E-Commerce business dedicated to delivering the finest Swiss watches.<br>
        All crafted with precision right here in Edinburgh. Our pride lies in offering only the highest quality
        products, coupled with a commitment to reliable
        servicing and repair.<br>Join us as we continue to promote craftsmanship and sophistication in every tick!
      </article><br>
    </div>
    <div class="col-md-3">
      <!-- Right moving image -->
      <marquee direction="left" scrollamount="8" class="hhcards">
        <img src="img/newWatch2.png" alt="Black watch with metal strap">
      </marquee>
    </div>
  </div>
</div>

<?php
# For Her & Him Cards
include('herHimCards.php');
# Footer
include('footer.php');
?>