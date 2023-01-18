<?php
$error='';
$success= '';
 if (isset($_POST['btn-send'])) {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $message = $_POST['message'];

  $to = 'printers@tkayinvestment.com';
  // $to = 'muyizererenepatrick@gmail.com';
  $subject = 'message submission from '.$name;
  $message = "Name: ".$name."\n"."Wrote the following: "."\n\n".$message;
  $headers = "From: ".$email;

  if (mail($to, $message ,$headers)) {
    $success= "<h3 class='alert alert-success'>Sent Successfully! Thank you"." ".$name.",We will contact you shortly!</h3>";
    echo $success;
  }else {
    $error= "Something went wrong";
    echo $error;
  }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

  <title>T-KAY Printers  - Home</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <!-- <link href="assets/img/favicon.png" rel="icon"> -->
  <link rel='shortcut icon' type='image/x-icon' href="images/logo.png">

 <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
  <!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/6210ed95a34c245641271b6c/1fs9204eu';
s1.charset='UTF-8';
// s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
</head>

<body>

  <!-- ======= Top Bar ======= -->
  <!-- <section id="topbar" class="d-flex align-items-center">
    <div class="container d-flex justify-content-center justify-content-md-between">
      <div class="contact-info d-flex align-items-center">
        <i class="bi bi-envelope-fill"></i><a href="mailto:info@tkayinvestment.com">design@tkayinvestment.com</a>
        <i class="bi bi-phone-fill phone-icon"></i> +250 788 379 690
      </div>
      <div class="social-links d-none d-md-block">
        <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
        <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
        <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
        <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></i></a>
      </div>
    </div>
  </section> -->

  <!-- ======= Header ======= -->
  <header id="header" class="d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

      <!-- <h1 class="logo"><a href="index.php">T-KAY Printers</a></h1> -->
      <!-- Uncomment below if you prefer to use an image logo -->
       <a href="index.php" class="logo"><img src="images/logo.png" alt="" class="img-fluid"></a>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto " href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="about.php">About Us</a></li>
          <li><a class="nav-link scrollto" href="#services">Services</a></li>
          <li class="dropdown nav-link scrollto"><a href="#portfolio"><span>Portfolio</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="large_format.php">Large Format Printing</a></li>
              <!-- <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-right"></i></a>
                <ul>
                  <li><a href="#">Deep Drop Down 1</a></li>
                  <li><a href="#">Deep Drop Down 2</a></li>
                  <li><a href="#">Deep Drop Down 3</a></li>
                  <li><a href="#">Deep Drop Down 4</a></li>
                  <li><a href="#">Deep Drop Down 5</a></li>
                </ul>
              </li> -->
              <li><a href="graphic_design.php">Concept Development</a></li>
              <li><a href="digital_offset.php">Digital & Offset Printing</a></li>
              <li><a href="promotional.php">Promotional Items</a></li>
              <li><a href="signages.php">3D Letters & Signages</a></li>
              <li><a href="machines.php">Machines For sale</a></li>
            </ul>
          </li>
          <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero"  class="d-flex align-items-center">
    <?php include('standard.php');?>
  </section><!-- End Hero -->
 <!--  <section id="cta" class="cta">

    </section> -->

  <main id="main">
    
    <!-- ======= Pricing Section ======= -->
    <!-- <section id="pricing" class="pricing">
      <div class="container">

        <div class="section-title">
          <span>Pricing</span>
          <h2>Pricing</h2>
          <p>Sit sint consectetur velit quisquam cupiditate impedit suscipit alias</p>
        </div>

        <div class="row">

          <div class="col-lg-4 col-md-6" data-aos="zoom-in" data-aos-delay="150">
            <div class="box">
              <h3>Free</h3>
              <h4><sup>$</sup>0<span> / month</span></h4>
              <ul>
                <li>Aida dere</li>
                <li>Nec feugiat nisl</li>
                <li>Nulla at volutpat dola</li>
                <li class="na">Pharetra massa</li>
                <li class="na">Massa ultricies mi</li>
              </ul>
              <div class="btn-wrap">
                <a href="#" class="btn-buy">Buy Now</a>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 mt-4 mt-md-0" data-aos="zoom-in">
            <div class="box featured">
              <h3>Business</h3>
              <h4><sup>$</sup>19<span> / month</span></h4>
              <ul>
                <li>Aida dere</li>
                <li>Nec feugiat nisl</li>
                <li>Nulla at volutpat dola</li>
                <li>Pharetra massa</li>
                <li class="na">Massa ultricies mi</li>
              </ul>
              <div class="btn-wrap">
                <a href="#" class="btn-buy">Buy Now</a>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 mt-4 mt-lg-0" data-aos="zoom-in" data-aos-delay="150">
            <div class="box">
              <h3>Developer</h3>
              <h4><sup>$</sup>29<span> / month</span></h4>
              <ul>
                <li>Aida dere</li>
                <li>Nec feugiat nisl</li>
                <li>Nulla at volutpat dola</li>
                <li>Pharetra massa</li>
                <li>Massa ultricies mi</li>
              </ul>
              <div class="btn-wrap">
                <a href="#" class="btn-buy">Buy Now</a>
              </div>
            </div>
          </div>

        </div>

      </div>
    </section> --><!-- End Pricing Section -->
    <!-- <section id="cta" class="cta">

    </section> -->
    <!-- ======= Services Section ======= -->
    <section id="services">
      <div class="container">
        <div class="section-title">
          <span>Our Services</span>
          <h2>Our Services</h2>
        </div>

        <div class="row" data-aos="fade-up" data-aos-delay="200">
          <div class="col-lg-4 col-md-6 service-item">
            <div class="service-icon"><i class="bi bi-printer"></i></div>
            <h4 class="service-title"><a href="">Large Format Printing</a></h4>
              <p class="service-description">Our state of the art in & Out door Eco-solvent printers use the very latest technology to produce stunning full colour images and text. We can print high resolution,durable graphics onto a variety of media.</p> 
          </div>
          <div class="col-lg-4 col-md-6 service-item">
            <div class="service-icon"><i class="bi bi-laptop"></i></div>
            <h4 class="service-title"><a href="">Concept development</a></h4>
            <p class="service-description">We have been specializing in graphic design for more than 10 years and we offer a variety of graphic design services.</p>
          </div>
          <div class="col-lg-4 col-md-6 service-item">
            <div class="service-icon"><i class="bi bi-printer"></i></div>
            <h4 class="service-title"><a href="">Digital & Offset Printing</a></h4>
            <p class="service-description">We take pride in our advanced and sophisticated printing equipment. Our state of the art in & Out door Eco-solvent printers use the very latest technology to produce stunning full colour images and text.</p>
          </div>
          <div class="col-lg-4 col-md-6 service-item">
            <div class="service-icon"><i class="bi bi-cup"></i></div>
            <h4 class="service-title"><a href="">Promotional Items</a></h4>
            <p class="service-description">Corporate products are a greatly effective way to reward, thank or inspire employees, customers or potential customers while still educating and informing people about your brand.</p>
          </div>
          <div class="col-lg-4 col-md-6 service-item">
            <div class="service-icon"><i class="bi bi-binoculars"></i></div>
            <h4 class="service-title"><a href="">3D letters & Signage</a></h4>
            <p class="service-description">If you literally want to make your brand stand out, there’s no better option than 3D signages and signs. They add a dynamic visibility to your branding.</p>
          </div>
          <div class="col-lg-4 col-md-6 service-item">
            <div class="service-icon"><i class="bi bi-printer"></i></div>
            <h4 class="service-title"><a href="">Machines for sale</a></h4>
            <p class="service-description">We have different machines for sale including printers,scanners,large format printers. They add a dynamic visibility to your branding.</p>
          </div>
        </div>
      </div>
    </section><!-- End Services Section -->

    <section id="cta" class="cta">

    </section>
    <!-- ======= Clients Section ======= -->
    <section id="clients" class="clients">
      
        <?php include('partners.php');?>

      </div>
    </section><!-- End Clients Section -->

    <!-- ======= Team Section ======= -->
    <!-- <section id="team" class="team">
      <div class="container">

        <div class="section-title">
          <span>OUR SERVICES</span>
          <h2>OUR SERVICES</h2>
        </div>

        <div class="row">
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="fade-down" data-aos-delay="150">
            <div class="member">
              <img src="assets/img/team/1.jpg" alt="">
              <h4><a href="">Large Format Printing</a></h4>
              <p>Our state of the art in & Out door Eco-solvent printers use the very latest technology to produce stunning full colour images and text. We can print high resolution,durable graphics onto a variety of media.</p>              
              <div class="social">
                <a href="design@tkayinvestment.com"><p>design@tkayinvestment.com</p></a>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="fade-down" data-aos-delay="300">
            <div class="member">
              <img src="assets/img/team/2.jpg" alt="">
              <h4><a href="">Graphic Design</a></h4>
              <p>We have been specializing in graphic design for more than 10 years and we offer a variety of graphic design services.</p>
              <div class="social">
                <a href="design@tkayinvestment.com"><p>design@tkayinvestment.com</p></a>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="fade-down" data-aos-delay="150">
            <div class="member">
              <img src="assets/img/team/3.jpg" alt="">
              <h4><a href="">Digital & Offset Printing</a></h4>
              <p>We take pride in our advanced and sophisticated printing equipment. Our state of the art in & Out door Eco-solvent printers use the very latest technology to produce stunning full colour images and text.</p>
              <div class="social">
                <a href="design@tkayinvestment.com"><p>design@tkayinvestment.com</p></a>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="fade-down" data-aos-delay="300">
            <div class="member">
              <img src="assets/img/team/4.jpg" alt="">
              <h4><a href="">Promotional Items</a></h4>
              <p>Corporate products are a greatly effective way to reward, thank or inspire employees, customers or potential customers while still educating and informing people about your brand.</p>
              <div class="social">
                <a href="design@tkayinvestment.com"><p>design@tkayinvestment.com</p></a>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="fade-down" data-aos-delay="150">
            <div class="member">
              <img src="assets/img/team/5.jpg" alt="">
              <h4><a href="">3D letters & Signage</a></h4>
              <p>If you literally want to make your brand stand out, there’s no better option than 3D signages and signs. They add a dynamic visibility to your branding.</p>
              <div class="social">
                <a href="design@tkayinvestment.com"><p>design@tkayinvestment.com</p></a>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="fade-down" data-aos-delay="300">
            <div class="member">
              <img src="assets/img/team/6.jpg" alt="">
              <h4><a href="">Machines for sale</a></h4>
              <p>We have different machines for sale including printers,scanners,large format printers. They add a dynamic visibility to your branding.</p>
              <div class="social">
                <a href="sales@tkayinvestment.com"><p>sales@tkayinvestment.com</p></a>
              </div>
            </div>
          </div>

        </div>

      </div>
    </section> --><!-- End Team Section -->

    <!-- ======= Cta Section ======= -->
    <section id="cta" class="cta">

    </section><!-- End Cta Section -->

    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio">
      <div class="container">

        <div class="section-title">
          <span>Portfolio</span>
          <h2>Portfolio</h2>
        </div>


        <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="150">

          <div class="col-lg-4 col-md-6 portfolio-item filter-card">
            <img src="assets/img/portfolio/4.jpg" class="img-fluid" alt="">
            <div class="portfolio-info">
              <!-- <h4>Cards 1</h4>
              <p>Cards</p> -->
              <a href="assets/img/portfolio/4.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Cards 1"><i class="bx bx-plus"></i></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-card">
            <img src="assets/img/portfolio/3.jpg" class="img-fluid" alt="">
            <div class="portfolio-info">
              <!-- <h4>Cards 2</h4>
              <p>Cards</p> -->
              <a href="assets/img/portfolio/3.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Cards 2"><i class="bx bx-plus"></i></a>
              
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-card">
            <img src="assets/img/portfolio/5.jpg" class="img-fluid" alt="">
            <div class="portfolio-info">
              <!-- <h4>Card 3</h4>
              <p>Card</p> -->
              <a href="assets/img/portfolio/5.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Card 3"><i class="bx bx-plus"></i></a>
              
            </div>
          </div>


          <div class="col-lg-4 col-md-6 portfolio-item filter-Branding">
            <img src="assets/img/portfolio/1.jpg" class="img-fluid" alt="">
            <div class="portfolio-info">
              <!-- <h4>Branding 2</h4>
              <p>Branding</p> -->
              <a href="assets/img/portfolio/1.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Branding 2"><i class="bx bx-plus"></i></a>
              
            </div>
          </div>


          <div class="col-lg-4 col-md-6 portfolio-item filter-Branding">
            <img src="assets/img/portfolio/2.jpg" class="img-fluid" alt="">
            <div class="portfolio-info">
              <!-- <h4>Branding 3</h4>
              <p>Branding</p> -->
              <a href="assets/img/portfolio/2.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Branding 3"><i class="bx bx-plus"></i></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-Branding">
            <img src="assets/img/portfolio/6.jpg" class="img-fluid" alt="">
            <div class="portfolio-info">
              <!-- <h4>Branding 3</h4>
              <p>Branding</p> -->
              <a href="assets/img/portfolio/6.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Branding 3"><i class="bx bx-plus"></i></a>
              
            </div>
          </div>

        </div>

        <div class="row" data-aos="fade-up">
          <div class="col-lg-12 d-flex justify-content-center">
            <a href=""><b>Click here for more</b></a>
          </div>
        </div>

      </div>
    </section><!-- End Portfolio Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">

        <div class="section-title">
          <span>CONTACT US</span>
          <h2>CONTACT US</h2>
        </div>

        <div class="row" data-aos="fade-up">
          <div class="col-lg-6">
            <div class="info-box mb-4">
              <i class="bx bx-map"></i>
              <h3>Our Address</h3>
              <p>KN4 KIC Building (Former UTC) No 3.5 <br>Nyarugenge-Kigali</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="info-box  mb-4">
              <i class="bx bx-envelope"></i>
              <h3>Email Us</h3>
              <p>printers@tkayinvestment.com</p>
              <p>tkay.investments@gmail.com</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="info-box  mb-4">
              <i class="bx bx-phone-call"></i>
              <h3>Call Us</h3>
              <p>+(250) 788 319 690</p>
              <p>+(250) 788 324 088</p>
            </div>
          </div>

        </div>

        <div class="row" data-aos="fade-up">

          <div class="col-lg-6 ">
            <iframe class="mb-4 mb-lg-0" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3987.5181604051!2d30.059189314308657!3d-1.9456331372484308!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x19dca42159c071d3%3A0xe7adc06c552ea722!2sTkay%20Investments!5e0!3m2!1sen!2sbg!4v1643281022775!5m2!1sen!2sbg" frameborder="0" style="border:0; width: 100%; height: 384px;" allowfullscreen></iframe>
          </div>

          <div class="col-lg-6">
           <form method="post">
          <div class="row">
                <div class="col-md-6 form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                </div>
              </div>
<!--               <div class="form-group mt-3">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
              </div> -->
              <div class="form-group mt-3">
                <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
              </div>
              <div class="form-group mt-3">
                <button name="btn-send" type="submit" class="btn btn-info">Send Your Message
              </button>
            </div>
            <div class="form-group mt-3">
                <!-- <button name="btn-send" type="submit" class="btn btn-info">Send Your Message
              </button> -->
            </div>
          </form>
        </div>
          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-4 col-md-6">
            <div class="footer-info">
              <h3>T-KAY Printers</h3>
              <p>
                KN4 KIC Building (Former UTC) No 3.5 <br>
                Nyarugenge-Kigali<br><br>
                <strong>Phone:</strong> +250 788 319 690<br>
                <strong>Email:</strong> printers@tkayinvestment.com<br>
              </p>
              <div class="social-links mt-3">
                <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
              </div>
            </div>
          </div>
   
          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Services</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
            </ul>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Our Services</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Concept development</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Digital and Offset Printing</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Large Format Printing</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Promotional Materials</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">3D letters and signage</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Machines for sale</a></li>
            </ul>
          </div>

          <div class="col-lg-4 col-md-6 footer-newsletter">
            <h4>Our Newsletter</h4>
            <p>Subscribe to our newsletter to get latest information and promotions about T-KAY Investment.</p>
            <form action="" method="post">
              <input type="email" name="email"><input type="submit" value="Subscribe">
            </form>

          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>T-KAY Investment ltd</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        Designed by <a href="">T-KAY IT</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  <!-- <div id="preloader"></div> -->

  <!-- Vendor JS Files -->
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>