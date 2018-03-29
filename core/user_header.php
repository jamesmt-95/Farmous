<?php
require_once './config/config.php';
require_once './core/Database.php';
require_once './core/Hash.php';
require_once './core/Session.php';
Session::init();
//$db = new Database(DB_TYPE, DB_HOST, DB_NAME, DB_USER, DB_PASS);
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Farmous</title>
        <link rel="icon"  href="images/favicon.ico" />
        <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="./public/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
        <link href="./public/css/style.css" rel="stylesheet" type="text/css" media="all" />
        <link href="./public/css/font-awesome.css" rel="stylesheet" type="text/css" media="all" />
        <link href="../public/css/font-awesome.min.css" rel="stylesheet" type="text/css" media="all" />


    </head>

    <body>
        <div class="loader"></div>
        <div id="google_translate_element"></div>
        <!-- header -->
        <div class="col-md-12 col-sm-offset-0 header">
            <div class="col-xs-offset-7 col-md-offset-10 header_sub">
                <?php
                if (isset($_SESSION['register_id'])) {
                    ?>
                    <a id="header_sub_text" href="./core/user_logout.php">Logout</a>
                    <?php
                } else {
                    ?>
                    <a id="header_sub_text" href="login.php">Login</a>
                <?php } ?>
                <a id="header_sub_text">|</a>
                <?php
                if (isset($_SESSION['register_id'])) {
                    ?>
                    <a id="header_sub_text2" href="user_profile.php">Your Farmous</a>
                    <?php
                } else {
                    ?>
                    <a id="header_sub_text2" href="register.php">Create Account</a>
                <?php } ?>
            </div>
        </div>
        <div class="col-md-12 col-xs-12 farmous_header">
            <div class="col-md-2 col-xs-2 col-sm-2 farmous_offers">
                <a id="header_sub_text3" href="index.php">Farmous</a>
            </div>
            <div class="col-md-5 col-sm-5 col-xs-5 wrap">
                <div class="col-md-5 col-xs-offset-2 search">
                    <form method="post" name="search" id="search_form" action="http://localhost:8090/testfarmous/product_search.php">
                        <input type="text" name="search_key" id="search_word" class="searchTerm" placeholder="What are you looking for,Type Product Name">
<!--                        <i class="fa fa-arrow-right fa-2x"></i>-->
                        <i class="fa fa-microphone "></i>
                        <input id="search_button" name="search_prd" value="Search" type="submit">
                    </form>
                </div>
            </div>



            <div class="farmous_header_right1">
                <?php
                if (isset($_SESSION['register_id'])) {
                    ?>
                    <h4><a href="add_product.php">Sell Products</a></h4>
                    <?php
                } else {
                    ?>
                    <h4><a href="login.php">Sell Products</a></h4>
                <?php } ?>

            </div>
        </div>


