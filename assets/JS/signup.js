
//---------------show - hide password ----------------------------
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
  

  $(function() {
    $("form[name='signup_form']").validate({
      rules: {
        username: {
          required: true
        },
        email: {
          required: true
        },
        phone: {
          required: true,
          maxlength: 10,
          minlength:10
        },
        password: {
          required: true
        },
        confirm_password: {
          required: true,
          equalTo : "#password"
        }
      },
      messages: {
        username: {
          required: "**Please enter your username"
        },
        email: {
          required: "**Please enter your email"
        },
        phone: {
          required: "**Please enter your phone",
          maxlength: "**Please enter no more than 10 digits",
          minlength: "**Please enter up to 10 digits"
        },
        password: {
          required: "**Please enter your password"
        },
        confirm_password: {
          required: "**Please confrim your password",
          equalTo: "**Passwords do not match!"
        }
      }
    });
  });


  function signup_form_validation(){

    var phone = $("#phone").val();

    var pattern = /^[0-9]*$/;

    if(!pattern.test(phone)){
      $(".phone_error").show();
      $(".phone_error").text("**Please enter a valid Phone");
      return false;
    }  

    return true;
  }

