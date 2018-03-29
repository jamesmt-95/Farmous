function fname()
{
    var fname = /^[a-zA-Z ]{4,20}$/;
    if ((document.getElementById('Fname').value.search(fname) === -1))
    {
        alert("Enter a Valid Fullname");
        document.getElementById('Fname').value='';
        document.getElementById('Fname').focus();
        return false;
    }
}
function email()
{
    var email = /^[a-zA-Z0-9-_\.]+@[a-zA-Z]+\.[a-zA-Z]{2,3}$/;
    if ((document.getElementById('semail').value.search(email) === -1))
    {
        alert("Enter a Valid Email");
        document.getElementById('Email').value='';
        document.getElementById('Email').focus();
        return false;
    }
}
function check(){
    var_addres=((document.getElementById('GetUser').value()))
}
function phone()
{
    var phone = /^[0-9]{10}$/;
    var len = document.getElementById('Phone').value.length;
    if (document.getElementById('Phone').value.search(phone) === -1)
    {
        if (len !== 10)
        {
            alert("Enter a Valid Phone Number");
            document.getElementById('Phone').value='';
            document.getElementById('Phone').focus();
            return false;
            
            
//            var number=document.getElementById('Phone').value();
//    var len = document.getElementById('Phone').value.length;
//    //var phone = /^[0-9]{10}$/;
//    if((number.charAt(0)!=='9')||(len!==10)){
//    
//   if (document.getElementById('Phone').value.search(phone) === -1)
//    {
//        if (len !== 10)
//       {
//            alert("Enter a Valid Phone Number");
//            document.getElementById('Phone').value='';
//            document.getElementById('Phone').focus();
//            return false;
        }
    }
}
function pass()
{
    var pass = /^[a-zA-Z-_$%@]{6,16}[0-9]{1,3}$/;
    if (document.getElementById('Password').value.search(pass) === -1)
    {
        alert("Enter a Valid Password");
        document.getElementById('Password').value='';
        document.getElementById('Password').focus();
        return false;
    }
}
function add1() {
    var add1 = /^[a-zA-Z ]{4,20}$/;
    if (document.getElementById('Add1').value.search(add1) === -1)
    {
        alert("Enter Correct Address Line1");
        document.getElementById('Add1').value='';
        document.getElementById('Add1').focus();
        return false;
    }
}
function add2() {
    var add2 = /^[a-zA-Z ]{4,20}$/;
    if (document.getElementById('Add2').value.search(add2) === -1)
    {
        alert("Enter Correct Address Line2");
        document.getElementById('Add2').value='';
        document.getElementById('Add2').focus();
        return false;
    }
}
function check_country() {
    var country = /^[a-zA-Z ]{3,15}$/;
    if (document.getElementById('country').value.search(country) === -1)
    {
        alert("Enter Valid Country Name");
        document.getElementById('country').value='';
        document.getElementById('country').focus();
        return false;
    }
}
function check_state() {
    var state = /^[a-zA-Z ]{3,15}$/;
    if (document.getElementById('state').value.search(state) === -1)
    {
        alert("Enter Valid State Name");
        document.getElementById('state').value='';
        document.getElementById('state').focus();
        return false;
    }
}
function check_district() {
    var district = /^[a-zA-Z ]{3,15}$/;
    if (document.getElementById('state').value.search(district) === -1)
    {
        alert("Enter Valid District Name");
        document.getElementById('district').value='';
        document.getElementById('district').focus();
        return false;
    }
}
function check_location() {
    var location = /^[a-zA-Z ]{3,15}$/;
    if (document.getElementById('location').value.search(location) === -1)
    {
        alert("Enter Valid Location Name");
        document.getElementById('location').value='';
        document.getElementById('location').focus();
        return false;
    }
}
function check_pin() {
    var pin = /^[0-9]{6}$/;
    if (document.getElementById('pin').value.search(pin) === -1)
    {
        alert("Enter Valid PIN");
        document.getElementById('pin').value='';
        document.getElementById('pin').focus();
        return false;
    }
}

function pr_name(){
        var prname = /^[a-zA-Z ]{4,15}$/;
if (document.getElementById('prd_name').value.search(prname) === -1)
    {
        alert("Enter Valid Product Name");
        document.getElementById('prd_name').value='';
        document.getElementById('prd_name').focus();
        return false;
    }
}
function pr_price(){
        var price = /^[0-9]{1,4}$/;
if (document.getElementById('prd_price').value.search(price) === -1)
    {
        alert("Enter Valid Price");
        document.getElementById('prd_price').value='';
        document.getElementById('prd_price').focus();
        return false;
    }
}
function pr_stock(){
        var stock = /^[0-9]{1,2}$/;
if (document.getElementById('prd_stock').value.search(stock) === -1)
    {
        alert("Enter Valid Stock");
        document.getElementById('prd_stock').value='';
        document.getElementById('prd_stock').focus();
        return false;
    }
}



