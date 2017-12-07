
<?php
require "menu2.php";
?>


<div class="container-fluid">
    <div class="row">

        <div class="col-md-2">
        </div>

        <div class="col-md-8">

            <h3 class="text-primary">

                <?php
                // Initialize the session
                session_start();

                // Unset all of the session variables
                $_SESSION = array();

                // Destroy the session.
                session_destroy();

                echo "You have logged out of CONTROL-IT";
                // Redirect to login page
                header("Refresh: 3;url=login.php");
                exit;
                ?>
            </h3>
        </div>

        <div class="col-md-2">
        </div>

    </div>
</div>
</body>
</html>