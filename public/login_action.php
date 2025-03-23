<?php # PROCESS LOGIN ATTEMPT.

// Check form submitted.
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Open database connection.
    require '../config/database.php';

    // Get connection, load, and validate functions.
    require('login_tools.php');

    // Check login.
    list($check, $data) = validate($link, $_POST['email'], $_POST['pass']);

    // On success set session data and display logged in page.
    if ($check) {
        // Access session.
        session_start();
        $_SESSION['user_id'] = $data['user_id'];
        $_SESSION['first_name'] = $data['first_name'];
        $_SESSION['last_name'] = $data['last_name'];
        load('products.php');
    } else {
        // Or on failure set errors.
        $errors = $data;
        include('login.php');
    }

    // Close database connection.
    mysqli_close($link);
} else {
    // Continue to display login page on failure.
    include('login.php');
}
