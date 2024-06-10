<?php
# Access session.
session_start() ;
?>

<?php
# Navigation
include('nav.php');
?>

<!-- Intro -->
      <div class="container bgintro">
        <div class="row" style="border-style: solid; border-width: 1px; border-radius: 10px;">
          <div class="col-md-3" style="padding-top:5px; padding-bottom: 5px;">
            <!-- Banner Logo -->
            <img src="img/mktimelogo.png" style="width:200px;height:200px;" alt="MK Time Logo">
          </div>
            <!-- Banner Right Info -->
          <div class="col-md-8 text-white" style="padding-top: 10px;background-color: rgb(46, 73, 73);border-style: solid;">
            <h1 class="cyH1" style="font-weight: bold;font-family:Protest Guerrilla, sans-serif;letter-spacing: 4px;">MK TIME</h1>
            <h5 style="font-style: italic; font-weight: bold;">Where Swiss Precision Meets Edinburgh Craftsmanship</h5>
            <i style="font-size: small;color: black;">This is a fictional website and is used for educational illustration purposes only.</i><hr>
          </div>
        </div>
      </div>

<?php
# For Her & Him Cards
include('herHimCards.php');
# New Arrivals
include('newArrivals.php');
# Footer
include('footer.php');
?>