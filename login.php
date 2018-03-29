<?php
require_once './core/user_header.php';
Session::init();
//$db = new Database(DB_TYPE, DB_HOST, DB_NAME, DB_USER, DB_PASS);
$db = new Database();
?>

<!-- header -->


<!-- banner -->
<div class="clearfix"> </div>
<!-- login -->
<div class="farmous_login login_head">
    <h3>Login to Your Account</h3>
    <div class="farmous_login_module">
        <div class="module form-module">
            <div class="toggle toggle_hide"><i class="fa fa-user"></i>

            </div>
            <div class="form">
                <h2>Login to your account</h2>

                <input type="text" id="Username" placeholder="Username">
                <input type="password" id="Password" placeholder="Password">
                <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                <div class="g-recaptcha re_captcha_align" data-sitekey="6LfW_EAUAAAAAPo30MtsIpDlK7YnuNjmOXik5XlX"></div>
                <!--remember_me-->
                <div id="remember_container">
<!--                    <input type="checkbox"  id="stremember" data-toggle="toggle">Remember me-->
                      <input type="checkbox" id="stremember">Remember me
                    <!--stop_remember_me--> 
                </div>
                <br>
                <input type="submit" id="login" value="Login" >

            </div>
            <div class="cta"><a href="reset_password.php">Forgot your password?</a></div>
        </div>
    </div>

</div>
<!-- //login -->

<div class="clearfix"></div>


<?php
require_once './core/user_footer.php';
?>