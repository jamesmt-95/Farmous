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
}
?>
<div  class="view_country_head">
    <h3><p>Added Countries</p></h3>
</div>
<div class="container view_country">
    <table class="table table-bordered" id="tbl_country">
        <thead>
            <tr>
                <th>S.No</th>
                <th>Country Name</th>

            </tr>
        </thead>

        <tbody>
            <?php foreach ($country as $each_country) { ?>
                <tr id="<?php echo $each_country['country_id']; ?>">
                    <td><?php echo $each_country['country_id']; ?></td>
                    <td><?php echo strtoupper($each_country['country_name']); ?></td>

                </tr>

            <?php } ?>


        </tbody>

    </table>
</div>




<div  class="view_country_head">
    <h3><p>Added States</p></h3>

</div>
<div class="container view_state">

    <table class="table table-bordered" id="tbl_state">

        <thead>
            <tr>
                <th>Country ID</th>
                <th>State ID</th>
                <th>State Name</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($state as $each_state) { ?>
                <tr id="<?php echo $each_state['state_id']; ?>">
                    <td><?php echo $each_state['country_id']; ?></td>
                    <td><?php echo $each_state['state_id']; ?></td>
                    <td><?php echo strtoupper($each_state['state_name']); ?></td>
                </tr>
            <?php } ?>


        </tbody>

    </table>
</div>

<!--view district-->
<div  class="view_country_head">
    <h3><p>Added District</p></h3>

</div>
<div class="container view_state">
    <table class="table table-bordered" id="tbl_district">
        <thead>
            <tr>
                <th>State ID</th>
                <th>District ID</th>
                <th>District Name</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($district as $each_district) { ?>
                <tr id="<?php echo $each_district['district_id']; ?>">
                    <td><?php echo $each_district['state_id']; ?></td>
                    <td><?php echo $each_district['district_id']; ?></td>
                    <td><?php echo strtoupper($each_district['district_name']); ?></td>
                </tr>
            <?php } ?>
        </tbody>
   </table>
</div>
<!--view location-->
<div  class="view_country_head">
    <h3><p>Added District</p></h3>
</div>
<div class="container view_state">
    <table class="table table-bordered" id="tbl_location">
        <thead>
            <tr>
                <th>District ID</th>
                <th>Location ID</th>
                <th>Location Name</th>
                <th>PIN</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($location as $each_location) { ?>
                <tr id="<?php echo $each_location['location_id']; ?>">
                    <td><?php echo $each_location['district_id']; ?></td>
                    <td><?php echo $each_location['location_id']; ?></td>
                    <td><?php echo strtoupper($each_location['location_name']); ?></td>
                     <td><?php echo strtoupper($each_location['pin']); ?></td>
                </tr>
            <?php } ?>


        </tbody>

    </table>
</div>


