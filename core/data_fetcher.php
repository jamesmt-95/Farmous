<?php
require_once '../config/config.php';
require_once '../core/Database.php';
require_once '../core/Hash.php';
require_once '../core/Session.php';
//$db = new Database(DB_TYPE, DB_HOST, DB_NAME, DB_USER, DB_PASS);
$db = new Database();
$get_country = $db->prepare('SELECT `country_id`, `country_name`  FROM `country` WHERE `status`=1');
$get_country->execute();
$country_get = $get_country->fetchAll();

$get_state = $db->prepare('SELECT `state_id`, `state_name`  FROM `state` WHERE `status`=1');
$get_state->execute();
$state_get = $get_state->fetchAll();

$get_district = $db->prepare('SELECT `district_id`, `district_name` FROM `district` WHERE `status`=1');
$get_district->execute();
$district_get = $get_district->fetchAll();
        
        
$get_product_type = $db->prepare('SELECT `product_type_id`, `product_type_name` FROM `product_type` WHERE `status`=1');
$get_product_type->execute();
$product_type_get = $get_product_type->fetchAll();


?>
