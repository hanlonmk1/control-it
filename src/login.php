<!--LOGIN PAGE-->


<?php
// ERROR DISPLAY - ****REMOVE LATER***
ini_set('display_errors', 'On'); 
ini_set('html_errors', 0); 
error_reporting(-1);

// Include config file
require_once 'db_config.php';

// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

/*    Google reCAPTCHA 2.0 (https://developers.google.com/recaptcha/)
      modified from: 
      https://www.bleuken.com/php-demo-using-google-recaptcha-v2-0-sample-php-code/
*/    

	$captcha=$_POST['g-recaptcha-response'];
	$ip = $_SERVER['REMOTE_ADDR'];
	$secretkey = "[6LdZGzsUAAAAAJRrofh50lnbf1ODUcRP1Cq4FhL9]";					
	$response=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secretkey."&response=".$captcha."&remoteip=".$ip);
	$responseKeys = json_decode($response,true);

    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = 'Please enter username.';
    } else{
        $username = trim($_POST["username"]);
    }

    // Check if password is empty
    if(empty(trim($_POST['password']))){
        $password_err = 'Please enter your password.';
    } else{
        $password = trim($_POST['password']);
    }

    // Check input/reCAPTCHA errors before selecting from database
    if (empty($username_err) && empty($password_err) && (intval($responseKeys["success"]) == 1)) {
        // Prepare a select statement
        $sql = "SELECT username, password FROM users WHERE username = ?";

        if($stmt = $mysqli->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("s", $param_username);

            // Set parameters
            $param_username = $username;

            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // Store result
                $stmt->store_result();
                
                // Check if username exists, if yes then verify password
                if($stmt->num_rows == 1){                    
                    // Bind result variables
                    $stmt->bind_result($username, $hashed_password);
                    if($stmt->fetch()){
                        if(password_verify($password, $hashed_password)){
                            /* Password is correct, so start a new session and
                              save the username to the session */
                            session_start();
                            $_SESSION['username'] = $username;
                           if ($_SESSION['username'] == 'Doctor_adm' || $_SESSION['username'] == 'Nurse_adm') {
                        header("location: review1a.php");   
                            }
                            else {
                                header("location: insert.php");}
                        } else {
                            // Display an error message if password is not valid
                            $password_err = 'The password you entered was not valid.';
                        }
                    }
                } else{
                    // Display an error message if username doesn't exist
                    $username_err = 'No account found with that username.';
                }
            } else {
                echo "Error occurred. Please try again later.";
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

        <title>CONTROL-IT! -> Login</title>

        <meta name="description" content="Source code generated using layoutit.com">
        <meta name="author" content="LayoutIt!">

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
        require "menu.php";
        ?>

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
                </div>
                <div class="col-md-6">
                    <div class="jumbotron">
                    
                    <h3 class="text-center text-success">
                        Login to CONTROL-IT:
                    </h3>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                            <label>Username</label>
                            <input type="text" name="username"class="form-control" value="<?php echo $username; ?>">
                            <span class="help-block"><?php echo $username_err; ?></span>
                        </div>    
                        <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control">
                            <span class="help-block"><?php echo $password_err; ?></span>
                        </div>
                        <div class="form-group">
                        <label>Please check reCAPTCHA:</label>
                <div class="g-recaptcha" data-theme="dark" data-sitekey="6LdZGzsUAAAAAKppSBUnvbvddZrn-DZ-qGtWcbQ4"></div>
                <div>
                        <button type="submit" class="btn btn-primary btn-default">
                            LOGIN
                        </button>
                        <button type="reset" class="btn btn-success btn-default">
                            RESET
                        </button>
                        <p class="help-block">
                            Don't have an account? <a href="register.php">Please register here</a>.
                        </p>
                        </div>
                       </div>
                    </form>
                </div>
                    </div>
                <div class="col-md-3">
                </div>
            </div>
    </div>

</body>
</html>