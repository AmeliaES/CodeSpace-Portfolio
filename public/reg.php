<?php
include '../templates/nav.php';

session_start(); // Start session for toast messages

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  // Connect to the database.
  require '../config/database.php';

  # Initialize an error array.
  $errors = array();

  // Get the form data, check for empty values in fields that are required.
  if (empty($_POST['firstName'])) {
    $errors[] = 'Please enter your first name.';
  } else {
    $firstName = mysqli_real_escape_string($link, trim($_POST['firstName']));
  }

  if (empty($_POST['lastName'])) {
    $errors[] = 'Please enter your last name.';
  } else {
    $lastName = mysqli_real_escape_string($link, trim($_POST['lastName']));
  }

  if (empty($_POST['email'])) {
    $errors[] = 'Please enter your email address.';
  } else {
    $email = mysqli_real_escape_string($link, trim($_POST['email']));
  }

  if (empty($_POST['phone'])) {
    $errors[] = 'Please enter your phone number.';
  } else {
    $phone = mysqli_real_escape_string($link, trim($_POST['phone']));
  }

  if (empty($_POST['adLine1'])) {
    $errors[] = 'Please enter your address line 1.';
  } else {
    $adLine1 = mysqli_real_escape_string($link, trim($_POST['adLine1']));
  }

  if (empty($_POST['adLine2'])) {
    $errors[] = 'Please enter your address line 2.';
  } else {
    $adLine2 = mysqli_real_escape_string($link, trim($_POST['adLine2']));
  }

  if (empty($_POST['country'])) {
    $errors[] = 'Please enter your country.';
  } else {
    $country = mysqli_real_escape_string($link, trim($_POST['country']));
  }

  // check password fields are not empty
  if (empty($_POST['password'])) {
    $errors[] = 'Please enter a password.';
  } else {
    $password = mysqli_real_escape_string($link, trim($_POST['password']));
  }

  if (empty($_POST['confirmPassword'])) {
    $errors[] = 'Please confirm your password.';
  } else {
    $confirmPassword = mysqli_real_escape_string($link, trim($_POST['confirmPassword']));
  }

  // Check passwords match
  if ($password != $confirmPassword) {
    $errors[] = 'Passwords do not match.';
  }

  // Check if email address is a valid email
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = "Invalid email format";
  }

  // Check if email address is already registered
  if (empty($errors)) {
    $query = "SELECT user_id FROM users WHERE email='$email'";
    $result = @mysqli_query($link, $query);
    // Check if query returns any rows, as this means email already registered
    if (mysqli_num_rows($result) != 0) {
      $errors[] =
        'Email address already registered. <a class="alert-link" href="login.php">Sign In Here.</a>';
    }
  }

  // If no errors, insert user data into the database
  // The NOW() function is used to insert the current timestamp as the registration date.
  if (empty($errors)) {
    $passwordHashed = password_hash($password, PASSWORD_DEFAULT);
    $query = "INSERT INTO users (first_name, last_name, email, phone_number, address_line_1, address_line_2, country, password, reg_date) 
	VALUES ('$firstName', '$lastName', '$email', '$phone', '$adLine1', '$adLine2', '$country', '$passwordHashed', NOW() )";
    $result = @mysqli_query($link, $query);

    if ($result) {
      // Success: store success message in session and redirect to login page
      $_SESSION['toast_msg'] = "You are now registered! <a href='login.php' class='text-white fw-bold'>Login here</a>";
      $_SESSION['toast_type'] = "success"; // Set toast type to success

      // Redirect to the reg page after success
      header("Location: reg.php");
      exit(); // Stop further script execution after the redirect
    } else {
      // Database error: store error message in session
      $_SESSION['toast_msg'] = "There was an error registering your account. Please try again.";
      $_SESSION['toast_type'] = "danger"; // Set toast type to danger
    }
  } else {
    // If there are validation errors, store the error messages in session
    $_SESSION['toast_msg'] = implode("<br>", $errors); // Concatenate errors with <br>
    $_SESSION['toast_type'] = "danger"; // Set toast type to danger
  }

  // Close database connection (no redirect if errors)
  mysqli_close($link);
}
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
</head>

<body>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <h2 class="text-center mt-5">Register</h2>
        <form id="registrationForm" class="mb-5" method="POST" action="reg.php">
          <div class="row mb-3">
            <div class="col-md-6">
              <label for="firstName" class="form-label">First Name</label>
              <input type="text"
                class="form-control"
                id="firstName"
                name="firstName"
                required
                placeholder="Enter your first name"
                value="<?php if (isset($_POST['firstName'])) echo $_POST['firstName']; ?>"> <!-- The value attribute is used to retain and display previously submitted values if the form is resubmitted due to errors.  -->
            </div>
            <div class="col-md-6">
              <label for="lastName" class="form-label">Last Name</label>
              <input type="text"
                class="form-control"
                id="lastName"
                name="lastName"
                required
                placeholder="Enter your last name"
                value="<?php if (isset($_POST['lastName'])) echo $_POST['lastName']; ?>">
            </div>
          </div>

          <div class="row mb-3">
            <label for="email" class="form-label">Email Address</label>
            <input type="email"
              class="form-control"
              id="email"
              name="email"
              required
              placeholder="Enter your email address"
              value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>">
            <label for="phone" class="form-label">Phone Number</label>
            <input type="tell"
              class="form-control"
              id="phone"
              name="phone"
              required
              placeholder="Enter your phone number"
              value="<?php if (isset($_POST['phone'])) echo $_POST['phone']; ?>">
            <label for="adLine1" class="form-label">Address Line 1</label>
            <input type="text"
              class="form-control"
              id="adLine1"
              name="adLine1"
              required
              placeholder="Enter your address line 1"
              value="<?php if (isset($_POST['adLine1'])) echo $_POST['adLine1']; ?>">
            <label for="adLine2" class="form-label">Address Line 2</label>
            <input type="text"
              class="form-control"
              id="adLine2"
              name="adLine2"
              required
              placeholder="Enter your address line 2"
              value="<?php if (isset($_POST['adLine2'])) echo $_POST['adLine2']; ?>">
            <label for="country" class="form-label">Country</label>
            <input type="text"
              class="form-control"
              id="country"
              name="country"
              required
              placeholder="Enter your country"
              value="<?php if (isset($_POST['country'])) echo $_POST['country']; ?>">
            <label for="password" class="form-label">Password</label>
            <input type="password"
              class="form-control"
              id="password"
              name="password"
              required
              placeholder="Password">
            <label for="confirmPassword" class="form-label">Confirm Password</label>
            <input type="password"
              class="form-control"
              id="confirmPassword"
              name="confirmPassword"
              required
              placeholder="Confirm Password">
          </div>
          <button type="submit" class="btn btn-primary w-100">Register</button>
          <div class="text-center mt-3">
            <span>Already have an account? <a href="login.php">Login here</a></span>
          </div>
        </form>

      </div>
    </div>
  </div>
  <!-- Toast Container -->
  <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
    <div id="toastMessage" class="toast" role="alert" aria-live="assertive" aria-atomic="true" autohide="false">
      <div class="d-flex">
        <div class="toast-body" id="toastText">
          Toast message
        </div>
        <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
      </div>
    </div>
  </div>
  <?php
  if (isset($_SESSION['toast_msg'])):
  ?>
    <script>
      document.addEventListener('DOMContentLoaded', function() {
        // Set the message in the toast
        document.getElementById('toastText').innerHTML = `<?php echo $_SESSION['toast_msg']; ?>`;
        // Change the toast color based on success or error
        document.getElementById('toastMessage').classList.add('bg-<?php echo $_SESSION['toast_type']; ?>');
        var toast = new bootstrap.Toast(document.getElementById('toastMessage'));
        toast.show();
      });
    </script>
  <?php
    // Clear session messages after display
    unset($_SESSION['toast_msg']);
    unset($_SESSION['toast_type']);
  endif;
  ?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>