$(function(){
    $("#errorRestaurantName").hide();
    $("#errorAddress").hide();
    $("#errorLot/Floor").hide();
    $("#errorPostalCode").hide();
    $("#errorFirstname").hide();
    $("#errorLastname").hide();
    $("#errorPhone").hide();
    $("#errorEmail").hide();

    var errorRestaurant = false;
    var errorAddress = false;
    var errorLot_Floor = false;
    var errorPostalCode = false;
    var errorFirstname = false;
    var errorLastname = false;
    var errorPhone = false;
    var errorEmail = false;
    

    $('#restaurantName').focusout(function(){
        checkRestaurant(); 
    });

    $('#address').focusout(function(){
        checkAddress(); 
    });

    /*$('#lot_floor').focusout(function(){
        checkLot_Floor(); 
    });*/

    $('#postalCode').focusout(function(){
        checkPostalCode(); 
    });

    $('#firstName').focusout(function(){
        checkFirstName(); 
    });

    $('#lastName').focusout(function(){
        checkLastName(); 
    });

    $('#phone').focusout(function(){
        checkPhone(); 
    });

    $('#email').focusout(function(){
        checkEmail(); 
    });

    function checkRestaurant(){
        var val = $('#restaurantName').val();
       
        var Length = val.length;
        
        if (val != ''){
            $('#errorRestaurantName').hide();
            errorRestaurant = false;
        } else {
            $('#errorRestaurantName').html("Restaurant name is missing");
            $('#errorRestaurantName').show();
            errorRestaurant = true;
        }  
    }

    function checkAddress(){
        var val = $('#address').val();
        var length = val.length;

        if (val != ''){
            $('#errorAddress').hide();
            errorAddress = false;
        } else {
            $('#errorAddress').html("Address is missing");
            $('#errorAddress').show();
            errorRestaurant = true;
        } 
    }

    function checkPostalCode(){
        var val = $('#postalCode').val();
        var length = val.length;

        if (val.isNumeric()){
            $('#errorAddress').hide();
            errorAddress = false;
        } else {
            $('#errorAddress').html("Postal Code don´t match requirements");
            $('#errorAddress').show();
            errorRestaurant = true;
        } 
    }

    function checkFirstName(){
        var val = $('#firstName').val()
       
        var fistnameLength = val.length;
        
        if (/^[a-zA-Z]+$/.test(val)){
            if(fistnameLength < 2 || fistnameLength > 10) {
                $('#errorFirstname').html("Should be between 2 - 10 characters");
                $('#errorFirstname').show();
                errorFirstname = true;
            } else {
                $('#errorFirstname').hide();
                errorFirstname = false;
            }
        } else {
            $('#errorFirstname').html("Must contain only letters");
            $('#errorFirstname').show();
            errorFirstname = true;
        }       
    }

    function checkLastName(){
        var val = $('#lastName').val()
        
        var lastnameLength = val.length;
        
        if (/^[a-zA-Z]+$/.test(val)){
            if(lastnameLength < 2 || lastnameLength > 10) {
                $('#errorLastname').html("Should be between 2 - 10 characters");
                $('#errorLastname').show();
                errorLastname = true;
            } else {
                $('#errorLastname').hide();
                errorLastname = false;
            }
        } else {
            $('#errorLastname').html("Must contain only letters");
            $('#errorLastname').show();
            errorLastname = true;
        }     
    }

    
    function checkEmail(){
        var pattern = new RegExp(/^[+a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i);

        if(pattern.test($("#email").val())){
            $("errorEmail").hide();
            errorEmail = false;
        } else {
            $("#errorEmail").html("Invalid email address");
            $("#errorEmail").show();
            errorEmail = true;
        }
    }

    


    $("#form").submit(function(){

        errorFirstname = false;
        errorLastname = false;
        errorPassword = false;
        errorConfirmPassword = false;
        errorEmail = false;
        errorUsername = false;

        checkFirstName();
        checkLastName();
        checkPassword();
        checkConfirmPassword();
        checkEmail();
        checkUsername();

        if(errorFirstname === false && errorLastname === false && errorPassword === false && errorConfirmPassword === false && errorEmail === false && errorUsername === false){
            return true;
        } else {
            return false;
        }
    });

});