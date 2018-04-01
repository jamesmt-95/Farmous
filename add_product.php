<?php
error_reporting(0);
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


    if (isset($_POST['add_product'])) {



        $reg_id = $_SESSION['register_id'];
        $far_id = $db->prepare("SELECT `fullname`, `phone` FROM `register` WHERE `register_id`='$reg_id'");
        $far_id->execute();
        $far_is = $far_id->fetchAll();
        $far_name = $far_is[0]['fullname'];
        $far_phone = $far_is[0]['phone'];


        $prd_name = $_POST['product_name'];


        $prd_category = $_POST['pr_category'];

        $prd_price = $_POST['price'];
        $prd_stock = $_POST['stock'];

        $prd_image = "upload_image/" . time() . "" . htmlspecialchars($_FILES['image']['name']);
        move_uploaded_file($_FILES['image']['tmp_name'], $prd_image);
        $prd_description = $_POST['description'];

        if (($prd_name === '') || ($prd_price === '') || ($prd_stock === '')) {
            echo"<script>alert('Please Enter All Details');</script>";
        } else {


            $sql_verify = $db->prepare("SELECT `prd_name` FROM `product_add` WHERE `prd_name`='$prd_name'");
            $sql_verify->execute();
            $data = $sql_verify->fetchAll();


            if ($data[0]['prd_name'] == $prd_name) {


                echo"<script>alert('Data Exists');</script>";
            } else {

                $add_query = $db->prepare("INSERT INTO `product_add`(`cat_id`, `register_id`, `prd_name`, `price`, `stock`, `image`, `description`, `status`) VALUES ('$prd_category','$reg_id','$prd_name','$prd_price','$prd_stock','$prd_image','$prd_description',0)");
                $add_query->execute();
                if ($add_query) {
                    echo"<script>alert('Product Added');</script>";
                    $content = "Hello " . $far_name . ". You have recently added  " . $prd_name . " at Rs:" . $prd_price . "/- to Farmous Store.buy at Rs: " . $prd_price . ". If it's not you,send your review to farmouscare@gmail.com";
                    sendprd_add($content, $far_phone);
                }
            }
        }
    } else {
        
    }
}
?>

<div class="clearfix"> </div>
<form action="" name="add_product" id="add_product" method="POST" enctype="multipart/form-data">
    <div class="container">
        <div class="farmous_login login_head">
            <h3>Add Product</h3>

            <div class="row space side">
                <div class="col-sm-12 col-md-6">
                    <div class="col-sm-4  col-md-6">
                        Product Name
                    </div>
                    <div class="col-sm-6 col-md-8">
                        <input type="text" id="prd_name" class="form-control" name="product_name" placeholder="Product Name" onchange="pr_name()">
                    </div>
                </div>

                <div class="col-sm-12 col-md-6">
                    <div class="col-sm-4  col-md-6" >
                        Product Type
                    </div>
                    <div class="col-sm-6 col-md-8">
                        <select class="form-control" id="product_type" name="pr_type">
                            <option value="-1" disabled selected>Select Product Type</option>

                            <?php foreach ($get_product_type as $each_prd_type) { ?>
                                <option value=<?php echo $each_prd_type['product_type_id']; ?>><?php echo strtoupper($each_prd_type['product_type_name']); ?></option>
                            <?php } ?>


                        </select>
                    </div>
                </div>
            </div>

            <div class="row space side">
                <div class="col-sm-12 col-md-6">
                    <div class="col-sm-4  col-md-6">
                        Category
                    </div>
                    <div class="col-sm-6 col-md-8">
                        <select class="form-control"  id="prd_category" name="pr_category">

                        </select>
                    </div>
                </div>

                <div class="col-sm-12 col-md-6">
                    <div class="col-sm-4  col-md-6" >
                        Similar Products
                    </div>
                    <div class="col-sm-6 col-md-8">
                        <select class="form-control" id="prd_cat_desc">

                        </select>
                    </div>
                </div>
            </div>


            <div class="row space side">
                <div class="col-sm-12 col-md-6">
                    <div class="col-sm-4  col-md-6">
                        Price
                    </div>
                    <div class="col-sm-6 col-md-8">
                        <input type="text" class="form-control" id="prd_price" name="price" placeholder="Enter the price of the product in INR" onchange="pr_price()" >
                    </div>
                </div>

                <div class="col-sm-12 col-md-6">
                    <div class="col-sm-4  col-md-6" >
                        Stock
                    </div>
                    <div class="col-sm-6 col-md-8">
                        <input type="text" class="form-control" id="prd_stock" name="stock" placeholder="Stock in KG" onchange="pr_stock()" >
                    </div>
                </div>
            </div>

            <div class="row space side">
                <div class="col-sm-12 col-md-6">
                    <div class="col-sm-4  col-md-6">
                        Image
                    </div>
                    <div class="col-sm-6 col-md-8">
                        <input type="file" class="form-control" name="image" accept="image/jpeg,image/png">

                    </div>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="col-sm-4  col-md-6" >
                        Description
                    </div>
                    <div class="col-sm-6 col-md-8">
                        <input type="text" class="form-control" name="description" placeholder="Optional Description">


                    </div>
                </div>
            </div>
            <div class="row space side">
                <div class="col-sm-12 col-md-6">
                    <div class="col-sm-4  col-md-6">
                        <!--                                District-->
                    </div>
                    <div class="col-sm-6 col-md-8">
<!--                                <select class="form-control" name="district">


                        </select>
                        </select>-->
                    </div>
                </div>
                <!-- arrival place-->
                <div class="col-sm-12 col-md-6">
                    <div class="col-sm-4  col-md-6" >
                        <!--                                Location-->
                    </div>
                    <div class="col-sm-6 col-md-8">
<!--                                <select class="form-control" name="location">

                        </select>-->
                    </div>
                </div>
            </div>



        </div>


        <div class="col-md-12 col-sm-10">
            <div class="col-md-offset-4 col-sm-8 submit">
                <input type="submit" value="Save" name="add_product">
            </div>

        </div>


    </div>
</form>
</div>

</div>
</div>
<!-- //login -->
</div>
<div class="clearfix"></div>
</div>
<?php
require_once './core/user_footer.php';
?>