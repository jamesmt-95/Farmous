<?php
require_once './core/user_header.php';
require_once './config/config.php';
require_once './core/Database.php';
require_once './core/Hash.php';
require_once './core/Session.php';
require_once './public/data_access/data_fetcher_public.php';
Session::init();
//$db = new Database(DB_TYPE, DB_HOST, DB_NAME, DB_USER, DB_PASS);
$db = new Database();
if (!isset($_SESSION['register_id'])) {
    header('location:login.php');
} else {
    $user_id = $_SESSION['register_id'];

    /* gettin first letter of user full_name */
    $user_name = $db->prepare("SELECT `fullname` FROM `register` WHERE `register_id`='$user_id'");
    $user_name->execute();
    $user_fname_is = $user_name->fetchAll();
    $fn_ = $user_fname_is[0]['fullname'];
    $first_letter = substr($fn_, 0, 1);
    ?>
    <br/>
    <br/>



    <div class="clearfix">
    </div>
    <div class="col-md-12 col-sm-12 products_parent">


        <div class="col-md-3 col-sm-2 refine_result_child">

            <div class="col-md-12 col-sm-12 user_profile_head">
                <div class="col-md-3 col-sm-4 first_">
                    <svg height="50" width="50">
                    <circle id="circle_user" cx="23" cy="25" r="20" stroke="none" stroke-width="1" fill="orangered" />
                    <text x="17" y="35" fill="black" style="font-size:1.5em;" ><?php echo strtoupper($first_letter); ?></text>
                    </svg> 
                </div>
                <div class="col-md-9 col-sm-8 user_name">
                    <div class="col-md-12 hello">
                        <h6>Hello,</h6>

                    </div>
                    <div class="col-md-12 hello1">

                        <h6><b><?php echo strtoupper($fn_); ?></b></h6>

                    </div>


                </div>
                <div class="col-md-offset-3">
                </div>
            </div>
            <div class="clearfix"></div>
            <hr/>

            <div class="col-md-12 col-sm-2 refine_content">
                <div class="col-sm-4  col-md-12">
                    <b id="ac_set">ACCOUNT SETTINGS</b>
                </div>
                <div class="clearfix"></div>

                <a class="prof_info" id="prof_information" href="#"><div class="col-sm-6 col-md-12 link_addr">
                        Profile Information
                    </div></a>
                <a class="prof_info" id="notification" href="#"><div class="col-sm-6 col-md-12 link_addr">
                        Notification
                    </div></a>
                <hr/>
                <div class="clearfix"></div>


            </div>
            <div class="clearfix"></div>
            <div class="col-md-12 col-sm-2 refine_content">
                <div class="col-sm-4  col-md-12">
                    <b id="ac_set">PRODUCTS</b>
                </div>
                <div class="clearfix"></div>

                <a class="prof_info" id="mng_prd" href="#"><div class="col-sm-6 col-md-12 link_addr">
                        Manage Product
                    </div></a>
                <a class="prof_info" id="mng_rmd_prd" href="#"><div class="col-sm-6 col-md-12 link_addr">
                        Removed Products
                    </div></a>
                <a class="prof_info" id="seller_dsk" href="#"><div class="col-sm-6 col-md-12 link_addr">
                        Seller Desk
                    </div></a>
                <hr/>

                <div class="clearfix"></div>


            </div>
            <div class="col-md-12 col-sm-2 refine_content">
                <div class="col-sm-4  col-md-12">
                    <b id="ac_set">MY STUFF</b>
                </div>
                <div class="clearfix"></div>

                <a class="prof_info" id="my_reward" href="#"><div class="col-sm-6 col-md-12 link_addr">
                        My Rewards
                    </div></a>
                <a class="prof_info" id="my_wishlist" href="#"><div class="col-sm-6 col-md-12 link_addr">
                        My Wishlist
                    </div></a>
                <hr/>
                <div style="text-align:center;padding:1em 0;"> <h4><a style="text-decoration:none;" href="https://www.zeitverschiebung.net/en/city/1273874"><span style="color:gray;">Current local time in</span><br />Cochin, India</a></h4> <iframe src="https://www.zeitverschiebung.net/clock-widget-iframe-v2?language=en&size=small&timezone=Asia%2FKolkata" width="100%" height="90" frameborder="0" seamless></iframe> </div>

                <div class="clearfix"></div>


            </div>
            <hr/>
            <br/>


            <div class="clearfix"></div>

            <br/>


        </div>


        <div class="col-md-9 col-sm-8 sub_main_head_child_child" id="sub_main_head_child_product_display">





        </div>




    </div>
    <div class="clearfix">
    </div>
    <div id="footer_space">
    </div>

    <br/>
    <br/>
    <br/>

    <?php
    require_once './core/user_footer.php';
}
?>