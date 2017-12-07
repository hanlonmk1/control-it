<?php
session_start();
require_once "menu2.php";
?>
<div class="container-fluid">
    <div class="row">

        <div class="col-md-2">
        </div>

        <div class="col-md-8">

            <h3 class="text-primary">
                <?php
                // if-else statement to control access to page if user is logged in or not
                if (isset($_SESSION['username'])) {
                    header("Location: insert.php");
                    
                } else {
                    // Message to user indicating need to login (nl2br is function inserting line breaks at each new line \n)
                    echo nl2br("You must login to access this page\n\nREDIRECTING TO LOGIN");

                    // Redirect to login page
                    header("Refresh: 2;url=login.php");
                }
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