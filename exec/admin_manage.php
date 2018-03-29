<?php

require_once '../config/config.php';
require_once '../core/Database.php';
require_once '../core/Session.php';
require_once '../core/Hash.php';
session::init();
//$db = new Database(DB_TYPE, DB_HOST, DB_NAME, DB_USER, DB_PASS);
$db = new Database();
if (isset($_POST['context'])) {

    switch ($_POST['context']) {
        case "admin_login": admin_login($db);
            break;
        case "add_country":admin_add_country($db);
            break;
        case "add_state":admin_add_state($db);
            break;
        case "add_district":admin_add_district($db);
            break;
        case "add_location":admin_add_location($db);
            break;
        case "add_product_type":admin_product_type($db);
            break;
        case "selected_product_type":admin_add_product_category($db);
            break;
        case "update_country":update_country($db);
            break;
        case "update_state":update_state($db);
            break;
        case "update_district":update_district($db);
            break;
        case "admin_selected_prd_approve":admin_appr_prd($db);
            break;
        case "update_prd_appr":update_status_prd_appr($db);
            break;
    }
} else {
    echo "Un Authorized Access";
}

function admin_login($db) {
    $username = $_POST['admin_username'];
    $password = $_POST['admin_password'];

    $sql = $db->prepare("SELECT `admin_id`, `username` FROM `admin` WHERE `username`='$username' and `password`='$password' and `status`=1");
    $sql->execute();
    $data = $sql->fetchAll();
    if ($data[0]['username'] == $username) {



        echo '1';
        session::set("admin_id", $data[0]['admin_id']);
        die();
    } else {
        echo '0';
        die();
    }
}

/* add_country_from_admin_ */

function admin_add_country($db) {
    $country_name = $_POST['c_name'];


    $sql_verify = $db->prepare("SELECT `country_id`, `country_name`  FROM `country` WHERE `country_name`='$country_name'");
    $sql_verify->execute();
    $data = $sql_verify->fetchAll();
    $country_id = $data[0]['country_id'];


    if ($data[0]['country_name'] == $country_name) {


        echo 'exist';
    } else {

        $sql = $db->prepare("INSERT INTO `country`(`country_name`, `status`) VALUES ('$country_name',1)");
        $sql->execute();
        echo 'saved';
    }
}

/* add_state_with_based_on_country_id */

function admin_add_state($db) {
    $country_id = $_POST['country_id'];
    $state_name = $_POST['state_name'];


    $sql_verify =$db->prepare("SELECT `state_id`, `state_name` FROM `state` WHERE `state_name`='$state_name'");
    $sql_verify->execute();
    $data = $sql_verify->fetchAll();
    $state_id = $data[0]['state_id'];


    if ($data[0]['state_name'] == $state_name) {


        echo 'exist';
    } else {

        $sql = $db->prepare("INSERT INTO `state`(`country_id`, `state_name`, `status`) VALUES ('$country_id','$state_name',1)");
       $sql->execute();
        echo 'saved';
    }
}

/* end_add_state_to_database */



/* add_district_with_based_on_state_id */

function admin_add_district($db) {
    $state_id = $_POST['state_id'];
    $district_name = $_POST['district_name'];


    $sql_verify =$db->prepare("SELECT `district_id`, `state_id`, `district_name`, `status` FROM `district` WHERE `district_name`='$district_name'");
    $sql_verify->execute();
    $data = $sql_verify->fetchAll();
    if ($data[0]['district_name'] === $district_name) {
        echo 'exist';
    } else {
        $sql =$db->prepare("INSERT INTO `district`(`state_id`, `district_name`, `status`) VALUES ('$state_id','$district_name',1)");
        $sql->execute();
        echo 'saved';
    }
}

/* end_add_DISTRICT_to_database */


/* add_district_with_based_on_state_id */

function admin_add_location($db) {
    $district_id = $_POST['district_id'];
    $location_name = $_POST['location_name'];
    $location_pin = $_POST['pin'];
    $sql_verify =$db->prepare("SELECT `location_id`, `location_name`  FROM `location` WHERE `location_name`='$location_name'");
    $sql_verify->execute();
    $data = $sql_verify->fetchAll();



    if ($data[0]['location_name'] == $location_name) {


        echo 'exist';
    } else {
        $sql =$db->prepare("INSERT INTO `location`(`district_id`, `location_name`, `pin`, `status`) VALUES ('$district_id','$location_name','$location_pin',1)");
        $sql->execute();
        echo 'saved';
    }
}

/* end_adding_location */


/* admin_add_product_category_based_on_product_type */

function admin_add_product_category($db) {
    $product_type_id_val = $_POST['selected_prd_type'];
    $category_name = $_POST['cat_name'];
    $category_name_description = $_POST['cat_name_description'];
    $get_s = $db->prepare("SELECT `product_type_id` FROM `product_category` WHERE `cat_name`='$category_name' or `cat_description` like '%$category_name_description%' and `status`=1");
    $get_s->execute();
    $result_s = $get_s->fetchAll();
    if ($result_s[0]['product_type_id'] == $product_type_id_val) {
        echo 'exist';
    } else {
        $sql =$db->prepare("INSERT INTO `product_category`(`product_type_id`, `cat_name`, `cat_description`, `status`) VALUES ('$product_type_id_val','$category_name','$category_name_description',1)");
        $sql->execute();
        echo 'saved';
    }
}

function update_country($db) {
    $country_id = $_POST['country_id'];
    $updated_country = $_POST['updated_country'];

    $update_country = $db->prepare("UPDATE `country` SET `country_name`='$updated_country' WHERE `country_id`='$country_id'");
    $update_country->execute();

    if ($update_country) {
        echo '1';
    } else {
        echo '0';
    }
}

function update_state($db) {
    $state_id = $_POST['state_id'];
    $updated_state = $_POST['updated_state'];

    $update_state = $db->prepare("UPDATE `state` SET `state_name`='$updated_state' WHERE `state_id`='$state_id'");
    $update_state->execute();

    if ($update_state) {
        echo '1';
    } else {
        echo '0';
    }
}

function update_district($db) {
    $district_id = $_POST['district_id'];
    $updated_district = $_POST['updated_district'];

    $update_district = $db->prepare("UPDATE `district` SET `district_name`='$updated_district' WHERE `district_id`='$district_id'");
    $update_district->execute();
    if ($update_district) {
        echo '1';
    } else {
        echo '0';
    }
}

function admin_appr_prd($db) {

    $admin_sel_product = $_POST['admin_selected_prd_id'];


    $get_usr_prd = $db->prepare("SELECT * FROM `product_add` WHERE `prd_id`='$admin_sel_product'");
    $get_usr_prd->execute();
    $all_prd_details = $get_usr_prd->fetchAll();
    $str = "";

    foreach ($all_prd_details as $arr_prd_det) {
        $str .= $arr_prd_det['prd_id'] . ":" . $arr_prd_det['prd_name'] . ":" . $arr_prd_det['price'] . ":" . $arr_prd_det['image'] . ":" . $arr_prd_det['stock'] . ":" . $arr_prd_det['description'] . ",";
    }
    echo rtrim($str, ',');
}

function update_status_prd_appr($db) {

    $appr_id = $_POST['appr_prd_id'];


    $process_appr = $db->prepare("UPDATE `product_add` SET `status`=1 WHERE `prd_id`='$appr_id'");
    $process_appr->execute();
    if ($process_appr) {
        echo 'approved';
    } else {
        echo 'failed';
    }
}




function logout() {
    session::delete('register_id');
    session_destroy('register_id');
    echo '1';
}

?>