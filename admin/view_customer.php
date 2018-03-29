<?php
require_once '../core/Database.php';

require_once '../core/Session.php';

require_once '../admin/data_fetch_admin.php';

Session::init();
//$db = new Database(DB_TYPE, DB_HOST, DB_NAME, DB_USER, DB_PASS);
$db = new Database();
if (!isset($_SESSION['admin_id'])) {
    header('location:admin_login.php');
    #session_thanks_lord
}
?>
<div  class="customer_head">
    <h3><p>Registered Customers</p></h3>    
</div>
<div class="col-md-12">
    <div class="container view_user">

        <table class="table table-bordered" id="table_usr">
            <thead>
                <tr>
                    <th>Fullname</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Username</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($user_get as $each_user) { ?>
                    <tr id="<?php echo $each_user['register_id']; ?>">
                        <td><?php echo $each_user['fullname']; ?></td>
                        <td><?php echo $each_user['phone']; ?></td>
                        <td><?php echo $each_user['address']; ?></td>
                        <td><a href="https://mail.google.com"><?php echo $each_user['username']; ?></a></td>
                    </tr>

                <?php } ?>


            </tbody>
        </table>
    </div>
</div>
<?php
//require_once '../admin/admin_footer.php';
?>