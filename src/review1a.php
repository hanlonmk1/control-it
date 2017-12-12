<!--
review1a.php
@author Mark Hanlon x16135571@ncirl.ie 

HTML/CSS/Javascript/Bootstrap modified from:
http://www.layoutit.com/build

<REVIEW RESULTS PAGE - for doctor/nurse to review patient results>

Uses elements from: 
https://www.w3schools.com/php/php_ajax_database.asp
http://thisinterestsme.com/populate-dropdown-list-mysql/
-->
<?php

//start session
session_start();
//include config file to make the database connection
require_once "db_config.php";

//this page should only be accessed by the admin users 'ControlDoc' or 'ControlNurse'
if ($_SESSION['username'] == 'ControlDoc' || $_SESSION['username'] == 'ControlNurse') {

//USE PREPARED STATEMENT TO SELECT DATA    
    
//Select statement to retrieve required data
    $sql = "SELECT ID, username FROM users";
    
//Prepare the select statement.
    $stmt = $mysqli->prepare($sql);

//Execute the statement.
    $stmt->execute();
    
// Pull result set
    $result = $stmt->get_result();

//Retrieve the rows using fetch_all
    $users = $result->fetch_all();
    ?>                              

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
            
            <!--AJAX from https://www.w3schools.com/php/php_ajax_database.asp--> 
            <script>
                function showUser(str) {
                    if (str == "") {
                        document.getElementById("txtHint").innerHTML = "";
                        return;
                    } else {
                        if (window.XMLHttpRequest) {
                            // code for IE7+, Firefox, Chrome, Opera, Safari
                            xmlhttp = new XMLHttpRequest();
                        } else {
                            // code for IE6, IE5
                            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                        }
                        xmlhttp.onreadystatechange = function () {
                            if (this.readyState == 4 && this.status == 200) {
                                document.getElementById("txtHint").innerHTML = this.responseText;
                            }
                        };
                        xmlhttp.open("GET", "getuser.php?q=" + str, true);
                        xmlhttp.send();
                    }
                }
            </script>

        </head>
        <body>

        <?php
        //include CSS/HTML from menu.php on this page
        require "menu.php";
        ?>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-2">
                    </div>                     
                    <div class="col-md-8">
                        <h3 class="text-primary">
                            Review CONTROL-IT test results:
                        </h3>
                    </div>
                    <div class="col-md-2">
                            </div> 
                    </div>
                </div> 
                    <div class="container-fluid">
                <div class="row">
                    <div class="col-md-2">
                    </div>                     
                    <div class="col-md-8">
                        <form>
                            <select name="users" onclick="showUser(this.value)">
    <?php foreach ($users as $user): ?>
                                    <option value="<?= $user['0']; ?>"><?= $user['1']; ?></option>
    <?php endforeach; ?>
                            </select>
                        </form>
                        <div id="txtHint"><b>Records display here:</b></div>
                    </div>
                                        <div class="col-md-2">
                    </div> 
                </div>

            </div>


        </body>
    </html>  

<?php
}
else {
    //include CSS/HTML from menu2.php on this redirect page
    require_once "menu2.php";
    ?>
    <div class="container-fluid">
        <div class="row">

            <div class="col-md-2">
            </div>

            <div class="col-md-8">

                <h3 class="text-primary">

    <?php
    // Message to user indicating no access (nl2br is function inserting line breaks at each new line \n)
    echo nl2br("You are not authorised to access this page\n\nREDIRECTING TO WELCOME");

    // Redirect to welcome page
    header("Refresh: 2;url=index.php");
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




