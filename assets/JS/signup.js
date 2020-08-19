
//---------------show - hide password ---------------------------------------------------------------------

function show_password() {
    var pass = document.getElementById("password");
    var confirm_pass = document.getElementById("confirm_password");
    if (pass.type === "password" || (confirm_pass.type === "confirm_password")) {
        pass.type = "text";
        confirm_pass.type = "text";
    } else {
        pass.type = "password";
        confirm_pass.type = "password";
    }
  }
  

 //-----------------------------------------validate form -----------------------------------------------------------------

 $(function(){

    $("#username_error").hide();
    $("#username_success").hide();

    $("#email_error").hide();
    $("#email_success").hide();

    
    $("#phone_error").hide();
    $("#phone_success").hide();


    $("#password_error").hide();
    $("#password_success").hide();

    $("#confirm_password_error").hide();
    $("#confirm_password_success").hide();
    
    var error_username = false;
    var success_username = false;

    var error_email = false;
    var success_email = false;

    var error_phone = false;
    var success_phone = false;


    var error_password = false;
    var success_password = false;


    var error_confirm_password = false;
    var success_confirm_password = false;

    $("#username").keyup(function(){
        check_username();
    });

    $("#email").keyup(function(){
        check_email();
    });

    $("#phone").keyup(function(){
        check_phone();
    });

    $("#password").keyup(function(){
        check_password();
    });

    $("#confirm_password").keyup(function(){
        check_confirm_password();
    });



    function check_username(){

        var username = $("#username").val();

        if(username == ""){
            $("#username_success").hide();
            $("#username_error").html("<span>&#33;</span> Username Required");
            $("#username_error").focus();
            $("#username_error").show();
            error_username = true;
        }
        else if(username.length < 5){
            $("#username_success").hide();
            $("#username_error").html("<span>&#33;</span> Should be more than 5 characters");
            $("#username_error").show();
            error_username = true;
          }else if(username.length > 20){
            $("#username_success").hide();
            $("#username_error").html("<span>&#33;</span> Should be less than 20 characters");
            $("#username_error").show();
            error_username = true;
          }else{
            $("#username_error").hide();
            $("#username_success").html("<span>&#10004;</span> Correct");
            $("#username_success").show();
            success_username = true;
        }
    }

    function check_email(){

      var email = $("#email").val();
      var email_pattern = new RegExp(/^[+a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i);

      if(email == ""){
        $("#email_success").hide();
        $("#email_error").html("<span>&#33;</span> E-mail Required");
        $("#email_error").show();
        error_email = true;
      }else if(email_pattern.test($("#email").val())){
          $("#email_error").hide();
          $("#email_success").html("<span>&#10004;</span> Correct");
          $("#email_success").show();
          success_email = true;
      }else{
          $("#email_success").hide();
          $("#email_error").html("<span>&#33;</span> Invalid Email Address");
          $("#email_error").show();
          error_email = true;
      }
  }

    function check_phone(){

        var phone = $("#phone").val();
        var phone_pattern = new RegExp(/^[0-9]\d{9}$/);

        if(phone == ""){
            $("#phone_success").hide();
            $("#phone_error").html("<span>&#33;</span> Phone Required");
            $("#phone_error").show();
            error_phone = true;
        }else if(phone_pattern.test($("#phone").val())){
            $("#phone_error").hide();
            $("#phone_success").html("<span>&#10004;</span> Correct");
            $("#phone_success").show();
            success_phone = true;
        }else{
            $("#phone_success").hide();
            $("#phone_error").html("<span>&#33;</span> Invalid Phone");
            $("#phone_error").show();
            error_phone = true;
        }
    }
        

    function check_password(){

        var password = $("#password").val();

        if(password == ""){
            $("#password_success").hide();
            $("#password_error").html("<span>&#33;</span> Password Required");
            $("#password_error").show();
            error_password = true;
        }else if(password.length < 8 ){
            $("#password_success").hide();
            $("#password_error").html("<span>&#33;</span> At least 8 characters");
            $("#password_error").show();
            error_password = true;
        }else{
            $("#password_error").hide();
            $("#password_success").html("<span>&#10004;</span> Correct");
            $("#password_success").show();
            success_password = true;
        }
    }


    function check_confirm_password(){

        var password = $("#password").val();
        var confirm_password = $("#confirm_password").val();

        if(password == ""){
            $("#confirm_password_success").hide();
            $("#confirm_password_error").hide();
        }else if (password != confirm_password){
            $("#confirm_password_success").hide();
            $("#confirm_password_error").html("<span>&#33;</span> Passwords don't match");
            $("#confirm_password_error").show();
            error_confirm_password = true;
        }else{
            $("#confirm_password_error").hide();
            $("#confirm_password_success").html("<span>&#10004;</span> Passwords match");
            $("#confirm_password_success").show();
            success_confirm_password = true;
        }
    }

    $("#signup_form").submit(function(){

       error_username = false;
       error_email = false;
       error_phone = false;
       error_password = false;
       error_confirm_password = false;

       check_username();
       check_email();
       check_phone();
       check_password();
       check_confirm_password();


       if(error_username == 0 && error_email == 0 && error_phone == 0 && error_password == 0 && error_confirm_password == 0){
         return true;
       }else{
         return false;
       }

    });



});