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


    $get_user_trans = $db->prepare("SELECT `seller_id`, `buyer_id`, `trans_date`, `prd_id`, `unit_cost`, `qty`, `tot_price` FROM `transaction_rcrd` WHERE `seller_id`='$user_id' or `buyer_id`='$user_id'");
    $get_user_trans->execute();
    $all_details = $get_user_trans->fetchAll();
    if ($all_details == NULL) {
        ?>

        <div class="col-md-12" id="removed_prd">
            <h4 id="no_prd">No Transaction records found!</h4>
        </div>
        <?php
    } else {
        ?>     
        <div class="col-md-12 container" id="user_history">        
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Seller</th>
                        <th>Buyer</th>
                        <th>Date</th>
                        <th>Product</th>
                        <th>Unit Cost</th>
                        <th>Quantity</th>
                        <th>Total Cost</th>
                    </tr>
                </thead>
                <tbody>


                    <?php
                    foreach ($all_details as $each_rcrd) {
                        $seller_name_id = $each_rcrd['seller_id'];
                        $get_seller = $db->prepare("SELECT `fullname` FROM `register` WHERE `register_id`='$seller_name_id'");
                        $get_seller->execute();
                        $seller_is = $get_seller->fetchAll();

                        $buyer_name_id = $each_rcrd['buyer_id'];
                        $get_buyer = $db->prepare("SELECT `fullname` FROM `register` WHERE `register_id`='$buyer_name_id'");
                        $get_buyer->execute();
                        $buyer_is = $get_buyer->fetchAll();

                        $prd_name_id = $each_rcrd['prd_id'];
                        $get_prd_name = $db->prepare("SELECT `prd_name` FROM `product_add` WHERE `prd_id`='$prd_name_id'");
                        $get_prd_name->execute();
                        $prd_name_is = $get_prd_name->fetchAll();
                        ?>
                    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
                    <link href="./public/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
                    <link href="./public/css/style.css" rel="stylesheet" type="text/css" media="all" />
                    <link href="./public/css/font-awesome.css" rel="stylesheet" type="text/css" media="all" />
                    <link href="../public/css/font-awesome.min.css" rel="stylesheet" type="text/css" media="all" />
                    <div class="clearfix"></div>




                    <tr>
                        <td><h5><?php echo $seller_is[0]['fullname']; ?></h5></td>
                        <td> <h5><?php echo $buyer_is[0]['fullname']; ?></h5></td>
                        <td><h5><?php echo $each_rcrd['trans_date']; ?></h5></td>
                        <td> <h5><?php echo $prd_name_is[0]['prd_name']; ?></h5></td>
                        <td>  <h5><?php echo $each_rcrd['unit_cost']; ?></h5></td>
                        <td><h5><?php echo $each_rcrd['qty']; ?></h5></td>
                        <td> <h5><?php echo $each_rcrd['tot_price']; ?></h5></td>

                    </tr>





                    <!--end_table_view-->






                   


                    <?php
                }
            }
        }
        ?>
        </tbody>
    </table>
</div>


<div class="col-md-12 col-sm-8 description">
            <hr/>
            <p id="edit_desc">
                <b>FAQs</b>

            <br/><hr/>
            <b>What this table shows?</b><br/>
            This table shows your previous transactions on Farmous, including purchase as well as Selling. 

            <hr/>
            <b>Is it accessible at all time?</b><br/>
            Yes. It will be updated when you involved in a transaction.

            <hr/>





        </p>
        <img src="images/myProfileFooter_0cedbe.png" style="width: 100%">
        <br/><br/>
        </div>




