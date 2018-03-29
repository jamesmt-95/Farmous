$('body').on('click', '#admin_login', function () {
    $ad_username = $('#admin_Username').val();
    $ad_password = $('#admin_Password').val();
    
    //alert("You are ", $ad_username);
    $.ajax({
        type: 'post',
        url: '../exec/admin_manage.php',
        data: {admin_username: $ad_username,
            admin_password: $ad_password,
            context: "admin_login"},
        success: function (response)
        {
            console.log(response);
            if (response.trim() === '1'){
//                window.location.href = "admin_permit.php";
                window.location.href = "../admin/admin_home.php";
            }else{
                alert("Failed");
            }
        }
    });
});
/*admin_add_country_state_district_location*/
$('body').on('click', '#add_country', function ()
{
    $country_name = $('#country').val();

    var cname = /^[a-zA-Z ]{4,15}$/;

    if ((document.getElementById('country').value.search(cname) === -1))
    {
        alert("Enter a Valid Country Name");
        document.getElementById('country').value = '';
        document.getElementById('country').focus();
        return false;
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
                    window.location.reload(true);


                }
            }
        });
    }
});


$('body').on('click', '#add_state', function ()
{
    $country_id = $('#selected_country option:selected').val();
    $state_name = $('#state').val();
    var sname = /^[a-zA-Z ]{4,15}$/;


    if (($country_id <= 0) || (document.getElementById('state').value.search(sname) === -1))
    {
        alert("Please Enter a Valid State Name");
        document.getElementById('state').value = '';
        document.getElementById('state').focus();
        return false;
    } else {
        $.ajax({
            type: 'post',
            url: '../exec/admin_manage.php',

            data: {
                country_id: $country_id,
                state_name: $state_name,
                context: "add_state"

            },
            success: function (response)
            {
                console.log(response);

                if (response.trim() === 'exist') {
                    alert("Data Already Exist");
                    document.getElementById('state').value = '';
                } else {
                    alert("Saved!");
                    document.getElementById('state').value = '';
                    window.location.reload(true);


                }
            }
        });
    }
});

/*adding district based on state_id and_and_state_name*/
$('body').on('click', '#add_district', function ()
{
    $state_id = $('#selected_state option:selected').val();
    $district_name = $('#district').val();
    var dname = /^[a-zA-Z ]{4,15}$/;


    if (($state_id <= 0) || (document.getElementById('district').value.search(dname) === -1))
    {
        alert("Please Enter a Valid District Name");
        document.getElementById('district').value = '';
        document.getElementById('district').focus();
        return false;
    } else {
        $.ajax({
            type: 'post',
            url: '../exec/admin_manage.php',

            data: {
                state_id: $state_id,
                district_name: $district_name,
                context: "add_district"},
            success: function (response)
            {
                console.log(response);
                if (response.trim() === 'exist') {
                    alert("Data Already Exist");
                    document.getElementById('district').value = '';
                } else {
                    alert("Saved!");
                    document.getElementById('district').value = '';
                    window.location.reload(true);
                }
            }
        });
    }
});
/*end adding_district_name*/



/*adding location based on district_id and_and_district_name*/
$('body').on('click', '#add_location', function ()
{
    $district_id = $('#selected_district option:selected').val();
    $location_name = $('#location').val();
    $location_pin = $('#pin').val();
    var lname = /^[a-zA-Z ]{4,15}$/;
    var phone = /^[0-9]{6}$/;


    if (($district_id <= 0) || (document.getElementById('location').value.search(lname) === -1) || (document.getElementById('pin').value.search(phone) === -1))
    {
        alert("Please Check Your Input");
        document.getElementById('location').value = '';
        document.getElementById('pin').value = '';
        document.getElementById('location').focus();
        return false;
    } else {

        $.ajax({
            type: 'post',
            url: '../exec/admin_manage.php',

            data: {
                district_id: $district_id,
                location_name: $location_name,
                pin: $location_pin,
                context: "add_location"

            },
            success: function (response)
            {
                console.log(response);

                if (response.trim() === 'exist') {
                    alert("Data Already Exist");
                    document.getElementById('location').value = '';
                    document.getElementById('pin').value = '';
                } else
                {
                    alert("Saved!");
                    document.getElementById('location').value = '';
                    document.getElementById('pin').value = '';
                     window.location.reload(true);


                }
            }
        });
    }
});
/*admin_add_product_type_*/
$('body').on('click', '#add_product_type', function ()
{
    var pname = /^[a-zA-Z ]{4,15}$/;
    $product_type = $('#add_type').val();


    if ((document.getElementById('add_type').value.search(pname) === -1))
    {
        alert("Enter a Valid Product Type");
        document.getElementById('add_type').value = '';
        document.getElementById('add_type').focus();
        return false;
    } else {
        $.ajax({
            type: 'post',
            url: '../exec/admin_manage.php',
            data: {
                product_type: $product_type,
                context: "add_product_type"
            },
            success: function (response)
            {
                console.log(response);
                if (response.trim() === 'exist')
                {
                    alert("Data Already Exist");
                    document.getElementById('add_type').value = '';
                } else if (response.trim() === 'saved')
                {
                    alert("Saved!");
                    document.getElementById('add_type').value = '';
                    window.location.reload(true);
                }
            }
        });
    }
});
/*to_add_product_category_based_on_product_type*/

$('body').on('click', '#add_product_category', function ()
{
    $selected_prd_type = $('#selected_product_type option:selected').val();
    $category_name = $('#product_category').val();
    $category_description = $('#product_category_description').val();
    alert($selected_prd_type);
    var pr_ct_name = /^[a-zA-Z ]{4,15}$/;
    if (($selected_prd_type <= 0) || (document.getElementById('product_category').value.search(pr_ct_name) === -1))
    {
        alert("Please Enter a Valid Product Category Name");
        document.getElementById('product_category').value = '';
        document.getElementById('product_category').focus();
        return false;
    } else {
        $.ajax({
            type: 'post',
            url: '../exec/admin_manage.php',

            data: {
                selected_prd_type: $selected_prd_type,
                cat_name: $category_name,
                cat_name_description: $category_description,
                context: "selected_product_type"

            },
            success: function (response)
            {
                console.log(response);

                if (response.trim() === 'exist') {
                    alert("Data Already Exist");
                    document.getElementById('product_category').value = '';
                    document.getElementById('product_category_description').value = '';

                } else
                {
                    alert("Saved!");
                    document.getElementById('product_category').value = '';
                    document.getElementById('product_category_description').value = '';
                    window.location.reload(true);


                }
            }
        });
    }
});

/*edit_country*/
$('body').on('change', '#select_edit_country', function () {

    $country_name = $('#select_edit_country :selected').text();
    alert($country_name);
    document.getElementById('edit_country').value = $country_name;
});

/*update country*/
$('body').on('click', '#submit_edit_country', function ()
{
    $country_id = $('#select_edit_country option:selected').val();
    $updated_country_name = document.getElementById('edit_country').value;
    var ct_name = /^[a-zA-Z ]{4,15}$/;
    
    if (($country_id <= 0) || (document.getElementById('edit_country').value.search(ct_name) === -1))
    {
        alert("Please Enter a Country Name");
        document.getElementById('edit_country').value = '';
        document.getElementById('edit_country').focus();
        return false;

    } else {
        $.ajax({
            type: 'post',
            url: '../exec/admin_manage.php',

            data: {
                country_id: $country_id,
                updated_country: $updated_country_name,
                context: "update_country"

            },
            success: function (response)
            {
                console.log(response);

                if (response.trim() === '1') {
                    alert("Data Updated");
                    document.getElementById('edit_country').value = '';
                    window.location.reload(true);
                } else
                {
                    alert("Updation Failed");
                    document.getElementById('edit_country').value = '';
                }
            }
        });
    }
});

/*edit_state*/
$('body').on('change', '#select_edit_state', function () {

    $state_name = $('#select_edit_state :selected').text();
   
    document.getElementById('edit_state').value = $state_name;
});
/*update state*/
$('body').on('click', '#submit_edit_state', function ()
{
    $state_id = $('#select_edit_state option:selected').val();
    $updated_state_name = document.getElementById('edit_state').value;

    
    var ed_st_name = /^[a-zA-Z ]{4,15}$/;

    if (($state_id <= 0) || (document.getElementById('edit_state').value.search(ed_st_name) === -1))
    {
        alert("Please Enter a State Name");
        document.getElementById('edit_state').value = '';
        document.getElementById('edit_state').focus();
        return false;
    } else {
        $.ajax({
            type: 'post',
            url: '../exec/admin_manage.php',

            data: {
                state_id: $state_id,
                updated_state: $updated_state_name,
                context: "update_state"

            },
            success: function (response)
            {
                console.log(response);

                if (response.trim() === '1') {
                    alert("Data Updated");
                    document.getElementById('edit_state').value = '';
                    window.location.reload(true);
                } else
                {
                    alert("Updation Failed");
                    document.getElementById('edit_state').value = '';
                }
            }
        });
    }
});
/*edit_district*/
$('body').on('change', '#select_edit_district', function () {

    $district_name = $('#select_edit_district :selected').text();
    
    document.getElementById('edit_district').value = $district_name;
});
/*update district*/
$('body').on('click', '#submit_edit_district', function ()
{
    $district_id = $('#select_edit_district option:selected').val();
    $updated_district_name = document.getElementById('edit_district').value;

   
    var ed_dt_name = /^[a-zA-Z ]{4,15}$/;

    if (($district_id <= 0) || (document.getElementById('edit_district').value.search(ed_dt_name) === -1))
    {
        alert("Please Enter a District Name");
        document.getElementById('edit_district').value = '';
        document.getElementById('edit_district').focus();
        return false;
    } else {
        $.ajax({
            type: 'post',
            url: '../exec/admin_manage.php',
            data: {
                district_id: $district_id,
                updated_district: $updated_district_name,
                context: "update_district"
            },
            success: function (response)
            {
                console.log(response);

                if (response.trim() === '1') {
                    alert("Data Updated");
                    document.getElementById('edit_district').value = '';
                    window.location.reload(true);
                } else
                {
                    alert("Updation Failed");
                    document.getElementById('edit_district').value = '';
                }
            }
        });
    }
});

$('body').on('click', '#mng_location', function ()
{

    $("#sub_main_head_admin_product_display").load("admin_add_location_details.php");
});



$('body').on('click', '#mng_location', function ()
{

    $("#sub_main_head_admin_product_display").load("admin_add_location_details.php");
});



$('body').on('click', '#view_cust', function ()
{

    $("#sub_main_head_admin_product_display").load("view_customer.php");
});


$('body').on('click', '#view_prd', function ()
{

    $("#sub_main_head_admin_product_display").load("admin_view_product.php");
});

$('body').on('click', '#view_prd_type', function ()
{

    $("#sub_main_head_admin_product_display").load("view_category.php");
});



$('body').on('click', '#view_loc', function ()
{

    $("#sub_main_head_admin_product_display").load("view_location.php");
});



$('body').on('click', '#edit_loc', function ()
{

    $("#sub_main_head_admin_product_display").load("location_edit.php");
});


$('body').on('click', '#mng_apr_prd', function ()
{

    $("#sub_main_head_admin_product_display").load("admin_mng_approve_prd.php");
});



/*displays_prd details of status 0 to get approval from admin*/
$('body').on('change', '#admin_appr_product', function () {

    $admin_sel_prd = $('#admin_appr_product :selected').val();
   


//    $("#cancel_edit_prd").show();
    $.ajax({
        type: 'post',
        url: '../exec/admin_manage.php',
        data: {
            admin_selected_prd_id: $admin_sel_prd,
            context: "admin_selected_prd_approve"
        },
        success: function (response)
        {
            console.log(response);
            $get_prd = response.split(",");
            $('#edit_prd_panel').empty();
            for (var i = 0; i < $get_prd.length; i++)
            {
                $split = $get_prd[i].split(':');

                $push_str = "<div class='col-md-5 user_dis_prd' id='user_dis_div_panel'>";
                $push_str += "<div class='col-md-5 col-md-offset-6 dis_prd_img' id='dis_image'>";
                $push_str += "<center><img src=../" + $split[3] + " id='image_prd'  class='img-responsive' width='125px' height='125px'></center>";
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
                $push_str += "</div>";
                $push_str += "<input type='submit' data-id=" + $split[0] + " value='Approve' id='appr_prd'>";
                $push_str += "</div>";
                $push_str += "</div>";
                $('#edit_prd_panel').append($push_str);






            }
            





        }
    });
});


$('body').on('click', '#appr_prd', function ()
{
    $apprd_prd_id = $('#appr_prd').attr('data-id');
    $.ajax({
        type: 'post',
        url: '../exec/admin_manage.php',

        data: {
            appr_prd_id: $apprd_prd_id,
            context: "update_prd_appr"

        },
        success: function (response)
        {
            console.log(response);

            if (response.trim() === 'approved') {
                alert("Product Approved");
                window.location.reload(true);
                

            } else {
                alert("Operation Failed!!");




            }
        }
    });






});