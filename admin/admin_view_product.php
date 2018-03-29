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
    <h3><p>Added Products</p></h3>

</div>

    <div class="container view_prd_type">

        <table class="table table-bordered" id="table_prd">

            <thead>
                <tr>
                    <th>S.No</th>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Stock</th>
                    <th>Image</th>
<!--                    <th>Added By</th>-->

                </tr>
            </thead>

            <tbody>
                <?php
                foreach ($product_details as $each_prd_details) {
                    ?>
                    <tr id="<?php echo $each_prd_details['prd_id']; ?>">
                        <td><?php echo $each_prd_details['prd_id']; ?></td>
                        <td><?php echo strtoupper($each_prd_details['prd_name']); ?></td>
                        <td><?php echo $each_prd_details['price']; ?></td>
                        <td><?php echo strtoupper($each_prd_details['stock']); ?></td>
                        <td><center><img src="../<?php echo $each_prd_details['image']; ?>"  height="70px" width="70px"></center></td>
<!--                <td><?php// echo $each_prd_details['register_id']; ?></td>-->

                </tr>

<?php } ?>


            </tbody>

        </table>
    </div>






<!--product_categories-->

<div class="container view_prd_type">


</div>

<?php
//require_once '../admin/admin_footer.php';
?>
