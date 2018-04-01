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

if (isset($_REQUEST['73ce347c9ef8a7b158b4529673bf67ff'])) {
    $var_value = $_REQUEST['73ce347c9ef8a7b158b4529673bf67ff'];

    $secured_get= base64_decode($var_value);
    $secured_id = preg_replace(sprintf('/%s/', $key), '', $secured_get);



    /* selecting details of product */
    $view_product = $db->prepare("SELECT * FROM `product_add` WHERE `prd_id`='$secured_id'");
    $view_product->execute();
    $sel_product = $view_product->fetchAll();

//getting details of the user who added this product
    $register_info_id = $sel_product[0]['register_id'];
    $register_info = $db->prepare("SELECT * FROM `register` WHERE `register_id`='$register_info_id'");
    $register_info->execute();
    $user_who_register_prd = $register_info->fetchAll();

//getting location_details of the user who added this product to find out
    $loc_id = $user_who_register_prd[0]['location_id'];
    $loc_name = $db->prepare("SELECT `location_name` FROM `location` WHERE `location_id`='$loc_id'");
    $loc_name->execute();
    $loc_name_is = $loc_name->fetchAll();
    $ln_ = $loc_name_is[0]['location_name'];

    //getting_related_products_of_requested_product's
    $rel_product = $db->prepare("SELECT * FROM `product_add` WHERE `prd_id`>'$secured_id' limit 2");
    $rel_product->execute();
    $det_relproduct = $rel_product->fetchAll();
    ?>
    <div class="clearfix"></div>
    <!--products page to display contents -->
    <div class="col-md-2 warning">
        *Min Purchase Should be 1Kg
    </div>
    <div class="col-md-12 col-sm-12 products_parent">
        <!--to_display_view_product_image-->

        <div class="col-md-offset-1 col-md-3 col-sm-2 view_product_img">
            <center><img class="img-responsive img_view" src="<?php echo $sel_product[0]['image']; ?>" height="230px" width="230px"></center>





        </div>







        <!--to_display_image_end-->

        <div class="col-md-offset-1 col-md-6  col-sm-8 sub_main_head_child_child" id="sub_main_head_child_product_display">

            <div class="col-md-12 col-sm-12" id="product_name">
                <div id="details" class="col-md-6">
                    <p id="prd_name"><?php echo $sel_product[0]['prd_name']; ?></p>
                    <p id="prd_desc"><?php echo $sel_product[0]['description']; ?></p>
                </div>

                <div id="price" class="col-md-offset-1 col-md-5">
                    <p id="prd_price"> &#8377 <?php echo $sel_product[0]['price']; ?></p>
                    <p id="prd_quantity">Avaliable Quantity(Kg):<?php echo $sel_product[0]['stock']; ?></p>
                </div>

                <div class="clearfix"></div>
                <hr/>
                <p id="price_det_label">Product Information</p>
                <hr/>
                <p id="prd_user_details"><?php echo strtoupper($user_who_register_prd[0]['fullname']); ?></p>

                <p id="prd_user_details_address"><?php echo strtoupper($user_who_register_prd[0]['address']); ?></p>
                <div class="clearfix"></div>
                <br/>
                <div class="col-md-6">
                    <div class="col-md-offset-0 col-md-1">
                        <i class="fa fa-phone phone_logo"></i>
                    </div>
                    <div class="col-md-8">
                        <p id="prd_user_details_phone"><?php echo strtoupper($user_who_register_prd[0]['phone']); ?></p>
                    </div>

                </div>

                <div class="col-md-6">
                    <a href="https://mail.google.com/mail/u/0/?view=cm&fs=1&to=<?php echo $user_who_register_prd[0]['username']; ?>&su=Farmous+User+Mail+&body=Hello%20<?php echo strtoupper($user_who_register_prd[0]['fullname']); ?>%20This%20is%20From%20Farmous.I would like to buy this <?php echo $sel_product[0]['prd_name']; ?> product.&tf=1">
                        <div class="col-md-offset-0 col-md-1">
                            <i class="fa fa-send mail_logo"></i>
                        </div>
                        <div class="col-md-8">
                            <p id="prd_user_details_mail"><?php echo $user_who_register_prd[0]['username']; ?></p>
                        </div>
                    </a>
                </div>
                <div class="clearfix"></div>

                <input type="submit"  id="wish_to_buy" data-toggle="modal" data-target="#modalWishtobuy" value="I Wish to Buy">

            </div>
        </div>

        <!-- Modal test-->



        <div id="modalWishtobuy" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title" style=" text-align-last: center;color: orangered;">NOTIFY FARMER</h4>
                    </div>

    <?php if (isset($_SESSION['register_id'])) { ?>
                        <div class="modal-body">
                            If you wish to buy, send a Message to Farmer  <hr/>

                            <textarea id="user_exist_msg" user-id="<?php echo $_SESSION['register_id']; ?>" rows="3" cols="65" placeholder="Write Here..."></textarea>
                        </div>
                        <div class="modal-footer">
                            <button type="button" data-id="<?php echo $sel_product[0]['prd_id']; ?>" id="user_exist_yes_send" class="btn btn-default" data-dismiss="modal">SEND</button>
                            <button type="button" id="no_send" class="btn btn-default" data-dismiss="modal">CANCEL</button>
                        </div>
        <?php
    } else {
        ?>
                        <div class="modal-body">
                            Please provide your details  <hr/>
                            <input type="text" placeholder="Fullname" id="wish_fname" class="form-control">
                            <input type="number" placeholder="Mobile Number" id="wish_mob" class="form-control">
                            <textarea id="wish_user_msg" rows="3" cols="40" placeholder="Write your Message Here..."></textarea>
                            <h6>Note: Farmer may contact you with this Number!</h6>
                        </div>
                        <div class="modal-footer">
                            <button type="button" data-id="<?php echo $sel_product[0]['prd_id']; ?>" id="yes_send" class="btn btn-default" data-dismiss="modal">SEND</button>
                            <button type="button" id="no_send" class="btn btn-default" data-dismiss="modal">CANCEL</button>
                        </div>
    <?php }
    ?>

                </div>
            </div>
        </div>
        <!-- Modal test end-->

    </div>
    <div class="clearfix"></div>

    <!--related_products-->
    <div class="col-md-5 col-sm-12" id="related_products_of_viewed_product">
        <font id="spon_rel_prd">Sponsored products related to this item</font>
        <div class="col-md-12 related_prd_border">
    <?php foreach ($det_relproduct as $each_fet_rel_product) { ?>
                <a target="_blank" href="view_product.php?c0f5de72e5c2cebef43b1bbb15ddd08e&9acb44549b41563697bb490144ec6258&73ce347c9ef8a7b158b4529673bf67ff=<?php echo base64_encode($each_fet_rel_product['prd_id'] . $key); ?>&534ec62ce4097791f3273f229ef5803c
                   =c0f5de72e5c2cebef43b1bbb15ddd08e&9acb44549b41563697bb490144ec6258
                   =b326b5062b2f0e69046810717534cb09">
                    <div class="col-md-6" id="releted_prd_frame">
                        <img src="<?php echo $each_fet_rel_product['image']; ?>" id="image_prd_rel" class="img-responsive" width="150px" height="150px">	
                        <fontt id="rel_prd_name"><?php echo $each_fet_rel_product['prd_name']; ?></fontt>
                    </div>
                </a>
    <?php }
    ?>
        </div>
    </div>

    <!--end_related_products-->

    <div class="clearfix"></div>


    <hr/>
    <div id="map" class="col-md-11 col-sm-12 google_map">
        <h4>Locate Farmer</h4>
        <iframe width="800" height="700" frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/place?q=<?php echo $ln_ ?>&key=AIzaSyBK-CtopWwGd6k5Zh7busSaWFAgDfcw1Lc" allowfullscreen></iframe>
    </div>
    <!--end_products page to display contents -->
    <div class="clearfix"></div>




    <div>
        <div id='afscontainer3'></div>
    </div>
    <?php
    require_once './core/user_footer.php';
} else {


    header('location:products.php');
}
?>
