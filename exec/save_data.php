<?php

require_once '../config/config.php';
require_once '../core/Database.php';
require_once '../core/Session.php';
require_once '../core/Hash.php';
require_once '../core/send_sms.php';
session::init();
$db = new Database();
if (isset($_POST['context'])) {

    switch ($_POST['context']) {
        case "save_register": save_register($db);
            break;
        case "check_login":check_login($db);
            break;
        case "fetch_state_from_country":fetch_state($db);
            break;
        case "fetch_district_from_state":fetch_district($db);
            break;
        case "fetch_location_from_district":fetch_location($db);
            break;
        case "fetch_pin_from_location":fetch_pin($db);
            break;
        case "fetch_product_cat":fetch_product_category($db);
            break;
        case "fetch_product_cat_description":fetch_prd_cat_desc($db);
            break;
        case "refine_prd_by_prd_type":refine_prd_type($db);
            break;
        case "print_prd_cat":get_prd_cat($db);
            break;
        case "refine_prd_by_prd_cat":refine_prd_cat($db);
            break;
        case "selected_prd_sort":product_sort($db);
            break;
        case "search_prd":search_product($db);
            break;
        case "user_selected_prd_view":user_dis_prd($db);
            break;
        case "update_item":update_product($db);
            break;
        case "delete_item":delete_product($db);
            break;
        case "restore_item":restore_product($db);
            break;
        case "usr_exist_msg":usr_exist_msg($db);
            break;
        case "guest_usr_msg":guest_usr_msg($db);
            break;
        case "clear_notifi":clear_notification($db);
            break;
        case "modal_contact_us_mail":modal_contact_admin($db);
            break;
        case "send_confirmation":send_confirm_msg($db);
            break;
        case "send_msg_to_user":send_mob_msg_to($db);
            break;
        case "validate_buyer_by_otp":verify_buyer_otp($db);
            break;
        case "logout":logout($db);
            break;
    }
} else {
    echo 'Unauthorized Access';
    die();
}

function save_register($db) {
    $SHK = "<::&$:{+)(*&^%$#@#$%&@#$%^&*+--+--+><$%%$>>><__asdSdas&@#$%^&><$%%$>>><__";
    $Fname = $_POST['fname'];
    $Email = $_POST['email'];
    $Phone = $_POST['phone'];
    $Pass = $_POST['pass'];
    $pass_encrypt = hash('sha256', $SHK . $Pass);
    $Add1 = $_POST['add1'];
    $Add2 = $_POST['add2'];
    $Address = $Add1 . ',' . $Add2;
    $location_id = $_POST['location_id'];
    $sql = $db->prepare("INSERT INTO `register`( `fullname`, `phone`, `address`, `username`, `password`, `location_id`, `status`) VALUES ('$Fname','$Phone','$Address','$Email','$pass_encrypt','$location_id',1)");
    $sql->execute();

    //$text_content = "Dear" . $Fname . ", Welcome to Farmous Family.";
    //send($text_content, $Phone);
    //var_dump(send("test message", 9074032456));
    echo "saved";
    die;

//
    /*
      }
      $cfname = $db->exec("SELECT `fullname` FROM `register` WHERE `fullname` = '$Fname' or `phone` = '$Phone'")or die();
      $cemail = $db->exec("SELECT `username` FROM `login` WHERE `username` = '$Email'")or die();
      if(($v_fname['username']==$Fname) or ($v_email['username']==$Email))
      {
      echo"<script>alert('Given data already exists!!!');

      </script>)

     */
}

/* fetch_statement_for_displaying_states_from_country */

function fetch_state($db) {

//$requested_country = $_POST['index'];
    $requested_country_id = $_POST['country_id'];

//$get_c = "SELECT `country_id`, `country_name`  FROM `country` WHERE `status`=1";
    $get_s = $db->prepare("SELECT `state_id`, `state_name` FROM `state` WHERE `country_id`='$requested_country_id'  and `status`=1");
    $get_s->execute();
    $result_s = $get_s->fetchAll();
    $str = "";

    foreach ($result_s as $states_) {
        $str .= $states_['state_id'] . ":" . $states_['state_name'] . ",";
    }
    echo rtrim($str, ',');
}

/* stop_fetch_statement_for_displaying_states_from_country */




/* _fetch_district_from_country */

function fetch_district($db) {

//$requested_country = $_POST['index'];
    $requested_state_id = $_POST['state_id'];

//$get_c = "SELECT `country_id`, `country_name`  FROM `country` WHERE `status`=1";
    $get_s = $db->prepare("SELECT `district_id`, `district_name` FROM `district` WHERE `state_id`='$requested_state_id' and `status`=1");
    $get_s->execute();
    $result_s = $get_s->fetchAll();
    $str = "";

    foreach ($result_s as $district_) {
        $str .= $district_['district_id'] . ":" . $district_['district_name'] . ",";
    }
    echo rtrim($str, ',');
}

/* stop_fetch_district_from_country */


/* _fetch_location_from_district */

function fetch_location($db) {

//$requested_country = $_POST['index'];
    $requested_district_id = $_POST['district_id'];

//$get_c = "SELECT `country_id`, `country_name`  FROM `country` WHERE `status`=1";
    $get_s = $db->prepare("SELECT `location_id`, `location_name`, `pin`  FROM `location` WHERE `district_id`='$requested_district_id' and `status`=1");
    $get_s->execute();
    $result_s = $get_s->fetchAll();
    $str = "";

    foreach ($result_s as $location_) {
        $str .= $location_['location_id'] . ":" . $location_['location_name'] . ":" . $location_['pin'] . ",";
    }
    echo rtrim($str, ',');
}

/* stop_fetch_location_from_district */

/* _fetch_pin_from_location */

function fetch_pin($db) {

//$requested_country = $_POST['index'];
    $requested_location_id = $_POST['location_id'];

//$get_c = "SELECT `country_id`, `country_name`  FROM `country` WHERE `status`=1";
    $get_s = $db->prepare("SELECT `location_id`, `pin`  FROM `location` WHERE `location_id`='$requested_location_id' and `status`=1");
    $get_s->execute();
    $result_s = $get_s->fetchAll();
    $str = "";

    foreach ($result_s as $pin_) {
        $str .= $pin_['location_id'] . ":" . $pin_['pin'] . ",";
    }
    echo rtrim($str, ',');
}

/* stop_fetch_pin_from_location */

function fetch_product_category($db) {


    $prd_type_id = $_POST['product_type_id'];


    $get_cat = $db->prepare("SELECT `cat_id`, `cat_name` FROM `product_category` WHERE `product_type_id`='$prd_type_id' and `status`=1");
    $get_cat->execute();
    $cat_re = $get_cat->fetchAll();
    $str = "";

    foreach ($cat_re as $category) {
        $str .= $category['cat_id'] . ":" . $category['cat_name'] . ",";
    }
    echo rtrim($str, ',');
}

/* fetch_product_category */


/* fetch cat_description */

function fetch_prd_cat_desc($db) {


    $prd_cat_id = $_POST['product_cat_id'];


    $get_cat_desc = $db->prepare("SELECT `cat_description` FROM `product_category` WHERE `cat_id`='$prd_cat_id' and `status`=1");
    $get_cat_desc->execute();
    $cat_desc = $get_cat_desc->fetchAll();
    $str = "";

    foreach ($cat_desc as $description) {
        $str .= $description['cat_description'] . ",";
    }
    echo rtrim($str, ',');
}

/* add_product */

/* refine_product_by_type */

function refine_prd_type($db) {

    $sel_prd_type = $_POST['selected_prd_type'];


    $get_prd = $db->prepare("SELECT * FROM `product_add` WHERE `status`=1 and `cat_id` IN (SELECT `cat_id` FROM `product_category` WHERE `product_type_id`='$sel_prd_type')");
    $get_prd->execute();
    $all_prd = $get_prd->fetchAll();
    $str = "";

    foreach ($all_prd as $prd) {
        $str .= $prd['prd_id'] . ":" . $prd['prd_name'] . ":" . $prd['price'] . ":" . $prd['image'] . ",";
    }
    echo rtrim($str, ',');
}

function get_prd_cat($db) {


    $prd_type_id = $_POST['selected_prd_type_id'];


    $get_cat = $db->prepare("SELECT `cat_id`, `cat_name` FROM `product_category` WHERE `product_type_id`='$prd_type_id' and `status`=1");
    $get_cat->execute();
    $cat_re = $get_cat->fetchAll();
    $str = "";

    foreach ($cat_re as $category) {
        $str .= $category['cat_id'] . ":" . $category['cat_name'] . ",";
    }
    echo rtrim($str, ',');
}

/* end_fetch_product_category */

function logout() {
    session::delete('register_id');
    session_destroy('register_id');
    echo '1';
}

/* refine product_based_selected_product_category */

function refine_prd_cat($db) {

    $sel_prd_cat = $_POST['selected_prd_cat'];


    $get_prd = $db->prepare("SELECT * FROM `product_add` WHERE `cat_id`='$sel_prd_cat' ORDER BY `prd_id` ASC");
    $get_prd->execute();
    $all_prd = $get_prd->fetchAll();
    $str = "";

    foreach ($all_prd as $prd) {
        $str .= $prd['prd_id'] . ":" . $prd['prd_name'] . ":" . $prd['price'] . ":" . $prd['image'] . ",";
    }
    echo rtrim($str, ',');
}

//function product_sort($db) {
//
//    $sel_prd_cat = $_POST['selected_prd_sort'];
//    
//    if($sel_prd_cat==1){
//    $get_prd = $db->prepare("SELECT * FROM `product_add` order by `prd_id` desc limit 20");
//    $get_prd->execute();
//    $all_prd = $get_prd->fetchAll();
//    $str = "";
//
//    foreach ($all_prd as $prd) {
//        $str .= $prd['prd_id'] . ":" . $prd['prd_name'] . ":" . $prd['price'] . ":" . $prd['image'] . ",";
//    }
//    echo rtrim($str, ',');
//    }
//    elseif ($sel_prd_cat==2) {
//    $get_prd = $db->prepare("SELECT * FROM `product_add` order by `price` asc");
//    $get_prd->execute();
//    $all_prd = $get_prd->fetchAll();
//    $str = "";
//
//    foreach ($all_prd as $prd) {
//        $str .= $prd['prd_id'] . ":" . $prd['prd_name'] . ":" . $prd['price'] . ":" . $prd['image'] . ",";
//    }
//    echo rtrim($str, ',');
//}
//elseif ($sel_prd_cat==3) {
//    $get_prd = $db->prepare("SELECT * FROM `product_add` order by `price` desc");
//    $get_prd->execute();
//    $all_prd = $get_prd->fetchAll();
//    $str = "";
//
//    foreach ($all_prd as $prd) {
//        $str .= $prd['prd_id'] . ":" . $prd['prd_name'] . ":" . $prd['price'] . ":" . $prd['image'] . ",";
//    }
//    echo rtrim($str, ',');
//}
//elseif ($sel_prd_cat==4) {
//    $get_prd = $db->prepare("   SELECT * FROM `product_add` order by `prd_name` asc");
//    $get_prd->execute();
//    $all_prd = $get_prd->fetchAll();
//    $str = "";
//
//    foreach ($all_prd as $prd) {
//        $str .= $prd['prd_id'] . ":" . $prd['prd_name'] . ":" . $prd['price'] . ":" . $prd['image'] . ",";
//    }
//    echo rtrim($str, ',');
//}
//
// else {
//    return 0;
// }
//}
function send_confirm_msg($db) {
    $receipient_name = $_POST['fname'];
    $mail = $_POST['email'];
    $to = $mail;
    $subject = $receipient_name . ", Your Farmous Registration Successful";
    $message = "Thanks for joining us, " . $receipient_name . ".";
    $message .= "Welcome aboard the farmous family, with satisfied customers. ";
    $message .= "We are committed to providing you with world class service and back it up with our guarantees.";
    $message .= "Thanking you.";
    $headers = 'From: farmouscare@gmail.com';
    $test = mail($to, $subject, $message, $headers);
    var_dump($test);
//    if ($test) {
//        echo 'sent';
//    } else {
//        echo'failmail';
//    }
    //var_dump(send("test message", 9074032456));
    //send_mob_msg_to_users
//    
}

function search_product($db) {

    $search_key = $_POST['search_prd'];


    $get_prd = $db->prepare("SELECT * FROM `product_add` WHERE `prd_name` like '%$search_key%' ORDER BY `prd_id` asc ");
    $get_prd->execute();
    $all_prd = $get_prd->fetchAll();
    $str = "";

    foreach ($all_prd as $prd) {
        $str .= $prd['prd_id'] . ":" . $prd['prd_name'] . ":" . $prd['price'] . ":" . $prd['image'] . ",";
    }
    echo rtrim($str, ',');
}

function user_dis_prd($db) {

    $user_sel_product = $_POST['user_selected_prd_id'];


    $get_usr_prd = $db->prepare("SELECT * FROM `product_add` WHERE `prd_id`='$user_sel_product'");
    $get_usr_prd->execute();
    $all_prd_details = $get_usr_prd->fetchAll();
    $str = "";

    foreach ($all_prd_details as $arr_prd_det) {
        $str .= $arr_prd_det['prd_id'] . ":" . $arr_prd_det['prd_name'] . ":" . $arr_prd_det['price'] . ":" . $arr_prd_det['image'] . ":" . $arr_prd_det['stock'] . ":" . $arr_prd_det['description'] . ",";
    }
    echo rtrim($str, ',');
}

function update_product($db) {

    $sel_prd_id = $_POST['sel_prd_id'];
    $prd_name = $_POST['prd_name'];
    $prd_price = $_POST['prd_price'];
    $prd_stock = $_POST['prd_stock'];
    $prd_desc = $_POST['prd_desc'];





    $upd_prd = $db->prepare("UPDATE `product_add` SET `prd_name`='$prd_name',`price`='$prd_price',`stock`='$prd_stock',`description`='$prd_desc' WHERE `prd_id`='$sel_prd_id'");
    $upd_prd->execute();
    if ($upd_prd) {
        echo 'updated';
    } else {
        echo 'failed';
    }
}

function delete_product($db) {

    $prd_id_del = $_POST['del_id'];


    $del_prd = $db->prepare("UPDATE `product_add` SET `status`=0 WHERE `prd_id`='$prd_id_del'");
    $del_prd->execute();
    if ($del_prd) {
        echo 'deleted';
    } else {
        echo 'failed';
    }
}

function restore_product($db) {

    $prd_rstr = $_POST['restore_id'];


    $rstr_prd = $db->prepare("UPDATE `product_add` SET `status`=1 WHERE `prd_id`='$prd_rstr'");
    $rstr_prd->execute();
    if ($rstr_prd) {
        echo 'restored';
    } else {
        echo 'failed';
    }
}

function usr_exist_msg($db) {

    $prd_id = $_POST['prd_id'];
    $usr_id = $_POST['usr_id'];
    $msg = $_POST['msg'];

    $get_user = $db->prepare("SELECT `fullname`, `phone` FROM `register` WHERE `register_id`='$usr_id'");
    $get_user->execute();
    $user_is = $get_user->fetchAll();
    $username = $user_is[0]['fullname'];
    $phone = $user_is[0]['phone'];
    $msg_input = "Registered User Name : " . $username . ", Contact No: " . $phone . " . Message :";
    $msg_input .= $msg;
    $sent_msg = $db->prepare("INSERT INTO `prod_wish`(`prd_id`, `user`, `description`, `status`) VALUES ('$prd_id','$username','$msg_input',1)");
    $sent_msg->execute();

    if ($sent_msg) {
        echo 'saved';
    } else {
        echo 'failed';
    }
}

function guest_usr_msg($db) {

    $prd_id = $_POST['prd_id'];
    $msg = $_POST['msg'];


    $sent_guest_msg = $db->prepare("INSERT INTO `prod_wish`(`prd_id`, `user`, `description`, `status`) VALUES ('$prd_id','Guest_User','$msg',1)");
    $sent_guest_msg->execute();
    if ($sent_guest_msg) {
        echo 'saved';
    } else {
        echo 'Failed';
    }
}

function verify_buyer_otp($db) {

    $farmer = $_POST['farm_id'];
    $buyer = $_POST['buyr_id'];

    /* farmer_details */
    $far_lst = $db->prepare("SELECT `register_id`, `fullname`, `phone`, `address`, `username`, `password`, `location_id`, `status` FROM `register` WHERE `register_id`='$farmer' and `status`=1");
    $far_lst->execute();
    $far_det = $far_lst->fetchAll();
    $farmer_name = $far_det[0]['fullname'];
    /* buyer_details */
    $buyr_lst = $db->prepare("SELECT `register_id`, `fullname`, `phone`, `address`, `username`, `password`, `location_id`, `status` FROM `register` WHERE `register_id`='$buyer' and `status`=1");
    $buyr_lst->execute();
    $all_buyers = $buyr_lst->fetchAll();
    $buyer_name = $all_buyers[0]['fullname'];
    $buyer_phone = $all_buyers[0]['phone'];

    $otp_generte = mt_rand(100000, 999999);


    $content = "Hello " . $buyer_name . ", Your One Time Password(OTP) for Direct purchase from " . $farmer_name . " is " . $otp_generte . " . Please do not share this OTP with others except your dealer.";
    //send($content, $buyer_phone);
    echo(",".$otp_generte);
}

function send_mob_msg_to($db) {

    $suser_id = $_POST['sendusr_id'];
    $sprd_id = $_POST['send_prd_id'];
//get_user_name
    $get_suser = $db->prepare("SELECT `fullname`, `phone` FROM `register` WHERE `register_id`='$suser_id'");
    $get_suser->execute();
    $suser_is = $get_suser->fetchAll();
    $get_prd = $db->prepare("SELECT `prd_name`, `price` FROM `product_add` WHERE `prd_id`='$sprd_id'");
    $get_prd->execute();
    $prd_det = $get_prd->fetchAll();
    $susername = $suser_is[0]['fullname'];
    $suserphone = $suser_is[0]['phone'];
    $prd_name = $prd_det[0]['prd_name'];
    $prd_price = $prd_det[0]['price'];
    $content = "Hello " . $susername . ". You have requested " . $prd_name . " to buy at Rs: " . $prd_price . " /- from your registered number " . $suserphone . ". If it's not you,send your review to farmouscare@gmail.com";
    send($content, $suserphone);
}

function modal_contact_admin($db) {

    $sender_mail = $_POST['sender'];
    $sender_msg = $_POST['sender_msg'];
    $admin_email = "jamesmanjada@gmail.com";
    $to = $admin_email;
    $subject = "User Request to Contact";
    $message = "Hello Admin, " . $sender_mail . " has sent you a request to contact him. And he wrote a message '" . $sender_msg . "'. ";
    $headers = "From: " . $sender_mail . "";
    $test = mail($to, $subject, $message, $headers);
    if ($test) {
        echo 'sent';
    } else {
        echo 'failed';
    }
}

function clear_notification($db) {

    $not_id = $_POST['wish_id'];


    $clear_noti = $db->prepare("UPDATE `prod_wish` SET `status`=0 WHERE `wish_id`='$not_id'");
    $clear_noti->execute();
    if ($clear_noti) {
        echo 'rmd';
    } else {
        echo 'failed';
    }
}

?>