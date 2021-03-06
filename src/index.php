<!--
index.php
@author Mark Hanlon x16135571@ncirl.ie 

HTML/CSS/Javascript/Bootstrap modified from:
http://www.layoutit.com/build

<INDEX - This is the front page for the site & web application>

-->

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>CONTROL-IT! -> Welcome page</title>

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
        require_once "menu.php";
        ?>

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-2">
                </div>
                <div class="col-md-8">

                    <div class="jumbotron">
                        <h2>
                            Welcome to CONTROL-IT!
                        </h2>
                        <p>
                            Use this web app for simple, clean & secure electronic diabetes monitoring.....
                        </p>
                        <p>
                            <a class="btn btn-primary btn-large" href="login.php">Login/Register</a>
                        </p>
                    </div>
                    <div class="col-md-2">
                    </div>

                </div>
            </div>

    </body>
</html>