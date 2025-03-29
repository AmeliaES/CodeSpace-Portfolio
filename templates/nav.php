<nav class="navbar navbar-expand-lg bg-white">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">MK TIME</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="about.php">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="products.php">Products</a>
        </li>
      </ul>
      <span class="navbar-text">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <?php if (isset($_SESSION['user_id'])): ?>
            <li class="nav-item">
              <a class="nav-link" href="logout.php">Logout</a>
            </li>
          <?php else: ?>
            <li class="nav-item">
              <a class="nav-link" href="login.php">Login</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="reg.php">Register</a>
            </li>
          <?php endif; ?>
          <!-- Show Cart icon with item count if cart has items -->
          <?php if (!empty($_SESSION['cart'])): ?>
            <?php
            // Calculate total number of items in the cart
            $cartItemCount = 0;
            foreach ($_SESSION['cart'] as $item) {
              $cartItemCount += $item['quantity'];
            }
            ?>
            <li class="nav-item">
              <a class="nav-link" href="cart.php">
                <i class="bi bi-cart-fill"></i>
                <span class="badge rounded-pill bg-light ms-1"><?php echo $cartItemCount; ?></span> <!-- Cart item count -->
              </a>
            </li>
          <?php endif; ?>
        </ul>
      </span>
    </div>
  </div>
</nav>