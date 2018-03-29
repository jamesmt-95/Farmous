<?php
require_once './core/user_header.php';
require_once './config/config.php';
require_once './core/Database.php';
require_once './core/Hash.php';
require_once './core/Session.php';
Session::init();
$db=new Database();
?>


 <div class="col-md-12 col-xs-12">
     <div class="col-md-2 gotoprd">
         <a href="products.php"><p id="head">Goto Product</p></a>
     </div>
 </div>
    <div class="col-sm-12 col-xs-11 col-md-10 main_head">
        <div class="container slider sub_main_head">

            <div id="myCarousel" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                    <li data-target="#myCarousel" data-slide-to="1"></li>
                    <li data-target="#myCarousel" data-slide-to="2"></li>
                    <li data-target="#myCarousel" data-slide-to="3"></li>
                    <li data-target="#myCarousel" data-slide-to="4"></li>
                    <li data-target="#myCarousel" data-slide-to="5"></li>
                    <li data-target="#myCarousel" data-slide-to="6"></li>
                </ol>

                <!-- Wrapper for slides -->
                <div class="carousel-inner imager">

                    <div class="item active">
                        <img src="images/slider/Chestnuts-from-Himalayas1200x300_1.jpg"  class="img-responsive" style="width:100%; height:400px;">

                    </div>

                    <div class="item">
                        <img src="images/slider/Fruits_pinaple-1200x300.jpg" class="img-responsive" style="width:100%; height:400px;">
                    </div>

                    <div class="item">
                        <img src="images/slider/Quick-cook-1200x300.jpg" class="img-responsive" style="width:100%; height: 400px;">

                    </div>
                    <div class="item">
                        <img src="images/slider/apple_1200x300_V2.jpg" class="img-responsive" style="width:100%; height: 400px;">

                    </div>
                    <div class="item">
                        <img src="images/slider/bb_1200pxX300px-01.jpg" class="img-responsive" style="width:100%; height: 400px;">

                    </div>
                    <div class="item">
                        <img src="images/slider/bb_1200pxX300px-02.jpg" class="img-responsive" style="width:100%; height: 400px;">

                    </div>
                      <div class="item">
                          <img src="images/slider/bb_1200px_X_300px-3.jpg" class="img-responsive" style="width:100%; height: 400px;">

                    </div>

                </div>
                <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#myCarousel" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
        
    </div>
<div class="clearfix"></div>
   
    <!-- banner -->
    
    <div class="clearfix"> </div>
</div>

<div class="top-brands">
    <div class="container">
        <h3>Hot Offers</h3>
        <div class="farmous_top_brands_grids">
            <div class="col-md-3 top_brand_left">
                <div class="hover14 column">
                    <div class="farmous_top_brand_left_grid">
                        <div class="farmous_top_brand_left_grid1">
                            <figure>
                                <div class="snipcart-item block" >
                                    <div class="snipcart-thumb">
                                        <a href="products.php"><img title=" " alt=" " src="images/11.png" class="img-responsive" /></a>		
                                        <p>Kashmiri Apple</p>
                                        <h3> &#8377 200 <span>&#8377 240</span></h3>
                                    </div>

                                </div>
                            </figure>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 top_brand_left">
                <div class="hover14 column">
                    <div class="farmous_top_brand_left_grid">
                        <div class="farmous_top_brand_left_grid1">
                            <figure>
                                <div class="snipcart-item block" >
                                    <div class="snipcart-thumb">
                                        <a href="products.php"><img title=" " alt=" " src="images/12.png" class="img-responsive"/></a>		
                                        <p>Coli Flower (1Kg)</p>
                                        <h3>&#8377 45<span>&#8377 70</span></h3>
                                    </div>

                                </div>
                            </figure>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 top_brand_left">
                <div class="hover14 column">
                    <div class="farmous_top_brand_left_grid">
                        <div class="farmous_top_brand_left_grid_pos">
                            <img src="images/offer.png" alt=" "  />
                        </div>
                        <div class="farmous_top_brand_left_grid1">
                            <figure>
                                <div class="snipcart-item block">
                                    <div class="snipcart-thumb">
                                        <a href="products.php"><img src="images/36.png" alt=" " class="img-responsive" /></a>
                                        <p>Strawberry(1Kg)</p>
                                        <h3>&#8377 310 <span>&#8377 420</span></h3>
                                    </div>

                                </div>
                            </figure>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 top_brand_left">
                <div class="hover14 column">
                    <div class="farmous_top_brand_left_grid">
                        <div class="farmous_top_brand_left_grid_pos">
                            <img src="images/offer.png" alt=" " class="img-responsive" />
                        </div>
                        <div class="farmous_top_brand_left_grid1">
                            <figure>
                                <div class="snipcart-item block">
                                    <div class="snipcart-thumb">
                                        <a href="products.php"><img src="images/29.png" alt=" " class="img-responsive" /></a>
                                        <p>Banana (1Kg)</p>
                                        <h3>&#8377 48 <span>&#8377 60</span></h3>
                                    </div>

                                </div>
                            </figure>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="clearfix"> </div>
        </div>
    </div>
</div>

<div class="clearfix"></div>
<div class="top-brands">
    <div class="container">
        <h3>Top Products</h3>
        <div class="farmous_top_brands_grids">
            <div class="col-md-3 top_brand_left">
                <div class="hover14 column">
                    <div class="farmous_top_brand_left_grid">
                        <div class="farmous_top_brand_left_grid1">
                            <figure>
                                <div class="snipcart-item block" >
                                    <div class="snipcart-thumb">
                                        <a href="products.php"><img title=" " alt=" " src="upload_image/150809439410000127_17-fresho-lemon.jpg" class="img-responsive" /></a>		
                                        <p>Fresh Lemon</p>
                                        <h3> &#8377 78 <span>&#8377 90</span></h3>
                                    </div>

                                </div>
                            </figure>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 top_brand_left">
                <div class="hover14 column">
                    <div class="farmous_top_brand_left_grid">
                        <div class="farmous_top_brand_left_grid1">
                            <figure>
                                <div class="snipcart-item block" >
                                    <div class="snipcart-thumb">
                                        <a href="products.php"><img title=" " alt=" " src="upload_image/150815092010000097_19-fresho-coriander-leaves.jpg" class="img-responsive"/></a>		
                                        <p>Coriander Leafs</p>
                                        <h3>&#8377 12<span>&#8377 18</span></h3>
                                    </div>

                                </div>
                            </figure>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 top_brand_left">
                <div class="hover14 column">
                    <div class="farmous_top_brand_left_grid">
                        <div class="farmous_top_brand_left_grid_pos">
                            <img src="images/offer.png" alt=" "  />
                        </div>
                        <div class="farmous_top_brand_left_grid1">
                            <figure>
                                <div class="snipcart-item block">
                                    <div class="snipcart-thumb">
                                        <a href="products.php"><img title=" " alt=" " src="upload_image/150815213220000919_13-fresho-apple-washington.jpg" class="img-responsive"/></a>
                                        <p>Washington Apple</p>
                                        <h3>&#8377 125 <span>&#8377 148</span></h3>
                                    </div>

                                </div>
                            </figure>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 top_brand_left">
                <div class="hover14 column">
                    <div class="farmous_top_brand_left_grid">
                        <div class="farmous_top_brand_left_grid_pos">
                            <img src="images/offer.png" alt=" " class="img-responsive" />
                        </div>
                        <div class="farmous_top_brand_left_grid1">
                            <figure>
                                <div class="snipcart-item block">
                                    <div class="snipcart-thumb">
                                        <a href="products.php"><img title=" " alt=" " src="upload_image/150815106610000117_17-fresho-ginger.jpg" class="img-responsive"/></a>
                                        <p>Fresh Ginger</p>
                                        <h3>&#8377 224 <span>&#8377 270</span></h3>
                                    </div>

                                </div>
                            </figure>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="clearfix"> </div>
        </div>
    </div>
</div>

<div class="clearfix"></div>

<div class="top-brands">
    <div class="container">
        <h3>Fresh Fruits</h3>
        <div class="farmous_top_brands_grids">
            <div class="col-md-3 top_brand_left">
                <div class="hover14 column">
                    <div class="farmous_top_brand_left_grid">
                        <div class="farmous_top_brand_left_grid1">
                            <figure>
                                <div class="snipcart-item block" >
                                    <div class="snipcart-thumb">
                                        <a href="products.php"><img title=" " alt=" " src="upload_image/1508164362pro_274987.jpg" class="img-responsive" width="125px" height="125px" /></a>		
                                        <p>Orange</p>
                                        <h3> &#8377 78 <span>&#8377 90</span></h3>
                                    </div>

                                </div>
                            </figure>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 top_brand_left">
                <div class="hover14 column">
                    <div class="farmous_top_brand_left_grid">
                        <div class="farmous_top_brand_left_grid1">
                            <figure>
                                <div class="snipcart-item block" >
                                    <div class="snipcart-thumb">
                                        <a href="products.php"><img title=" " alt=" " src="upload_image/1508164785pro_282135.jpg" class="img-responsive" width="125px" height="125px"/></a>		
                                        <p>Watermelon</p>
                                        <h3>&#8377 12<span>&#8377 18</span></h3>
                                    </div>

                                </div>
                            </figure>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 top_brand_left">
                <div class="hover14 column">
                    <div class="farmous_top_brand_left_grid">
                        <div class="farmous_top_brand_left_grid_pos">
                            <img src="images/offer.png" alt=" "  />
                        </div>
                        <div class="farmous_top_brand_left_grid1">
                            <figure>
                                <div class="snipcart-item block">
                                    <div class="snipcart-thumb">
                                        <a href="products.php"><img title=" " alt=" " src="upload_image/1508164846pro_333527.jpg" class="img-responsive" width="125px" height="125px"/></a>
                                        <p>White Grape</p>
                                        <h3>&#8377 125 <span>&#8377 148</span></h3>
                                    </div>

                                </div>
                            </figure>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 top_brand_left">
                <div class="hover14 column">
                    <div class="farmous_top_brand_left_grid">
                        <div class="farmous_top_brand_left_grid_pos">
                            <img src="images/offer.png" alt=" " class="img-responsive" />
                        </div>
                        <div class="farmous_top_brand_left_grid1">
                            <figure>
                                <div class="snipcart-item block">
                                    <div class="snipcart-thumb">
                                        <a href="products.php"><img title=" " alt=" " src="upload_image/1508164640download.jpg" class="img-responsive" width="125px" height="125px"/></a>
                                        <p>Guava</p>
                                        <h3>&#8377 224 <span>&#8377 270</span></h3>
                                    </div>

                                </div>
                            </figure>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="clearfix"> </div>
        </div>
    </div>
</div>


<div class="separator">
    </div>

<div>
    <div id='afscontainer1'></div>
</div>
<?php
require_once './core/user_footer.php';
?>
