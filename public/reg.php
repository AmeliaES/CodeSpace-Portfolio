<?php
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
</head>

<body>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <h2 class="text-center mt-5">Register</h2>
        <form id="registrationForm" class="mb-5" method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
          <div class="row mb-3">
            <div class="col-md-6">
              <label for="regFirstName" class="form-label">First Name</label>
              <input type="text"
                class="form-control"
                id="regFirstName"
                name="regFirstName"
                required
                placeholder="Enter your first name"
                value="<?php if (isset($_POST['firstName'])) echo $_POST['firstName']; ?>"> <!-- The value attribute is used to retain and display previously submitted values if the form is resubmitted due to errors.  -->
            </div>
            <div class="col-md-6">
              <label for="regLastName" class="form-label">Last Name</label>
              <input type="text"
                class="form-control"
                id="regLastName"
                name="regLastName"
                required
                placeholder="Enter your last name"
                value="<?php if (isset($_POST['lastName'])) echo $_POST['lastName']; ?>">
            </div>
          </div>

          <div class="row mb-3">
            <label for="regEmail" class="form-label">Email Address</label>
            <input type="email"
              class="form-control"
              id="regEmail"
              name="regEmail"
              required
              placeholder="Enter your email address"
              value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>">
            <label for="regPhone" class="form-label">Phone Number</label>
            <input type="number"
              class="form-control"
              id="regPhone"
              name="regPhone"
              required
              placeholder="Enter your phone number"
              value="<?php if (isset($_POST['phone'])) echo $_POST['phone']; ?>">
            <label for="regAdLine1" class="form-label">Address Line 1</label>
            <input type="text"
              class="form-control"
              id="regAdLine1"
              name="regAdLine1"
              required
              placeholder="Enter your address line 1"
              value="<?php if (isset($_POST['adLine1'])) echo $_POST['adLine1']; ?>">
            <label for="regAdLine2" class="form-label">Address Line 2</label>
            <input type="text"
              class="form-control"
              id="regAdLine2"
              name="regAdLine2"
              required
              placeholder="Enter your address line 2"
              value="<?php if (isset($_POST['adLine2'])) echo $_POST['adLine2']; ?>">
            <label for="regCountry" class="form-label">Country</label>
            <input type="text"
              class="form-control"
              id="regCountry"
              name="regCountry"
              required
              placeholder="Enter your country"
              value="<?php if (isset($_POST['country'])) echo $_POST['country']; ?>">
            <label for="regPassword" class="form-label">Password</label>
            <input type="password"
              class="form-control"
              id="regPassword"
              name="regPassword"
              required
              placeholder="Password">
            <label for="regConfirmPassword" class="form-label">Confirm Password</label>
            <input type="password"
              class="form-control"
              id="regConfirmPassword"
              name="regConfirmPassword"
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
</body>

</html>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  // Connect to the database.
  require '../includes/database.php';

  # Initialize an error array.
  $errors = array();

  // Get the form data, check for empty values in fields that are required.
  if (empty($_POST['regFirstName'])) {
    $errors[] = 'Please enter your first name.';
  } else {
    $firstName = mysqli_real_escape_string($link, trim($_POST['regFirstName']));
  }

  if (empty($_POST['regLastName'])) {
    $errors[] = 'Please enter your last name.';
  } else {
    $lastName = mysqli_real_escape_string($link, trim($_POST['regLastName']));
  }

  if (empty($_POST['regEmail'])) {
    $errors[] = 'Please enter your email address.';
  } else {
    $email = mysqli_real_escape_string($link, trim($_POST['regEmail']));
  }

  if (empty($_POST['regPhone'])) {
    $errors[] = 'Please enter your phone number.';
  } else {
    $phone = mysqli_real_escape_string($link, trim($_POST['regPhone']));
  }

  if (empty($_POST['regAdLine1'])) {
    $errors[] = 'Please enter your address line 1.';
  } else {
    $adLine1 = mysqli_real_escape_string($link, trim($_POST['regAdLine1']));
  }

  if (empty($_POST['regAdLine2'])) {
    $errors[] = 'Please enter your address line 2.';
  } else {
    $adLine2 = mysqli_real_escape_string($link, trim($_POST['regAdLine2']));
  }

  if (empty($_POST['regCountry'])) {
    $errors[] = 'Please enter your country.';
  } else {
    $country = mysqli_real_escape_string($link, trim($_POST['regCountry']));
  }

  // check password fields are not empty
  if (empty($_POST['regPassword'])) {
    $errors[] = 'Please enter a password.';
  } else {
    $password = mysqli_real_escape_string($link, trim($_POST['regPassword']));
  }

  if (empty($_POST['regConfirmPassword'])) {
    $errors[] = 'Please confirm your password.';
  } else {
    $confirmPassword = mysqli_real_escape_string($link, trim($_POST['regConfirmPassword']));
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
    $query = "INSERT INTO users (first_name, last_name, email, phone_number, address_line_1, address_line_2, country, password, reg_date) 
	VALUES ('$firstName', '$lastName', '$email', '$phone', '$adLine1', '$adLine2', '$country', '$password', NOW() )";
    $result = @mysqli_query($link, $query);
    if ($result) {
      echo '
      <p>You are now registered.</p>
	    <a class="alert-link" href="login.php">Login Here.</a>';
    }

    # Close database connection.
    mysqli_close($link);
    exit();
  } else {
    echo '<h4 class="alert-heading" id="err_msg">The following error(s) occurred:</h4>';
    foreach ($errors as $msg) {
      echo " - $msg<br>";
    }
    echo '<p>Please try again.</p></div>';
    # Close database connection.
    mysqli_close($link);
  }
}
?>