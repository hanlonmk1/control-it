
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
                session_start();
                require "db_config.php";


                // Escape user inputs for security
                $username = $mysqli->real_escape_string($_SESSION['username']);
                $datepicker = $mysqli->real_escape_string($_REQUEST['datepicker']);
                $date = date('Y-m-d', strtotime(str_replace('-', '/', $datepicker)));
                $AM = $mysqli->real_escape_string($_REQUEST['AM']);
                $PM = $mysqli->real_escape_string($_REQUEST['PM']);
                $d_avg = ($AM + $PM)/2;

                // Attempt insert query execution
                $sql = "INSERT into DIAB1_TABLE (username, Date, AM, PM, d_avg) VALUES ('$username', '$date', '$AM', '$PM', $d_avg)";

                if ($mysqli->query($sql) === true) {
                    echo "Results entered successfully by $username";
                } else {
                    echo "ERROR: Could not execute $sql. " . $mysqli->error;
                }

                // Close connection
                $mysqli->close();
                header("Refresh: 3;url=review.php");
                ?>
            </h3>
        </div>

        <div class="col-md-2">
        </div>

    </div>
</div>
</body>
</html>