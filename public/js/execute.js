//googleTranslateElementInit() call from userfooter.php
//function googleTranslateElementInit() {
//  new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.FloatPosition.TOP_LEFT, multilanguagePage: true, gaTrack: true, gaId: 'UA-112548448-1'}, 'google_translate_element');
//}
//function googleTranslateElementInit() {
//  new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.FloatPosition.TOP_LEFT, autoDisplay: true, multilanguagePage: true, gaTrack: true, gaId: 'UA-112548448-1'}, 'google_translate_element');
//}
//to detect page_lang_and when it changes shows translator
//remember_me
//remember_me_stop
//Google Ads_Code_Generator
(function (g, o) {
    g[o] = g[o] || function () {
        (g[o]['q'] = g[o]['q'] || []).push(
                arguments)
    }, g[o]['t'] = 1 * new Date
})(window, '_googCsa');

var pageOptions = {
    "pubId": "pub-9616389000213823", // Make sure this the correct client ID!
    "query": "Fruits & Vegetables,Fast Food,Kerala,Computer Drives & Storage,Computer Drives & Storage,Food & Drink,Shopping,Beauty & Fitness,Computer Drives & Storage,Hotels & Accommodations,Combat Sports,Computer & Video Games",
    "adPage": 3
};

var adblock1 = {
    "container": "afscontainer1",
    "width": "700",
    "number": 2,
    "longerHeadlines": true
};

var adblock2 = {
    "container": "afscontainer2",
    "width": "700",
    "number": 2,
    "longerHeadlines": true
};

var adblock3 = {
    "container": "afscontainer3",
    "width": "700",
    "number": 2,
    "longerHeadlines": true
};

_googCsa('ads', pageOptions, adblock1, adblock2, adblock3);

//closed_Google Ads_Code_Generator


//close

$(document).ready(function () {
    $("#save_edit_fname").hide();
    $("#cancel_per_info").hide();
    $("#save_edit_email").hide();
    $("#cancel_per_email").hide();
    $("#save_edit_mob").hide();
    $("#cancel_per_mob").hide();
    $("#save_edit_add").hide();
    $("#cancel_per_add").hide();
    $("#edit_prd").hide();
    $("#cancel_edit_prd").hide();
    $("#del_edit_prd").hide();
    $("#edit_user_product").hide();
    $("#remember_container").show();
    //$("#generate_receipt_for_product").show();


//cookie_login_remember
    var remember = $.cookie("remember");
    if (remember === 'true') {
        var username = $.cookie('User');
        var password = $.cookie('Pass');

        $('#Username').attr("value", username);
        $('#Password').attr("value", password);
    }

//cookie_get_receipt_form_farmer_buyer_name


});



$('body').on('click', '#register_submit', function ()
{
    $fullname = $('#Fname').val();
    $reg_email = $('#REmail').val();
    $reg_phone = $('#Phone').val();
    $pass = $('#Password').val();
    $addline1 = $('#Add1').val();
    $addline2 = $('#Add2').val();
    $location_id = $('#view_location option:selected').val();
    if (($fullname === '') || ($reg_email === '') || ($pass === '') || ($addline1 === '') || ($addline2 === '') || (!$location_id >= 1)) {
        alert("Please Enter All Details");
        return false;
    } else
    {
        $.ajax({
            type: 'post',
            url: 'exec/save_data.php',

            data: {
                fname: $fullname,
                email: $reg_email,
                phone: $reg_phone,
                pass: $pass,
                add1: $addline1,
                add2: $addline2,
                location_id: $location_id,
                context: "save_register"
            },
            success: function (response)
            {
                console.log(response);
                if (response.trim() === 'saved')
                {
                    //redirect_to_mail_send_page
                    $.ajax({
                        type: 'post',
                        url: 'exec/save_data.php',
                        data: {
                            fname: $fullname,
                            email: $reg_email,
                            phone: $reg_phone,
                            context: "send_confirmation"
                        },
                        success: function (response)
                        {
                            console.log(response);

                        }
                    });
                    //end_redirect_to_mail_send_page
                    window.location.href = "login.php";
                } else {
                    alert("Registration  Failed");


                }


            }
        });
    }
});

//$("#stremember").change(function () {
//    //if ($(this).prop('checked') === true) {
//    //alert("Hello");
//    if ($('#stremember').is(':checked')) {
//        var username = $('#Username').val();
//        var password = $('#Password').val();
//        //alert(" Name "+username+" Pass "+password);
//// set cookies to expire in 7 days
//        $.cookie('User', username, {expires: 7});
//        $.cookie('Pass', password, {expires: 7});
//        $.cookie('remember', true, {expires: 7});
//        //alert("Cookie_User"+$.cookie("User"));
//        //alert("Cookie_Pass"+$.cookie("Pass"));
//    } else {
//// reset cookies
//        $.cookie('User', null);
//        $.cookie('Pass', null);
//        $.cookie('remember', null);
//    }
//});

$(".toggle-password").click(function () {

    $(this).toggleClass("fa-eye fa-eye-slash");
    //var input = $($(this).attr("toggle"));
    var text = document.getElementById("Password");

    if (text.type === "password") {
        text.type = "text";
    } else {
        text.type = "password";
    }
});

$('body').on('click', '#login', function ()
{
    if ($('#stremember').is(':checked')) {
        var username = $('#Username').val();
        var password = $('#Password').val();
        //alert(" Name "+username+" Pass "+password);
// set cookies to expire in 7 days
        $.cookie('User', username, {expires: 7});
        $.cookie('Pass', password, {expires: 7});
        $.cookie('remember', true, {expires: 7});
        //alert("Cookie_User"+$.cookie("User"));
        //alert("Cookie_Pass"+$.cookie("Pass"));
    } else {
// reset cookies
        $.cookie('User', null);
        $.cookie('Pass', null);
        $.cookie('remember', null);
    }

    var response = grecaptcha.getResponse();
    if (response.length != 0) {
        $username = $('#Username').val();
        $password = $('#Password').val();
        $.ajax({

            type: 'post',
            url: 'exec/check_login.php',
            data: {
                user: $username,
                pass: $password,
                context: "login_user"
            },
            success: function (response)
            {
                console.log(response);
                if (response.trim() == '1') {
                    window.location.href = "index.php";
                } else {
                    alert("Invalid Username or Password");
                    document.getElementById('Username').value = '';
                    document.getElementById('Password').value = '';
                }
            }
        });
    } else {
        alert("Cannot contact reCAPTCHA. Check your connection and try again.");
    }

});
/*resetting password*/
$('body').on('click', '#reset_password', function ()
{
    $username = $('#reset_pass_required_username').val();
    $new_password = $('#reset_new_password').val();
    $retype_new_password = $('#retype_reset_new_password').val();
    if ($new_password === $retype_new_password) {
        $.ajax({

            type: 'post',
            url: 'exec/check_login.php',
            data: {
                reset_username: $username,
                reset_new_pass: $new_password,
                context: "reset_password"
            },
            success: function (response)
            {
                console.log(response);
                if (response.trim() == '1') {
                    window.location.href = "products.php";
                } else
                {
                    alert("Failed!Enter a valid Username");
                    document.getElementById('reset_pass_required_username').value = '';
                    document.getElementById('reset_new_password').value = '';
                    document.getElementById('retype_reset_new_password').value = '';
                }
            }
        });
    } else {
        alert("Password Mismatched!Verify");
        document.getElementById('reset_new_password').value = '';
        document.getElementById('retype_reset_new_password').value = '';
    }

});
/*ending_reset_password_session*/

/*$(".fa-arrow-right").click(function () {
 
 $('search').submit();
 
 });*/


$(".fa-microphone").click(function () {

    if (window.hasOwnProperty('webkitSpeechRecognition')) {

        var recognition = new webkitSpeechRecognition();

        recognition.continuous = false;
        recognition.interimResults = false;

        recognition.lang = "en-US";
        recognition.start();

        recognition.onresult = function (e) {
            document.getElementById('search_word').value
                    = e.results[0][0].transcript;
            recognition.stop();
            document.getElementById('search_form').submit();
        };

        recognition.onerror = function (e) {
            recognition.stop();
        }

    }

});



function myFunction() {

    $('#moreopt').style.display = "block";
    $('#hidebtn').style.display = "none";
}

function hideform() {
    $('#moreopt').style.display = "none";
}
function clear() {
    $('#Fname').val('');
    $('#Email').val('');
    $('#Phone').val('');
    $('#password').val('');
    $('#Add1').val('');
    $('#Add2').val('');

}

/*onchange_update_state*/
$('body').on('change', '#view_country', function () {

    $index = $('#view_country :selected').val();
    $country_id = $('#view_country option:selected').val();
//    alert($index);
//    alert($country_id);
    $.ajax({
        type: 'post',
        url: 'exec/save_data.php',
        data: {
            country_id: $country_id,
            context: "fetch_state_from_country"
        },
        success: function (response)
        {
            console.log(response);
            $get_s = response.split(",");
            $push_str = "";
            $push_str = "<option value='-1' disabled hidden selected>Select State</option>";
            for (var i = 0; i < $get_s.length; i++)
            {
                $split = $get_s[i].split(':');
                $push_str += '<option value=' + $split[0] + '>' + $split[1].toUpperCase();
                +"</option>";
            }
            $('#view_state').html($push_str);
        }
    });

});
/*end_onchange__udate_state*/

/*onchange_update_district*/
$('body').on('change', '#view_state', function () {

    $index = $('#view_state :selected').val();
    $state_id = $('#view_state option:selected').val();
//    alert($index);
//    alert($state_id);
    $.ajax({
        type: 'post',
        url: 'exec/save_data.php',
        data: {
            state_id: $state_id,
            context: "fetch_district_from_state"
        },
        success: function (response)
        {
            console.log(response);
            $get_s = response.split(",");
            $push_str = "";
            $push_str = "<option value='-1' disabled hidden selected>Select District</option>";
            for (var i = 0; i < $get_s.length; i++)
            {
                $split = $get_s[i].split(':');
                $push_str += '<option value=' + $split[0] + '>' + $split[1].toUpperCase();
                +"</option>";
            }
            $('#view_district').html($push_str);
        }
    });
});
/*end_onchange__update_district*/




/*onchange_update_location*/
$('body').on('change', '#view_district', function () {

    $index = $('#view_district :selected').val();
    $district_id = $('#view_district option:selected').val();
    $.ajax({
        type: 'post',
        url: 'exec/save_data.php',
        data: {
            district_id: $district_id,
            context: "fetch_location_from_district"
        },
        success: function (response)
        {
            console.log(response);
            $get_s = response.split(",");
            $push_str = "";
            $push_pin = "";
            $push_str = "<option value='-1' disabled hidden selected>Select Location</option>";
            for (var i = 0; i < $get_s.length; i++)
            {
                $split = $get_s[i].split(':');
                $push_str += '<option value=' + $split[0] + '>' + $split[1].toUpperCase();
                +"</option>";
                // $push_pin += '<option value=' + $split[0] + '>' + $split[3] + "</option>";
            }
            $('#view_location').html($push_str);
            //$('#view_pin').html($push_pin);
        }
    });
});
/*end_onchange__update_location*/





/*onchange_update_pin*/
$('body').on('change', '#view_location', function () {
    $index = $('#view_location :selected').val();
    $location_id = $('#view_location option:selected').val();
    $.ajax({
        type: 'post',
        url: 'exec/save_data.php',
        data: {
            location_id: $location_id,
            context: "fetch_pin_from_location"
        },
        success: function (response)
        {
            console.log(response);
            $get_s = response.split(",");
            $push_str = "";
            //$push_str = "<option value='-1' disabled hidden selected>Select Location</option>";

            for (var i = 0; i < $get_s.length; i++)
            {
                $split = $get_s[i].split(':');
                $push_str += '<option value=' + $split[0] + '>' + $split[1] + "</option>";
                // $push_pin += '<option value=' + $split[0] + '>' + $split[3] + "</option>";
            }
            $('#view_pin').html($push_str);
            //$('#view_pin').html($push_pin);
        }
    });
});
/*part of code to display product type categorywhile select product type*/
/*onchange_product_type_update_product_category*/
$('body').on('change', '#product_type', function () {

    $product_type_id = $('#product_type :selected').val();
//    alert($product_type_id);
    $.ajax({
        type: 'post',
        url: 'exec/save_data.php',
        data: {
            product_type_id: $product_type_id,
            context: "fetch_product_cat"
        },
        success: function (response)
        {
            console.log(response);
            $get_s = response.split(",");
            $push_str = "";
            $push_str = "<option value='-1' disabled hidden selected>Select Product Category</option>";
            for (var i = 0; i < $get_s.length; i++)
            {
                $split = $get_s[i].split(':');
                $push_str += '<option value=' + $split[0] + '>' + $split[1].toUpperCase();
                +"</option>";
            }
            $('#prd_category').html($push_str);
        }
    });
});
/*end_onchange_product_type_update_product_category*/



/*fetching similar products based on product_cateory*/
$('body').on('change', '#prd_category', function () {

    $product_cat_id = $('#prd_category :selected').val();
//    alert($product_cat_id);
    $.ajax({
        type: 'post',
        url: 'exec/save_data.php',
        data: {
            product_cat_id: $product_cat_id,
            context: "fetch_product_cat_description"
        },
        success: function (response)
        {
            console.log(response);
            $get_s = response.split(",");
            $push_str = "";
            for (var i = 0; i < $get_s.length; i++)
            {
                $split = $get_s[i].split(':');
                $push_str += '<option value="">' + $split[0].toUpperCase();
                +"</option>";
            }
            $('#prd_cat_desc').html($push_str);
        }
    });
});
/*end_fetching similar products based on product_cateory*/

/*code to save product to db including image*/

$('body').on('click', '#add_product_category', function ()
{
    $country_nam = $('#country').val();
    if ($country_name === '') {
        alert("Please Enter a Valid Country");
        document.getElementById('country').focus();
    } else {


        $.ajax({
            type: 'post',
            url: '../exec/admin_manage.php',
            data: {
                c_name: $country_name,
                context: "add_country"

            },
            success: function (response)
            {
                console.log(response);
                if (response.trim() === 'exist') {
                    alert("Data Already Exist");
                    document.getElementById('country').value = '';
                } else {
                    alert("Saved!");
                    document.getElementById('country').value = '';
                }
            }
        });
    }
});
/*refine_result_ind_by_product_type*/
$('body').on('change', '#refine_product_type', function () {

    $sel_prd_type = $('#refine_product_type :selected').val();
//    alert($sel_prd_type);
    $.ajax({
        type: 'post',
        url: 'exec/save_data.php',
        data: {
            selected_prd_type: $sel_prd_type,
            context: "refine_prd_by_prd_type"
        },
        success: function (response)
        {
            console.log(response);
            $get_prd = response.split(",");
            $('#sub_main_head_child_product_display').empty();
            for (var i = 0; i < $get_prd.length; i++)
            {
                $split = $get_prd[i].split(':');
                $push_str = "";
                $push_str += "<div class='col-md-3 col-sm-12 top_brand_left'>";
                $push_str += "<div class='hover14 column'>";
                $push_str += "<a href='view_product.php?534ec62ce4097791f3273f229ef5803c=534ec62ce4097791f327f3273f229ef5803c&73ce347c9ef8a7b158b4529673bf67ff=" + $split[0] + "'>";
                $push_str += "<div class='farmous_top_brand_left_grid'>";
                $push_str += "<div class='farmous_top_brand_left_grid1'>";
                $push_str += "<figure>";
                $push_str += "<div class='snipcart-item block'>";
                $push_str += "<div class='snipcart-thumb'>";
                $push_str += "<img src=" + $split[3] + " id='image_prd'  class='img-responsive' width='125px' height='125px'>";
                $push_str += "<h3><p id=" + $split[0] + ">" + $split[1] + "</p></h3>";
                $push_str += "<h4> &#8377 " + $split[2] + "</h4>";
                $push_str += "</div>";
                $push_str += "</div>";
                $push_str += "</figure>";
                $push_str += "</div>";
                $push_str += "</div></a>";
                $push_str += "</div>";
                $push_str += "</div>";
                $('#sub_main_head_child_product_display').append($push_str);
            }

        }
    });
});
/*product_refine_on_change_prd_type_update_prd_category*/
$('body').on('change', '#refine_product_type_cat', function () {

    $selected_prd_type = $('#refine_product_type_cat :selected').val();
//    alert($selected_prd_type);
    $.ajax({
        type: 'post',
        url: 'exec/save_data.php',
        data: {
            selected_prd_type_id: $selected_prd_type,
            context: "print_prd_cat"
        },
        success: function (response)
        {
            console.log(response);
            $get_s = response.split(",");
            $push_str = "";
            $push_str = "<option value='-1' disabled hidden selected>Select Categoy</option>";
            for (var i = 0; i < $get_s.length; i++)
            {
                $split = $get_s[i].split(':');
                $push_str += '<option value=' + $split[0] + '>' + $split[1].toUpperCase();
                +"</option>";
            }
            $('#refine_product_cat').html($push_str);
        }
    });
});

//refine_for_receipt_generating
$('body').on('change', '#refine_product_type_cat_receipt', function () {

    $selected_prd_type = $('#refine_product_type_cat_receipt :selected').val();
//    alert($selected_prd_type);
    $.ajax({
        type: 'post',
        url: 'exec/save_data.php',
        data: {
            selected_prd_type_id: $selected_prd_type,
            context: "print_prd_cat"
        },
        success: function (response)
        {
            console.log(response);
            $get_s = response.split(",");
            $push_str = "";
            $push_str = "<option value='-1' disabled hidden selected>Type Category</option>";
            for (var i = 0; i < $get_s.length; i++)
            {
                $split = $get_s[i].split(':');
                $push_str += '<option value=' + $split[0] + '>' + $split[1].toUpperCase();
                +"</option>";
            }
            $('#refine_product_cat_receipt').html($push_str);
        }
    });
});


$('body').on('change', '#refine_product_cat_receipt', function () {

    $sel_prd_cat = $('#refine_product_cat_receipt :selected').val();
//    alert($sel_prd_cat);
    $.ajax({
        type: 'post',
        url: 'exec/save_data.php',
        data: {
            selected_prd_cat: $sel_prd_cat,
            context: "refine_prd_by_prd_cat"
        },
        success: function (response)
        {
            console.log(response);
            $get_prd = response.split(",");
            $push_str = "";
            $push_str = "<option value='-1' disabled hidden selected>Product Name</option>";
            for (var i = 0; i < $get_prd.length; i++)
            {
                $split = $get_prd[i].split(':');
                $push_str += '<option  value=' + $split[0] + '>' + $split[1].toUpperCase();
                +"</option>";
            }
            $('#refine_product_name').html($push_str);
        }
    });
});





/*refine_product_displaying products based on product_category*/
$('body').on('change', '#refine_product_cat', function () {

    $sel_prd_cat = $('#refine_product_cat :selected').val();
//    alert($sel_prd_cat);
    $.ajax({
        type: 'post',
        url: 'exec/save_data.php',
        data: {
            selected_prd_cat: $sel_prd_cat,
            context: "refine_prd_by_prd_cat"
        },
        success: function (response)
        {
            console.log(response);
            $get_prd = response.split(",");
            $('#sub_main_head_child_product_display').empty();
            for (var i = 0; i < $get_prd.length; i++)
            {
                $split = $get_prd[i].split(':');
                $push_str = "";
                $push_str += "<div class='col-md-3 col-sm-12 top_brand_left'>";
                $push_str += "<div class='hover14 column'>";
                $push_str += "<a href='view_product.php?534ec62ce4097791f3273f229ef5803c=534ec62ce4097791f327f3273f229ef5803c&73ce347c9ef8a7b158b4529673bf67ff=" + $split[0] + "'>";
                $push_str += "<div class='farmous_top_brand_left_grid'>";
                $push_str += "<div class='farmous_top_brand_left_grid1'>";
                $push_str += "<figure>";
                $push_str += "<div class='snipcart-item block'>";
                $push_str += "<div class='snipcart-thumb'>";
                $push_str += "<img src=" + $split[3] + " id='image_prd'  class='img-responsive' width='125px' height='125px'>";
                $push_str += "<h3><p id=" + $split[0] + ">" + $split[1] + "</p></h3>";
                $push_str += "<h4> &#8377 " + $split[2] + "</h4>";
                $push_str += "</div>";
                $push_str += "</div>";
                $push_str += "</figure>";
                $push_str += "</div>";
                $push_str += "</div></a>";
                $push_str += "</div>";
                $push_str += "</div>";
                $('#sub_main_head_child_product_display').append($push_str);
            }
        }
    });
});
///*refine_product_displaying products based on product_sort*/
//$('body').on('change', '#refine_product_sort', function () {
//
//    $sel_prd_sort = $('#refine_product_sort :selected').val();
//    alert($sel_prd_sort);
//    if($sel_prd_sort===1){
//        
//  
//    alert("welcome");
//      }
//    $.ajax({
//        type: 'post',
//        url: 'exec/save_data.php',
//        data: {
//            selected_prd_sort: $sel_prd_sort,
//            context: "refine_prd_by_sort"
//        },
//        success: function (response)
//        {
//            console.log(response);
//            $get_prd = response.split(",");
//$('#sub_main_head_child_product_display').empty();
//            for (var i = 0; i < $get_prd.length; i++)
//            {
//                $split = $get_prd[i].split(':');
//
//                $push_str = "";
//                $push_str += "<div class='col-md-3 top_brand_left'>";
//                $push_str += "<div class='hover14 column'>";
//                $push_str += "<a href=''><div class='farmous_top_brand_left_grid'>";
//                $push_str += "<div class='farmous_top_brand_left_grid1'>";
//                $push_str += "<figure>";
//                $push_str += "<div class='snipcart-item block'>";
//                $push_str += "<div class='snipcart-thumb'>";
//                $push_str += "<img src=" + $split[3] + " id='image_prd'  class='img-responsive' width='125px' height='125px'>";
//                $push_str += "<h3><p id=" + $split[0] + ">" + $split[1] + "</p></h3>";
//                $push_str += "<h4> &#8377 " + $split[2] + "</h4>";
//                $push_str += "</div>";
//                $push_str += "</div>";
//                $push_str += "</figure>";
//                $push_str += "</div>";
//                $push_str += "</div></a>";
//                $push_str += "</div>";
//                $push_str += "</div>";
//                $('#sub_main_head_child_product_display').append($push_str);
//            }
//
//        }
//    });
//});
$('body').on('click', '#searchprd', function () {
    $search_string = $('#searchstring').val();
//    alert($search_string);
    $.ajax({
        type: 'post',
        url: 'exec/save_data.php',
        data: {
            search_prd: $search_string,
            context: "search_product"
        },
        success: function (response)
        {
            console.log(response);
            $get_prd = response.split(",");
            $('#sub_main_head_child_product_display').empty();
            for (var i = 0; i < $get_prd.length; i++)
            {
                $split = $get_prd[i].split(':');
                $push_str = "";
                $push_str += "<div class='col-md-3 col-sm-12 top_brand_left'>";
                $push_str += "<div class='hover14 column'>";
                $push_str += "<a href=''><div class='farmous_top_brand_left_grid'>";
                $push_str += "<div class='farmous_top_brand_left_grid1'>";
                $push_str += "<figure>";
                $push_str += "<div class='snipcart-item block'>";
                $push_str += "<div class='snipcart-thumb'>";
                $push_str += "<img src=" + $split[3] + " id='image_prd'  class='img-responsive' width='125px' height='125px'>";
                $push_str += "<h3><p id=" + $split[0] + ">" + $split[1] + "</p></h3>";
                $push_str += "<h4> &#8377 " + $split[2] + "</h4>";
                $push_str += "</div>";
                $push_str += "</div>";
                $push_str += "</figure>";
                $push_str += "</div>";
                $push_str += "</div></a>";
                $push_str += "</div>";
                $push_str += "</div>";
                $('#sub_main_head_child_product_display').append($push_str);
            }
        }
    });
});
$('body').on('click', '#prof_information', function ()
{

    $("#sub_main_head_child_product_display").load("profile_info.php");
});
$('body').on('click', '#mng_prd', function ()
{

    $("#sub_main_head_child_product_display").load("manage_product.php");
});
$('body').on('click', '#mng_rmd_prd', function ()
{

    $("#sub_main_head_child_product_display").load("removed_prd.php");
});
$('body').on('click', '#notification', function ()
{

    $("#sub_main_head_child_product_display").load("notification.php");
});
//edit fname when click on edit on profile_info

$('body').on('click', '#edit_per_info', function ()
{

    document.getElementById('edit_fname').disabled = false;
    $("#cancel_per_info").show();
    $("#save_edit_fname").show();
    $("#edit_per_info").hide();
});
$('body').on('click', '#find_all_prd', function ()
{

    window.location.href = "products.php";
});
$('body').on('click', '#cancel_per_info', function ()
{

    document.getElementById('edit_fname').disabled = true;
    $("#save_edit_fname").hide();
    $("#edit_per_info").show();
    $("#cancel_per_info").hide();
});
$('body').on('click', '#edit_per_email', function ()
{

    document.getElementById('edit_email').disabled = false;
    $("#cancel_per_email").show();
    $("#save_edit_email").show();
    $("#edit_per_email").hide();
});
$('body').on('click', '#cancel_per_email', function ()
{

    document.getElementById('edit_email').disabled = true;
    $("#save_edit_email").hide();
    $("#edit_per_email").show();
    $("#cancel_per_email").hide();
});
$('body').on('click', '#edit_per_mob', function ()
{

    document.getElementById('edit_mob').disabled = false;
    $("#cancel_per_mob").show();
    $("#save_edit_mob").show();
    $("#edit_per_mob").hide();
});

$('#backToTopBtn').click(function () {
    $('html,body').animate({scrollTop: 0}, 'slow');
    return false;
});

$('body').on('click', '#cancel_per_mob', function ()
{

    document.getElementById('edit_mob').disabled = true;
    $("#save_edit_mob").hide();
    $("#edit_per_mob").show();
    $("#cancel_per_mob").hide();
});
$('body').on('click', '#edit_per_add', function ()
{

    document.getElementById('edit_add').disabled = false;
    $("#cancel_per_add").show();
    $("#save_edit_add").show();
    $("#edit_per_add").hide();
});
$('body').on('click', '#cancel_per_add', function ()
{

    document.getElementById('edit_add').disabled = true;
    $("#save_edit_add").hide();
    $("#edit_per_add").show();
    $("#cancel_per_add").hide();
});
$('body').on('click', '#save_edit_email', function ()
{


});


$('body').on('change', '#refine_product_name', function ()
{
    $("#prod_qua").val('');
});

/*displays_prd_details_when_user_selects_prd_from_select_on_manage_product.php*/
$('body').on('change', '#user_edit_product', function () {

    $user_sel_prd = $('#user_edit_product :selected').val();
    $("#edit_prd").show();
//    $("#cancel_edit_prd").show();
    $.ajax({
        type: 'post',
        url: 'exec/save_data.php',
        data: {
            user_selected_prd_id: $user_sel_prd,
            context: "user_selected_prd_view"
        },
        success: function (response)
        {
            console.log(response);
            $get_prd = response.split(",");
            $('#edit_prd_panel').empty();
            for (var i = 0; i < $get_prd.length; i++)
            {
                $split = $get_prd[i].split(':');
                $push_str = "<div class='col-md-6 user_dis_prd' id='user_dis_div_panel'>";
                $push_str += "<div class='col-md-6 col-md-offset-6 dis_prd_img' id='dis_image'>";
                $push_str += "<center><img src=" + $split[3] + " id='image_prd'  class='img-responsive' width='125px' height='125px'></center>";
                $push_str += "</div>";
                $push_str += "<div class='col-md-12 details_panel'>";
                $push_str += "<div class='col-md-5 prd_info_1'>";
                $push_str += "<h5>Product Name : <b id='pname'>" + $split[1] + "</b></h5>";
                $push_str += "</div>";
                $push_str += "<div class='col-md-7 prd_info_2'>";
                $push_str += "<h5>Price : <b id='price'>" + $split[2] + "</b></h5>";
                $push_str += "</div>";
                $push_str += "</div>";
                $push_str += "<div class='col-md-12 details_pane2'>";
                $push_str += "<div class='col-md-5 prd_info_3'>";
                $push_str += "<h5>Quantity : <b id=quant_>" + $split[4] + "</b></h5>";
                $push_str += "</div>";
                $push_str += "<div class='col-md-7 prd_info_4'>";
                $push_str += "<h5>Description : <b id='desc'>" + $split[5] + "</b></h5>";
                $push_str += "</div>"
                $push_str += "</div>"
                $push_str += "</div>"
                $('#edit_prd_panel').append($push_str);
            }
            document.getElementById('prod_name').value = $split[1];
            document.getElementById('prod_price').value = $split[2];
            document.getElementById('prod_stock').value = $split[4];
            document.getElementById('prod_desc').value = $split[5];
        }
    });
});
$('body').on('click', '#edit_prd', function ()
{
    $("#edit_prd").hide();
    $("#cancel_edit_prd").show();
    $("#del_edit_prd").show();
    $("#edit_user_product").show();
});
$('body').on('click', '#cancel_edit_prd', function ()
{
    $("#edit_prd").show();
    $("#cancel_edit_prd").hide();
    $("#del_edit_prd").hide();
    $("#edit_user_product").hide();
});
$('body').on('click', '#yes_delete', function ()
{
    $sel_prd_del_id = $('#user_edit_product :selected').val();
    $.ajax({
        type: 'post',
        url: 'exec/save_data.php',
        data: {
            del_id: $sel_prd_del_id,
            context: "delete_item"

        },
        success: function (response)
        {
            console.log(response);
            if (response.trim() === 'deleted') {
//                alert("Product Deleted!");
                window.location.reload();
            } else {
                alert("Operation Failed!!");
            }
        }
    });
});
$('body').on('click', '#edit_prd_submit', function ()
{



    var format_number = /^[0-9]{1,3}$/;
    var format = /^[a-zA-Z ]{4,50}$/;
    if ((document.getElementById('prod_name').value.search(format) === -1) || (document.getElementById('prod_price').value.search(format_number) === -1) || (document.getElementById('prod_stock').value.search(format_number) === -1) || (document.getElementById('prod_desc').value.search(format) === -1))
    {
        alert("Please Enter Valid Details");
        document.getElementById('prod_name').focus();
        return false;
    } else {
        $sel_prd_id = $('#user_edit_product :selected').val();
        $prd_name = $('#prod_name').val();
        $prd_price = $('#prod_price').val();
        $prd_stock = $('#prod_stock').val();
        $prd_desc = $('#prod_desc').val();
        $.ajax({
            type: 'post',
            url: 'exec/save_data.php',
            data: {
                sel_prd_id: $sel_prd_id,
                prd_name: $prd_name,
                prd_price: $prd_price,
                prd_stock: $prd_stock,
                prd_desc: $prd_desc,
                context: "update_item"

            },
            success: function (response)
            {
                console.log(response);
                if (response.trim() === 'updated') {
                    alert("Product Details Updated!");
                    document.getElementById('prod_name').value = '';
                    document.getElementById('prod_price').value = '';
                    document.getElementById('prod_stock').value = '';
                    document.getElementById('prod_desc').value = '';
                } else {
                    alert("Product Updation Failed!");
                }
            }
        });
    }
});
$('body').on('click', '#yes_restore', function ()
{
    $rstr_id = $('#restore').attr('data-id');
    $.ajax({
        type: 'post',
        url: 'exec/save_data.php',
        data: {
            restore_id: $rstr_id,
            context: "restore_item"

        },
        success: function (response)
        {
            console.log(response);
            if (response.trim() === 'restored') {
                alert("Product Restored");
                window.location.href = "user_profile.php";
                $("#sub_main_head_child_product_display").load("profile_info.php");
            } else {
                alert("Operation Failed!!");
            }
        }
    });
});
$('body').on('click', '#user_exist_yes_send', function ()
{
    $prd_id = $('#user_exist_yes_send').attr('data-id');
    $user_id = $('#user_exist_msg').attr('user-id');
    $usr_exist_msg_farmer = $('#user_exist_msg').val();
    $.ajax({
        type: 'post',
        url: 'exec/save_data.php',
        data: {
            usr_id: $user_id,
            prd_id: $prd_id,
            msg: $usr_exist_msg_farmer,
            context: "usr_exist_msg"
        },
        success: function (response)
        {
            console.log(response);
            if (response.trim() === 'saved') {
                alert("Message Sent Successfully!");
                //mobile_msg_user
                $.ajax({
                    type: 'post',
                    url: 'exec/save_data.php',
                    data: {
                        sendusr_id: $user_id,
                        send_prd_id: $prd_id,
                        context: "send_msg_to_user"
                    },
                    success: function (response)
                    {
                        console.log(response);

                    }
                });
                //end_mob_msg_to_user
            } else {
                alert("Failed!");
            }
        }
    });
});
/*msg for guest user*/
$('body').on('click', '#yes_send', function ()
{
    $prd_id = $('#yes_send').attr('data-id');
    $user_name = $('#wish_fname').val();
    $user_mob = $('#wish_mob').val();
    $usr_msg_farmer = ' Guest User Name: ' + $user_name + ', Contact No: ' + $user_mob + '. Message :';
    $usr_msg_farmer += $('#wish_user_msg').val();
    $user_put = 'Guest_get_Aadhar: ' + $aadhar_otp + ' ,'
    $.ajax({
        type: 'post',
        url: 'exec/save_data.php',
        data: {
            prd_id: $prd_id,
            msg: $usr_msg_farmer,
            context: "guest_usr_msg"
        },
        success: function (response)
        {
            console.log(response);
            if (response.trim() === 'saved') {
                alert("Message Sent Successfully!");
            } else {
                alert("Failed");
            }
        }
    });
});
$('body').on('click', '#clear_notification', function ()
{
    $wish_id = $('#clear_notification').attr('data-id');
    $.ajax({
        type: 'post',
        url: 'exec/save_data.php',
        data: {
            wish_id: $wish_id,
            context: "clear_notifi"
        },
        success: function (response)
        {
            console.log(response);
            if (response.trim() === 'rmd') {
                window.location.reload(true);
            } else {
                alert("Operation Failed");
            }
        }
    });
});

/*contact_us_modal_msg_to_admin*/

$('body').on('click', '#contact_us_modal_send', function ()
{

    $email = $('#modal_contact_email_text').val();
    $msg = $('#modal_contact_message').val();

    $.ajax({
        type: 'post',
        url: 'exec/save_data.php',
        data: {
            sender: $email,
            sender_msg: $msg,
            context: "modal_contact_us_mail"
        },
        success: function (response)
        {
            console.log(response);
            if (response.trim() === 'sent') {
                //$('#email_status').append("We will contact you shortly.");
                $('#modal_contact_status').modal('show');
            } else {
                //$('#email_status').append("failed");
            }
        }
    });
});

/*otp field_auto hide after 2 min*/




/*validate buyer_using_otp*/




$('body').on('click', '#validate_buyer', function ()
{

    $farmer_id = $('#far_find_buyer').attr('far-id');
    $buyer_id = $('#far_find_buyer :selected').val();
    $("#farmer_name").attr("far-id", $farmer_id);
    $("#buyer_name").attr("buyer-id", $buyer_id);


    $.ajax({
        type: 'post',
        url: 'exec/save_data.php',
        data: {
            farm_id: $farmer_id,
            buyr_id: $buyer_id,
            context: "validate_buyer_by_otp"
        },
        success: function (response)
        {
            document.getElementById("validate_buyer").disabled = true;
            $("#otp_field_block").show();
            countdown(2);
            setTimeout(function () {
                $('#otp_field_block').fadeOut('fast');

                $('#far_find_buyer').prop('selectedIndex', 0);
                $('#otp_txt').val('');
                document.getElementById("validate_buyer").disabled = false;
            }, 120000);

            console.log(response);
            $get_otp = response.split(",")[4];
            $get_farmer = response.split(",")[0];
            $get_farmer_phone = response.split(",")[1];
            $get_buyer = response.split(",")[2];
            $get_buyer_phone = response.split(",")[3];
            var date = new Date();
            date.setTime(date.getTime() + (60 * 60 * 1000));
            $.cookie('current_otp', $get_otp, {expires: date});
            $.cookie('current_farmer', $get_farmer, {expires: date});
            $.cookie('current_buyer', $get_buyer, {expires: date});
            $.cookie('current_farmer_phone', $get_farmer_phone, {expires: date});
            $.cookie('current_buyer_phone', $get_buyer_phone, {expires: date});

//            var otp_value = $.cookie('current_otp');
        }
    });
});


//verify_otp
$('body').on('click', '#verify_otp', function ()
{

    $typed_otp = $('#otp_txt').val();
    $cookie_otp = $.cookie('current_otp');


    if ($typed_otp === $cookie_otp) {
        $('#sub_main_head_child_product_display').empty();
        $('#modal_otp_status').modal('show');
        $('#generate_receipt_for_product').show();
        var farmer = $.cookie('current_farmer');
        var buyer = $.cookie('current_buyer');
        $('#farmer_name').attr("value", farmer);
        $('#buyer_name').attr("value", buyer);


    } else {
        $('#failure_panel').html("OTP Verification failed!");


    }


});



$('body').on('blur', '#prod_qua', function ()
{
    $req_qua = $('#prod_qua').val();
    $prd_id = $('#refine_product_name option:selected').val();
    $.ajax({
        type: 'post',
        url: 'exec/save_data.php',
        data: {
            quantity: $req_qua,
            product_id: $prd_id,
            context: "get_prd_price"
        },
        success: function (response)
        {
            console.log(response);
            $get_each_price = response.split(",")[1];
            $get_tot_price = response.split(",")[2];
            $('#tot_price').attr("value", $get_tot_price);
            $("#tot_price").attr("each_price", $get_each_price);

        }
    });

});

$('body').on('click', '#submit_receipt', function ()
{
    $farmer_id = $('#farmer_name').attr('far-id');
    $buyer_id = $('#buyer_name').attr('buyer-id');
    $prdo_id = $('#refine_product_name :selected').val();
    $prd_unit_price = $('#tot_price').attr('each_price');
    $req_quantity = $('#prod_qua').val();
    $tot_cost = $('#tot_price').val();
    $description = $('#prod_desc').val();

    $.ajax({
        type: 'post',
        url: 'exec/save_data.php',
        data: {
            fam_id: $farmer_id,
            buy_id: $buyer_id,
            pr_id: $prdo_id,
            pr_unit: $prd_unit_price,
            req_qu: $req_quantity,
            tot_cst: $tot_cost,
            desc: $description,
            context: "save_receipt"
        },
        success: function (response)
        {
            console.log(response);
            if (response.trim() === 'saved') {
                document.getElementById("submit_receipt").disabled = true;
                $('#success_receipt').html("Receipt Saved Successfully..");

                //printing div pdf
                $date = new Date();
                $val = $date.getDate() + "/" + ($date.getMonth() + 1) + "/" + $date.getFullYear();
                $('#font_tran_date').append($val);

                $farmer_name = $.cookie('current_farmer');
                $('#font_label_name').append($farmer_name);

                $farmer_phone = $.cookie('current_farmer_phone');
                $('#font_label_phone').append($farmer_phone);

                $buyer_name = $.cookie('current_buyer');
                $('#font_label_sold_to_name').append($buyer_name);

                $buyer_phone = $.cookie('current_buyer_phone');
                $('#font_label_sold_to_phone').append($buyer_phone);

                $prdo_name = $('#refine_product_name :selected').text();
                $('#prd_name_value').append($prdo_name);

                $prd_unit_price = $('#tot_price').attr('each_price');
                $('#prd_price_value').append($prd_unit_price);

                $req_quantity = $('#prod_qua').val();
                $('#prd_quan_value').append($req_quantity);


                $tot_cost = $('#tot_price').val();
                $('#prd_total_value').append($tot_cost);

                //js_to_print_pdf

                html2canvas($("#pdf_container"), {
                    onrendered: function (canvas) {
                        var myImage = canvas.toDataURL("image/png");
                        var doc = new jsPDF();
                        doc.addImage(myImage, 'JPEG', 0, 30);
                        doc.save($val+$farmer_name+$prdo_name+'.pdf');
                    }
                });



            } else {
                alert("Failed");
            }

        }
    });

});


var userLang = navigator.language || navigator.userLanguage || navigator.languages;
if (userLang.substr(0, 2) !== "en") {
    function googleTranslateElementInit() {
        new google.translate.TranslateElement({pageLanguage: 'en', layout:
                    google.translate.TranslateElement.FloatPosition.TOP_LEFT}, 'google_translate_element');
    }
} else {
    //document.getElementById("google_translate_element").style.display = "none";
}

