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


    $get_prod_id = $db->prepare("SELECT `prd_id`,`prd_name` FROM `product_add` WHERE `register_id`='$user_id'");
    $get_prod_id->execute();
    $prod_id_is = $get_prod_id->fetchAll();
    foreach ($prod_id_is as $prod_id) {
        $id = $prod_id['prd_id'];
        $get_notification = $db->prepare("SELECT `wish_id`,`booked_time`, `description` FROM `prod_wish` WHERE `prd_id`='$id' and `status`=1");
        $get_notification->execute();
        $notifi = $get_notification->fetchAll();
        if ($notifi) {

            foreach ($notifi as $noti) {
//                echo $prod_id['prd_name'];
//                echo $noti['booked_time'];
//                echo $noti['description'];
                ?>

                <div class="col-md-10" id="notification_panel">
                    <div class="col-md-12" id="notification_header">
                        <div class="col-md-4" id="prodct_name">
                            <h4><?php echo $prod_id['prd_name']; ?></h4>
                        </div>
                        <div class="col-md-4" id="prodct_bkd_time">
                            <h5><?php echo $noti['booked_time']; ?></h5>
                        </div>
                        
                        <div class="col-md-1" id="prodct_clear">
                            <a data-id="<?php echo $noti['wish_id']; ?>" id="clear_notification" href="">Clear</a>
                        </div>


                    </div>
                    <div class="col-md-12" id="notification_content">
                        <h5><?php echo $noti['description']; ?></h5>

                    </div>

                </div>







                <?php
            }
        }
    }
    ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="./public/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
    <link href="./public/css/style.css" rel="stylesheet" type="text/css" media="all" />
    <link href="./public/css/font-awesome.css" rel="stylesheet" type="text/css" media="all" />
    <link href="../public/css/font-awesome.min.css" rel="stylesheet" type="text/css" media="all" />
    <div class="clearfix"></div>

    <div class="col-md-9 col-sm-8 sub_main_head_child_child" id="sub_main_head_child_product_display">




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