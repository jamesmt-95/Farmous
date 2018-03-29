<?php
require_once '../config/config.php';
require_once '../core/Database.php';
require_once '../core/Hash.php';
require_once '../core/Session.php';
require_once '../core/data_fetcher.php';
/* datafetcher.php retrieves data from country,state,district,location to print on dropdown */
Session::init();
//$db = new Database(DB_TYPE, DB_HOST, DB_NAME, DB_USER, DB_PASS);
$db = new Database();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Farmous</title>
        <link href="../public/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
        <link href="../public/css/style.css" rel="stylesheet" type="text/css" media="all" />
        <link href="../public/css/font-awesome.css" rel="stylesheet" type="text/css" media="all" /> 
        <link href="../public/css/style.css" rel="stylesheet" >
        <link href="../public/css/bootstrap.min.css" rel="stylesheet" >
        <link href="../public/css/dataTables.bootstrap4.css" rel="stylesheet" >
        <link href="../public/css/font-awesome.min.css" rel="stylesheet" >
        <link href="../public/css/sb-admin.css" rel="stylesheet" >






    </head>
    <body>
        <!-- header -->

        <div class="col-md-12 col-xs-12 farmous_header">
            <div class="col-md-2 col-xs-2 col-sm-1 farmous_offers">
                <a id="header_sub_text3" href="admin_home.php">Farmous</a>
            </div>







            <div class="dropdown" id="user_panel">
                <button class="btn btn-primary dropdown-toggle" id="exist" type="button" data-toggle="dropdown">Account
                    <span class="caret" id="drop_caret"></span></button>


                <?php
                if (isset($_SESSION['admin_id'])) {
                    ?>
                    <ul class="dropdown-menu">
                        <li><a href="admin_logout.php" id="mng_logout">Logout</a></li>
                        
                    </ul>
                    <?php
                } else {
                    ?>
                    <ul class="dropdown-menu">
                        <li><a href="admin_logout.php" id="mng_logout">Login</a></li>
                        
                    </ul>
                <?php } ?>
            </div>








            <div class="farmous_header_right1">
            </div>
        </div>
        <!-- banner -->
        <div class="clearfix"> </div>
        <!-- login -->