<?php

require_once '../config/config.php';
require_once '../core/Database.php';
//require_once 'admin_header.php';
require_once '../core/Hash.php';
require_once '../core/Session.php';
require_once '../core/data_fetcher.php';
require_once '../admin/data_fetch_admin.php';
Session::init();
//$db = new Database(DB_TYPE, DB_HOST, DB_NAME, DB_USER, DB_PASS);
$db = new Database();
if (!isset($_SESSION['admin_id'])) {
    header('location:admin_login.php');
    #session_thanks_lord
}
?>
<div  class="product_type_head">
    <h3><p>Added Product Types</p></h3>
    
</div>
<div class="container view_prd_type">

    <table class="table table-bordered">
        
        <thead>
            <tr>
                <th>S.No</th>
                <th>Product Type Name</th>
               
            </tr>
        </thead>
        
        <tbody>
            <?php foreach ($prd_type as $each_prd_type) { ?>
                <tr id="<?php echo $each_prd_type['product_type_id']; ?>">
                    <td><?php echo $each_prd_type['product_type_id']; ?></td>
                    <td><?php echo strtoupper($each_prd_type['product_type_name']); ?></td>
                    
                </tr>
            
        <?php } ?>
               

        </tbody>
       
    </table>
</div>

     



<!--product_categories-->
<div  class="product_category_head">
    <h3><p>Added Product Categories</p></h3>
    
</div>
<div class="container view_prd_type">

    <table class="table table-bordered">
        
        <thead>
            <tr>
                <th>Product Type</th>
                <th>Product Category</th>
                <th>Description</th>
               
            </tr>
        </thead>
        
        <tbody>
            <?php foreach ($prd_cat as $each_prd_cat) { ?>
                <tr id="<?php echo $each_prd_cat['cat_id']; ?>">
                    <td><?php echo strtoupper($each_prd_cat['product_type_name']); ?></td>
                    <td><?php echo strtoupper($each_prd_cat['cat_name']); ?></td>
                    <td><?php echo strtoupper($each_prd_cat['cat_description']); ?></td>
                    
                </tr>
            
        <?php } ?>
               

        </tbody>
       
    </table>
</div>

<?php
//require_once '../admin/admin_footer.php';
?>
