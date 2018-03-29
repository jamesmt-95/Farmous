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
<div class="clearfix">

</div>
<b id="faqs">FAQs</b>
<div class="col-md-12 col-sm-8 description_faq">
    <p id="edit_desc">



    <br/>
    <b>What is Farmous?</b><br/>
    <p>Farmous is an online Greengrocer system, where Farmers can sell their products directly without any help of business
        mediator. The main purpose of this system is to help farmers to sell their own products to those who in needs personally.
        Simply we can say that fresh products straight into the hands of needer without any harmful poison.  </p>

    <br/><hr/>
    <b>What happens when I Edit Added product?</b><br/>
    <p>Your Product information that you have already given will be change, likewise. You'll receive all your product related information on your account.
    </p>
    <hr/>
    <b>When will my Farmous account be updated with new changes?</b><br/>

    <p>It happens as soon as you save the product details.</p>
    <hr/>
    <b>What happens when I update my email address (or mobile number)?</b><br/>
    <p>Your login email id (or mobile number) changes, likewise. You'll receive all your account related communication on your updated email address (or mobile number).
    </p>
    <hr/>
    <b>When will my Farmous account be updated with the new email address (or mobile number)?</b><br/>

    <p>It happens as soon as you confirm the verification code sent to your email (or mobile) and save the changes.</p>
    <hr/>
    <b>What happens to my existing Farmous account when I update my email address (or mobile number)?</b><br/>
    <p>Updating your email address (or mobile number) doesn't invalidate your account. Your account remains fully functional. You'll continue seeing your Order history, saved information and personal details.
    </p>
    <hr/><b>Does my Seller account get affected when I update my email address?</b><br/>
    <p>Farmous has a 'single sign-on' policy. Any changes will reflect in your Seller account also.</p>
    <hr>

    <b>What kind of products do you sell?</b><br/>
    <p>You can choose from over 120,000 products spread across various categories such as grocery, bakery, fruits & vegetables, beverages, personal care products, baby care products, pet products and much more.
    </p>
    <hr>

    <b>
        What cities and locations do you operate in?</b><br/>
    <p> Grofers currently operates in Agra, Ahmedabad, Bengaluru, Bhubaneswar, Chennai, Cuttack, Chandigarh, Hyderabad, Indore, Jaipur, Kanpur, Kochi, Kolkata, Lucknow, Ludhiana, Madurai, Mumbai, NCR, Nagpur, Pune, Ranchi, Surat and Vadodara.
    </p>
    <hr>
    <b>
        Do you deliver to my location?</b><br/>
    <p>We deliver in select localities across the cities we are present in. You can edit your location settings to check if we deliver in your area.
    </p>
    <hr>

   <b>What is the minimum order value?</b><br/>
    <p>There is no minimum order value. However, each store has a minimum order value to qualify for free delivery. In case you do not reach the limit, a delivery charge will be levied against that order.
    </p>
    <hr>


    </p>

    <br/><br/>
</div>
<img src="images/myProfileFooter_0cedbe.png" style="width: 100%">
<div class="clearfix">

</div>
<?php
require_once './core/user_footer.php';
?>