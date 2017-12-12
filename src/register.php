<!--
register.php
@author Mark Hanlon x16135571@ncirl.ie  / tutorialrepublic.com

HTML/CSS/Javascript/Bootstrap modified from:
http://www.layoutit.com/build

<REGISTRATION PAGE - user nominates username & password to register with the application here>

Registration/Login system is modified from: 
https://www.tutorialrepublic.com/php-tutorial/php-mysql-login-system.php

Also uses elements from: 
Google reCAPTCHA 2.0 (https://developers.google.com/recaptcha/)
https://www.bleuken.com/php-demo-using-google-recaptcha-v2-0-sample-php-code/
-->
<?php

//include config file to make the database connection
require_once 'db_config.php';

// Define variables and initialize with empty values
$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST"){

    /*    Google reCAPTCHA 2.0 (https://developers.google.com/recaptcha/)
      modified from:
      https://www.bleuken.com/php-demo-using-google-recaptcha-v2-0-sample-php-code/
     */
	
    $captcha = $_POST['g-recaptcha-response'];
    $ip = $_SERVER['REMOTE_ADDR'];
    $secretkey = "[6LdZGzsUAAAAAJRrofh50lnbf1ODUcRP1Cq4FhL9]";
    $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=" . $secretkey . "&response=" . $captcha . "&remoteip=" . $ip);
    $responseKeys = json_decode($response, true);

    // Validate username
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter a username.";
        // below validates that the username only contains alphanumeric and underscore characters, \w is built-in PHP expression
    } elseif((trim($_POST['username'])) != preg_replace("/[^\w]+/", "",(trim($_POST['username'])))){
        $username_err = "Username must only contain alphanumeric or underscore characters.";    
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE username = ?";

        if($stmt = $mysqli->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("s", $param_username);

            // Set parameters
            $param_username = trim($_POST["username"]);

            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // store result
                $stmt->store_result();
                
                if($stmt->num_rows == 1){
                    $username_err = "This username is already taken.";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }

        // Close statement
        $stmt->close();
    }

    // Validate password
    if(empty(trim($_POST['password']))){
        $password_err = "Please enter a password.";
    } elseif(strlen(trim($_POST['password'])) < 8){
        $password_err = "Password must contain at least 8 characters.";
        // below validates that the password only contains alphanumeric and underscore characters, \w is built-in PHP expression
    } elseif((trim($_POST['password'])) != preg_replace("/[^\w]+/", "",(trim($_POST['password'])))){
        $password_err = "Password must only contain alphanumeric or underscore characters.";    
    } else{
        $password = trim($_POST['password']);
    }

    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = 'Please confirm password.';
    } else{
        $confirm_password = trim($_POST['confirm_password']);
        if($password != $confirm_password){
            $confirm_password_err = 'Password did not match.';
        }
    }

    // Check input/reCAPTCHA errors before inserting in database
    if (empty($username_err) && empty($password_err) && empty($confirm_password_err) && (intval($responseKeys["success"]) == 1)) {

        // Prepare an insert statement
        $sql = "INSERT INTO users (username, password) VALUES (?, ?)";

        if($stmt = $mysqli->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("ss", $param_username, $param_password);

            // Set parameters
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // Redirect to login page
                header("location: login.php");
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }

        // Close statement
        $stmt->close();
    }

    // Close connection
    $mysqli->close();
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>CONTROL-IT!- Register</title>

        <meta name="description" content="HTML/CSS source code generated using layoutit.com">
        <meta name="author" content="Mark Hanlon x16135571@ncirl.ie">

        <!--Styles from Layoutit! Bootstrap builder-->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
        
        <!--Default javascripts from Layoutit! Bootstrap builder-->
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/scripts.js"></script>

        <!--Google reCAPTCHA 2.0 api script-->
        <script src='https://www.google.com/recaptcha/api.js'></script>

    </head>
    <body>
        
        <?php
        require_once "menu.php";
        ?>
        
            <div class="container-fluid">
            <div class="col-md-3">
                </div>

            <div class="col-md-6">
                <div class="jumbotron">
                    <h3 class="text-center">
                        Register for CONTROL-IT:
                    </h3>
                    <form role="form"action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                            <label>Username (only alphanumeric characters or underscore) </label>
                            <input type="text" name="username"class="form-control" value="<?php echo $username; ?>">
                            <span class="help-block"><?php echo $username_err; ?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                            <label>Password (at least 8 characters & only alphanumeric or underscore)</label>
                            <input type="password" name="password" class="form-control" value="<?php echo $password; ?>">
                            <span class="help-block"><?php echo $password_err; ?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                            <label>Confirm Password</label>
                            <input type="password" name="confirm_password" class="form-control" value="<?php echo $confirm_password; ?>">
                            <span class="help-block"><?php echo $confirm_password_err; ?></span>
                        </div>
                        <div class="form-group">
                            <label>Please check reCAPTCHA:</label>
                            <div class="g-recaptcha" data-theme="dark" data-sitekey="6LdZGzsUAAAAAKppSBUnvbvddZrn-DZ-qGtWcbQ4"></div>
                            <div>
                        <button type="submit" class="btn btn-primary btn-default">
                            REGISTER
                        </button>
                        <button type="reset" class="btn btn-warning btn-default">
                            RESET
                        </button>
                            </div>
                        </div>
                    </form>
                </div>
                </div>
            <div class="col-md-3">
            </div>
        </div>

</body>
</html>
