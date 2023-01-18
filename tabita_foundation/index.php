<?php

$error='';
$success= '';
 if (isset($_POST['btn-send'])) {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $message = $_POST['message'];

  $to = 'tabita.foundation1@gmail.com';
  $subject = 'message submission from '.$name;
  $message = "Name: ".$name."\n"."Wrote the following: "."\n\n".$message;
  $headers = "From: ".$email;

  if (mail($to, $subject, $message ,$headers)) {
    $success= "<h1 class='alert alert-success'>Sent Successfully! Thank you"." ".$name.",We will contact you shortly!</h1>";
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
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>TABITA Foundation</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Facebook Opengraph integration: https://developers.facebook.com/docs/sharing/opengraph -->
  <meta property="og:title" content="">
  <meta property="og:image" content="">
  <meta property="og:url" content="">
  <meta property="og:site_name" content="">
  <meta property="og:description" content="">

  <!-- Twitter Cards integration: https://dev.twitter.com/cards/  -->
  <meta name="twitter:card" content="summary">
  <meta name="twitter:site" content="">
  <meta name="twitter:title" content="">
  <meta name="twitter:description" content="">
  <meta name="twitter:image" content="">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
  <link rel='shortcut icon' type='image/x-icon' href="assets/img/logo.png">
  <!-- =======================================================

  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

      <a href="index.php" class="logo mr-auto"><img src="assets/img/logo.png" alt=""></a>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#about">About</a></li>
          <li><a class="nav-link scrollto" href="#services">Services</a></li>
          <li><a class="nav-link scrollto " href="#portfolio">Products</a></li>
          <!-- <li><a class="nav-link scrollto" href="#testimonials">Testimonials</a></li> -->
          <li><a class="nav-link scrollto" href="#team">Team</a></li>
          <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->


    <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div class="hero-container">
      <?php include('slider.php');?>
    </div>
  </section><!-- End Hero -->

  <main id="main">
        <!-- ======= Why Us Section ======= -->
    <section id="why-us" class="why-us">
      <div class="container">

        <div class="row">

          <div class="col-lg-4" data-aos="fade-up">
            <div class="box">
              <span>Our Mission</span>
              <p>Create a safer world for our children, work together as a whole community towards that world so that our children can have a much more fun and healthier childhood.</p>
            </div>
          </div>

          <div class="col-lg-4 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="150">
            <div class="box">
              <span>Our Vision</span>
              <p>To make positively impactful decisions for our Countries, Continents and the whole world!</p>
            </div>
          </div>

          <div class="col-lg-4 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="300">
            <div class="box">
              <span>Our Values</span>
              <p>We believe that a better childhood leads to a great Nation</p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Why Us Section -->

    
    <section id="cta" class="cta">

    </section>

    <!-- ======= Clients Section ======= -->
    <section id="clients" class="clients">
      
        <?php include('partners.php');?>

      </div>
    </section><!-- End Clients Section -->

    <!-- ======= About Section ======= -->
    <section id="about">
      <div class="container" data-aos="fade-up">
        <div class="row">
          <div class="col-md-12">
            <h3 class="section-title">About Us</h3>
            <div class="section-title-divider"></div>
          </div>
        </div>
      </div>
      <div class="container about-container" data-aos="fade-up" data-aos-delay="200">
        <div class="row">

          <div class="col-lg-6 about-img">
            <img src="assets/img/about-img.jpg" alt="">
          </div>

          <div class="col-md-6 about-content">
            <h2 class="about-title">Tabita foundation</h2>
            <p class="about-text">
              Tabita foundation started in the year of 2021 and since then we have been working together to: <br><b style="color: blue; font-size: 60px;">.</b>Raise awareness among families about positive parenthood and guardianship.<br>

              <b style="color: blue; font-size: 60px;">.</b>Create a safer world for our children, work together as a whole community towards that world so that our children can have a much more fun and healthier childhood and the most self-discovery period for our adolescents and then we can expect a healthier and productive generation to make positively impactful decisions for our Countries, Continents and the whole world!
            </p>
          </div>
        </div>
      </div>
    </section><!-- End About Section -->

    <!-- ======= Services Section ======= -->
    <section id="services">
      <div class="container">
        <div class="row" data-aos="fade-up">
          <div class="col-md-12">
            <h3 class="section-title">Our Services</h3>
            <div class="section-title-divider"></div>
          </div>
        </div>

        <div class="row" data-aos="fade-up" data-aos-delay="200">
          <div class="col-lg-4 col-md-6 service-item">
            <div class="service-icon"><i class="bi bi-briefcase"></i></div>
            <h4 class="service-title"><a href="">Psychotherapy</a></h4>
            <p class="service-description">We provide family Therapy, children and adolescents therpy,trauma healing, we help families to have a positive thinking and positive parenting methods.</p>
          </div>
          <div class="col-lg-4 col-md-6 service-item">
            <div class="service-icon"><i class="bi bi-book"></i></div>
            <h4 class="service-title"><a href="">Education</a></h4>
            <p class="service-description">We make sure that children get proper education by providing them with school fees and required materials to help them in their education.</p>
          </div>
          <div class="col-lg-4 col-md-6 service-item">
            <div class="service-icon"><i class="bi bi-bar-chart"></i></div>
            <h4 class="service-title"><a href="">Health Care</a></h4>
            <p class="service-description">We make sure that children's health is taken care of by helping them to get health insurance and education about health care services.</p>
          </div>
          <div class="col-lg-4 col-md-6 service-item">
            <div class="service-icon"><i class="bi bi-cash"></i></div>
            <h4 class="service-title"><a href="">Financial Support</a></h4>
            <p class="service-description">We provide financial support for children and their families by funding their projects,providing training on how they can develop themselves,by helping them to think about business creation.</p>
          </div>
          <div class="col-lg-4 col-md-6 service-item">
            <div class="service-icon"><i class="bi bi-binoculars"></i></div>
            <h4 class="service-title"><a href="">Safety</a></h4>
            <p class="service-description"> We support children development and provide child protection against any sort of abuse (physical, sexual, emotional, verbal among others). We give children and families guidance in case of any safety related problem..</p>
          </div>
          <div class="col-lg-4 col-md-6 service-item">
            <div class="service-icon"><i class="bi bi-heart"></i></div>
            <h4 class="service-title"><a href="">Love & Belonging</a></h4>
            <p class="service-description"> We promote healthy love relationship : <br>

            <b style=" font-size: 60px;">.</b> Between children and parents/guardians.<br> 
            <b style=" font-size: 60px;">.</b> among and within children themselves</p>
          </div>
        </div>
      </div>
    </section><!-- End Services Section -->

    <!-- ======= Subscrbe Section ======= -->
    <section id="subscribe">

    </section><!-- End Subscrbe Section -->

    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio">
      <div class="container" data-aos="fade-up">
        <div class="row">
          <div class="col-md-12">
            <h3 class="section-title">Products</h3>
            <div class="section-title-divider"></div>
            <p class="section-description">Buy any of these products to donate and contibute to our charity.</p>
          </div>
        </div>


        <div class="row portfolio-container">

          <div class="col-lg-4 col-md-6 portfolio-item">
            <img src="assets/img/1.jpg" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>20L Liquid Detergent</h4>
              <p>8000 Rwf/20L</p>
              <a href="assets/img/1.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="App 1"><i class="bi bi-plus"></i></a>
              <!-- <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bi bi-link"></i></a> -->
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item">
            <img src="assets/img/2.jpg" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>20L Liquid Detergent</h4>
              <p>8000 Rwf/20L</p>
              <a href="assets/img/2.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="App 1"><i class="bi bi-plus"></i></a>
              <!-- <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bi bi-link"></i></a> -->
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item">
            <img src="assets/img/3.jpg" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>5L Liquid Detergent</h4>
              <p>2300 Rwf/5L</p>
              <a href="assets/img/3.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Web 3"><i class="bi bi-plus"></i></a>
              <!-- <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bi bi-link"></i></a> -->
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item">
            <img src="assets/img/4.jpg" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>5L Liquid Detergent</h4>
              <p>2300 Rwf/5L</p>
              <a href="assets/img/4.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="App 2"><i class="bi bi-plus"></i></a>
              <!-- <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bi bi-link"></i></a> -->
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item">
            <img src="assets/img/5.jpg" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>1L Liquid Detergent</h4>
              <p>800 Rwf/1L</p>
              <a href="assets/img/5.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Card 2"><i class="bi bi-plus"></i></a>
              <!-- <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bi bi-link"></i></a> -->
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item">
            <img src="assets/img/6.jpg" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>1L Liquid Detergent</h4>
              <p>800 Rwf/1L</p>
              <a href="assets/img/6.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Web 2"><i class="bi bi-plus"></i></a>
              <!-- <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bi bi-link"></i></a> -->
            </div>
          </div>
        </div>

      </div>
    </section><!-- End Portfolio Section -->

    <!-- ======= Testimonials Section ======= -->
    <!-- <section id="testimonials">
      <div class="container" data-aos="fade-up">
        <div class="row">
          <div class="col-md-12">
            <h3 class="section-title">Testimonials</h3>
            <div class="section-title-divider"></div>
            <p class="section-description">Erdo lide, nora porodo filece, salvam esse se, quod concedimus ses haec dicturum fuisse</p>
          </div>
        </div>

        <div class="row">
          <div class="col-md-3">
            <div class="profile">
              <div class="pic"><img src="assets/img/client-1.jpg" alt=""></div>
              <h4>Saul Goodman</h4>
              <span>Lawless Inc</span>
            </div>
          </div>
          <div class="col-md-9">
            <div class="quote">
              <b><img src="assets/img/quote_sign_left.png" alt=""></b> Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam, risus at semper. <small><img src="assets/img/quote_sign_right.png" alt=""></small>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-9">
            <div class="quote">
              <b><img src="assets/img/quote_sign_left.png" alt=""></b> Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis architecto beatae. <small><img src="assets/img/quote_sign_right.png" alt=""></small>
            </div>
          </div>
          <div class="col-md-3">
            <div class="profile">
              <div class="pic"><img src="assets/img/client-2.jpg" alt=""></div>
              <h4>Sara Wilsson</h4>
              <span>Odeo Inc</span>
            </div>
          </div>
        </div>

      </div>
    </section> --><!-- End Testimonials Section -->

    <!-- ======= Team Section ======= -->
    <section id="team">
      <div class="container" data-aos="fade-up">
        <div class="row">
          <div class="col-md-12">
            <h3 class="section-title">Our Team</h3>
            <div class="section-title-divider"></div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-4">
            <div class="member">
              <div class="pic"><img src="images/20.jpg" alt=""></div>
              <h4>Marlene UWIMANA</h4>
              <span>Founder/ Executive Director</span>
              <div class="social">
                <a href=""><i class="bi bi-twitter"></i></a>
                <a href=""><i class="bi bi-facebook"></i></a>
                <a href="https://www.instagram.com/marlene_wimana/"><i class="bi bi-instagram"></i></a>
                <a href=""><i class="bi bi-linkedin"></i></a>
              </div>
            </div>
          </div>

          <div class="col-md-4">
            <div class="member">
              <div class="pic"><img src="images/10.jpg" alt=""></div>
              <h4>Christella ISHIMWE</h4>
              <span> Family Psychologist</span>
              <div class="social">
                <a href=""><i class="bi bi-twitter"></i></a>
                <a href=""><i class="bi bi-facebook"></i></a>
                <a href=""><i class="bi bi-instagram"></i></a>
                <a href=""><i class="bi bi-linkedin"></i></a>
              </div>
            </div>
          </div>

        </div>
      </div>
    </section><!-- End Team Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">

        <div class="row">
          <div class="col-md-12">
            <h3 class="section-title">CONTACT US</h3>
            <div class="section-title-divider"></div>
          </div>
        </div>

        <div class="row" data-aos="fade-up">
          <div class="col-lg-6">
            <div class="info-box mb-4">
              <i class="bx bx-map"></i>
              <h3>Our Address</h3>
              <p>Kicukiro-Kigali</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="info-box  mb-4">
              <i class="bx bx-envelope"></i>
              <h3>Email Us</h3>
              <p>tabita.foundation1@gmail.com</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="info-box  mb-4">
              <i class="bx bx-phone-call"></i>
              <h3>Call Us</h3>
              <p>+(250) 781 612 726</p>
            </div>
          </div>

        </div>

        <div class="row" data-aos="fade-up">

          <div class="col-lg-6">
            <form method="post">
          <?php if (isset($success)) {
            echo '<div class"alert alert-success">'.$success.'</div>';
          }elseif ($error) {
            echo '<div class"alert alert-error">'.$error.'</div>';
          }?>
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
            </div>
          </form>
          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->
    <!-- ======= Subscrbe Section ======= -->
    <section id="subscribe">

    </section><!-- End Subscrbe Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="copyright">
            &copy; Copyright <strong>TABITA FOUNDATION</strong>. All Rights Reserved
          </div>
          <div class="credits">
            <div class="social-links mt-3">
                <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
              </div>
          </div>
        </div>
      </div>
    </div>
  </footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/typed.js/typed.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>