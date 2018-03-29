<?php
require_once './config/config.php';
require_once './core/Database.php';
require_once './core/Hash.php';
require_once './core/Session.php';

Session::init();
//$db = new Database(DB_TYPE, DB_HOST, DB_NAME, DB_USER, DB_PASS);
$db = new Database();
if (!isset($_SESSION['register_id'])) {
    header('location:login.php');
} else {
    $user_id = $_SESSION['register_id'];

    /* gettin first letter of user full_name */
    $user_name = $db->prepare("SELECT * FROM `register` WHERE `register_id`='$user_id'");
    $user_name->execute();
    $user_fname_is = $user_name->fetchAll();
    $fn_ = $user_fname_is[0]['fullname'];

    $first_letter = substr($fn_, 0, 1);
    $email = $user_fname_is[0]['username'];
    $phone = $user_fname_is[0]['phone'];
    $add = $user_fname_is[0]['address'];
    ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="./public/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
    <link href="./public/css/style.css" rel="stylesheet" type="text/css" media="all" />
    <link href="./public/css/font-awesome.css" rel="stylesheet" type="text/css" media="all" />
    <link href="../public/css/font-awesome.min.css" rel="stylesheet" type="text/css" media="all" />
    <div class="clearfix"></div>

    <div class="col-md-9 col-sm-8 sub_main_head_child_child" id="sub_main_head_child_product_display">
        <!--edit_personal_info-->
        <div class="col-md-12 col-sm-12 profile_info_head">
            <div class="col-md-4 col-sm-12 profile_info_label">
                Personal Information
            </div>
            <div class="col-md-1 col-sm-12 profile_info_label">
                <a id="edit_per_info" href="#">Edit</a>
            </div>
            <div class="col-md-1 col-sm-12 profile_info_label">
                <a id="cancel_per_info" href="#">Cancel</a>
            </div>
            <div class="col-md-offset-6">
            </div>
            <div class="clearfix"></div>


        </div>

        <div class="col-md-12 col-sm-12 profile_info_edit">
            <div class="col-md-4 col-sm-12 profile_info_label">
                <input type="text" id="edit_fname" value="<?php echo $fn_; ?>" class="form-control" disabled="disabled">
            </div>
            <div class="col-md-1">
                <input type="submit" id="save_edit_fname" value="SAVE">
            </div>




        </div>
        <div class="col-md-10 col-md-offset-2 noti_" id="notifi_fname">
            
        </div>
        <div class="clearfix"></div>
        <hr/>
        <!--edit_email_-->
        <div class="col-md-12 col-sm-12 profile_info_head">
            <div class="col-md-4 col-sm-12 profile_email_label">
                Email Address
            </div>
            <div class="col-md-1 col-sm-12 profile_email_label">
                <a id="edit_per_email" href="#">Edit</a>
            </div>
            <div class="col-md-1 col-sm-12 profile_email_label">
                <a id="cancel_per_email" href="#">Cancel</a>
            </div>
            <div class="col-md-offset-6">
            </div>
            <div class="clearfix"></div>


        </div>

        <div class="col-md-12 col-sm-12 profile_info_edit">
            <div class="col-md-4 col-sm-12 profile_info_label">
                <input type="text" id="edit_email" value="<?php echo $email; ?>" class="form-control" disabled="disabled">
            </div>
            <div class="col-md-1">
                <input type="submit" id="save_edit_email" value="SAVE">
            </div>




        </div>
        <div class="col-md-10 col-md-offset-2 noti_" id="notifi_email">
            
        </div>
        <div class="clearfix"></div>
        <hr/>



        <!--edit_mob_no-->
        <div class="col-md-12 col-sm-12 profile_info_head">
            <div class="col-md-4 col-sm-12 profile_mob_label">
                Mobile Number
            </div>
            <div class="col-md-1 col-sm-12 profile_mob_label">
                <a id="edit_per_mob" href="#">Edit</a>
            </div>
            <div class="col-md-1 col-sm-12 profile_mob_label">
                <a id="cancel_per_mob" href="#">Cancel</a>
            </div>
            <div class="col-md-offset-6">
            </div>
            <div class="clearfix"></div>


        </div>

        <div class="col-md-12 col-sm-12 profile_info_edit">
            <div class="col-md-4 col-sm-12 profile_info_label">
                <input type="text" id="edit_mob" value="<?php echo $phone; ?>" class="form-control" disabled="disabled">
            </div>
            <div class="col-md-1">
                <input type="submit" id="save_edit_mob" value="SAVE">
            </div>




        </div>
        <div class="col-md-10 col-md-offset-2 noti_" id="notifi_mob">
            
        </div>
        <div class="clearfix"></div>
        <hr/>


        <!--edit_address-->
        <div class="col-md-12 col-sm-12 profile_info_head">
            <div class="col-md-4 col-sm-12 profile_add_label">
                Personal Address
            </div>
            <div class="col-md-1 col-sm-12 profile_add_label">
                <a id="edit_per_add" href="#">Edit</a>
            </div>
            <div class="col-md-1 col-sm-12 profile_add_label">
                <a id="cancel_per_add" href="#">Cancel</a>
            </div>
            <div class="col-md-offset-6">
            </div>
            <div class="clearfix"></div>


        </div>

        <div class="col-md-12 col-sm-12 profile_info_edit">
            <div class="col-md-4 col-sm-12 profile_info_label">
                <input type="text" id="edit_add" value="<?php echo $add; ?>" class="form-control" disabled="disabled">
            </div>
            <div class="col-md-1">
                <input type="submit" id="save_edit_add" value="SAVE">
            </div>




        </div>
        <div class="col-md-10 col-md-offset-2 noti_" id="notifi_add">
            
        </div>
        <div class="clearfix"></div>
        <hr/>


        <div class="col-md-12 col-sm-8 description">
            <p id="edit_desc">
                <b>FAQs</b>

            <br/><hr/>
            <b>What happens when I update my email address (or mobile number)?</b><br/>
            Your login email id (or mobile number) changes, likewise. You'll receive all your account related communication on your updated email address (or mobile number).
            <hr/>
            <b>When will my Farmous account be updated with the new email address (or mobile number)?</b><br/>

            It happens as soon as you confirm the verification code sent to your email (or mobile) and save the changes.
            <hr/>
            <b>What happens to my existing Farmous account when I update my email address (or mobile number)?</b><br/>
            Updating your email address (or mobile number) doesn't invalidate your account. Your account remains fully functional. You'll continue seeing your Order history, saved information and personal details.
            <hr/><b>Does my Seller account get affected when I update my email address?</b><br/>
            Farmous has a 'single sign-on' policy. Any changes will reflect in your Seller account also.




            </p>
            <img src="images/myProfileFooter_0cedbe.png" style="width: 100%">
            <br/><br/>
        </div>

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
?>

<script src="public/js/upload_content.js"></script>
<script src="public/js/validate.js"></script>
<script src="public/js/jquery-1.11.1.min.js"></script>
<script src="public/js/bootstrap.min.js"></script>
<script src="public/js/execute.js"></script>
<script src="public/js/jquery.menu-aim.js"></script>
<script src="public/js/main.js"></script>
<script src="public/js/modernizr.js"></script>