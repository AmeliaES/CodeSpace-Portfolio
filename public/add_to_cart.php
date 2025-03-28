<?php
# Start the session if it hasn't been started already.
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

# Include necessary files.
include 'session-cart.php';
require '../config/database.php';
include '../templates/nav.php';

# Get passed product id and assign it to a variable.
if (isset($_GET['id'])) $id = $_GET['id'];

# Retrieve selective item data from 'products' database table.
$query = "SELECT * FROM products WHERE item_id = $id";
$result = mysqli_query($link, $query);
if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

    # Check if cart already contains one of this product id.
    if (isset($_SESSION['cart'][$id])) {
        # Add one more of this product.
        $_SESSION['cart'][$id]['quantity']++;
        echo '
        <div class="container mt-3">
            <div class="alert alert-secondary" role="alert">
                <p>Another ' . htmlspecialchars($row["item_name"]) . ' has been added to your cart.</p>
                <a href="products.php" class="btn btn-primary btn-sm">Continue Shopping</a>
                <a href="cart.php" class="btn btn-secondary btn-sm">View Your Cart</a>
            </div>
        </div>';
    } else {
        # Or add one of this product to the cart.
        $_SESSION['cart'][$id] = array('quantity' => 1, 'price' => $row['item_price']);
        echo '
        <div class="container mt-3">
            <div class="alert alert-secondary" role="alert">
                <p>A ' . htmlspecialchars($row["item_name"]) . ' has been added to your cart.</p>
                <a href="products.php" class="btn btn-primary btn-sm">Continue Shopping</a>
                <a href="cart.php" class="btn btn-secondary btn-sm">View Your Cart</a>
            </div>
        </div>';
    }
}

# Close database connection.
mysqli_close($link);
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
  <link rel="icon" type="image/x-icon" href="../assets/images/favicon.ico">
  <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous"> -->
  <link href="https://cdn.jsdelivr.net/npm/bootswatch@5.3.2/dist/lux/bootstrap.min.css" rel="stylesheet">
  <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</head>

