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
    $farm_added = $db->prepare("SELECT `prd_id`,`prd_name`FROM `product_add` WHERE `register_id`='$farm_id'");
    $farm_added->execute();
    $detail_added = $farm_added->fetchAll();
    if ($detail_added == NULL) {
        ?>    


        <div class = "col-md-12" id = "removed_prd">
            <h4 id = "no_prd">No Products added yet!</h4>
        </div >

        <?php
        } else{


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

        <div class="col-md-10 col-sm-8 sub_main_head_child_child_otp" id="sub_main_head_child_product_display_otp">
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
            </div>
            <div class="row space side">
                <div class="col-sm-12 col-md-12">
                    <div class="col-sm-6 col-md-6">
                        <div class="col-sm-4  col-md-12">
                            Product Name
                        </div>
                        <div class="col-sm-6 col-md-12">
                            <select class="form-control" id="refine_product_name">
                                <option value="-1" disabled selected>Select Product</option>

                                <?php foreach ($detail_added as $each_added_prd) { ?>
                                    <option value=<?php echo $each_added_prd['prd_id']; ?>><?php echo $each_added_prd['prd_name']; ?></option>
                                <?php } ?>

                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6">
                        <div class="col-sm-4  col-md-12">
                            Quantity (in Kg)
                        </div>
                        <div class="col-sm-6 col-md-12">
                            <input type="number" class="form-control" id="prod_qua" name="price" placeholder="Enter the Quantity in Kg">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row space side">
                <div class="col-sm-12 col-md-12">

                    <div class="col-sm-6 col-md-6">
                        <div class="col-sm-4  col-md-12">
                            Total Price (&#8377;)
                        </div>
                        <div class="col-sm-6 col-md-12">
                            <input type="text" class="form-control" id="tot_price" name="price" placeholder=" Total Price"  readonly>
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
                <div class="col-md-offset-6">
                    <div class="col-md-5 col-sm-12" id="success_receipt"></div>
                </div>

            </div>
        </div>

        <div class="clearfix"></div>
        <!--for printing the PDF-->

        <div class="col-md-9" id="pdf_container">
            <div class="col-md-12" id="header">
                <div class="col-md-6" id="farmous_logo">
                    <img src="images/slider/div_logo.JPG" id="image_prd"  class="img-responsive" width="auto" height="auto">	
                </div>
                <div class="col-md-6" id="label">
                    <div class="col-md-12" id="label">
                        <p id="font_label">Invoice/Bill of Product Purchase</p>
                    </div>
                    <div class="col-md-12" id="label">
                        <p id="font_tran_date">Purchase Date: </p>
                    </div>
                    <div class="col-md-12" id="label">
                        <p id="font_tran_number">Transaction Type: Far-DIRTD2018 </p>
                    </div>
                </div>
            </div>

            <div class="clearfix"></div>
            <hr/>

            <div class="col-md-12" id="header_panel">
                <div class="col-md-6" id="farmous_sold_by">
                    <div class="col-md-12" id="label">
                        <p id="font_label_sold">Sold By:</p>
                    </div>
                    <div class="col-md-12" id="label">
                        <p id="font_label_name"></p>
                    </div>
                    <div class="col-md-12" id="label">
                        <p id="font_label_phone"></p>
                    </div>
                </div>
                <div class="col-md-6" id="farmous_sold_to">
                    <div class="col-md-12" id="label">
                        <p id="font_label">Sold To:</p>
                    </div>
                    <div class="col-md-12" id="label">
                        <p id="font_label_sold_to_name"></p>
                    </div>
                    <div class="col-md-12" id="label">
                        <p id="font_label_sold_to_phone"></p>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
            <hr/>
            <div class="col-md-12" id="display_frame">
                <div class="col-md-3" id="display_frame_prd_name">
                    <p id="prd_name">Product Name</p>
                </div>
                <div class="col-md-3" id="display_frame_prd_unit_price">
                    <p id="prd_price">Unit Price</p>
                </div>
                <div class="col-md-3" id="display_frame_prd_quan">
                    <p id="prd_quan">Quantity</p>
                </div>
                <div class="col-md-3" id="display_frame_tot_cost">
                    <p id="prd_total">Total</p>
                </div>
            </div>
            <div class="col-md-12" id="display_frame_values">
                <div class="col-md-3" id="display_frame_prd_name">
                    <p id="prd_name_value"></p>
                </div>
                <div class="col-md-3" id="display_frame_prd_unit_price">
                    <p id="prd_price_value">&#8377;</p>
                </div>
                <div class="col-md-3" id="display_frame_prd_quan">
                    <p id="prd_quan_value"></p>
                </div>
                <div class="col-md-3" id="display_frame_tot_cost">
                    <p id="prd_total_value">&#8377;</p>
                </div>
            </div>

            <div class="col-md-12" id="display_frame_footer">
                <div class="col-md-12" id="display_frame_footer">
                    <p id="footer_txt">Thank you for purchasing with us</p>
                </div>
                <div class="col-md-12" id="display_footer_contact">
                    <p id="footer_txt">For more, visit www.farmousstore.ga or mail farmouscare@gmail.com </p>
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
}
?>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.js"></script>