<?php
require_once '../config/config.php';
require_once '../core/Database.php';
require_once 'admin_header.php';
require_once '../core/Hash.php';
require_once '../core/Session.php';
require_once '../core/data_fetcher.php'; /* datafetcher.php retrieves data from country,state,district,location to print on dropdown */
Session::init();
//$db = new Database(DB_TYPE, DB_HOST, DB_NAME, DB_USER, DB_PASS);
$db = new Database();
if (!isset($_SESSION['admin_id'])) {
    header('location:admin_login.php');
}
?>
<div class="head_admin col-sm-12 col-md-12"> 
    <h4 id="text_1">MANAGE PRODUCT CATEGORY</h4>
</div>
<div class="col-sm-12 col-md-12">
    <div class="header_ col-sm-12 col-md-12">
        <div class="col-sm-4  col-md-2" >
            Add Product Type
        </div>
        <div class="col-sm-6 col-md-2">
            <input type="text" style="text-transform:uppercase" class="form-control" id="add_type" placeholder="Add product type" required=" ">
        </div>
        <div class="col-sm-6 col-md-2">
        </div>
        <div class="col-sm-6 col-md-3">
            <input type="submit"  id="add_product_type" name="add_product_type" value="Save Changes">
        </div>
    </div>
</div>
<div class="header_ col-sm-12 col-md-12">
    <div class="col-sm-4  col-md-2" >
        Add Product Category
    </div>
    <div class="col-sm-6 col-md-2">
        <select class="form-control" id="selected_product_type"  >
            <option value="-1" disabled selected>Select Product Type</option>
            <?php foreach ($product_type_get as $each_type) { ?>
                <option value=<?php echo $each_type['product_type_id']; ?>><?php echo strtoupper($each_type['product_type_name']); ?></option>
            <?php } ?>
        </select>
    </div>
    <div class="col-sm-6 col-md-2">
        <input type="text" class="form-control"  style="text-transform:uppercase" id="product_category" placeholder="Category" required=" ">
    </div>
    <!--product_cat_description-->
    <div class="col-sm-6 col-md-2">
        <input type="text" class="form-control"  style="text-transform:uppercase" id="product_category_description" placeholder="Description" required=" ">
    </div>
    <!--end_product_cat_description-->
    <div class="col-sm-6 col-md-3">
        <input type="submit"  id="add_product_category"  value="Save Changes">
    </div>
</div>







<div class="clearfix"></div>
<div class="clearfix"></div>
<div class="set_base">
</div>
<?php
require_once 'admin_footer.php';
?>