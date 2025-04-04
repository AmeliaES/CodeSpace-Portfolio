<?php
session_start();
include '../templates/nav.php';
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta property="og:title" content="MK Time - Elegance and Precision in Watchmaking">
  <meta property="og:description" content="Discover the story of MK Time, founded in Edinburgh with a passion for creating timeless, elegant timepieces that blend craftsmanship and innovation.">
  <meta property="og:type" content="website">
  <title>MK TIME</title>
  <link rel="icon" type="image/x-icon" href="/images/favicon.ico">
  <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous"> -->
  <link href="https://cdn.jsdelivr.net/npm/bootswatch@5.3.2/dist/lux/bootstrap.min.css" rel="stylesheet">
  <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
  <style>
    /* Custom CSS to style the image banner */
    .image-banner {
      height: 250px;
      background-image: url('assets/images/banner_image.jpg');
      background-size: cover;
      background-position: center;
      display: flex;
      align-items: flex-end;
      justify-content: flex-start;
      color: #d6e6ef;
    }

    .attribution {
      font-size: 0.6em;
      line-height: 1.2;
      background-color: rgb(123, 121, 121);
      color: rgb(28, 28, 28);
    }
  </style>
</head>

<body>
  <div class="container-fluid p-0">
    <div class="image-banner">
      <!-- <h1 class="display-5 p-5">Luxury Swiss Watches</h1> -->
    </div>
    <p class="attribution text-center">"<a rel="noopener noreferrer"
        href="https://www.flickr.com/photos/39516732@N08/3910492126">Rolex Submariner 5512
      </a>" by <a rel="noopener noreferrer" href="https://www.flickr.com/photos/39516732@N08">
        hypo.physe</a> is licensed under <a rel="noopener noreferrer"
        href="https://creativecommons.org/licenses/by-sa/2.0/?ref=openverse">CC BY-SA 2.0
        <img src="https://mirrors.creativecommons.org/presskit/icons/cc.svg"
          style="height: 1em; margin-right: 0.125em; display: inline;" />
        <img src="https://mirrors.creativecommons.org/presskit/icons/by.svg"
          style="height: 1em; margin-right: 0.125em; display: inline;" /><img
          src="https://mirrors.creativecommons.org/presskit/icons/sa.svg"
          style="height: 1em; margin-right: 0.125em; display: inline;" /></a>.</p>
  </div>

  <div class="container-fluid px-3 px-lg-5">
    <div class="row justify-content-center">
        <div class="col-12 col-md-10 col-lg-8 col-xl-6">  
    <div class="row pb-3">
      <div class="col-sm-6">
        <h5>Founded in Edinburgh</h5>
        <p>MK Time is not just a watch brand; it’s a journey of passion, dedication, and innovation. It all started in the beautiful city of Edinburgh, where two visionary women, Maya Kensington and Lily Montgomery, came together with a shared dream to create timepieces that merge elegance, craftsmanship, and the spirit of tradition. Edinburgh, with its rich history and a blend of old-world charm and modern vibrancy, became the perfect backdrop for their venture.</p>
      </div>
      <div class="col-sm-6 order-sm-first">
        <img src="assets/images/edinburgh.jpg" alt="edinburgh" style="width:100%">
      </div>
    </div>
    <div class="row pb-3">
      <div class="col-sm-6">
        <h5>Meet our founders</h5>
        <p>Maya and Lily met while working in luxury goods—Maya, a precision-focused horologist, and Lily, a designer with a passion for fine craftsmanship. Bonding over their love of Swiss watches, they set off on a journey to create something truly unique. After years of sourcing top materials and learning from the best watchmakers, they founded MK Time. Their goal was simple: to design watches that not only told time but also told a story—one of elegance, quality, and modern innovation. For them, a watch is more than an accessory; it's a reflection of who you are.</p>
      </div>
      <div class="col-sm-6 order-sm-last">
        <img src="assets/images/two_people.jpg" alt="edinburgh" style="width:100%">
      </div>
    </div>
    <div class="row pb-3">
      <div class="col-sm-6">
        <h5>Quality repair work</h5>
        <p>At MK Time, we believe that a true luxury experience extends beyond the purchase. That’s why we offer comprehensive watch repair and servicing to ensure your timepiece continues to perform at its best for years to come. Whether it’s a routine maintenance, battery replacement, or more intricate repairs, our expert technicians are dedicated to preserving the craftsmanship and precision of your MK Time watch. Trust us to handle your timepiece with the utmost care and attention, keeping it in perfect working order, just as it was the day you first wore it.</p>
      </div>
      <div class="col-sm-6 order-sm-first">
        <img src="assets/images/watch_repair.jpg" alt="edinburgh" style="width:100%">
      </div>
    </div>
    </div>
    </div>
  </div>
</body>

</html>