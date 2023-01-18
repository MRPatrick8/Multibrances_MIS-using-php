
<!-- <link href='https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css' rel='stylesheet'> -->
<link href='' rel='stylesheet'>
<script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
<style>
    .stretch-card>.card {
    width: 100%;
    min-width: 100%
}

body {
    background-color: #f9f9fa
}

.flex {
    -webkit-box-flex: 1;
    -ms-flex: 1 1 auto;
    flex: 1 1 auto
}

@media (max-width:991.98px) {
    .padding {
        padding: 1.5rem
    }
}

.padding {
    padding: 3rem
}

.owl-carousel .item {
    margin: 5px
}

.owl-carousel .item img {
    display: block;
    width: 100%;
    height: auto;
    margin-left: 30px;
}

.owl-carousel .item {
    margin: 3px;
    padding-left: 5px;
}

.owl-carousel {
    margin-bottom: 20px
}

.bottom-left {
    position: absolute;
    bottom: 8px;
    left: 16px;
    color: pink;
}
.card{
    width: 100%;
}
.section-title h2 {
  font-size: 32px;
  font-weight: 700;
  text-transform: uppercase;
  margin-bottom: 20px;
  padding-bottom: 0;
  color: #191919;
  position: relative;
  z-index: 2;
}
@media (max-width:768px) {
    .padding {
        padding: 1rem
    }
    .owl-carousel .item img {
    display: block;
    width: 60%;
    height: auto
  }
}

}
</style>
<link href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.js"></script>
<div class="page-content page-container" id="page-content">
    <div class="padding">
        <div class="container" data-aos="zoom-in">
        <div class="row container-fluid">
            
            <div class="col-lg-12 grid-margin ">
                        <div class="owl-carousel">
                            <div class="item"> <img src="assets/img/38.jpg" alt="image" />
                            </div>
                            <div class="item"> <img src="assets/img/39.jpg" alt="image" />
                            </div>
                            <div class="item"> <img src="assets/img/40.jpg" alt="image" />
                            </div>
                            <div class="item"> <img src="assets/img/41.jpg" alt="image" />
                            </div>
                            <div class="item"> <img src="assets/img/42.jpg" alt="image" />
                            </div>
                            <div class="item"> <img src="assets/img/36.jpg" alt="image" />
                            </div>
                            
                </div>
            </div>
        </div>
    </div>
</div>
<script type='text/javascript' src='https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js'></script>
<script type='text/javascript' src=''></script>
<script type='text/javascript' src=''></script>
<script type='text/Javascript'>$(document).ready(function() {

$(".owl-carousel").owlCarousel({

autoPlay: 3000,
items : 1,
itemsDesktop : [1199,1],
itemsDesktopSmall : [786,2],
center: true,
nav:true,
loop:true,
responsive: {
1000: {
items: 1
}
}
});

});</script>                          