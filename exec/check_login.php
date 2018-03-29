<?php

require_once '../config/config.php';
require_once '../core/Database.php';
require_once '../core/Session.php';
require_once '../core/Hash.php';
Session::init();
$db = new Database();
//$ip = $_SERVER['SERVER_ADDR'];
if (isset($_POST['context'])) {

    switch ($_POST['context']) {
        case "login_user":login_user($db);
            break;
        case "reset_password":reset_account($db);
            break;
        /*         * case "contry": get_contry($db);
          break;
          case "state":get_state();
          break;* */
    }
} else {
    echo 'Unauthorized Access';
    die();
}

function login_user($db) {
     $SHK = "<::&$:{+)(*&^%$#@#$%&@#$%^&*+--+--+><$%%$>>><__asdSdas&@#$%^&><$%%$>>><__";
    $username = $_POST['user'];
    $password = $_POST['pass'];
    //$pass_encrypt = Hash::create('sha256', $password, SHK);
    $pass_encrypt = hash('sha256', $SHK.$password);
    $sql = $db->prepare("SELECT `register_id`, `username` FROM `register` WHERE `username`='$username' and `password`='$pass_encrypt' and `status`=1");
    $sql ->execute();
    $data = $sql->fetchAll();
    //$reg_id = $data[0]['register_id'];

    //$ip_address =$_SERVER['SERVER_ADDR'];

    if ($data[0]['username'] == $username) {

        //verify fetching password
        //$sql=$db->exec("INSERT INTO `login_log`( `register_id`, `ip_addr`) VALUES ('$reg_id','$ip_address')");

//        $to = "jamesmanjada@gmail.com";
//        $subject = "Farmous Registration";
//        $txt = "Hello world!";
//        $headers = "From: farmouscare@gmail.com" . "\r\n" .
//                "CC: jamesmthankachen@mca.ajce.com";
//
//        mail($to, $subject, $txt, $headers);
//        
        
        
        
        
        echo '1';
        session::set("register_id", $data[0]['register_id']);




        


        





//        if ($status == 1) {
//
//            setcookie("username", $username, time() + (10 * 365 * 24 * 60 * 60));
//        } else {
//            //checking
//            if (isset($_COOKIE["username"])) {
//                setcookie("username", "");
//            }
//            //end checking
//        }
        die();
    } else {
        echo '0';
        die();
    }
}

/* code____ */

function reset_account($db) {
    $user_reset_username = $_POST['reset_username'];
    $reset_type_new_password = $_POST['reset_new_pass'];
    $reset_type_new_password_encrypt = Hash::create('sha256', $reset_type_new_password, SHK);
    $sql_ = $db->prepare("SELECT  `username`  FROM `register` WHERE `username`='$user_reset_username' and  `status`=1");
    $sql_->execute();
    $data = $sql_->fetchAll();
    //$reg_id = $data[0]['register_id'];
    //$ip_address =$_SERVER['SERVER_ADDR'];

    if ($data[0]['username'] == $user_reset_username) {

        //verify fetching password
        $reset = $db->prepare("UPDATE `register` SET `password`='$reset_type_new_password_encrypt', WHERE `username`='$user_reset_username'");
        $reset->execute();


        echo '1';
    } else {
        echo '0';
    }
}
?>

