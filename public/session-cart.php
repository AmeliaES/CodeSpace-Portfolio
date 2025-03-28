<?php
# Start the session if it hasn't been started already.
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

# Initialize the cart if it doesn't exist.
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}
?>