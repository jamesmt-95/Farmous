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
?>
<b id="about">About Us</b>
<br/>
<br/>
<div class="col-md-offset-1 col-md-11 about_container_top">
    <div class="col-md-9 about_para">
        <b id="what_is_far">What is Farmous?</b>

        <p id="about_us_para">


            Farmous is an online Greengrocer system, With over 200+ products
            in our catalogue you will find everything you are looking for.
            Right from fresh Fruits and Vegetables, Rice and Dals, Spices 
            and Seasonings to Packaged products, Meats – we have it all. And all 
            these products are from Farmers, they  can sell 
            their products directly without any help of business mediator.Also a buyer can Choose from a wide range of 
            options in every category, exclusively handpicked to help you find the best 
            quality available at the lowest prices. 
            The main purpose of this system is to help farmers to sell their
            own products to those who in needs personally. Simply we can say 
            that fresh products straight into the hands of needer without any harmful poison. 
            Nowadays different types of farmers getting big issues while they trying to sell their products, 
            it includes different factors but the major issues are the involvement of business mediators,
            because they offering lowest price for the products than the total cost spent by the farmer.
            That is why Farmous shows its importance. Through this system a Registered user, he can use his 
            registered account to sell products by adding each product to the system, and also, he can manage price,
            quantity of the added products through his account. Normal user (Guest user) can also be a part of this system by 
            searching products based on his needs, if he has found the required product, the normal user can send notification 
            the farmer or owner of the product and also provides location details of the farmer to locate him. Guest user should
            be registered to start selling products.   
        </p>
    </div>
    <div class="col-md-3 about_para_img">
        <img src="images/about_shopbag.jpg" id="image_about_para"  class="img-responsive" >		
    </div>
</div>
<div class="clearfix">
</div>

<br>
<div class="col-md-offset-1 col-md-11 about_container_bottom">
    <div class="col-md-6 about_para_bot">
        <b id="why_should_i">Why should I use Farmous?</b>
        <br/>
        <p id="about_us_para_bot">


            Farmous allows you to walk away from the drudgery of grocery
            shopping and welcome an easy relaxed way of browsing and shopping 
            for groceries. Discover new products and shop for all your food and
            grocery needs from the comfort of your home or office. No more getting
            stuck in traffic jams, paying for parking, standing in long queues and
            carrying heavy bags – get everything you need, when you need, right at your
            doorstep. Food shopping online is now easy as every product on your monthly 
            shopping list, is now available online at farmous, Kerala’s best online grocery store.
            be registered to start selling products.   
        </p>
    </div>
    <div class="col-md-3 about_para_img">
        <img src="images/about-lap1.jpg" id="image_about_why_should"  class="img-responsive" >		
    </div>
    <div class="col-md-offset-3">

    </div>
</div>
<br>
<div class="clearfix">
</div>

<br>
<br>
<img src="images/myProfileFooter_0cedbe.png" style="width: 100%">
<?php
require_once './core/user_footer.php';
?>