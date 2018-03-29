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
<b id="terms">Terms and Conditions</b>
<div class="col-md-12 col-sm-8 description_terms">
    <p id="edit_desc">


        <br/>
        <b>Services Overview</b>
    <p>The Marketplace is a platform for domestic consumers to transact with third party sellers, who have been granted access to the Marketplace to display and offer products for sale through the Marketplace. For abundant clarity, the Company does not provide any services to users other than providing the Marketplace as a platform to transact at their own cost and risk, and other services as may be specifically be notified in writing.

        The Company is not and cannot be a party to any transaction between you and the third party sellers, or have any control, involvement or influence over the products purchased by you from such third party sellers or the prices of such products charged by such third-party sellers. The Company therefore disclaims all warranties and liabilities associated with any products offered on the Marketplace.

       
    </p><br><hr>
    <b>Eligibility</b>
    <p>Persons who are “incompetent to contract” within the meaning of the Indian Contract Act, 1872 including minors, un-discharged insolvents etc. are not eligible to use/access the Marketplace.

        However, if you are a minor, i.e. under the age of 18 years, you may use/access the Marketplace under the supervision of an adult parent or legal guardian who agrees to be bound by these Terms of Use. You are however prohibited (even under provision) from purchasing any product(s) which is for adult consumption, the sale of which to minors is prohibited.

        
    </p><br><hr>
    <b>License & Access</b>
    <p>
        The Company grants you a limited sub-license to access and make personal use of the Marketplace,
        but not to download (other than page caching) or modify it, or any portion of it, except with express 
        prior written consent of the Company. Such limited sub – license does not include/permit any resale or 
        commercial use of the Marketplace or its contents; any collection and use of any product listings, descriptions,
        or prices; any derivative use of the Marketplace or its contents; any downloading or copying of information for 
        the benefit of another third party; or any use of data mining, robots, or similar data gathering and extraction tools.
        
    </p><br><hr>


    </p>
    
    <br/><br/>
</div>
<img src="images/myProfileFooter_0cedbe.png" style="width: 100%">
<div class="clearfix">

</div>
<?php
require_once './core/user_footer.php';
?>