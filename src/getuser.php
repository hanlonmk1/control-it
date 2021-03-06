<!--
getuser.php
@author Mark Hanlon x16135571@ncirl.ie 

HTML/CSS/Javascript/Bootstrap modified from:
http://www.layoutit.com/build

<GETUSER file - uses mySQL Select statement to generate table of selected user results from dropdown in review1a.php>

Uses elements from: 
https://www.w3schools.com/php/php_ajax_database.asp
http://thisinterestsme.com/populate-dropdown-list-mysql/
-->
<!DOCTYPE html>
<html>
<head>
            <link href="css/bootstrap.min.css" rel="stylesheet">
            <link href="css/style.css" rel="stylesheet">

            <script src="js/jquery.min.js"></script>
            <script src="js/bootstrap.min.js"></script>
            <script src="js/scripts.js"></script>        
</head>
<body>

        <div class="row">
            <div class="col-md-2">
            </div>        
                    <div class="col-md-10">
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
require "db_config.php";
$q = intval($_GET['q']);

//USE PREPARED STATEMENT TO SELECT DATA 

//mySQL Select statement to generate table of selected user results
mysqli_select_db($mysqli,"test");
$sql="SELECT * FROM DIAB1_TABLE WHERE username = (SELECT username FROM users WHERE id = '".$q."') ORDER BY Date DESC LIMIT 10";

//Prepare the select statement.
    $stmt = $mysqli->prepare($sql);

//Execute the statement.
    $stmt->execute();
    
// Pull result set
    $result = $stmt->get_result();


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
mysqli_close($con);
?>
                    </tbody>
                </table>
            </div>
        </div>
                       
</body>
</html>
