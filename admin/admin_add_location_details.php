<?php
require_once '../config/config.php';
require_once '../core/Database.php';
//require_once 'admin_header.php';
require_once '../core/Hash.php';
require_once '../core/Session.php';
require_once '../core/data_fetcher.php';
/* datafetcher.php retrieves data from country,state,district,location to print on dropdown */
Session::init();
//$db = new Database(DB_TYPE, DB_HOST, DB_NAME, DB_USER, DB_PASS);
$db = new Database();
if (!isset($_SESSION['admin_id']))
    {
    header('location:admin_login.php');
    #session_thanks_lord
}
?>
<div class="clearfix"></div>
<br/>
<div class="head_admin col-sm-12 col-md-12"> 
    <h4 id="text_1"></h4>
<div class="col-sm-12 col-md-12">
    <div class="header_ col-sm-12 col-md-12">
        <div class="col-sm-4  col-md-2" >
            Add Country
        </div>
        <div class="col-sm-6 col-md-3">
            <input type="text" style="text-transform:uppercase" class="form-control" id="country" placeholder="Country" list="country_mng" onchange="check_country()">
        </div>
        <div class="col-sm-6 col-md-3">

        </div>
        <div class="col-sm-6 col-md-3">
            <input type="submit"  id="add_country"  value="Save Changes">
        </div>
    </div>
</div>
<div class="header_ col-sm-12 col-md-12">
    <div class="col-sm-4  col-md-2" >
        Add State
    </div>
    <div class="col-sm-6 col-md-3">
        <select class="form-control" id="selected_country"  name="select_country">
            <option value="-1" disabled selected>Select Country</option>
            <?php foreach ($country_get as $each_country) { ?>
            <option value=<?php echo $each_country['country_id']; ?>><?php echo strtoupper($each_country['country_name']); ?></option>
            <?php } ?>
        </select>
    </div>
    <div class="col-sm-6 col-md-3">
        <input type="text" class="form-control"  style="text-transform:uppercase" id="state" placeholder="State" onchange="check_state()">
    </div>
    <div class="col-sm-6 col-md-3">
        <input type="submit"  id="add_state" name="add_state" value="Save Changes">
    </div>
</div>
<div class="header_ col-sm-12 col-md-12">
    <div class="col-sm-4  col-md-2" >
        District
    </div>
    <div class="col-sm-6 col-md-3">
        <select class="form-control" style="text-transform:uppercase" id="selected_state" name="select_state">
            <option value="-1" disabled selected>Select State</option>

            <?php foreach ($state_get as $each_state) { ?>
                <option value=<?php echo $each_state['state_id']; ?>><?php echo $each_state['state_name']; ?></option>
            <?php } ?>
        </select>
    </div>
    <div class="col-sm-6 col-md-3">
        <input type="text" class="form-control" style="text-transform:uppercase" id="district" placeholder="District" onchange="check_district()">
    </div>
    <div class="col-sm-6 col-md-3">
        <input type="submit"  id="add_district" name="add_district" value="Save Changes">
    </div>
</div>
<div class="header_ col-sm-12 col-md-12">
    <div class="col-sm-4  col-md-2" >
        Location
    </div>
    <div class="col-sm-6 col-md-3">
        <select class="form-control" id="selected_district" style="text-transform:uppercase" name="select_district"> 
            <option value="-1" disabled selected>Select District</option>
            <?php foreach ($district_get as $each_district) { ?>
                <option value=<?php echo $each_district['district_id']; ?>><?php echo $each_district['district_name']; ?></option>
            <?php } ?>
        </select>
    </div>
    <div class="col-sm-6 col-md-2">
        <input type="text" class="form-control" style="text-transform:uppercase" id="location" placeholder="Location" onchange="check_location()">
    </div>
    <div class="col-sm-6 col-md-2">
        <input type="text" class="form-control"  name="pin" id="pin" placeholder="PIN" onchange="check_pin()">
    </div>
    <div class="col-sm-6 col-md-3">
        <input type="submit"  id="add_location" name="add_location" value="Save Changes">
    </div>
</div>
    </div>
<div class="clearfix"></div>
</div>
<div class="clearfix"></div>
<?php
//require_once 'admin_footer.php';
?>