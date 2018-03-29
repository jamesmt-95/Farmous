<?php
require_once '../config/config.php';
require_once '../core/Database.php';
//require_once 'admin_header.php';
require_once '../core/Hash.php';
require_once '../core/Session.php';
require_once '../core/data_fetcher.php';
/* datafetcher.php retrieves data from country,state,district,location to print on dropdown */
Session::init();
//$db = new Database(DB_TYPE, DB_HOST, DB_NAME, DB_USER, DB_PASS);
$db = new Database();
if (!isset($_SESSION['admin_id'])) {
    header('location:admin_login.php');
    #session_thanks_lord
} else {

    /* getting products to be approved */
    $added_prd = $db->prepare("SELECT * FROM `product_add` WHERE `status`=0");
    $added_prd->execute();
    $prouoct = $added_prd->fetchAll();
    /* getting products to be approved */
    ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="../public/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
    <link href="../public/css/style.css" rel="stylesheet" type="text/css" media="all" />
    <link href="../public/css/font-awesome.css" rel="stylesheet" type="text/css" media="all" />
    <link href="../public/css/font-awesome.min.css" rel="stylesheet" type="text/css" media="all" />
    <div class="clearfix"></div>

    <div class="col-md-10 col-sm-8 sub_main_head_child_child" id="sub_main_head_child_product_display">
        <!--edit_personal_info-->
        <div class="col-md-12 col-sm-12 profile_info_head">
            <div class="col-md-4 col-sm-12 profile_info_label">
                Products to be Approved
            </div>      







            <div class="col-md-offset-7">
            </div>
            <div class="clearfix"></div>


        </div>

        <div class="col-md-12 col-sm-12 profile_info_edit">
            <div class="col-md-4 col-sm-12 product_select">
                <select  name="get_value" class="form-control" id="admin_appr_product">
                    <option value="-1" disabled selected>Select Product</option>

                    <?php foreach ($prouoct as $each_prd_to_appr) { ?>
                        <option value=<?php echo $each_prd_to_appr['prd_id']; ?>><?php echo $each_prd_to_appr['prd_name']; ?></option>
                    <?php } ?>







                </select>
            </div>
            <div class="col-md-1">

            </div>




        </div>

        <div class="col-md-12 prd_edit_panel" id="edit_prd_panel">

        </div>
        <div class="col-md-12 prd_edit_pane_button" id="edit_prd_pan_button">
            
        </div>
        <div class="col-md-12 col-sm-8 description">


            <img src="../images/myProfileFooter_0cedbe.png" style="width: 100%">
            <br/><br/>
        </div>
        <div class="clearfix"></div>


        <!--edit_menu_on_click_edit-->

        <!--
                <div class="col-md-6" id="edit_user_product">
        
        
                    <div class="row space side">
                        <div class="col-sm-12 col-md-12">
                            <div class="col-sm-4  col-md-12">
                                Product Name
                            </div>
                            <div class="col-sm-6 col-md-12">
                                <input type="text" id="prod_name" class="form-control" placeholder="Enter Product Name" name="product_name"  onchange="pr_name()">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12">
                            <div class="col-sm-4  col-md-12">
                                Price
                            </div>
                            <div class="col-sm-6 col-md-12">
                                <input type="text" class="form-control" id="prod_price" name="price" placeholder="Enter the price of the product in INR" onchange="pr_price()" >
                            </div>
                        </div>
        
        
                    </div>
        
        
        
        
                    <div class="row space side">
        
        
                        <div class="col-sm-12 col-md-12">
                            <div class="col-sm-4  col-md-12" >
                                Stock
                            </div>
                            <div class="col-sm-6 col-md-12">
                                <input type="text" class="form-control" id="prod_stock" name="stock" placeholder="Stock in KG" onchange="pr_stock()" >
                            </div>
                        </div>
                    </div>
        
                    <div class="row space side">
        
                        <div class="col-sm-12 col-md-12">
                            <div class="col-sm-4  col-md-12" >
                                Description
                            </div>
                            <div class="col-sm-6 col-md-12">
                                <input type="text" class="form-control" id="prod_desc" name="description" placeholder="Optional Description">
        
        
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-10 user_prd_edit_save">
                        <div class="col-md-2  col-sm-8 edit_prd_submit">
                            <input type="submit" value="Save" id="edit_prd_submit">
                        </div>
                        <div class="col-md-offset-10">
        
                        </div>
        
                    </div>
                </div>
        -->



    </div>








    <!--closed_edit_menu_on_click_edit-->




    <div class="col-md-offset-2">

    </div>

    <hr/>


    <div class="clearfix"></div>












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
//require_once 'admin_footer.php';
?>

<script src="../public/js/upload_content.js"></script>
<script src="../public/js/validate.js"></script>
<script src="../public/js/jquery-1.11.1.min.js"></script>
<script src="../public/js/bootstrap.min.js"></script>
<script src="../public/js/execute.js"></script>
<script src="../public/js/jquery.menu-aim.js"></script>
<script src="../public/js/main.js"></script>
<script src="../public/js/modernizr.js"></script>