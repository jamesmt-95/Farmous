<?php
require_once './config/config.php';
require_once './core/Database.php';
require_once './core/Hash.php';
require_once './core/Session.php';
require_once './exec/data_fetch_user.php';
Session::init();
//$db = new Database(DB_TYPE, DB_HOST, DB_NAME, DB_USER, DB_PASS);
$db = new Database();
?>
﻿<!DOCTYPE html>
<html>
    <head>
        <title>Farmous</title>
        <link href="public/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
        <link href="public/css/style.css" rel="stylesheet" type="text/css" media="all" />
        <link href="public/css/font-awesome.css" rel="stylesheet" type="text/css" media="all" /> 


    </head>
    <body>
        <!-- header -->
        <div class="col-md-12 col-sm-offset-0 header">
            <div class="col-xs-offset-7 col-md-offset-10 header_sub">
                <a id="header_sub_text" href="login.php">Login</a>
                <a id="header_sub_text">|</a>
                <a id="header_sub_text2" href="#">Create Account</a>
            </div>
        </div>
        <div class="col-md-12 col-xs-12 farmous_header">
            <div class="col-md-2 col-xs-2 col-sm-2 farmous_offers">
                <a id="header_sub_text3" href="index.php">Farmous</a>
            </div>
            <div class="col-md-5 col-sm-5 col-xs-5 wrap">
                <div class="col-md-5 col-xs-offset-2 search">
                    <input type="text" class="searchTerm" placeholder="What are you looking for">
                    <button type="submit" class="searchButton">
                        <i class="fa fa-search"></i>
                    </button>
                </div>
            </div>


            <div class="farmous_header_right1">
                <h4><a href="login.php">Sell Products</a></h4>
            </div>

        </div>

        <div class="clearfix"> </div>
        <div class="wrapper">
            <div class="container verifier">

                <div class="farmous_login login_head">
                    <h4 id="cr_ac">Create  Your Account</h4>

                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="row space side">
                                <div class="col-sm-12 col-md-12">
                                    <div class="col-sm-4  col-md-6">
                                        First Name
                                    </div>
                                    <div class="col-sm-6 col-md-8">
                                        <input type="text" class="form-control" id="Fname" placeholder="First Name" onchange="fname()">
                                    </div>
                                </div>
                            </div>
                            <div class="row space side">
                                <div class="col-sm-12 col-md-12">
                                    <div class="col-sm-4  col-md-6" >
                                        Email
                                    </div>
                                    <div class="col-sm-6 col-md-8">
                                        <input type="email" class="form-control" id="REmail" placeholder="Email" onchange="email()">
                                    </div>
                                </div>
                            </div>

                            <div class="row space side">
                                <div class="col-sm-12 col-md-12">
                                    <div class="col-sm-4  col-md-6" >
                                        Password
                                    </div>
                                    <div class="col-sm-6 col-md-8">
                                        <input type="password" class="form-control" id="Password" placeholder="Password" onchange="pass()">
                                    </div>
                                </div>
                            </div>
                            <div class="row space side">
                                <div class="col-sm-12 col-md-12">
                                    <div class="col-sm-4  col-md-6">
                                        Address Line 1
                                    </div>
                                    <div class="col-sm-6 col-md-8">
                                        <input type="text" class="form-control" id="Add1" placeholder="Address Line1" onchange="add1()">
                                        </select>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row space side">
                                <div class="col-sm-12 col-md-12">
                                    <div class="col-sm-4  col-md-6">
                                        Address Line 2
                                    </div>
                                    <div class="col-sm-6 col-md-8">
                                        <input type="text" class="form-control" id="Add2" placeholder="Address Line2" onchange="add2()">
                                    </div>
                                </div>
                            </div>
                            <div class="row space side">
                                <div class="col-sm-12 col-md-12">
                                    <div class="col-sm-4  col-md-6">
                                        Phone
                                    </div>
                                    <div class="col-sm-6 col-md-8">
                                        <input type="text" class="form-control" id="Phone" placeholder="10-digit Mobile Number" onchange="phone()">
                                    </div>
                                </div>
                            </div>
                            <!--create a verify button here and following div as initially hide_once_verify modal done make div show-->
                            <!--create div with following 5 div inside that-->
                            <div class="row space side">
                                <div class="col-sm-12 col-md-12">
                                    <div class="col-sm-4  col-md-6">
                                        Country
                                    </div>
                                    <div class="col-sm-6 col-md-8">
                                        <select class="form-control" id="view_country">
                                            <option value="-1" disabled selected>Select Country</option>

                                            <?php foreach ($country_get as $each_country) { ?>
                                                <option value=<?php echo $each_country['country_id'] ?>><?php echo strtoupper($each_country['country_name']); ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row space side">
                                <div class="col-sm-12 col-md-12">
                                    <div class="col-sm-4  col-md-6" >
                                        State
                                    </div>
                                    <div class="col-sm-6 col-md-8">
                                        <select class="form-control" id="view_state">


                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row space side">
                                <div class="col-sm-12 col-md-12">
                                    <div class="col-sm-4  col-md-6">
                                        District
                                    </div>
                                    <div class="col-sm-6 col-md-8">
                                        <select class="form-control" id="view_district">
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row space side">
                                <!-- arrival place-->
                                <div class="col-sm-12 col-md-12">
                                    <div class="col-sm-4  col-md-6" >
                                        Location
                                    </div>
                                    <div class="col-sm-6 col-md-8">
                                        <select class="form-control" id="view_location">

                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row space side">
                                <div class="col-sm-12 col-md-12">
                                    <div class="col-sm-4  col-md-6">
                                        PIN
                                    </div>
                                    <div class="col-sm-6 col-md-8">
                                        <select class="form-control" id="view_pin">

                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-10">
                        <div class="col-md-offset-5 col-sm-8submit">
                            <input type="submit" id="register_submit" value="Register">
                        </div>
                    </div>
                </div>

            </div>
        </div>


        <div class="clearfix"></div>


        <!-- //login -->

        <div class="clearfix"></div>

        <?php
        require_once './core/user_footer.php';
        ?>