<!--
db_insert.php
@author Mark Hanlon x16135571@ncirl.ie

HTML/CSS/Javascript/Bootstrap modified from:
http://www.layoutit.com/build

<DB INSERT - This file is used to insert user input from 'Enter results' form into database>

-->
<?php
//include CSS/HTML from menu2.php on this page
require_once "menu2.php";
?>

<div class="container-fluid">
    <div class="row">

        <div class="col-md-2">
        </div>

        <div class="col-md-8">

            <h3 class="text-primary">

                <?php
                //start session
                session_start();
                //include config file to make the database connection
                require_once "db_config.php";


                // Escape user inputs for security using $mysqli->real_escape_string
                $username = $mysqli->real_escape_string($_SESSION['username']);
                $datepicker = $mysqli->real_escape_string($_REQUEST['datepicker']);
                $date = date('Y-m-d', strtotime(str_replace('-', '/', $datepicker)));
                $AM = $mysqli->real_escape_string($_REQUEST['AM']);
                $PM = $mysqli->real_escape_string($_REQUEST['PM']);
                $d_avg = ($AM + $PM)/2;

                // Attempt insert query execution 
                // (This MySQL statement allows for the case where user re-enters values for the same date, AM, PM, d_avg are updated) 
                $sql = "INSERT into DIAB1_TABLE (username, Date, AM, PM, d_avg) VALUES ('$username', '$date', '$AM', '$PM', $d_avg)
                        ON DUPLICATE KEY UPDATE AM='$AM', PM='$PM', d_avg= $d_avg";

                if ($mysqli->query($sql) === true) {
                    echo "Results entered successfully by $username";
                } else {
                    echo "ERROR: Could not execute $sql. " . $mysqli->error;
                }

                // Close connection
                $mysqli->close();
                //Redirect to check results page
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