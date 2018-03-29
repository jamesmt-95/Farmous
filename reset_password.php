<?php
require_once './core/user_header.php';
require_once './config/config.php';
require_once './core/Database.php';
require_once './core/Hash.php';
require_once './core/Session.php';
Session::init();
//$db = new Database(DB_TYPE, DB_HOST, DB_NAME, DB_USER, DB_PASS);
$db = new Database();
?>

        <!-- banner -->
        <div class="clearfix"> </div>
        <!-- login -->
        <div class="farmous_login login_head">
            <h3>Reset Your Password</h3>
            <div class="farmous_login_module">
                <div class="module form-module">
                    <div class="toggle toggle_hide"><i class="fa fa-user"></i>

                    </div>
                    <div class="form">
                        <h2>Reset your account</h2>

                        <input type="text" id="reset_pass_required_username" placeholder="Enter your Username" required=" ">
                        <input type="password" id="reset_new_password" placeholder="Enter New Password" required=" ">
                        <input type="password" id="retype_reset_new_password" placeholder="Re-Type New Password" required=" ">

                        <input type="submit" id="reset_password" value="Reset Password" >
                    </div>
                    <!--                    <div class="cta"><a href="reset_password.php">Forgot your password?</a></div>-->
                </div>
            </div>
        </div>
        <!-- //login -->
    </div>
    <div class="clearfix"></div>
</div>
<?php
require_once './core/user_footer.php';
?>