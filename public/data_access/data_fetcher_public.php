<?php   
require_once 'core/Database.php';
$db=new Database();
$product_type = $db->prepare('SELECT `product_type_id`, `product_type_name` FROM `product_type` WHERE `status`=1');
$product_type->execute();
$get_product_type = $product_type->fetchAll();

/*getting products details from database access to add_product.php*/
$fet_product=$db->prepare('SELECT `prd_id`, `cat_id`, `register_id`, `prd_name`, `price`, `stock`, `image`, `description`, `status` FROM `product_add` WHERE `status`=1');
$fet_product->execute();
$get_fet_product=$fet_product->fetchAll();

?>
