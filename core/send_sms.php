<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function send($sms, $to) {

    $sms = urlencode($sms);
    $token = "8b62928f3f03d69c6c81bd2d0219c6a4";
    //$sendercode="famous";  
    $sendercode = "famous";
    $url = "http://sms.safechaser.com/httpapi/httpapi?token=" . $token . "&sender=" . $sendercode . "&number=" . $to . '&route=2&type=1&sms=' . $sms;
    var_dump($url);
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_TIMEOUT, 50);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 50);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $datares = curl_exec($ch);

    curl_close($ch);
    return $datares;
    //var_dump($datares);
}



function sendprd_add($sms, $to) {

    $sms = urlencode($sms);
    $token = "8b62928f3f03d69c6c81bd2d0219c6a4";
    //$sendercode="famous";  
    $sendercode = "famous";
    $url = "http://sms.safechaser.com/httpapi/httpapi?token=" . $token . "&sender=" . $sendercode . "&number=" . $to . '&route=2&type=1&sms=' . $sms;
    
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_TIMEOUT, 50);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 50);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $datares = curl_exec($ch);

    curl_close($ch);
    return $datares;
    //var_dump($datares);
}






?>