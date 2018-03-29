<?php

require_once '../config/config.php';
require_once '../core/Database.php';

require_once '../core/Hash.php';
require_once '../core/Session.php';
require_once '../core/data_fetcher.php';
//$db = new Database(DB_TYPE, DB_HOST, DB_NAME, DB_USER, DB_PASS);
$db = new Database();
/*get_user_details*/
$get_user = $db->prepare('SELECT `register_id`, `fullname`, `phone`, `address`, `username`  FROM `register` WHERE `status`=1');
$get_user->execute();
$user_get = $get_user->fetchAll();
/*get_product_type*/
$get_prd_type = $db->prepare('SELECT `product_type_id`, `product_type_name` FROM `product_type` WHERE `status`=1');
$get_prd_type->execute();
$prd_type = $get_prd_type->fetchAll();

/*get_product_category*/
$get_prd_cat = $db->prepare('SELECT q.`cat_id`, p.`product_type_name`, q.`cat_name`, q.`cat_description` FROM `product_type` p, `product_category` q WHERE p.`product_type_id`=q.`product_type_id` ORDER BY p.`product_type_name` DESC');
$get_prd_cat->execute();
$prd_cat = $get_prd_cat->fetchAll();
/*get_country_*/
$get_country = $db->prepare('SELECT `country_id`, `country_name`, `status` FROM `country` WHERE `status`=1');
$get_country->execute();
$country = $get_country->fetchAll();
/*get_state*/
$get_state = $db->prepare('SELECT `state_id`, `state_id`, `country_id`, `state_name` FROM `state` WHERE `status`=1');
$get_state->execute();
$state = $get_state->fetchAll();
/*get_district*/
$get_district = $db->prepare('SELECT `district_id`, `state_id`, `district_name` FROM `district` WHERE `status`=1');
$get_district->execute();
$district = $get_district->fetchAll();
/*get_location*/
$get_location = $db->prepare('SELECT `location_id`, `district_id`, `location_name`, `pin` FROM `location` WHERE `status`=1');
$get_location->execute();
$location = $get_location->fetchAll();

/*get product details*/
$get_product = $db->prepare('SELECT * FROM `product_add` WHERE `status`=1 ORDER BY `prd_id` asc');
$get_product->execute();
$product_details= $get_product->fetchAll();

?>
