<?php
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

    $farm_id = $_SESSION['register_id'];
    $farm_get_rwrd = $db->prepare("SELECT `buyer_id`, round(sum(`tot_price`)*1/100,0) as reward FROM `transaction_rcrd` WHERE `buyer_id`='$farm_id'");
    $farm_get_rwrd->execute();
    $rwrd_point = $farm_get_rwrd->fetchAll();

    $farm_name = $db->prepare("SELECT * FROM `register` WHERE `register_id`='$farm_id'");
    $farm_name->execute();
    $detail_farmer = $farm_name->fetchAll();


    if ($rwrd_point[0]['reward']<=0) {
        ?>    


        <div class = "col-md-12" id = "removed_prd">
            <h4 id = "no_prd">No Purchase made yet!</h4>
        </div >

        <?php
    } else {
        ?>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="./public/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
        <link href="./public/css/style.css" rel="stylesheet" type="text/css" media="all" />
        <link href="./public/css/font-awesome.css" rel="stylesheet" type="text/css" media="all" />
        <link href="../public/css/font-awesome.min.css" rel="stylesheet" type="text/css" media="all" />
        <div class="clearfix"></div>

        <div class="col-md-8 col-sm-8 sub_main_head_child_child_otp" id="sub_main_head_child_product_display_loyalty_card">
            <!--edit_personal_info-->
            <div class="col-md-12 col-sm-12" id="loyalty_container">
                <div class="col-md-4 col-sm-12 profile_info_label">
                    <img src="images/slider/div_logo.JPG" id="image_prd"  class="img-responsive" width="90px" height="50px">
                </div>

                <div class="col-md-8">
                    <p id="loyalty_label">Loyalty Card</p>
                </div>
                <div class="clearfix"></div>
                <div class="col-md-12 col-sm-12 profile_info_label2">
                    <div class="col-md-6 col-sm-12 loyalty_user_name">
                        <div class="col-md-12 col-sm-12 loyalty_user_name">
                            <p id="fname_loyalty"><?php echo $detail_farmer[0]['fullname']; ?></p>
                        </div>
                        <div class="col-md-12 col-sm-12 loyalty_user_phone">
                            <p id="rwrd_phone"> <?php echo $detail_farmer[0]['phone']; ?></p>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12 loyalty_slab_2">
                        <div class="col-md-12" id="rewrd_score">
                            <p id="rwrd_score_value">&#8377; <?php echo $rwrd_point[0]['reward']; ?></p>
                        </div>

                    </div>
                </div>
                <div class="col-md-12 col-sm-12 profile_info_rwrd_id">



                    <p id="rwrd_ID">FARM-XDWK-1541-<?php echo $detail_farmer[0]['register_id']; ?></p>

                </div>
                <div class="clearfix"></div>
                <!--2nd_break-->



                <!--close_break-->
            </div>

            <div class="clearfix"></div>


            <!--edit_menu_on_click_edit-->



            <div class="clearfix"></div>










            <!--closed_edit_menu_on_click_edit-->









            <div class="clearfix"></div>







        </div>


        <div class="col-md-12 col-sm-8 description">
            <hr/>
            <p id="edit_desc">
                <b>FAQs</b>

            <br/><hr/>
            <b>How to Earn Farmous Loyalty Score?</b><br/>
            It is Beta version. Once a customer bought an item from a Farmer, He will earn 0.01% of cashback. 

            <hr/>
            <b>What can i do with Loyalty Score?</b><br/>
            First of all,It is trial version. We are looking for customer feedback on this feature.  Anyway this will allow you to pay with Loyalty card(in future).

            <hr/>





        </p>
        <img src="images/myProfileFooter_0cedbe.png" style="width: 100%">
        <br/><br/>
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
    }
}
?>

