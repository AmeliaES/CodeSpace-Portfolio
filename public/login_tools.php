<?php # LOGIN HELPER FUNCTIONS.

# Function to load specified or default URL.
function load($page = 'login.php')
{
    # Begin URL with protocol, domain, and current directory.
    $url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']);

    # Remove trailing slashes then append page name to URL.
    $url = rtrim($url, '/\\');
    $url .= '/' . $page;

    # Execute redirect then quit. 
    header("Location: $url");
    exit();
}

# Function to check email address and password. 
function validate($link, $email = '', $pwd = '')
{
    # Initialize errors array.
    $errors = array();

    # Check email field.
    if (empty($email)) {
        $errors[] = 'Enter your email address.';
    } else {
        $e = mysqli_real_escape_string($link, trim($email));
    }

    # Check password field.
    if (empty($pwd)) {
        $errors[] = 'Enter your password.';
    } else {
        $p = mysqli_real_escape_string($link, trim($pwd));
    }

    # On success retrieve user_id, first_name, and last name from 'users' database.
    if (empty($errors)) {
        // Query to retrieve the user's hashed password along with other details
        $q = "SELECT user_id, first_name, last_name, password FROM users WHERE email='$e'";
        $r = mysqli_query($link, $q);

        // Check if we have exactly one result
        if (@mysqli_num_rows($r) == 1) {
            $row = mysqli_fetch_array($r, MYSQLI_ASSOC);

            // Verify the password using password_verify()
            if (password_verify($p, $row['password'])) {
                // Password is correct, return user info
                return array(true, $row);
            } else {
                // Password is incorrect
                $errors[] = 'Email address and password not found.';
            }
        } else {
            // Email not found
            $errors[] = 'Email address and password not found.';
        }
    }
    # On failure retrieve error message/s.
    return array(false, $errors);
}
