<!--
insert.php
@author Mark Hanlon x16135571@ncirl.ie

HTML/CSS/Javascript/Bootstrap modified from:
http://www.layoutit.com/build

<INSERT - user submits results to database>

Also uses elements from: 
http://jqueryui.com/datepicker/
https://stackoverflow.com/questions/4915990/set-todays-date-as-default-date-in-jquery-ui-datepicker
-->
<?php
//start session
session_start();
?>

<!DOCTYPE html>
<html lang="en">

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>CONTROL-IT! -> Enter results</title>

        <meta name="description" content="HTML/CSS source code generated using layoutit.com">
        <meta name="author" content="Mark Hanlon x16135571@ncirl.ie">

        <!--Styles from Layoutit! Bootstrap builder-->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    
        <!--Styles from jQuery UI referenced above-->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">

        <!--Default javascripts from Layoutit! Bootstrap builder-->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script> 

        <!--jQuery UI Datepicker referenced above-->
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        $(function () {
            $("#datepicker").datepicker().datepicker("setDate", new Date());
        });
    </script>

    <body>

        <?php
        require_once "menu1.php";
        ?>

        <div class="container-fluid">
            <div class="row">

                <div class="col-md-2">
                </div>

                <div class="col-md-8">

                    <h3 class="text-primary">
                        Enter blood glucose test results in mmol/L for 
                        <?php
                        echo $_SESSION['username'];
                        ?>:
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
                    <div class="col-md-9">
                        <form action="db_insert.php" method="post" role="form" class="form-inline">
                            <div class="form-group">
                                <label for="datepicker">
                                    DATE
                                </label>

                                <input class="form-control" id="datepicker" type="text" name="datepicker" />
                            </div>
                            <div class="form-group">

                                <label for="AM">
                                    AM
                                </label>
                                <input class="form-control" id="AM" type="number" step="0.1" value="5.0" name="AM" />
                            </div>
                            <div class="form-group">

                                <label for="PM">
                                    PM
                                </label>
                                <input class="form-control" id="PM" type="number" step="0.1" value="7.5" name="PM" />
                            </div> 

                            <button type="submit" class="btn btn-success btn-default">
                                Submit
                            </button>
                            <button type="reset" class="btn btn-warning btn-default">
                                RESET
                            </button>  
                        </form>
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

                    <h5 class="text-primary">
                        * Default is today's date - if you require other dates use datepicker.
                    </h5>
                </div>

                <div class="col-md-2">
                </div>
            </div>
            </div>

</body>
</html>
