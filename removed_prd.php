


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
    $user_name = $db->prepare("SELECT `fullname` FROM `register` WHERE `register_id`='$user_id'");
    $user_name->execute();
    $name_ = $user_name->fetchAll();


    /* gettin first letter of user full_name */
    $rem_prd = $db->prepare("SELECT * FROM `product_add` WHERE `register_id`='$user_id' and `status`=0");
    $rem_prd->execute();
    $all_rem_prd = $rem_prd->fetchAll();
    ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="./public/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
    <link href="./public/css/style.css" rel="stylesheet" type="text/css" media="all" />
    <link href="./public/css/font-awesome.css" rel="stylesheet" type="text/css" media="all" />
    <link href="../public/css/font-awesome.min.css" rel="stylesheet" type="text/css" media="all" />
    <div class="clearfix"></div>


    <?php if ($all_rem_prd == NULL) { ?>
        <div class="col-md-12" id="removed_prd">
            <h4 id="no_prd">No Products to be restored!</h4>
        </div>
        <?php
    } else {
        ?>



        <?php foreach ($all_rem_prd as $each_prd_rmvd) { ?>
            <div class="col-md-5" id="removed_prd">
                <div class="col-md-3" id="rmvd_prd_img">
                    <img src="./<?php echo $each_prd_rmvd['image']; ?>"  height="70px" width="70px">
                </div>

                <div class="col-md-5" id="rmvd_prd_name">
                    <b><?php echo $each_prd_rmvd['prd_name']; ?></b>
                </div>

                <div class="col-md-3" id="rmvd_prd_restr_btn">
                    <input type="submit" id="restore" data-toggle="modal" data-target="#modalRestore" data-id="<?php echo $each_prd_rmvd['prd_id']; ?>" value="Restore">
                </div>
            </div>

            <?php
        }
        ?>
        <!-- Modal test-->



        <div id="modalRestore" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title" style=" text-align-last: center;color: orangered;">RESTORE</h4>
                    </div>
                    <div class="modal-body">
                        Hello <?php echo strtoupper($name_[0]['fullname']); ?>,  You Want to Restore Product?
            </div>
            <div class="modal-footer">
                <button type="button" id="yes_restore" class="btn btn-default" data-dismiss="modal">Yes</button>
                <button type="button" id="no_restore" class="btn btn-default" data-dismiss="modal">No</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal test end-->
<div class="col-md-offset-7">

</div>
<div class="clearfix"></div>


<script src="public/js/upload_content.js"></script>
<script src="public/js/validate.js"></script>
<script src="public/js/jquery-1.11.1.min.js"></script>
<script src="public/js/bootstrap.min.js"></script>
<script src="public/js/execute.js"></script>
<script src="public/js/jquery.menu-aim.js"></script>
<script src="public/js/main.js"></script>
<script src="public/js/modernizr.js"></script>

<?php
    }
}

?>

