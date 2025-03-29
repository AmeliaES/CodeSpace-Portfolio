<?php
include 'session.php';
include '../templates/nav.php';
require '../config/database.php';
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
  <link rel="icon" type="image/x-icon" href="assets/images/favicon.ico">
  <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous"> -->
  <link href="https://cdn.jsdelivr.net/npm/bootswatch@5.3.2/dist/lux/bootstrap.min.css" rel="stylesheet">
  <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</head>

<body>
  <div class="container-fluid">
    <h4 class="row justify-content-center">Products</h4>
    <div class="row justify-content-center">
      <div class="col-lg-8">

        <div class="card-group">
          <?php
          // Query to select all records from the products table
          $query = "SELECT * FROM products";
          $result = mysqli_query($link, $query);

          if (mysqli_num_rows($result) > 0) {
            echo '<div class="container"><div class="row row-gap-4">';
            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
              echo '
              <div class="col-md-4">
                <div class="card text-center m-3 d-flex h-100">
                  <img src="../' . htmlspecialchars($row['item_img']) . '" class="card-img-top" alt="...">
                  <div class="card-body d-flex flex-column">
                    <h5 class="card-title">' . htmlspecialchars($row['item_name']) . '</h5>
                    <p class="card-text">' . htmlspecialchars($row['item_desc']) . '</p>
                  </div>
                  <div class="card-footer bg-light">
                    <ul class="list-group list-group-flush">
                      <li class="list-group-item">' . htmlspecialchars($row['item_price']) . '</li>
                      <li class="list-group-item">
                        <a href="add_to_cart.php?id=' . htmlspecialchars($row['item_id']) . '" class="btn btn-primary">Add to basket</a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>';
            }
            echo '</div></div>';
            // Close database connection.
            mysqli_close($link);
          } else {
            echo '
            <div class="col-md-4">
              <div class="card text-center m-3">
              <div class="card-body">
                <h5 class="card-title">No Products Available</h5>
                <p class="card-text">There are currently no items in the table to display.</p>
              </div>
              </div>
            </div>';
          }
          ?>
        </div>
      </div>
    </div>

  </div>
</body>

</html>