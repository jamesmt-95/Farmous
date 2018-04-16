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



$keyword = $_POST['search_key'];
if (($keyword == '') || (is_numeric($keyword))) {
    header('location:products.php');
} else {




    $get_prd = $db->prepare("SELECT * FROM `product_add` WHERE `prd_name` like '%$keyword%' and status=1 ORDER BY `prd_id` asc ");
    $get_prd->execute();
    $all_prd = $get_prd->fetchAll();
    ?>
    <div class="clearfix"></div>
    <!--products page to display contents -->
    <div class="col-md-2 warning">
        *Min Purchase Should be 1Kg
    </div>
    <div class="col-md-12 col-sm-12 products_parent">
        <!--refine_result_head-->

        <div class="col-md-3 col-sm-2 refine_result_child">

            <br/>
            <h4>Refine results</h4>
            <a id="find_all_prd" href="">Reset</a>

            <hr/>
            <br/>

            <div class="col-md-12 col-sm-2 refine_content">
                <div class="col-sm-4  col-md-12" >
                    Find by Product Type
                </div>
                <div class="col-sm-6 col-md-12">
                    <select class="form-control" id="refine_product_type">
                        <option value="-1" disabled selected>Select Product Type</option>

                        <?php foreach ($get_product_type as $each_prd_type) { ?>
                            <option value=<?php echo $each_prd_type['product_type_id']; ?>><?php echo strtoupper($each_prd_type['product_type_name']); ?></option>
                        <?php } ?>

                    </select>
                </div>


            </div>
            <div class="clearfix"></div>
            <hr/>
            <br/>

            <div class="col-md-12 col-sm-2 refine_content">
                <div class="col-sm-4  col-md-12">
                    Find by Product Category
                </div>
                <div class="col-sm-6 col-md-12">
                    <select class="form-control" id="refine_product_type_cat">
                        <option value="-1" disabled selected>Select Product Type</option>

                        <?php foreach ($get_product_type as $each_prd_type) { ?>
                            <option value=<?php echo $each_prd_type['product_type_id']; ?>><?php echo strtoupper($each_prd_type['product_type_name']); ?></option>
                        <?php } ?>

                    </select>
                </div>
                <div class="clearfix"></div>
                <br/>
                <div class="col-sm-6 col-md-12">
                    <select class="form-control" id="refine_product_cat">


                    </select>
                </div>
                <div class="clearfix"></div>
                <hr/>
                <br/>
                <div class="col-sm-4  col-md-12" >
                    <!--                Sort by-->
                </div>
                <div class="col-sm-6 col-md-12">
    <!--                <select class="form-control" id="refine_product_sort">
                        <option value='-1' disabled hidden selected>Select Sort</option>
                        <option value="1">Relevance</option>
                        <option value="2">Price (Low to High)</option>
                        <option value="3">Price (High to Low)</option>
                        <option value="4">Name (A to Z)</option>

                    </select>-->
                </div>
                <div class="clearfix"></div>

                <br/>

            </div>
            <div class="clearfix"></div>

            <br/>


        </div>
        <!--main_head-->

        <div class="col-md-9 col-sm-8 sub_main_head_child_child" id="sub_main_head_child_product_display">
            <?php foreach ($all_prd as $fet_product) { ?>


                <div class="col-md-3 top_brand_left">
                    <div class="hover14 column">
                        <a target="_blank" href="view_product.php?9acb44549b415b326b5062b2f0e69046810717534cb63697bb490144ec6258
                           b326b5062b2f0e69046810717534cb09&73ce347c9ef8a7b158b4529673bf67ff=<?php echo base64_encode($fet_product['prd_id'] . $key) ?>&534ec62ce4097791f3273f229ef5803c
                           =c0f5de72e5c2cebef43b1bbb15ddd08e&9acb44549b41563697bb490144ec6258
                           =b326b5062b2f0e69046810717534cb09"><div class="farmous_top_brand_left_grid">
                                <div class="farmous_top_brand_left_grid1">
                                    <figure>
                                        <div class="snipcart-item block" >
                                            <div class="snipcart-thumb">
                                                <img src="<?php echo $fet_product['image']; ?>" id="image_prd"  class="img-responsive" width="125px" height="125px">		
                                                <h3><p id="<?php echo $fet_product['prd_id']; ?>"><?php echo strtoupper($fet_product['prd_name']); ?></p></h3>
                                                <h4> &#8377 <?php echo $fet_product['price']; ?></h4>

                                            </div>

                                        </div>
                                    </figure>
                                </div>
                            </div></a>
                    </div>
                </div>
                <?php
            }
        }
        ?>
    </div>

</div>
<!--end_products page to display contents -->
<div class="clearfix"></div>

<?php
require_once './core/user_footer.php';
?>