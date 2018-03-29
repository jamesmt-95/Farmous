<?php
require_once '../config/config.php';
require_once '../core/Database.php';
require_once 'admin_header.php';
require_once '../core/Hash.php';
require_once '../core/Session.php';
//$db = new Database(DB_TYPE, DB_HOST, DB_NAME, DB_USER, DB_PASS);
$db = new Database();
?>﻿

<div class="clearfix"></div>

    <div class="col-md-12 col-sm-12 products_parent">


        <div class="col-md-3 col-sm-2 refine_result_child">

            <div class="col-md-12 col-sm-12 user_profile_head">
                <div class="col-md-3 col-sm-4 first_">
                    <svg height="50" width="50">
                    <circle id="circle_user" cx="23" cy="25" r="20" stroke="none" stroke-width="1" fill="orangered" />
                    <text x="17" y="35" fill="black" style="font-size:1.5em;" >A</text>
                    </svg> 
                </div>
                <div class="col-md-9 col-sm-8 user_name">
                    <div class="col-md-12 hello">
                        <h6>Hello,</h6>
                    </div>
                    <div class="col-md-12 helload">
                        <h5><b>Admin</b></h5>
                    </div>
                </div>
                <div class="col-md-offset-3">
                </div>
            </div>
            <div class="clearfix"></div>
            <hr/>
            <div class="col-md-12 col-sm-2 refine_content_admin">

                <div class="dropdown">
                    <button class="btn btn-primary dropdown-toggle" id="drop_down" type="button" data-toggle="dropdown">Manage Data
                        <span class="caret" id="drop_caret"></span></button>
                    <ul class="dropdown-menu" id="drop_menu">
                        <li><a href="#" id="mng_location">Add Location</a></li>
                        <li><a href="#" id="mng_apr_prd">Approve Product</a></li>
                    </ul>
                </div>
                <div class="clearfix"></div>
                <hr/>
                <div class="dropdown">
                    <button class="btn btn-primary dropdown-toggle" id="drop_down" type="button" data-toggle="dropdown">View Data
                        <span class="caret" id="drop_caret"></span></button>
                    <ul class="dropdown-menu" id="drop_menu">
                        <li><a href="#" id="view_cust">Customers</a></li>
                        <li><a href="#" id="view_prd">Added Product</a></li>
                        <li><a href="#" id="view_prd_type">Product Type</a></li>
                        <li><a href="#" id="view_loc">Location Details</a></li>
                    </ul>
                </div>
                <div class="clearfix"></div>
                <hr/>
                <div class="dropdown">
                    <button class="btn btn-primary dropdown-toggle" id="drop_down" type="button" data-toggle="dropdown">Edit Data
                        <span class="caret" id="drop_caret"></span></button>
                    <ul class="dropdown-menu" id="drop_menu">
                        <li><a href="#" id="edit_prd">Product</a></li>
                        <li><a href="#" id="edit_loc">Location</a></li>

                    </ul>
                </div>
                <div class="clearfix"></div>
                <hr/>


                <div class="clearfix"></div>


                <div style="text-align:center;padding:1em 0;"> <h4><a style="text-decoration:none;" href="https://www.zeitverschiebung.net/en/city/1273874"><span style="color:gray;">Current local time in</span><br />Cochin, India</a></h4> <iframe src="https://www.zeitverschiebung.net/clock-widget-iframe-v2?language=en&size=small&timezone=Asia%2FKolkata" width="100%" height="90" frameborder="0" seamless></iframe> </div>
            </div>
            <hr/>
            <br/>


            <div class="clearfix"></div>

            <br/>


        </div>


        <div class="col-md-9 col-sm-8 sub_main_head_child_child" id="sub_main_head_admin_product_display">





        </div>




    </div>
    <div class="clearfix"></div>

    <?php
    require_once '../admin/admin_footer.php';
    ?>