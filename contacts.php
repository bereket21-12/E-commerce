<?php
session_start();
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header('Location: login1.php');
    exit;
}


include("./Common/header.php");
include("./Common/navbar.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $subject = $_POST['subject'];
  $message = $_POST['message'];

  // Use PHP's mail() function to send the email
  $to = "abelzeleke5173@gmail.com";
  $headers = "From: $email\r\n";
  $headers .= "Reply-To: $email\r\n";
  mail($to, $subject, $message, $headers);

  echo "Your message has been sent!";
}

?>

<!-- Contact Start -->
<div class="container-fluid" style=" margin-top: 3rem;">
  <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4">
    <span class="bg-secondary pr-3">Contact Us</span>
  </h2>
  <div class="row px-xl-5">
    <div class="col-lg-7 mb-5">
      <div class="contact-form bg-light p-30">
        <div id="success"></div>
        <form name="sentMessage" id="contactForm" method="post" novalidate="novalidate">
          <div class="control-group">
            <input type="text" class="form-control" id="name" name="name" placeholder="Your Name" required="required" data-validation-required-message="Please enter your name" />
            <p class="help-block text-danger"></p>
          </div>
          <div class="control-group">
            <input type="email" class="form-control" id="email" name="email" placeholder="Your Email" required="required" data-validation-required-message="Please enter your email" />
            <p class="help-block text-danger"></p>
          </div>
          <div class="control-group">
            <input type="text" class="form-control" id="subject" name="subject" placeholder="Subject" required="required" data-validation-required-message="Please enter a subject" />
            <p class="help-block text-danger"></p>
          </div>
          <div class="control-group">
            <textarea class="form-control" rows="8" id="message" name="message" placeholder="Message" required="required" data-validation-required-message="Please enter your message"></textarea>
            <p class="help-block text-danger"></p>
          </div>
          <div>
            <button class="btn btn-primary py-2 px-4" type="submit" id="sendMessageButton">
              Send Message
            </button>
          </div>
        </form>
      </div>
    </div>
    <div class="bg-light p-30 mb-3" style="overflow: auto;">
      <p class="mb-2">
        <i class="fa fa-map-marker-alt text-primary mr-3"></i>123 Street,
        Wolkite, WKU
      </p>
      <p class="mb-2">
        <i class="fa fa-envelope text-primary mr-3"></i>abelzeleke5173@gmail.com
      </p>
      <p class="mb-2">
        <i class="fa fa-phone-alt text-primary mr-3"></i>+251 935 353626
      </p>
    </div>
  </div>
</div>
</div>
<!-- Contact End -->
<?php

include("./Commen/footer.php");
?>