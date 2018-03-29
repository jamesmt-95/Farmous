<?php
require_once '../config/config.php';
require_once '../core/Database.php';
//require_once 'admin_header.php';
require_once '../core/Hash.php';
require_once '../core/Session.php';
require_once '../core/data_fetcher.php';
require_once '../admin/data_fetch_admin.php';
/* datafetcher.php retrieves data from country,state,district,location to print on dropdown */
Session::init();
//$db = new Database(DB_TYPE, DB_HOST, DB_NAME, DB_USER, DB_PASS);
$db = new Database();
if (!isset($_SESSION['admin_id'])) {
    header('location:admin_login.php');
    #session_thanks_lord
}
?>
<div class="header_edit">
    <h3>Location Details</h3>
</div>
<div class="clearfix"></div>
<div  class="edit_country">
    <h5><p>Edit Country</p></h5>
</div>
<div class="container">
    <div class="row space side">
        <div class="col-sm-12 col-md-12">
            
            <div class="col-sm-6 col-md-4">

                <select class="form-control" id="select_edit_country">
                    <option value="-1" disabled selected>Select Country</option>

                    <?php foreach ($country_get as $each_country) { ?>
                    <option value=<?php echo $each_country['country_id']; ?>><?php echo $each_country['country_name']; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="col-sm-6 col-md-4">

                <input type="text" id="edit_country" class="form-control" placeholder="Edit Country">
            </div>
            <div class="col-sm-6 col-md-4">

                <input type="submit" class="form-control" id="submit_edit_country" value="SAVE">

            </div>
        </div>



    </div>
    
</div>
<div  class="edit_country">
    <h5><p>Edit State</p></h5>
</div>
<div class="container">
    <div class="row space side">
        <div class="col-sm-12 col-md-12">
                        <div class="col-sm-6 col-md-4">
                <select class="form-control" id="select_edit_state">
                    <option value="-1" disabled selected>Select State</option>
                    <?php foreach ($state_get as $each_state) { ?>
                    <option value=<?php echo $each_state['state_id']; ?>><?php echo $each_state['state_name']; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="col-sm-6 col-md-4">
                <input type="text" id="edit_state" class="form-control" placeholder="Edit State">
            </div>
            <div class="col-sm-6 col-md-4">

                <input type="submit" class="form-control" id="submit_edit_state" value="SAVE">

            </div>
        </div>



    </div>
    
</div>
<div  class="edit_country">
    <h5><p>Edit District</p></h5>
</div>
<div class="container">
    <div class="row space side">
        <div class="col-sm-12 col-md-12">
                        <div class="col-sm-6 col-md-4">
                <select class="form-control" id="select_edit_district">
                    <option value="-1" disabled selected>Select District</option>
                    <?php foreach ($district_get as $each_district) { ?>
                    <option value=<?php echo $each_district['district_id']; ?>><?php echo $each_district['district_name']; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="col-sm-6 col-md-4">
                <input type="text" id="edit_district" class="form-control" placeholder="Edit District">
            </div>
            <div class="col-sm-6 col-md-4">

                <input type="submit" class="form-control" id="submit_edit_district" value="SAVE">

            </div>
        </div>



    </div>
    
</div>
<br/>
<?php
//require_once './admin_footer.php';
?>