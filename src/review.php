<!--
review.php
@author Mark Hanlon x16135571@ncirl.ie 

HTML/CSS/Javascript/Bootstrap modified from:
http://www.layoutit.com/build

<REVIEW RESULTS PAGE - for patient results to view own results whilst logged-in>

-->
<?php
//start session
session_start();
//include config file to make the database connection
require_once "db_config.php";

//USE PREPARED STATEMENT TO SELECT DATA 

//MySQL statement to retrieve most recent 7 user results of the logged-in user
$sql = "SELECT * FROM DIAB1_TABLE WHERE username = 
    (SELECT username FROM users WHERE username = '" . ($_SESSION['username']) . "')ORDER BY Date DESC LIMIT 7";

//Prepare the select statement.
    $stmt = $mysqli->prepare($sql);

//Execute the statement.
    $stmt->execute();
    
// Pull result set
    $result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>CONTROL-IT! -> Check results</title>

        <meta name="description" content="HTML/CSS source code generated using layoutit.com">
        <meta name="author" content="Mark Hanlon x16135571@ncirl.ie">

        <!--Styles from Layoutit! Bootstrap builder-->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">

        <!--Default javascripts from Layoutit! Bootstrap builder-->
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/scripts.js"></script>

    </head>
    <body>

        <?php
        //include CSS/HTML from menu.php on this page
        require "menu1.php";
        ?>
            <div class="container-fluid">
                <div class="row">
                <div class="col-md-3">
                    </div>                    
                <div class="col-md-6">
                        <h3 class="text-primary">
                        Review your recent CONTROL-IT test results:
                        </h3>
                    </div>
                <div class="col-md-3">
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                    </div>
                </div>
            </div>
            <div class="row">
            <div class="col-md-3">
                </div>
                <div class="col-md-6">
                    <!--Table to display user results of the logged-in user-->
                    <table class="table table-condensed table-bordered">
                        <thead>
                            <tr class="success">
                                <th>Record ID</th>
                                <th>Patient</th>
                                <th>Date</th>
                                <th>AM</th>
                                <th>PM</th>
                                <th>DailyAvg</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php

                            while ($row = $result->fetch_array()) {
                                echo "<tr>";
                                echo "<td>" . $row['ID'] . "</td>";
                                echo "<td>" . $row['username'] . "</td>";
                                echo "<td>" . $row['Date'] . "</td>";
                                echo "<td>" . $row['AM'] . "</td>";
                                echo "<td>" . $row['PM'] . "</td>";
                                echo "<td>" . $row['d_avg'] . "</td>";
                                echo "</tr>";
                            }
                            ?>    
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </body>
</html>