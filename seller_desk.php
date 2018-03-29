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
    $farm_name = $db->prepare("SELECT `fullname` FROM `register` WHERE `register_id`='$farm_id'");
    $farm_name->execute();
    $detail_farmer = $farm_name->fetchAll();



    /* gettin first letter of user full_name */
    $buyer_lst = $db->prepare("SELECT `register_id`, `fullname`, `phone`, `address`, `username`, `password`, `location_id`, `status` FROM `register` WHERE `register_id`!='$farm_id' and `status`=1");
    $buyer_lst->execute();
    $all_buyers = $buyer_lst->fetchAll();
    ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="./public/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
    <link href="./public/css/style.css" rel="stylesheet" type="text/css" media="all" />
    <link href="./public/css/font-awesome.css" rel="stylesheet" type="text/css" media="all" />
    <link href="../public/css/font-awesome.min.css" rel="stylesheet" type="text/css" media="all" />
    <div class="clearfix"></div>

    <div class="col-md-10 col-sm-8 sub_main_head_child_child" id="sub_main_head_child_product_display">
        <!--edit_personal_info-->
        <div class="col-md-12 col-sm-12 profile_info_head">
            <div class="col-md-4 col-sm-12 profile_info_label">
                Select Buyer
            </div>

            <div class="col-md-offset-4">
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="col-md-12 col-sm-12 profile_info_edit">
            <div class="col-md-4 col-sm-12 product_select">
                <select  name="get_value" far-id="<?php echo $farm_id; ?>" class="form-control" id="far_find_buyer">
                    <option value="-1" disabled selected>Select Buyer</option>

                    <?php foreach ($all_buyers as $each_buyer_info) { ?>
                        <option value=<?php echo $each_buyer_info['register_id']; ?>><?php echo $each_buyer_info['fullname']; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="col-md-2">
                <button type="button" id="validate_buyer" class="btn btn-success">Get OTP</button>
            </div>
        </div>
        <!--2nd_break-->

        <div class="col-md-12 col-sm-12" id="otp_field_block">
            <div class="col-md-12 col-sm-12" id="profile_info_label_otp">
                Enter the OTP
            </div>
            <div class="col-md-4  col-sm-12 product_select">
                <input type="text" id="otp_txt" class="form-control" maxlength="6">
            </div>
            <div class="col-md-2">
                <button type="button" id="verify_otp" class="btn btn-success">Verify</button>
            </div>
            <div class="col-md-3" id="timer_frame">
                <div id="timer">2:00</div>
            </div>
            <div class="col-md-12 col-sm-12" id="failure_panel"></div>
        </div>

        <!--close_break-->
    </div>
    <div class="modal fade" id="modal_otp_status" role="dialog">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"><p id="con_status_tick">&#10004;</p></h4>
                </div>
                <div class="modal-body">
                    <p>OTP Verified Successfully.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>


    <!--edit_menu_on_click_edit-->


    <div class="col-md-6" id="generate_receipt_for_product">
        <div class="col-sm-12  col-md-12" id="invoice_label">
            <p id="invoice">Product Delivery Invoice</p>
        </div>
        <div class="row space side">
            <div class="col-sm-12 col-md-12">
                <div class="col-sm-6 col-md-6">
                    <div class="col-sm-4  col-md-12">
                        Farmer Name
                    </div>
                    <div class="col-sm-6 col-md-12">
                        <input type="text" id="farmer_name" class="form-control"  id="far_name" readonly>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6">
                    <div class="col-sm-4  col-md-12">
                        Buyer Name
                    </div>
                    <div class="col-sm-6 col-md-12">
                        <input type="text" id="buyer_name" class="form-control"  id="buyer_name" readonly>
                    </div>
                </div>
            </div>

            <div class="col-sm-12 col-md-12">
                <div class="col-sm-6 col-md-6">
                    <div class="col-sm-4  col-md-12">
                        Product Type
                    </div>
                    <div class="col-sm-6 col-md-12">
                        <select class="form-control" id="refine_product_type_cat">
                            <option value="-1" disabled selected>Select Product Type</option>

                            <?php foreach ($get_product_type as $each_prd_type) { ?>
                                <option value=<?php echo $each_prd_type['product_type_id']; ?>><?php echo strtoupper($each_prd_type['product_type_name']); ?></option>
                            <?php } ?>

                        </select>
                    </div>
                </div>  
                <div class="col-sm-6 col-md-6">
                    <div class="col-sm-4  col-md-12">
                        Type Category
                    </div>
                    <div class="col-sm-6 col-md-12">
                        <select class="form-control" id="refine_product_cat">


                        </select>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-12">
                <div class="col-sm-6 col-md-6">
                    <div class="col-sm-4  col-md-12">
                        Product Name
                    </div>
                    <div class="col-sm-6 col-md-12">
                       <select class="form-control" id="refine_product_name">


                        </select>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6">
                    <div class="col-sm-4  col-md-12">
                        Quantity (in Kg)
                    </div>
                    <div class="col-sm-6 col-md-12">
                        <input type="text" class="form-control" id="prod_price" name="price" placeholder="Enter the Quantity in Kg">
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-12">
                <div class="col-sm-6 col-md-6">
                    <div class="col-sm-4  col-md-12">
                        Total Price
                    </div>
                    <div class="col-sm-6 col-md-12">
                        <input type="text" class="form-control" id="prod_price" name="price" placeholder=" Total Price"  readonly>
                    </div>
                </div>


                <div class="col-sm-6 col-md-6">
                    <div class="col-sm-4  col-md-12" >
                        Description
                    </div>
                    <div class="col-sm-6 col-md-12">
                        <input type="text" class="form-control" id="prod_desc" name="description" placeholder="Optional Description">


                    </div>
                </div>
            </div>

        </div>




        <div class="col-md-12 col-sm-10 user_prd_edit_save">
            <div class="col-md-2  col-sm-8" id="receipt_submit">
                <input type="submit" value="Generate Receipt" id="submit_receipt">
            </div>
            <div class="col-md-offset-10">

            </div>

        </div>
    </div>



    </div>








    <!--closed_edit_menu_on_click_edit-->




    <div class="col-md-offset-2">

    </div>
    <div class="clearfix"></div>
    <hr/>


    <div class="clearfix"></div>










    <div class="col-md-12 col-sm-8 description">
        <p id="edit_desc">
            <b>FAQs</b>

        <br/><hr/>
        <b>What happens when I Select Buyers Name?</b><br/>
        It will allow you to validate your buyer with an OTP received on the buyers mobile. 

        <hr/>
        <b>How to generate receipt of the transaction?</b><br/>
        First of all, you should select the buyer and validate using OTP. Then select the product and enter the details. Once completed submit the receipt.

        <hr/>





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
<script src="public/js/jquery-1.11.1.min.js"></script>
<script src="public/js/jquery.cookie.js"></script>
<script src="public/js/upload_content.js"></script>
<script src="public/js/validate.js"></script>
<script src="public/js/bootstrap.min.js"></script>
<script src="public/js/execute.js"></script>
<script src="public/js/timer_otp.js"></script>
<script src="public/js/jquery.menu-aim.js"></script>
<script src="public/js/main.js"></script>
<script src="public/js/modernizr.js"></script>