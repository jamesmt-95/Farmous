<?php
require_once '../config/config.php';
require_once '../core/Database.php';
require_once 'admin_header.php';
require_once '../core/Hash.php';
require_once '../core/Session.php';
//$db = new Database(DB_TYPE, DB_HOST, DB_NAME, DB_USER, DB_PASS);
$db = new Database();
?>﻿

<div class="farmous_login login_head">
    <h3>Admin Login</h3>
    <div class="farmous_login_module">
        <div class="module form-module">
            <div class="toggle toggle_hide"><i class="fa fa-user"></i>

            </div>
            <div class="form">
                <h2>Login to your account</h2>

                <input type="text" id="admin_Username" placeholder="Username" required=" ">
                <input type="password" id="admin_Password" placeholder="Password" required=" ">
                <input type="submit" id="admin_login" value="Login">
            </div>
            <div class="cta"><a href="#">Forgot your password?</a></div>
        </div>
    </div>

</div>
<!-- //login -->
</div>
<div class="clearfix"></div>
</div>

<?php
require_once 'admin_footer.php';
?>
