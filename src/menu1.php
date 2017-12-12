<!--
menu1.php
@author Mark Hanlon x16135571@ncirl.ie 

HTML/CSS/Javascript/Bootstrap modified from:
http://www.layoutit.com/build

<MENU1 - Call this file to add full navbar menu across page for patient>

-->
<!DOCTYPE html>
<html lang="en">
    <head>
    </head>
    <body>

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-2">
                </div>
                <div class="col-md-8">
                    <nav class="navbar navbar-default navbar-static-top navbar-inverse" role="navigation">
                        <div class="navbar-header">

                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                                <span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
                            </button> <a class="nav navbar-brand" href="index.php">CONTROL-IT</a>
                        </div>

                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav">
                                <li class="active">
                                    <a href="insert1.php">Enter results</a>
                                </li>
                                <li class="active">
                                    <a href="review.php">Check results</a>
                                </li>
                            </ul>

                            <ul class="nav navbar-nav navbar-right">
                                <li>
                                    <a href="login.php">Login/Register</a>
                                </li>
                                <li>
                                    <a href="logout.php">Logout</a>
                                </li>

                            </ul>
                        </div>

                    </nav>

                </div>
                <div class="col-md-2">
                </div>
            </div>
        </div>

