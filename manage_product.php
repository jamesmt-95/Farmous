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
    $user_added_prd = $db->prepare("SELECT * FROM `product_add` WHERE `register_id`='$user_id' and `status`=1");
    $user_added_prd->execute();
    $prd = $user_added_prd->fetchAll();
    
    
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
                Added Products
            </div>

            <div class="col-md-1 col-sm-12 profile_info_label">
                <a id="edit_prd" href="#">Edit</a>
            </div>
            <div class="col-md-1 col-sm-12 profile_info_label">
                <a id="cancel_edit_prd" href="#">Cancel</a>
            </div>
            <div class="col-md-1 col-sm-12 profile_info_label">
                <a id="del_edit_prd" href="#" data-toggle="modal" data-target="#modalDelete">Delete</a>
            </div>
            
            
            <!-- Modal test-->
            
            
            
            <div id="modalDelete" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title" style=" text-align-last: center;color: orangered;">DELETE</h4>
                        </div>
                        <div class="modal-body">
Hello <?php echo strtoupper($name_[0]['fullname']); ?>,  You Want to delete Product?
                        </div>
                        <div class="modal-footer">
                            <button type="button" id="yes_delete" class="btn btn-default" data-dismiss="modal">Yes</button>
                            <button type="button" id="no_delete" class="btn btn-default" data-dismiss="modal">No</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal test end-->
            
            
            
            
            
            <div class="col-md-offset-4">
            </div>
            <div class="clearfix"></div>


        </div>

        <div class="col-md-12 col-sm-12 profile_info_edit">
            <div class="col-md-4 col-sm-12 product_select">
                <select  name="get_value" class="form-control" id="user_edit_product">
                    <option value="-1" disabled selected>Select Product</option>

                    <?php foreach ($prd as $each_prd_info) { ?>
                        <option value=<?php echo $each_prd_info['prd_id']; ?>><?php echo $each_prd_info['prd_name']; ?></option>
                    <?php } ?>






                        
                </select>
            </div>
            <div class="col-md-1">

            </div>




        </div>

        <div class="col-md-12 prd_edit_panel" id="edit_prd_panel">

        </div>
        <div class="clearfix"></div>


        <!--edit_menu_on_click_edit-->


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
        <b>What happens when I Edit Added product?</b><br/>
        Your Product information that you have already given will be change, likewise. You'll receive all your product related information on your account.
        <hr/>
        <b>When will my Farmous account be updated with new changes?</b><br/>

        It happens as soon as you save the product details.
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

<script src="public/js/upload_content.js"></script>
<script src="public/js/validate.js"></script>
<script src="public/js/jquery-1.11.1.min.js"></script>
<script src="public/js/bootstrap.min.js"></script>
<script src="public/js/execute.js"></script>
<script src="public/js/jquery.menu-aim.js"></script>
<script src="public/js/main.js"></script>
<script src="public/js/modernizr.js"></script>