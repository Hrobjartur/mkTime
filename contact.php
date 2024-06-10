<?php
# Access session.
session_start() ;
?>

<?php
# Navigation.
include('nav.php');
?>

<!-- Content -->
  <div class="container text-center">
    <h1 style="font-family: Verdana,serif;">CONTACT US</h1><hr style="color: black;">
    <p><i style="font-size: small;color: black;">This is a fictional website and is used for educational illustration purposes only.</i></p>
    <div class="row">
      <!-- Left Content -->
      <div class="col-sm-6" style="text-align: left;">
        <p style="text-align: center;">Need to get in touch with us?<br>Give us a call on:</p>
          <!-- Phone numbers -->
          <ul class="list-group text-center">
            <li class="list-group-item"><a href= "tel:+44131123444"><b>+44 131 123 444</b></a> for <b>SALES</b></li><br>
            <li class="list-group-item"><a href= "tel:+44131123555"><b>+44 131 123 555</b></a> for <b>SERVICE & REPAIR</b></li>
          </ul><br>
          <p style="text-align: center;">Alternatively, complete the form below with your inquiry:</p>
        <!-- Contact form -->
        <form action="#" method="post">
            <label for="name">Name:</label><br>
            <input type="text" id="name" name="name" placeholder="Enter your name." required><br>
            
            <label for="email">Email:</label><br>
            <input type="email" id="email" name="email" placeholder="Enter your email." required><br><br>

            Select the desired department:
            <div class="form-check">
              <input class="form-check-input" type="radio" name="department" id="sales" value="sales" checked>
              <label class="form-check-label" for="sales">
                Sales
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="department" id="repairs" value="repairs">
              <label class="form-check-label" for="repairs">
                Service & Repair
              </label>
            </div><br>
            
            <label for="message">Message:</label><br>
            <textarea id="message" name="message" rows="4" cols="50" placeholder="Type your inquiry here." required></textarea><br>
            
            <div class="text-center">
             <input type="submit" value="Submit" class="btn btn-success">
            </div>
        </form>
        <br>
      </div>
      <!-- Right Content -->
      <div class="col-sm-6 border" style="padding-bottom: 20px; padding-top: 10px; border-radius: 10px 10px 0 0;">
        <p><b>Our location:</b><br>
        123-456 High St, Edinburgh EH1 1XX</p>
        <!-- Map -->
        <img src="img/mktimelocation.png" style="width: 100%;" alt="MKTime Location">
      </div>
    </div>
  </div>

<?php
# Footer
include('footer.php');
?>